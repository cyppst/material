<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: Import.PHP
*/

// Database Connection
require 'config.php';

$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES['file']['name']);

        $file = "files/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE student
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY '\n'
         IGNORE 1 LINES
        (id,full_name,section)
eof;
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        $message = "CSV file successfully imported!";
    }
}



// View records from the table
$students = '<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>FULL NAME</th>
    <th>SECTION</th>
</tr>
';
$query = "SELECT * FROM student";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $students .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['id'] . '</td>
            <td>' . $row['full_name'] . '</td>
            <td>' . $row['section'] . '</td>
        </tr>';
        $number++;
    }
} else {
    $students .= '<tr>
        <td colspan="4">Records not found!</td>
        </tr>';
}
$students .= '</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ะบบจัดการครุภัณฑ์ วิทยาการคอมฯ">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="/assets/js/jquery-3.2.1.min.js"></script>

    <script src="/assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="/assets/css/sweetalert2.css">
    <title>ะบบจัดการครุภัณฑ์ วิทยาการคอมฯ</title>

</head>
<body>
<div class="container">

    <br><br>

    <div class="row">
        <div class="col-md-6 col-md-offset-0">
            <form enctype="multipart/form-data" method="post" action="import.php">
                <div class="form-group">
                    <label for="file">Select .CSV file to Import</label>
                    <input name="file" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <?php echo $message; ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                </div>
            </form>
            <div class="form-group">
                <?php echo $students; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
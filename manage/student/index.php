<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$con = new mysqli($database['host'], $database['username'], $database['password'], $database['database']);
mysqli_set_charset($con, 'utf8'); // ← SOLUTION

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'ตรสว!';
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES['file']['name']);

        $file = "files/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE student
         CHARACTER SET UTF8
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY '\n'
        
         IGNORE 1 LINES
        (id,full_name,section)
eof;
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        $message = "นำเข้าไฟล์ csv เรียบร้อย!";
    }
}

// View records from the table
$students = '<table class="table table-bordered">
<tr>
    <th>ลำดับ</th>
    <th>รหัส</th>
    <th>ชื่อ-นามสกุล</th>
    <th>กลุ่มเรียน</th>
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
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

<main class="app-content">

    <div class="row">
        <div class="col tile">
            <form enctype="multipart/form-data" method="post" action="indexphp">
                <div class="form-group">
                    <label for="file">เลือกไฟล์ csv ที่ต้องการนำเข้า</label>
                    <input name="file" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <?php echo $message; ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="ดำเนินการ"/>
                </div>
            </form>
            <div class="form-group">
                <?php echo $students; ?>
            </div>
        </div>

    </div>
    </div>

</main>
<link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/MonthPicker.min.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>


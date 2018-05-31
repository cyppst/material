<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> ออกรายงานe</h1>
            <p>การเบิกวัสดุประจำเดือน</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">นำเข้าข้อมูลนักศึกษาจากไฟล์ csv</div>
                <div class="tile-body">
                    <form class="form" action="update.php" enctype="multipart/form-data" method="POST">
                        <p class="semibold-text">Upload your file</p>
                        <input class="" type="file" name="uploaded_file"/><br/>
                        <input class="form-control" type="submit" value="Upload"/>
                    </form>

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


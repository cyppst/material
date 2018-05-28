<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';?>

<?php
if (isset($_SESSION['formFields'])) {
    foreach ($_SESSION['formFields'] as $key => $value) {
        $field[$key] = $value;
    }
    unset($_SESSION['formFields']);
}
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> เพิ่มหน่วยนับ
            </h1>
            <!--            <p>Start a beautiful journey here</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="insert.php" method="POST">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">ชื่อ</label>
                                <input class="form-control" id="name" name="name"
                                       value="<?= get_input('name') ?>"
                                       type="text"
                                       placeholder="กรอกชื่อ">
                            </div>


                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">เพิ่ม</button>
                    </div>

            </form>

        </div>
    </div>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

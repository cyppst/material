<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> เพิ่มข้อมูลนักศึกษาใหม่
            </h1>
            <!--            <p>Start a beautiful journey here</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="update.php" method="POST">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">รหัสนักศึกษา</label>
                                <input class="form-control" id="name" name="student_id"
                                       type="text" value="<?= $_SESSION['student_id'] ?>"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">ชื่อ/นามสกุล</label>
                                <input class="form-control" id="name" name="full_name"
                                       type="text"
                                       placeholder="กรอกชื่อ-สกุล">
                            </div>
                            <div class="form-group">
                                <label for="name">กลุ่มเรียน</label>
                                <input class="form-control" id="section" name="section"
                                       type="text"
                                       placeholder="ระบุกลุ่มเรียน">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">บันทึก</button>
                    </div>

            </form>

        </div>
    </div>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

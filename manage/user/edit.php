<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>
<?php
if (isset($_SESSION['formFields'])) {
    foreach ($_SESSION['formFields'] as $key => $value):
        $user[$key] = $value;
    endforeach;
    unset($_SESSION['formFields']);
} else if (isset($_GET['id'])) {
    $user = ORM::for_table('user')->find_one($_GET['id']);

} else {
    $msg->error('0', 'index.php');
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> แก้ไขผู้ใช้
            </h1>
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
                                <label for="fullname">ชื่อ/นามสกุล</label>
                                <input class="form-control" id="fullname" name="fullname"
                                       value="<?= $user['fullname'] ?>"
                                       type="text"
                                       aria-describedby="text-fullname" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="address">ที่อยู่</label>
                                <input class="form-control" id="address" name="address"
                                       value="<?= $user['address'] ?>"
                                       type="text"
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="tel">โทรศัพท์</label>
                                <input class="form-control" id="tel" name="tel"
                                       value="<?= $user['tel'] ?>"
                                       type="number"
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="login">ชื่อผู้ใช้</label>
                                <input class="form-control" id="login" name="login"
                                       value="<?= $user['login'] ?>"
                                       type="text" disabled>
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input class="form-control" id="password" name="password"
                                       type="text" placeholder="เว้นว่างไว้หากไม่ต้องการเปลี่ยนรหัสผ่าน">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">แก้ไขข้อมูล</button>
                    </div>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

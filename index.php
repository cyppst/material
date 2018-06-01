<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();

$msg = new \Plasticbrain\FlashMessages\FlashMessages();


if (isset($_SESSION['user'])) {
    header("Location: /dashboard.php");
}


if (!empty($_POST['login']) && !empty($_POST['password'])):

    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = ORM::for_table('user')->where('login', $login)->find_one();


    if (count($user) > 0 && $password == $user['password']) {
        $_SESSION['user'] = $user;
        $userUpdate = ORM::for_table('user')->find_one($user->id);
        $userUpdate->id = time();;
        $userUpdate->save();

        header("Location: dashboard.php");

    } else {
        $msg = new Plasticbrain\FlashMessages\FlashMessages();
        $msg->error('Login หรือ Password ผิด');
    }

endif;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/sweetalert2.css">
    <script src="/assets/js/sweetalert2.js"></script>
    <style type="text/css">

    </style>
    <title>ระบบเบิกจ่ายวัสดุอุปกรณ์</title>
</head>
<body>

<section class="material-half-bg">
    <div class="cover"></div>
</section>

<section class="login-content">

    <div class="logo">
        <h1>ระบบเบิกจ่ายวัสดุอุปกรณ์</h1>
    </div>
    <div class="row">
        <?= get_message() ?>
    </div>
    <div class="login-box">

        <form class="login-form" method="POST">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>เข้าสู่ระบบ</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" name="login" placeholder="Username" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">ลืมรหัสผ่าน ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ</button>
                <button n type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#login-box2">
                    สำหรับนักศึกษา
                </button>
            </div>

        </form>
        <form class="forget-form" action="index.html">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>ลืมรหัสผ่าน ?</h3>
            <div class="form-group">
                <label class="control-label">login</label>
                <input class="form-control" type="text" placeholder="login">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back
                        to Login</a></p>
            </div>
        </form>

    </div>
</section>
<div class="modal" id="login-box2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <!--                <h4 class="modal-title">สำหรับนักศึกษา</h4>-->
                <h4 class="modal-title"><i class="fa fa-lg fa-fw fa-user"></i>เข้าสู่ระบบ</h3>
                    <button type="submit" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="/student/index.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">รหัสประจำตัวนักศึกษา</label>
                        <input class="form-control" type="text" name="student_id" placeholder="เช่น 5704063001113"
                               autofocus>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Essential javascripts for application to work-->
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="/assets/js/plugins/pace.min.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>
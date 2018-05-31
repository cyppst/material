<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if (isset($_POST['student_id'])) {
    $id = $_POST['student_id'];
    $student = ORM::for_table('student')->findOne($id);
    if (!$student) {
        $msg->error('<strong>ไม่พบข้อมูล</strong> กรุณาตรวจสอบรหัส นศ. ของท่านให้ถูกต้อง', '/');
    } else {
        $_SESSION['student'] = $student;
    }
}

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
<body class="app sidebar-mini rtl">

<!-- Navbar-->

<header class="app-header"><a class="app-header__logo" href="index.html">Vali</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                        class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i
                                            class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                                            class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a></li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa sent you a mail</p>
                                    <p class="app-notification__meta">2 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-danger"></i><i
                                                class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Mail server not working</p>
                                    <p class="app-notification__meta">5 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-success"></i><i
                                                class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Transaction complete</p>
                                    <p class="app-notification__meta">2 days ago</p>
                                </div>
                            </a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">

                <li><a class="dropdown-item" href="/logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="/assets/img/user.png"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name text-capitalize"><?= $student['full_name']; ?> </p>
        </div>
    </div>
    <ul class="app-menu">
        <li class=""><a class="app-menu__item"
                        href="/student/material/take.php"><i
                        class="app-menu__icon fa fa-page"></i><span
                        class="app-menu__label">รายการเบิกวัสดุ</span></a></li>

        <li class=""><a class="app-menu__item"
                        href="/student/material/take.php"><i
                        class="app-menu__icon fa fa-page"></i><span
                        class="app-menu__label">รายการยืมอุปกรณ์</span></a></li>
        <li class=""><a class="app-menu__item"
                        href="/student/equipment/return.php"><i
                        class="app-menu__icon fa fa-page"></i><span
                        class="app-menu__label">รายการคืนอุปกรณ์</span></a></li>

        <li class=""><a class="app-menu__item"
                        href="/student/report"><i
                        class="app-menu__icon fa fa-page"></i><span
                        class="app-menu__label">ออกรายงาน</span></a></li>

    </ul>
</aside>

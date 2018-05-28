<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /");
} else {
    $user = $_SESSION['user'];
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
    <meta property="og:site_name" content="Vali Admin">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



    <script src="/assets/js/jquery-3.2.1.min.js"></script>

    <script src="/assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="/assets/css/sweetalert2.css">
    <title>Vali Admin</title>

</head>
<body class="app sidebar-mini rtl">

<!-- Navbar-->

<header class="app-header"><a class="app-header__logo" href="index.html">Vali</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
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
                <li><a class="dropdown-item" href="/manage/user/edit.php?id=<?= $user['id'] ?>"><i
                                class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="/logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="/uploads/user/<?= $user['image']; ?>"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name text-capitalize"><?= $user['fullname']; ?> </p>
        </div>
    </div>
    <ul class="app-menu">
        <li class=""><a class="app-menu__item <?= is_current('dashboard'); ?> <?= is_current('dashboard'); ?>"
                        href="/dashboard.php"><i
                        class="app-menu__icon fa fa-home"></i><span
                        class="app-menu__label">หน้าหลัก</span></a></li>

        <li class="treeview"><a class="app-menu__item <?= is_current('dashboard'); ?>"
                                href="#"
                                data-toggle="treeview"><i
                        class="app-menu__icon fa fa-laptop"></i><span
                        class="app-menu__label">จัดการข้อมูลหลัก</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="/manage/user"><i class="icon fa fa-print"></i>ผู้ใช้</a>
                </li>
                <li class=""><a class="treeview-item <?= is_current('material'); ?>"
                                href="/manage/material"><i
                                class="icon fa fa-print"></i>วัสดุ</a></li>
                <li><a class="treeview-item <?= is_current('equipment'); ?>"
                       href="/manage/equipment"><i
                                class="icon fa fa-print"></i>อุปกรณ์</a></li>
                <li><a class="treeview-item <?= is_current('unit'); ?>"
                       href="/manage/unit"><i
                                class="icon fa fa-print"></i>หน่วยนับ</a></li>
                <li><a class="treeview-item <?= is_current('material_type'); ?> "
                       href="/manage/material_type"><i
                                class="icon fa fa-print"></i>ประเภทวัสดุ</a></li>
            </ul>
        </li>

        <li><a class="app-menu__item <?= is_current('in'); ?>" href="/manage/material/in"><i
                        class="app-menu__icon fas fa-arrow-alt-circle-down"></i>รับวัสดุ</a>
        </li>
        <li><a class="app-menu__item <?= is_current('in'); ?>" href="/manage/equipment/in"><i
                        class="app-menu__icon fas fa-arrow-alt-circle-down"></i>รับอุปกรณ์</a>
        </li>


        <li class=""><a class="app-menu__item <?= is_current('out'); ?>" href="/manage/material/out"><i
                        class="app-menu__icon fas fa-arrow-alt-circle-up"></i>เบิกวัสดุ</a></li>

        <li><a class="app-menu__item <?= is_current('borrow'); ?>" href="/manage/equipment/borrow"><i
                        class="app-menu__icon fa fas fa-arrow-alt-circle-up"></i>ยืมอุปกรณ์</a>
        </li>
        <li><a class="app-menu__item <?= is_current('return'); ?>" href="/manage/equipment/return"><i
                        class="app-menu__icon fas fa-retweet"></i>คืนอุปกรณ์</a>
        </li>

        <li class="treeview"><a class="app-menu__item <?= is_current('dashboard'); ?>"
                                href="#"
                                data-toggle="treeview"><i
                        class="app-menu__icon fa fa-paper-plane"></i><span
                        class="app-menu__label">ออกรายงาน</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="/report/"><i class="icon fa fa-print"></i>รายงานการเบิกวัสดุประจำเดือน</a></li>
                <li><a class="treeview-item" href="/report/"><i class="icon fa fa-print"></i>รายงานการยืมอุปกรณืประจำเดือน</a></li>
                <li><a class="treeview-item" href="/report/equipment/not_returned.php"><i class="icon fa fa-print"></i>รายงานการยืมอุปกรณ์ที่ค้างส่งคืน</a></li>
                <li><a class="treeview-item" href="/report/material/inventory.php"><i class="icon fa fa-print"></i>รายงานยอดคงเหลือวัสดุ</a></li>
                <li><a class="treeview-item" href="/report/equipment/inventory.php"><i class="icon fa fa-print"></i>รายงานยอดคงเหลืออุปกรณ์</a></li>
                <li><a class="treeview-item" href="/report/material/take.php"><i class="icon fa fa-print"></i>รายงานสรุปยอดจำนวนการเบิกวัสดุุ</a></li>
                <li><a class="treeview-item" href="/report/equipment/borrow.php"><i class="icon fa fa-print"></i>รายงานสรุปยอดจำนวนการยืมอุปกรณ์</a></li>
            </ul>
        </li>


    </ul>
</aside>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /");
} else {
    $user = $_SESSION['user'];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">
    <title>ระบบเบิกจ่ายวัสดุอุปกรณ์</title>
</head>

<body class="app sidebar-mini rtl">
<header class="app-header"><a class="app-header__logo" href="/">ระบบเบิกจ่ายวัสดุอุปกรณ์</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"> <i
                        class="fa fa-user fa-lg"></i> <span class="text-capitalize"><?= $user['fullname']; ?></span>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <!-- ` -->
                <li>
                    <a class="dropdown-item" href="/logout.php"> <i class="fas fa-sign-out-alt fa-2x""></i>
                        ออกจากระบบ</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="/uploads/user/
											<?= $user['image']; ?>" alt="User Image">
        <div>
            <p class="app-sidebar__user-name text-capitalize">
                <?= $user['fullname']; ?>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li class="">
            <a class="app-menu__item
													<?= is_current('dashboard'); ?>
													<?= is_current('dashboard'); ?>" href="/dashboard.php"> <i
                        class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">หน้าหลัก</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item
													<?= is_current('dashboard'); ?>" href="#" data-toggle="treeview"> <i
                        class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">จัดการข้อมูลหลัก</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="/manage/user"> <i class="icon fa fa-print"></i>ผู้ใช้</a>
                </li>
                <li class="">
                    <a class="treeview-item
															<?= is_current('material'); ?>" href="/manage/material"> <i
                                class="icon fa fa-print"></i>วัสดุ</a>
                </li>
                <li>
                    <a class="treeview-item
															<?= is_current('equipment'); ?>" href="/manage/equipment">
                        <i class="icon fa fa-print"></i>อุปกรณ์</a>
                </li>
                <li>
                    <a class="treeview-item
															<?= is_current('unit'); ?>" href="/manage/unit"> <i
                                class="icon fa fa-print"></i>หน่วยนับ</a>
                </li>
                <li>
                    <a class="treeview-item
															<?= is_current('material_type'); ?> "
                       href="/manage/material_type"> <i class="icon fa fa-print"></i>ประเภทวัสดุ</a>
                </li>
                <li>
                    <a class="treeview-item
															<?= is_current('material_type'); ?> "
                       href="/manage/student"> <i class="icon fa fa-print"></i>นำเข้ารายชื่อ นศ.</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item
													<?= is_current('in'); ?>" href="/manage/material/in"> <i
                        class="app-menu__icon fas fa-arrow-alt-circle-down"></i>รับวัสดุ</a>
        </li>
        <li>
            <a class="app-menu__item
													<?= is_current('in'); ?>" href="/manage/equipment/in"> <i
                        class="app-menu__icon fas fa-arrow-alt-circle-down"></i>รับอุปกรณ์</a>
        </li>
        <li class="">
            <a class="app-menu__item
													<?= is_current('out'); ?>" href="/manage/material/out"> <i
                        class="app-menu__icon fas fa-arrow-alt-circle-up"></i>เบิกวัสดุ</a>
        </li>
        <li>
            <a class="app-menu__item
													<?= is_current('borrow'); ?>" href="/manage/equipment/borrow"> <i
                        class="app-menu__icon fa fas fa-arrow-alt-circle-up"></i>ยืมอุปกรณ์</a>
        </li>
        <li>
            <a class="app-menu__item
													<?= is_current('return'); ?>" href="/manage/equipment/return"> <i
                        class="app-menu__icon fas fa-retweet"></i>คืนอุปกรณ์</a>
        </li>
        <li class="treeview">
            <a class="app-menu__item
													<?= is_current('dashboard'); ?>" href="#" data-toggle="treeview"> <i
                        class="app-menu__icon fa fa-paper-plane"></i>
                <span class="app-menu__label">ออกรายงาน</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="/report/"> <i class="icon fa fa-print"></i> ออกรายงาน (สรุปรายเดือน)</a>
                </li>
                <li>
                    <a class="treeview-item" href="/report/equipment/not_returned.php"> <i
                                class="icon fฤa fa-print"></i>การยืมอุปกรณ์ที่ค้างส่งคืน</a>
                </li>
                <li>
                    <a class="treeview-item" href="/report/material/inventory.php"> <i class="icon fa fa-print"></i>ยอดคงเหลือวัสดุ</a>
                </li>
                <li>
                    <a class="treeview-item" href="/report/equipment/inventory.php"> <i class="icon fa fa-print"></i>ยอดคงเหลืออุปกรณ์</a>
                </li>
                <li>
                    <a class="treeview-item" href="/report/material/take.php"> <i class="icon fa fa-print"></i>สรุปยอดการเบิกวัสดุ</a>
                </li>
                <li>
                    <a class="treeview-item" href="/report/equipment/borrow.php"> <i class="icon fa fa-print"></i>สรุปการยืมอุปกรณ์</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
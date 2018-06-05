<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
$dashboard = array();
$dashboard['user'] = ORM::for_table('user')->count();
$dashboard['equipment'] = ORM::for_table('equipment')->count();
$dashboard['material'] = ORM::for_table('equipment_history')->count();
$dashboard['history']['equipment'] = ORM::for_table('material')->count();

$login_data = ORM::for_table('user')->select('fullname')->select('last_login')->find_many();

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tachometer-alt"></i> หน้าหลัก</h1>
            <p></p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>ผู้ใช้ทั้งหมด</h4>
                    <a href="/manage/user"><p><b><?= $dashboard['user'] ?></b></p></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-toolbox fa-3x"></i>
                <div class="info">
                    <h4>อุปกรณ์ทั้งหมด</h4>
                    <a href="/manage/equipment"><p><b><?= $dashboard['equipment'] ?></b></p></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>วัสดุทั้งหมด</h4>
                    <a href="/manage/material"><p><b><?= $dashboard['material'] ?></b></p></a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
         <div class="tile">
             <table class="table">
                 <thead>
                 <tr>
                     <th class="text-center">ผู้ใช้</th>
                     <th class="text-center">เวลาที่เข้าสู่ระบบ</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php
                 foreach ($login_data as $data):
                     ?>
                     <tr>
                         <td scope="row"><?=$data['fullname']?></td>
                         <td><?=$data['last_login']?></td>
                     </tr>
                 <?php endforeach; ?>
                 </tbody>
             </table>

         </div>
         </div>
    </div>
</main>
<?php include 'include/foot.php'; ?>


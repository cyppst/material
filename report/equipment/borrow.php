<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';

use Dompdf\Dompdf;
use Jenssegers\Date\Date;

ob_start();
?>

<?php
session_start();
$report = ORM::for_table('report_no')->create();
$report->user_id = $_SESSION['user']['id'];
$report->save();

?>
    <!doctype html>

    <html lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="http://localhost/assets/report/report.css">
    </head>
    `````````
    <body>
    <div class="sru-logo"></div>


    <p align="center"><img src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/assets/report/img/SRU-Logo-Black-White.jpg"
                           class="sru-logo"></p>
    <p class="title">
        รายงานแสดงการยืมอุปกรณ์
    </p>
    <div class="report-text-group">
        <p class="report-text-right">
            ออกรายงานเมื่อ : <?= Date::now()->add('543 years')->format('j F Y'); ?></p>
        <p class="report-text-right"> เลขที่ : <?= str_pad($report->id, 5, "0", STR_PAD_LEFT); ?></p>
    </div>
    <table>
        <tr>
            <th>วันที่</th>
            <th>บาร์โค๊ด</th>
            <th>ชื่ออุปกรณ์</th>
            <th>จำนวน</th>
            <th>สถานะ</th>
        </tr>
        <?php
        $equipments = ORM::for_table('equipment_history')
            ->table_alias('h')
            ->select('h.*')
            ->select('e.name', 'equipment_name')
            ->select('e.barcode', 'barcode')
            ->where('student_id', $student['id'])
            ->where('status', '\ับอุปกรณ์แล้ว')
            ->join('equipment', array('h.equipment_id', '=', 'e.id'), 'e')
            ->find_many();
        foreach ($equipments as $equipment): ?>
            <tr>
                <td><?= $equipment['datetime'] ?></td>
                <td><?= $equipment['barcode'] ?></td>
                <td><?= $equipment['equipment_name'] ?></td>
                <td><?= $equipment['amount'] ?></td>
                <td><?= $equipment['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    </body>
    </html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

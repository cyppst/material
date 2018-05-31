<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';

use Dompdf\Dompdf;
use Jenssegers\Date\Date;

ob_start();
?>

<?php
if (isset($_GET['month'])):
    session_start();
    $input = explode("-", $_GET['month']);

    $report = ORM::for_table('report_no')->create();
    $report->user_id = $_SESSION['user']['id'];
    $report->save();

    $sth = $pdo->query("SELECT
    h.id,
    h.datetime datetime,
    h.status status,
    u.fullname fullname,
    e.name equipment_name,
    e.amount as amount
FROM `equipment_history` AS h
LEFT JOIN user AS u ON h.user_id = u.id
LEFT JOIN equipment AS e ON h.equipment_id = e.id
WHERE MONTH(h.datetime) = $input[1] AND YEAR(h.datetime) = $input[0]");
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <!doctype html>

    <html lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="http://localhost/assets/report/report.css">
    </head>
    <body>
    <div class="sru-logo"></div>


    <p align="center"><img src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/assets/report/img/SRU-Logo-Black-White.jpg"
                           class="sru-logo"></p>
    <p class="title">
        รายงานการยืมอุปกรณ์ประจำเดือน <?= Date::create('0', $input[1])->format('F') . '/' . $input[0]; ?>
    </p>
    <div class="report-text-group">
        <p class="report-text-right">
            ออกรายงานเมื่อ : <?= Date::now()->add('543 years')->format('j F Y'); ?></p>
        <p class="report-text-right"> เลขที่ : <?= str_pad($report->id, 5, "0", STR_PAD_LEFT); ?></p>
    </div>

    <table>
        <tr>
            <th>วันที่ยืม</th>
            <th>ผู้ยืม</th>
            <th>ชื่ออุปกรณ์</th>
            <th>จำนวน</th>
            <th>สถานะ</th>
        </tr>
        <?php foreach ($result as $row => $link): ?>
            <tr>
                <td><?= $link['datetime'] ?></td>
                <td><?= $link['fullname'] ?></td>
                <td><?= $link['equipment_name'] ?></td>
                <td><?= $link['amount'] ?></td>
                <td><?= $link['status'] ?></td>

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
else:
    echo 'Variable was not provided.';
endif;

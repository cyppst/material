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

$sth = $pdo->query("SELECT  m.name material_name, t.name type_name, m.amount as amount FROM material AS m
LEFT JOIN material_history AS h ON h.material_id = m.id
LEFT JOIN material_type AS t ON m.type_id = t.id");
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
        รายงานการเบิกวัสดุทั้งหมด
    </p>
    <div class="report-text-group">
        <p class="report-text-right">
            ออกรายงานเมื่อ : <?= Date::now()->add('543 years')->format('j F Y'); ?></p>
        <p class="report-text-right"> เลขที่ : <?= str_pad($report->id, 5, "0", STR_PAD_LEFT); ?></p>
    </div>

    <table>
        <tr>
            <th>ชื่อวัสดุ</th>
            <th>ประเภท</th>
            <th>จำนวน</th>
        </tr>
        <?php foreach ($result as $row => $link): ?>
            <tr>
                <td><?= $link['material_name'] ?></td>
                <td><?= $link['type_name'] ?></td>
                <td><?= $link['amount'] ?></td>
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


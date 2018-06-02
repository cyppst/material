<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/dataTable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';

?>
    <main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> รายการยืมอุปกรณ์</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="tile">
    <div class="tile-body">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>วัันที่/เวลา</th>
        <th>Barcode</th>
        <th>ชื่อครุภัณฑ์</th>
        <th>จำนวน</th>
    </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT
                            h.datetime datetime,
                            e.barcode barcode, e.name equipment_name,
                            h.amount amount,h.status status
FROM equipment_history AS h
LEFT JOIN equipment AS e ON h.equipment_id = e.id
WHERE student_id =:student_id AND status = 'รับอุปกรณ์แล้ว'";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':student_id', $_SESSION['student']['id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row => $link):?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </main>
    <div class="modal fade" id="imageUrl" tabindex="-1" role="dialog" aria-labelledby="imageUrlLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดวัสดุ</h4>
                </div>
                <div class="modal-body">
                    <img id="img" class="img-responsive" src="" alt="">
                    <p class="detail" id="detail"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger center-block" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>


<?php
endforeach;
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/foot.php'; ?>
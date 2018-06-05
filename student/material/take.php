<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/dataTable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';

?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> รายการเบิกวัสดุ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">วัันที่/เวลา</th>
                                <th class="text-center">บาร์โค้ด</th>
                                <th class="text-center">ชื่อวัสดุ</th>
                                <th class="text-center">ประเภท</th>
                                <th class="text-center">จำนวน</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $student_id = $_SESSION['student']['id'];
                            $sth = $pdo->query("
SELECT 
h.datetime datetime,
m.barcode barcode,
t.name type_name,
m.name material_name,
h.amount amount
FROM material_history AS h
LEFT JOIN material AS m
ON h.material_id = m.id
LEFT JOIN material_type AS
t ON m.type_id = t.id
WHERE h.student_id = ".$student_id."

");
                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row => $link): ?>

                            <tr>

                                <td><?= $link['datetime'] ?></td>
                                <td><?= $link['barcode'] ?></td>
                                <td><?= $link['material_name'] ?></td>
                                <td><?= $link['type_name'] ?></td>
                                <td><?= $link['amount'] ?></td>
                            </tr>
                            <?php endforeach; ?>
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
                    <button type="button" class="btn btn-danger center-block" data-dismiss="modal
">close
                    </button>
                </div>
            </div>
        </div>
    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/student/include/foot.php'; ?>
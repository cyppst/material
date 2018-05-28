<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/dataTable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';

?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> รายการยืมวัสดุ</h1>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <?php get_message(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>บาร์โค๊ด</th>
                                <th>ชื่อวัสดุ</th>
                                <th>ประเภท</th>
                                <th>จำนวน</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $equipments = ORM::for_table('equipment_history')
                                ->table_alias('h')
                                ->select('h.*')
                                ->select('e.name', 'equipment_name')
                                ->select('e.barcode', 'barcode')
                                ->where('student_id', $student['id'])
                                ->where('status', 'รับอุปกรณ์แล้ว')
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
                    <h4 class="modal-title">รายละเอียดวss</h4>
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


<?php include $_SERVER['DOCUMENT_ROOT'] . '/student/include/foot.php'; ?>
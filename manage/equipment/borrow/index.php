<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> ยืมอุปกรณ์
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form autocomplete="no" action="confirm.php" method="POST">
                <input type="hidden" name="equipment_id" id="equipment_id">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="barcode">แสกน Barcode <i class="fas fa-barcode"></i>
                                </label>
                                <input type="text" class="form-control" name="barcode" id="barcode" placeholder=""
                                       readonly>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                                ->table_alias('i')
                                ->select('i.*')
                                ->select('m.name', 'equipment_name')
                                ->select('m.barcode', 'barcode')
                                ->where('student_id', $student['id'])
                                ->where('status', '\ับอุปกรณ์แล้ว')
                                ->join('equipment', array('i.equipment_id', '=', 'm.id'), 'm')
                                ->find_many();
                            foreach ($equipments as $equipment): ?>
                                <tr>
                                    <td><?= $equipment['datetime'] ?></td>
                                    <td><?= $equipment['barcode'] ?></td>
                                    <td><?= $equipment['equipment_name'] ?></td>
                                    <td><?= $equipment['amount'] ?></td>
                                    <td><?= $equipment['หstatus'] ?></td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     
</main>
<script src="/assets/js/plugins/jquery-barcodeListener.js"></script>
<script>
    $('body').barcodeListener().on('barcode.valid', function (e, barcode) {
        $('#barcode').val(barcode);
        $('form').submit();
    })
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

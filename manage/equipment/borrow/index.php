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
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/barcode.php'; ?>

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
                            ->where_null('student_id')
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
<script src="/assets/js/plugins/jquery-barcodeListener.js"></script>
<script>
    $('body').barcodeListener().on('barcode.valid', function (e, barcode) {
        $('#barcode').val(barcode);
        $('form').submit();
    })
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

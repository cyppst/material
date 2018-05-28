<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> เพิ่มวัสดุ
            </h1>
            <!--            <p>Start a beautiful journey here</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="barcode">แสกน Barcode <i class="fas fa-barcode"></i>
                                </label>
                                <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                <input class="form-control" name="barcode" type="text"  value="<?= get_input('barcode') ?>" data-barcode-scanner-target
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="type_id">ประเภท</label>
                                <select class="form-control" id="type_id" name="type_id">
                                    <?php
                                    $types = ORM::for_table('material_type')->find_many();
                                    foreach ($types as $type) : ?>
                                        <option value="<?= (int)$type['id'] ?>"><?= (string)$type['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type_id">หน่วยนับ</label>
                                <select class="form-control" id="unit_id" name="unit_id">
                                    <?php
                                    $units = ORM::for_table('unit')->find_many();
                                    foreach ($units as $unit) : ?>
                                        <option value="<?= (int)$unit['id'] ?>"><?= (string)$unit['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">ชื่อวัสดุ</label>
                                <input class="form-control" id="name" name="name"
                                       value="<?= get_input('name') ?>"
                                       type="text"
                                       placeholder="กรอกชื่อวัสดุ" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">รายละเอียด</label>
                                <textarea class="form-control" name="detail" rows="4"
                                          placeholder="กรอกรายละเอียด"><?= get_input('detail') ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                                <input type="file" class="form-control" name="pictures" accept="image/*"/>
                            </div>

                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">เพิ่ม</button>
                    </div>

            </form>

        </div>
    </div>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

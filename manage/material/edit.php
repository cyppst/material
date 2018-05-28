<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $material = ORM::for_table('material')->find_one($_GET['id']);
        ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-dashboard"></i> แก้ไขข้อมูลวัสดุ</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="update.php" method="POST">
                        <div class="tile">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="barcode">สแกน Barcode</label>
                                        <input class="form-control" id="barcode" name="barcode"
                                               value="<?= $material['barcode'] ?>"
                                               type="text"
                                               placeholder="Scan Barcode" readonly>
                                        <small class="form-text text-muted" id="text-barcode">We'll never share your
                                            email with
                                            anyone else.
                                        </small>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="type_id">ประเภท</label>
                                            <select class="form-control" id="type_id" name="type_id">
                                                <?php
                                                    $types = ORM::for_table('material_type')->find_many();
                                                    foreach ($types as $type) : ?>
                                                        <option value="<?= $type['id'] ?>" <?php if ($type['id'] == $material['type_id']) {
                                                            echo 'selected';
                                                        } ?>><?= $type['name'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="type_id">หน่วยนับ</label>
                                            <select class="form-control" id="unit_id" name="unit_id">
                                                <?php
                                                    $units = ORM::for_table('unit')->find_many();
                                                    foreach ($units as $unit) : ?>
                                                        <option value="<?= $unit['id'] ?>" <?php if ($unit['id'] == $material['unit_id']) {
                                                            echo 'selected';
                                                        } ?>><?= $unit['name'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input class="form-control" id="name" name="name"
                                               value="<?= $material['name'] ?>"
                                               type="text"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">รายละเอียด</label>
                                        <textarea class="form-control" name="detail" rows="4"
                                                  placeholder="Enter your Detail"><?= $material['name'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                                        <input type="file" class="form-control" name="pictures" accept="image/*"/>
                                    </div>

                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="Submit">แก้ไข</button>
                            </div>

                    </form>

                </div>
            </div>
        </main>
        <?php
    } else {
        $msg->error('This is an error message', 'index . php');

    }

    include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

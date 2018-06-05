<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $equipment = ORM::for_table('equipment')->find_one($_GET['id']);
    ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-page"></i> Blank Page</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $equipment['id'] ?>">
                    <div class="tile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="barcode">สแกน Barcode</label>
                                    <input class="form-control" id="barcode" name="barcode"
                                           value="<?= $equipment['barcode'] ?>"
                                           type="text"
                                           placeholder="Scan Barcode" readonly>
                                    <small class="form-text text-muted" id="text-barcode">We'll never share your
                                        email with
                                        anyone else.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input class="form-control" id="name" name="name"
                                           value="<?= $equipment['name'] ?>"
                                           type="text"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">รายละเอียด</label>
                                    <textarea class="form-control" name="detail" rows="4"
                                              placeholder="Enter your Detail"><?= $equipment['name'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                                    <input type="file" class="form-control" name="pictures" accept="image/x-png,image/gif,image/jpeg"/>
                                </div>
                            </div>
                            <div class="form-group">

                                <button class="btn btn-primary" type="Submit">แก้ไข</button>

                            </div>
                </form>
            </div>
        </div>
    </main>
    <?php
} else {
    $msg->error('พบข้อผิิดพลาด', 'index . php');

}

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

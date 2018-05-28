<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'GET'):
    $unit = ORM::for_table('unit')->find_one($_GET['id']);
    ?>


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> แก้ไขหน่่วยนับ
                </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-12">
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $unit['id'] ?>">
                    <div class="tile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input class="form-control" id="name" name="name"
                                           value="<?= $unit['name'] ?>"
                                           type="text"
                                           placeholder="Enter Name">
                                </div>


                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="Submit">อัพเดท</button>
                        </div>

                </form>

            </div>
        </div>

    </main>
<? endif; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
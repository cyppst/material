<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'GET'):
    $material_type = ORM::for_table('material_type')->find_one($_GET['id']);
endif;
?>


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-page"></i> แก้ไขประเภทวัสดุ
                </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-12">
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $material_type['id'] ?>">
                    <div class="tile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input class="form-control" id="name" name="name"
                                           value="<?= $material_type['name'] ?>"
                                           type="text"
                                           placeholder="กรอกข้อมูล" required>
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
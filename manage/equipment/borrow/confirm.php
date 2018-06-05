<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$barcode = $_POST['barcode'];


$equipment = ORM::for_table('equipment')
    ->where('barcode', $barcode)
    ->find_one();


if (empty($equipment)) {
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if (!session_id()) @session_start();
    $msg->error('`ไม่พบ Barcode นี้ในระบบ`', 'index.php');
}

?>

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
    <div class="equipment">
        <div class="col-md-12">
            <form autocomplete="no" action="insert.php" method="POST">
                <input type="hidden" name="equipment_id" value="<?= $equipment->id; ?>">
                <div class="tile">
                    <div class="equipment">
                        <div class="col-lg-12">
                            <div id="data_div">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>ชื่อวัสดุ :</strong>
                                        <span><?= $equipment->name; ?></span> <span
                                                class="badge badge-info"><?= $equipment->amount; ?></span></li>
                                    <li class="list-group-item"><strong>รายละเอียด</strong>
                                        <p><?= $equipment->detail; ?></p></li>
                                    <li class="list-group-item">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">จำนวน
                                                </span></div>
                                            <input class="form-control" type="number" min="0" max="<?= $equipment->amount; ?>" name="amount">

                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ผู้เบิก</span></div>
                                            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/select-student.php'; ?>

                                        </div>
                                    </li>

                                </ul>
                                <button class="btn btn-primary btn-block mt-4" type="Submit">
                                    บันทึกข้อมูล
                                </button>
            </form>
        </div>
</main>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

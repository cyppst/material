<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    if (isset($_FILES)) {
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/equipment');

        if ($image["pictures"]) {
            $upload = $image->upload();
        }
    }

    $equipment = ORM::for_table('equipment')->find_one($_POST['id']);
    $equipment->barcode = $_POST['barcode'];
    $equipment->name = $_POST['name'];
    $equipment->barcode = $_POST['barcode'];
    $equipment->detail = $_POST['detail'];
    if (isset($_FILES)) {
        $equipment->image = $image->getName() . '.' . $image->getMime();
    }
    $result = $equipment->save();

    if ($result):
        $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');
    else:
        $msg->error('พบข้อผิิดพลาด', $_SERVER['HTTP_REFERER']);
    endif;

} else {
    $msg->error('พบข้อผิิดพลาด', 'index.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

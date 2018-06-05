<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    if (isset($_FILES)) {
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/material');

        if ($image["pictures"]) {
            $upload = $image->upload();
        }
    }


    $material = ORM::for_table('material')->find_one($_POST['id']);
    $material->name = $_POST['name'];
    $material->detail = $_POST['detail'];
    $material->type_id = $_POST['type_id'];
    $material->unit_id = $_POST['unit_id'];
    if (isset($_FILES)) {
        $material->image = $image->getName() . '.' . $image->getMime();
    }
    $result = $material->save();

    if ($result):
        $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');
    else:
        $msg->error('พบข้อผิิดพลาด', $_SERVER['HTTP_REFERER']);
    endif;

} else {
    $msg->error('พบข้อผิิดพลาด', 'index.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

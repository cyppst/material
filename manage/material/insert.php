<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    $image = new Bulletproof\Image($_FILES);
    $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/material');

    if ($image["pictures"]) {
        $upload = $image->upload();
    }


    $material = ORM::for_table('material')->create();
    $material->barcode = $_POST['barcode'];
    $material->name = $_POST['name'];
    $material->detail = $_POST['detail'];
    $material->type_id = $_POST['type_id'];
    $material->unit_id = $_POST['unit_id'];
    if ($upload)  $material->image = $image->getName() . '.' . $image->getMime();
    $result = $material->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if ($result) {
        $msg->success('เพิ่มข้อมูลสำเร็จ', 'index.php');
    } else {
        $msg->error('`ไม่สามารถเพิ่มข้อมูลได้`', 'create.php');
    }

}


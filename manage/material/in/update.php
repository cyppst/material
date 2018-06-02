<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $material_id = $_POST['material_id'];
    $amount = $_POST['amount'];

    $material = ORM::for_table('material')->find_one($material_id);
    $material->amount = $material->get('amount') + $amount;
    $material->save();


    $log = ORM::for_table('log')->create();
    $log->type = 'วัสดุ';
    $log->item_id = $material_id;
    $log->user_id = $_SESSION['user']['id'];
    $log->amount = $amount;
    $log->save();
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');

}

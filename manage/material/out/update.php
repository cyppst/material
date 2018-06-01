<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    if (!session_id()) @session_start();
    $material_id = $_POST['material_id'];
    $amount = $_POST['amount'];
    $student_id = $_POST['student_id'];


    $material = ORM::for_table('material')->find_one($material_id);
    $material->amount = $material->get('amount') - $amount;
    $material->save();


    $history = ORM::for_table('material_history')->create();
    $history->user_id = $_SESSION['user']['id'];
    $history->material_id = $material_id;
    $history->amount = $amount;
    if (isset($_POST['student"id'])) $history->student_id = $student_id;
    $history->save();


    $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');
}
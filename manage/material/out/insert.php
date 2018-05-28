<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/pixie_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $data['material_id'] = $_POST['material_id'];
    $data['amount'] = $_POST['amount'];
    $data['student_id'] = $_POST['student_id'];
    $data['user_id'] = $_SESSION['user']['id'];

    $material_inventory = ORM::for_table('material_inventory')->create();
    $material_inventory->material_id = $_POST['material_id'];
    $material_inventory->amount = $_POST['amount'];
    $material_inventory->user_id = $_SESSION['user']['id'];
    $material_inventory->student_id = $_POST['student_id'];
    $material_inventory->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('ok', 'index.php');
}
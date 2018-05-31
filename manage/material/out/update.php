<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    if (!session_id()) @session_start();
    $material_id = $_POST['material_id'];
    $amount = $_POST['amount'];
    $material = ORM::for_table('material')->find_one($material_id);
    $material->amount = $material->get('amount') - $amount;
    $material->save();


    $history = ORM::for_table('material_history')->create();
    $history->user_id;
    $history->material_id;
    $history->amount;
    $history->datetime;
    $history->save();


    $msg->success('ok', 'import.php');
}
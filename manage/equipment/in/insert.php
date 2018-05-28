<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $equipment_stock = ORM::for_table('equipment_stock')->create();
    $equipment_stock->equipment_id = $_POST['equipment_id'];
    $equipment_stock->amount = $_POST['amount'];
    $equipment_stock->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('ok', 'index.php');

}

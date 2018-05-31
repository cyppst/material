<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $equipment_id = $_POST['equipment_id'];
    $amount = $_POST['amount'];

    $equipment = ORM::for_table('equipment')->find_one($equipment_id);
    $equipment->equipment_id = $equipment_id;
    $equipment->amount = $equipment->get('amount') - $amount;
    $equipment->save();


    $log = ORM::for_table('log')->create();
    $log->type = 'อุปกรณ์';
    $log->item_id = $equipment_id;
    $log->amount = $amount;
    $log->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('ok', 'import.php');

}

$msg = new \Plasticbrain\FlashMessages\FlashMessages();
$msg->success('ok', 'import.php');


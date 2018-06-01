<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


if (!session_id()) @session_start();

$equipment = ORM::for_table('equipment')->find_one($_POST['equipment_id']);
$equipment->amount = $equipment->get('amount') + $_POST['amount'];
$equipment->save();


$eq_log = ORM::for_table('log')->create();
$eq_log->type = 'อุปกรณ์';
$eq_log->item_id = $_POST['equipment_id'];
$eq_log->user_id = $_SESSION['user']['id'];
$eq_log->amount = $_POST['amount'];
$eq_log->save();

$msg = new \Plasticbrain\FlashMessages\FlashMessages();
$msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');


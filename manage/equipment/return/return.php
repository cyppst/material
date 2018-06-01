<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Jenssegers\Date;

if (!session_id()) @session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $equipment_history = ORM::for_table('equipment_history')->find_one($id);
    $equipment_id = $equipment_history->equipment_id;
    $amount = $equipment_history->amount;
    $msg = new Plasticbrain\FlashMessages\FlashMessages();

    if (!$equipment_history->count()) {
        $msg->error('ไม่พบข้อมูล รหัส : ' . $barcode . ' ในระบบ.', 'index.php');
    }
}

$equipment_history->status = 'คืนอุปกรณ์แล้ว';
$equipment_history->save();

$equipment = ORM::for_table('equipment')->find_one($equipment_id);
$equipment->amount = $equipment->get('amount') + $amount;
$equipment->save();
$msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');

$message = 'ผู้ใช้' . $_SESSION['user']['fullname'] . 'ได้ทำการคืน' . $equipment->name . 'เมื่อวันที่' . Date\Date::now()->add('543 years')->format('j F Y');
notify($message);
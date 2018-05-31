<!-- manage/equipment/return/return.php -->
<!-- manage/equipment/return/return.php -->
<!-- manage/equipment/return/return.php -->

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $equipment_history = ORM::for_table('equipment_history')->find_one($id);
    $equipment_id = $equipment_history->equipment_id;
    $amount = $equipment_history->amount;

    $equipment_history->status = 'คืนอุปกรณ์แล้ว';
    $equipment_history->save();

    $equipment = ORM::for_table('equipment')->find_one($equipment_history->id);
    $equipment->equipment_id = $equipment_id;
    $equipment->amount = $equipment->get('amount') + $amount;
    $equipment->save();

    if ($material->count()) {
        if (!session_id()) @session_start();
        $msg = new Plasticbrain\FlashMessages\FlashMessages();
        $msg->error('ไม่พบข้อมูล รหัส : ' . $barcode . ' ในระบบ.', 'import.php');
    }
}

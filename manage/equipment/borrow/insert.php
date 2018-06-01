<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Jenssegers\Date;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipment_id = $_POST['equipment_id'];
    $amount = $_POST['amount'];
    $student_id = $_POST['student_id'];

    if (!session_id()) @session_start();
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    $equipment_history = ORM::for_table('equipment_history')->create();
    $equipment_history->equipment_id = $equipment_id;
    $equipment_history->amount = $amount;
    $equipment_history->user_id = $_SESSION['user']['id'];
    if (isset($_POST['student"id'])) $equipment_history->student_id = $student_id;
    $equipment_history->save();


    $equipment = ORM::for_table('equipment')->find_one($equipment_id);
    $equipment->amount = $equipment->get('amount') - $amount;
    $equipment->save();

    $student = ORM::for_table('student')->find_one($student_id);

    if ($student_id !== '') {
        ORM::for_table('student')->find_one($student_id);
        $message = 'ผู้ใช้ ' . $_SESSION['user']['fullname'] . '  ได้ทำการยืม ' . $equipment->get('name') . 'เพื่อ ' . $student->full_name . ' เมื่อวันที่ ' . Date\Date::now()->add('543 years')->format('j F Y');
    } else {
        $message = 'ผู้ใช้ ' . $_SESSION['user']['fullname'] . '  ได้ทำการยืม ' . $equipment->get('name') . 'เมื่อวันที่ ' . Date\Date::now()->add('543 years')->format('j F Y');
    }
    notify($message);


    $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');


}
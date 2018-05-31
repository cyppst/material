<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

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

    $result = ORM::for_table('student')->find_one($student_id);
//    var_dump($result);
    if (!$result) {
        $_SESSION['student_id'] = $student_id;
        $msg->success('Create Student', '/manage/student/create.php');

    } else {
        $msg->success('ok', 'import.php');
        notify($_SESSION['user']['fullname'], $_POST['equipment_id']);
    }


    $equipment = ORM::for_table('equipment')->find_one($equipment_id);
    $equipment->equipment_id = $equipment_id;
    $equipment->amount = $equipment->get('amount') - $amount;
    $equipment->save();
}

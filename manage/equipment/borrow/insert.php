<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    $equipment_history = ORM::for_table('equipment_history')->create();
    $equipment_history->equipment_id = $_POST['equipment_id'];
    $equipment_history->amount = $_POST['amount'];
    $equipment_history->user_id = $_SESSION['user']['id'];
    if (isset($_POST['student"id'])) $equipment_history->student_id = $_POST['student"id'];
    $equipment_history->save();

    $result = ORM::for_table('student')->find_one($_POST['student_id']);
//    var_dump($result);
    if (!$result) {
        $_SESSION['student_id'] = $_POST['student_id'];
        $msg->success('Create Student', '/manage/student/create.php');

    } else {
        $msg->success('ok', 'index.php');
    }
}

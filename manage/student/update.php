<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    $student = ORM::for_table('student')->create();
    $student->id = $_POST['student_id'];
    $student->full_name = $_POST['full_name'];
    $student->section = $_POST['section'];
    $student->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('สำเร็จ', '/dashboard.php');
}

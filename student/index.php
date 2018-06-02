<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['student_id'];
    $student = ORM::for_table('student')->findOne($id);
    if (!$student) {
        $msg->error('<strong>ไม่พบข้อมูล</strong> กรุณาตรวจสอบรหัส นศ. ของท่านให้ถูกต้อง', '/');
    } else {
        $data = ORM::for_table('student')->findOne($id);
        $_SESSION['student']['id'] = $data->id;
        $_SESSION['student']['full_name'] = $data->full_name;
    }
}

if (!isset($_SESSION['student'])) {
    header("location: /");
}
    header("location: material/take.php");
?>



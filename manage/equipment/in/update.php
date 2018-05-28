<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $row = [
        'id' => $_GET['id'],
        'fullname' => $_POST['fullname'],
        'address' => $_POST['address'],
        'tel' => $_POST['tell'],
        'password' => $_POST['password'],
        'status' => $_POST['status'],
        'section' => $_POST['section']
    ];

    $sql = "UPDATE user SET fullname=:fullname, address=:address, tel=:tel, password=:password, status=:status, section=:section WHERE id=:id;";

    if ($conn->prepare($sql)->execute($row)) {
        unset($conn);
        $_SESSION['message']['success'] = 'แก้ไขผู้ใช้เรียบร้อย';
        header("Location: /manage/user");
        exit();
    } else {
        unset($conn);
        $_SESSION['message']['error'] = 'ผิดพลาด';

        foreach ($_POST as $field => $value) {
            $_SESSION['formFields'][$field] = $value;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

} else {
    header("Location: /");
}
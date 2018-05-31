<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $unit = ORM::for_table('unit')->create();
    $unit->name = $_POST['name'];
    $result = $unit->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if ($result) {
        $msg->success('สำเร็จ', 'import.php');

    } else {
        $msg->error('ผิดพลาด', 'import.php');
    }
}

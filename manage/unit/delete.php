<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $unit = ORM::for_table('unit')->find_one($_GET['id']);
    $result = $unit->delete();

    if ($result) {
        $msg->success('ลบข้อมูลเรียบร้อย', 'index.php');
    } else {
        $msg->error('Record id : ' . $_GET['id'] . ' not found.', 'index.php');
    }
} else {
    $msg->error('Wrong Request.', 'index.php');

}


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $equipment = ORM::for_table('equipment')->find_one($_GET['id']);
    if ($equipment->delete()) {
        $msg->success('Remove Success', 'index.php');
    } else {
        $msg->error('Record id : ' . $_GET['id'] . ' not found.', 'index.php');
    }
} else {
    $msg->error('Wrong Request.', 'index.php');
}


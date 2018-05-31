<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $material_type = ORM::for_table('material_type')->find_one($_GET['id']);
    $result = $material_type->delete();

    if ($result) {
        $msg->success('Remove Success', 'import.php');
    } else {
        $msg->error('Record id : ' . $_GET['id'] . ' not found.', 'import.php');
    }
} else {
    $msg->error('Wrong Request.', 'import.php');

}


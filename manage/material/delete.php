<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $material = ORM::for_table('material')->find_one($_GET['id']);
        $result = $material->delete();

        if ($result) {
            $msg->success('Remove Success', 'import.php');
        } else {
            $msg->error('Record id : ' . $_GET['id'] . ' not found.', 'import.php');
        }
    } else {
        $msg->error('Wrong Request.', 'import.php');

    }


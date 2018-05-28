<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
IF ($_GET['id'] == 1) {
    $msg->error('ไม่สามารถลบ Super User (id:1) ได้', 'index.php');

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user = ORM::for_table('user')->find_one($_GET['id']);
    if ($user->delete()) {
        $msg->success('Remove Success', 'index.php');
    } else {
        $msg->error('Record id : ' . $_GET['id'] . ' not found.', 'index.php');
    }
} else {
    $msg->error('Wrong Request.', 'index.php');

}


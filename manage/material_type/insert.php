<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $equipment = ORM::for_table('material_type')->create();
    $equipment->name = $_POST['name'];
    $result = $equipment->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if ($result) {
        $msg->success('success', 'index.php');

    } else {
        $msg->error('error', 'index.php');
    }
}

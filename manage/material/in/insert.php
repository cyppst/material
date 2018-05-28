<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $material_stock = ORM::for_table('material_stock')->create();
    $material_stock->material_id = $_POST['material_id'];
    $material_stock->amount = $_POST['amount'];
    $material_stock->save();

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('ok', 'index.php');

}

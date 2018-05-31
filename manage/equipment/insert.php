<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    if (!session_id()) @session_start();
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    if (isset($_FILES)) {
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/equipment');
        if ($image["pictures"]) $upload = $image->upload();
    }
    $equipment = ORM::for_table('equipment')->create();

    $equipment->name = $_POST['name'];
    if (empty($_POST['no_barcode'])) {
        $equipment->barcode = $_POST['barcode'];
    } else {
        $equipment->barcode = 0;
    }

    $equipment->detail = $_POST['detail'];
    if ($upload) $equipment->image = $image->getName() . '.' . $image->getMime();
    $result = $equipment->save();

    if (isset($_POST['no_barcode'])) {
        $pdo = ORM::get_db();
        $insert_id = null;
        foreach ($pdo->query('SELECT id FROM equipment ORDER BY id DESC LIMIT 1') as $row) {
            $insert_id = $row[0];
        }
        $barcode = generateEAN($insert_id);

        $equipment = ORM::for_table('equipment')->find_one($insert_id);
        $equipment->barcode = $barcode;
        $equipment->no_barcode = true;
        $equipment->save();
    }
    $msg->success('ok', 'import.php');
endif;
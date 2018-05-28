<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    if (isset($_FILES)) :
        $has_image = false;
    else:
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/material');

        if ($image["pictures"]) $upload = $image->upload();
        if (!$upload) $msg->error($image['error'], $_SERVER['HTTP_REFERER']);
    endif;

    $material = ORM::for_table('material')->find_one($_POST['id']);
    $material->name = $_POST['name'];
    $material->detail = $_POST['detail'];
    $material->type_id = $_POST['type_id'];
    $material->unit_id = $_POST['unit_id'];
    if ($has_image) {
        $material->image = $image->getName();
    }
    $result = $material->save();

    if ($result):
        $msg->success('This is a success message', 'index.php');
    else:
        $msg->error('This is an error message', $_SERVER['HTTP_REFERER']);
    endif;

} else {
    $msg->error('This is an error message', 'index.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

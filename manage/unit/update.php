<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    $unit = ORM::for_table('unit')->find_one($_POST['id']);
    $unit->name = $_POST['name'];
    $result = $unit->save();

    if (!session_id()) @session_start();
    if ($result):
        $msg->success('แก้ไขข้อมูลเรียบร้อย', 'index.php');
    else:
        $msg->error('ผิดพลาด', $_SERVER['HTTP_REFERER']);
    endif;

else:
    $msg->error('ข้อความแจ้งเตือน', 'index.php');
endif;

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

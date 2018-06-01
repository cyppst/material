<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();

    if (isset($_FILES)) :
        $has_image = false;
    else:
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/user');

        if ($image["pictures"]) $upload = $image->upload();
        if (!$upload) $msg->error($image['error'], $_SERVER['HTTP_REFERER']);
    endif;

    $user = ORM::for_table('user')->find_one($_POST['id']);
    $user->fullname = $_POST['fullname'];
    $user->address = $_POST['address'];
    $user->tel = $_POST['tel'];
    $user->password = $_POST['passowrd'];
//    $user->login = $_POST['login'];
    if ($has_image) {
        $user->image = $image->getLocation();

    }
    $result = $user->save();

    if ($result):
        $msg->success('บันทึกข้อมูลสำเร็จ', 'index.php');
    else:
        $msg->error('พบข้อผิิดพลาด', $_SERVER['HTTP_REFERER']);
    endif;

} else {
    $msg->error('พบข้อผิิดพลาด', 'index.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php';

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!session_id()) @session_start();
    $count = ORM::for_table('user')->where('login', $_POST['login'])->count();
    if ($count > 0) {
        $msg->warning('Login ซ้ำ', 'create.php');
    } else {
        $image = new Bulletproof\Image($_FILES);
        $image->setLocation($_SERVER['DOCUMENT_ROOT'] . '/uploads/user');

        if ($image["pictures"]) {
            $upload = $image->upload();

            if (!$upload) {
                $msg->warning($image["error"], 'create.php');
            }
        }

        $user = ORM::for_table('user')->create();
        $user->fullname = $_POST['fullname'];
        $user->address = $_POST['address'];
        $user->tel = $_POST['tel'];
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        if ($upload) $user->image = $image->getName() . '.' . $image->getMime();
        $result = $user->save();

        if ($result) {
            $msg->success('This is a success message', 'import.php');
        } else {
            $msg->error('This is an error message', 'create.php');

        }

    }

}


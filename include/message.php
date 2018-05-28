<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    session_start();
    if ($msg->hasMessages()) {
        $msg->display();
    }
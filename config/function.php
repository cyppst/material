<?php

use Jenssegers\Date;


Date\Date::setLocale('th');

function redirectBack($message)
{
    unset($conn);
    $_SESSION['message']['error'] = $message;
    foreach ($_POST as $key => $value) {
        $_SESSION['fields'][$key] = $value;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}


function set_message($type, $message)
{
    $_SESSION['message'][$type] = $message;
}


function set_input()
{
    foreach ($_POST as $key => $value) {
        $_SESSION['fields'][$key] = $value;
    }
    return null;
}

function redirectIndex($message)
{
    unset($conn);
    $_SESSION['message']['success'] = $message;
    header('Location: create.php');
    exit();
}

function redirect($url)
{
    header('Location: ' . $url . '');
    return exit(0);
}


function get_input($name)
{
    if (!empty($_SESSION['fields'][$name])) {
        $field = $_SESSION['fields'][$name];
        unset($_SESSION['fields'][$name]);
        return $field;
    } else {
        return null;
    }
}

function set_error_field($name)
{
    $_SESSION['error_field'][] = $name;
    return null;

}

function get_error_field($name)
{
    if (isset($_SESSION['error_field'][$name])) {
        unset($_SESSION['error_field'][$name]);
        return 'has-danger';
    } else {
        return null;
    }
}


function get_message()
{
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    if ($msg->hasMessages()) {
        return $msg->display();
    }
}


function is_current($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri)
        echo 'active';
    if ($current_file_name == "" && $requestUri == "index")
        echo 'active';
}


function generateEAN($number)
{
    $number = str_pad($number, 4, '0', STR_PAD_LEFT);

    $code = '885' . str_pad($number, 9, '0');
    $weightflag = true;
    $sum = 0;
    // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit.
    // loop backwards to make the loop length-agnostic. The same basic functionality
    // will work for codes of different lengths.
    for ($i = strlen($code) - 1; $i >= 0; $i--) {
        $sum += (int)$code[$i] * ($weightflag ? 3 : 1);
        $weightflag = !$weightflag;
    }
    $code .= (10 - ($sum % 10)) % 10;
    return $code;
}

function notify($fullname, $equipment_id)
{
    $token = 'LINE_NOTIFY_TOKEN';
    $ln = new KS\Line\LineNotify($token);
    $text = 'ผู้ใช้' . $fullname . 'ได้ทำการยืม' . $equipment_id;
    $ln->send($text);
}
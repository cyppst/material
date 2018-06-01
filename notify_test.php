<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Jenssegers\Date;
session_start();

$equipment = ORM::for_table('equipment')->find_one(1);
$message = 'ผู้ใช้' . $_SESSION['user']['fullname'] . ' ได้ทำการยืม' . $equipment->get('name') . 'เมื่อวันที่' . Date\Date::now()->add('543 years')->format('j F Y');
notify($message);
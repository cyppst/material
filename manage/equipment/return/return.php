<!-- manage/equipment/return/return.php -->
<!-- manage/equipment/return/return.php -->
<!-- manage/equipment/return/return.php -->

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $equipment_history = ORM::for_table('equipment_history')->find_one($_GET['id']);
    $equipment_history->status = 'คืนอุปกรณ์แล้ว';
    $result = $equipment_history->save();

    if ($result):
        $msg->success('This is a success message', 'index.php');
    else:
        $msg->error('This is an error message', $_SERVER['HTTP_REFERER']);
    endif;
} else {
    echo 'no post data';
}

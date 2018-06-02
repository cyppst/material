<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$conn = new mysqli($database['host'], $database['username'], $database['password'], $database['database']);


$query = '';
$sqlScript = file('material_db.sql');
foreach ($sqlScript as $line) {

    $startWith = substr(trim($line), 0, 2);
    $endWith = substr(trim($line), -1, 1);

    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
        continue;
    }

    $query = $query . $line;
    if ($endWith == ';') {
        mysqli_query($conn, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query . '</b></div>');
        $query = '';
    }
}
$msg->success('Import ฐานข้อมูลเรียบร้อย', '/');

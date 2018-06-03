<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = $database['database'];
$user = $database['username'];
$pass = $database['password'];
$host = $database['host'];
$dir = dirname(__FILE__) . '/material_db.sql';

echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
var_dump($output);

$msg->success('Import Database สำเร็จ', '/');
<?php
/**
 * Created by PhpStorm.
 * User: chaiyapoj
 * Date: 23/5/2561
 * Time: 10:30 น.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Ifsnop\Mysqldump as IMysqldump;

if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

switch ($_GET['action']):
    case 'export':
        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=material_db', 'root', '');
            $dump->start('export.sql');
            $msg->success('Export ฐานข้อมูลจาก DB:material_db เรียบร้อย', '/');
        } catch (\Exception $e) {
            $msg->error($e->getMessage(), '/');
        }
        break;
    case 'import':
        try {
            ORM::raw_execute(file_get_contents('import.sql'));
            $msg->success('Import ฐานข้อมูลจาก /mysql/database.sql เรียบร้อย', '/');

        } catch (\Exception $e) {
            $msg->error($e->getMessage(), '/');
        }
        break;
endswitch;


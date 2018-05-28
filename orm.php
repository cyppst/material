<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
echo ORM::for_table('equipment')->get_last_query();
<?php

/*use Tracy\Debugger;

Debugger::enable();*/

global $database;
$database = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'toor',
    'database' => 'material_db'
];


ORM::configure(array(
    'connection_string' => 'mysql:host=' . $database['host'] . ';dbname=' . $database['database'],
    'username' => $database['username'],
    'password' => $database['password'],
    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
));

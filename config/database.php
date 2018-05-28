<?php

    use Tracy\Debugger;

    Debugger::enable();

    ORM::configure(array(
        'connection_string' => 'mysql:host=localhost;dbname=material_db',
        'username' => 'root',
        'password' => 'toor',
        'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    ));
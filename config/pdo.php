<?php

$pdo_data = array(
    'user' => 'root',        // database username
    'password' => 'toor',    // database password
    'host' => 'localhost',        // database host (default localhost)
    'name' => 'material_db',        // database name
    'encoding' => 'utf8',        // database connection encoding type
    'fetch_assoc' => false,        // if true: fetch a result row only as an associative array
    'display_errors' => false    // if true: errors will be displayed
);
try {
    $pdo = new PDO("mysql:host=$pdo_data[host]; dbname=$pdo_data[name]; encoding=$pdo_data[encoding]", $pdo_data['user'], $pdo_data['password'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    if ($pdo_data['fetch_assoc'] == true)
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    if ($pdo_data['display_errors'] == true)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    die();
}
if (isset($pdo_data)) unset($pdo_data);
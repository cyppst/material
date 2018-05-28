<?php
require_once '../vendor/autoload.php';
require 'pixie_config.php';


if (isset($_POST)) {
    $data = array(
        'id' => $_POST['id'],
        'fullname' => $_POST['full_name'],
        'section' => $_POST['section']
    );
    QB::table('student')->insert($data);
}
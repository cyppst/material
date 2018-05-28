<?php
require_once '../vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/pixie_config.php';



if (isset($_GET['barcode'])) {
    $barcode = $_GET['barcode'];


    $query = QB::table('material')->where('barcode', $barcode)->select('id', 'name', 'detail');
    $data = $query->get();
    echo $data;

} else {
    return http_response_code(501);
}

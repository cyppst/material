<?php
include $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/barcode-master/barcode.php';
$equipments = ORM::for_table('equipment')->find_many();
//$equipments = ORM::for_table('equipment')->where('no_barcode', true)->find_many();
foreach ($equipments as $equipment) {
    ?>
    <img height="40" src="/barcode-master/barcode.php?f=png&s=upc-a&d=<?= $equipment->barcode ?>" alt="">
<? } ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$query = $conn->prepare("SELECT m.id AS id,m.name,m.barcode,m.detail,u.name AS unit,t.name AS type FROM material AS  m LEFT JOIN unit AS u ON m.unit_id = u.id  LEFT JOIN material_type AS t ON m.type_id = t.id WHERE m.barcode='" . $_GET['barcode'] . "'");
$query->execute(array(1));
$result = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);
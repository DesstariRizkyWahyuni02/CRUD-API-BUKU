<?php
include_once '../koneksi.php';
/**
 * @var $connection PDO
 */
//mempersiapkan query
$statement=$connection->query("select * from buku");
//menentukan hasil query berupa ARRAY
$statement->setFetchMode(PDO::FETCH_ASSOC);
//eksekusi query
$results = $statement->fetchALL();
//output JSON
header('Content-Type: application/json');
echo json_encode($results);

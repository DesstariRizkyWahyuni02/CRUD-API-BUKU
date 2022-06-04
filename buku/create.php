<?php
include_once '../koneksi.php';
header("Content-Type: application/json; charset=UTF-8");
if($_POST){
$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$abstrak = $_POST['abstrak'];

$response[] = $isbn;
$response[] = $judul;
$response[] = $pengarang;
$response[] = $jumlah;
$response[] = $tanggal;
$response[] = $abstrak;

$insert = "INSERT INTO buku(isbn,judul,pengarang,jumlah,tanggal,abstrak) VALUES (?,?,?,?,?,?)";

$row = $connection->prepare($insert);

$row->execute($response);
$response['status']='failed';
$response['message']='Gagal Insert data';

}
else {
$response['status']='succcess';
$response['message']='Berhasil Insert data';
}
$json = json_encode($response,JSON_PRETTY_PRINT);
echo ($json);
?>

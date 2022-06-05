<?php
include_once '../koneksi.php';
header("Content-Type: application/json; charset=UTF-8");

//POST DATA
if ($_POST){
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

    //DELETE DATA
    $delete= "DELETE FROM buku WHERE isbn = '$isbn'";
    $row = $connection->prepare($delete);
    $row->execute($response);
    
        $response['status']='succcess';
        $response['message']='Berhasil Delete Data';

     }
     else {
        $response['status']='failed';
        $response['message']='Gagal Delete Data';
        
     }
     $json = json_encode($response,JSON_PRETTY_PRINT);
     echo ($json);

    
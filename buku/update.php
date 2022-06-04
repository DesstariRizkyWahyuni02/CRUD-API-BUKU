<?php
include_once '../koneksi.php';
header("Content-Type: application/json; charset=UTF-8");
//POST DATA
if ($_POST){
   
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];
    $isbn = $_POST['isbn'];
   
 
    $response[] = $judul;
    $response[] = $pengarang;
    $response[] = $jumlah;
    $response[] = $tanggal;
    $response[] = $abstrak;
    $response[] = $isbn;
    //UPDATE DATA
    $update = "UPDATE buku SET judul=?,pengarang=?,jumlah=?,tanggal=?,abstrak=? WHERE isbn=?";
    
    $row = $connection->prepare($update);
    $row->execute($response);

        $response['status']='failed';
        $response['message']='Gagal Update Data';
        

     }
     else {
        $response['status']='succcess';
        $response['message']='Berhasil Update Data';
     }
     $json = json_encode($response,JSON_PRETTY_PRINT);
     echo ($json);

    
<?php 

require 'koneksi.php'; // Sertakan file koneksi.php

if (
    isset($_POST['ID_Pelanggan']) &&
    isset($_POST['Pelanggan']) &&
    isset($_POST['Kategori_Game']) &&
    isset($_POST['Nomor_Hp']) &&
    isset($_POST['Perkiraan_Selesai']) &&
    isset($_POST['Status'])
){

    $ID_Pelanggan = $_POST['ID_Pelanggan'];
    $Pelanggan = $_POST['Pelanggan'];
    $Kategori_Game = $_POST['Kategori_Game'];
    $Nomor_HP = $_POST['Nomor_Hp'];
    $Perkiraan_Selesai = $_POST['Perkiraan_Selesai'];
    $Status = $_POST['Status'];

    $query = "UPDATE usertopup SET Pelanggan='$Pelanggan', Kategori_Game='$Kategori_Game', Nomor_HP='$Nomor_HP', Perkiraan_Selesai='$Perkiraan_Selesai', Status = '$Status' WHERE ID_Pelanggan='$ID_Pelanggan'";

    if ($con->query($query) === TRUE) {
        echo "Data Berhasil Diperbaharui";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
} else {
    echo "Semua data harus disertakan";
}

$con->close();
?>

<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    // // Hapus data berdasarkan ID dari tabel pertama
    // $sql1 = "DELETE FROM crud_kejaksaan WHERE id='$id'";
    // $hasil1 = mysqli_query($kon, $sql1);

    // Hapus data berdasarkan ID dari tabel kedua
    $sql2 = "DELETE FROM crud_penyelidikan WHERE id='$id'";
    $hasil2 = mysqli_query($kon, $sql2);

    // // Hapus data berdasarkan ID dari tabel ketiga
    // $sql3 = "DELETE FROM crud_penyidikan WHERE id='$id'";
    // $hasil3 = mysqli_query($kon, $sql3);

    // // Hapus data berdasarkan ID dari tabel keempat
    // $sql4 = "DELETE FROM crud_penuntutan WHERE id='$id'";
    // $hasil4 = mysqli_query($kon, $sql4);

    // && $hasil2 && $hasil3 && $hasil4

    if ($hasil2) { 
        // // Update semua ID agar berurutan di tabel pertama
        // $sql = "SET @count = 0";
        // mysqli_query($kon, $sql);
        
        // $sql = "UPDATE crud_kejaksaan SET id = @count := @count + 1 ORDER BY id";
        // mysqli_query($kon, $sql);
        
        // // Reset AUTO_INCREMENT ke nilai ID terbaru + 1 di tabel pertama
        // $sql = "ALTER TABLE crud_kejaksaan AUTO_INCREMENT = 1";
        // mysqli_query($kon, $sql);

        // Update semua ID agar berurutan di tabel kedua
        $sql = "SET @count = 0";
        mysqli_query($kon, $sql);
        
        $sql = "UPDATE crud_penyelidikan SET id = @count := @count + 1 ORDER BY id";
        mysqli_query($kon, $sql);
        
        // Reset AUTO_INCREMENT ke nilai ID terbaru + 1 di tabel kedua
        $sql = "ALTER TABLE crud_penyelidikan AUTO_INCREMENT = 1";
        mysqli_query($kon, $sql);

        
        // // Update semua ID agar berurutan di tabel ketiga
        // $sql = "SET @count = 0";
        // mysqli_query($kon, $sql);
        
        // $sql = "UPDATE crud_penyidikan SET id = @count := @count + 1 ORDER BY id";
        // mysqli_query($kon, $sql);
        
        // // Reset AUTO_INCREMENT ke nilai ID terbaru + 1 di tabel kedua
        // $sql = "ALTER TABLE crud_penyidikan AUTO_INCREMENT = 1";
        // mysqli_query($kon, $sql);

        // // Update semua ID agar berurutan di tabel keempat
        // $sql = "SET @count = 0";
        // mysqli_query($kon, $sql);
        
        // $sql = "UPDATE crud_penuntutan SET id = @count := @count + 1 ORDER BY id";
        // mysqli_query($kon, $sql);
        
        // // Reset AUTO_INCREMENT ke nilai ID terbaru + 1 di tabel kedua
        // $sql = "ALTER TABLE crud_penuntutan AUTO_INCREMENT = 1";
        // mysqli_query($kon, $sql);


        header("Location: sheet2.php");
    } else {
        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
    }
}
?>



<!-- perbaiki container size sheet 1-4 -->      
<!-- perbaiki delete biar setiap sheet bisa delete (keadaan masih setiap delete sheet2,3,4 sheet1 ikut kedelete) -->
<!-- cari hostingan -->

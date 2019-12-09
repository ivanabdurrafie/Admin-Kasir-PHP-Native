<?php
include "../../db/connection.php";

$nama = $_POST['nama'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$ekstensi_diperbolehkan	= array('png','jpg');
$gambar = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
// Check if image file is a actual image or fake image

    // $check = getimagesize([$gambar]);
    //     $query = mysqli_query($conn,"INSERT INTO barang (Nama,Stok,Harga,gambar) VALUES('$nama','$stok',$harga, '$gambar')");
    //     if($query){
    //         echo 'FILE BERHASIL DI UPLOAD';
    //     }else{
    //         echo 'GAGAL MENGUPLOAD GAMBAR';
    //     }
        move_uploaded_file($file_tmp, '../../assets/images/barang/'.$gambar);
        $query = mysqli_query($conn,"INSERT INTO barang (Nama,Stok,Harga,gambar) VALUES('$nama','$stok',$harga, '$gambar')");
        if($query){
            echo 'FILE BERHASIL DI UPLOAD';
        }else{
            echo 'GAGAL MENGUPLOAD GAMBAR';
        }

// $ekstensi_diperbolehkan	= array('png','jpg');
// $gambar = $_FILES['file']['name'];
// $x = explode('.', $nama);
// $ekstensi = strtolower(end($x));
// $ukuran	= $_FILES['file']['size'];
// $file_tmp = $_FILES['file']['tmp_name'];	
// if($ukuran < 1044070){			
//     move_uploaded_file($file_tmp, '../../assets/images/barang/file'.$nama);
//     $query = mysqli_query($conn,"INSERT INTO barang (Nama,Stok,Harga,gambar) VALUES('$nama','$stok',$harga, '$gambar')");
//     if($query){
//         echo 'FILE BERHASIL DI UPLOAD';
//     }else{
//         echo 'GAGAL MENGUPLOAD GAMBAR';
//     }
//     }else{
//     echo 'UKURAN FILE TERLALU BESAR';
//     }
//     $conn->close();
?>
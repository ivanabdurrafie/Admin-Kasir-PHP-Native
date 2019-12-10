<?php
include "../../db/connection.php";
$idBarang = $_POST['idBarang'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$ekstensi_diperbolehkan	= array('png','jpg');
$gambar = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

move_uploaded_file($file_tmp, '../../assets/images/barang/'.$gambar);
$query = mysqli_query($conn,"UPDATE barang set Nama='$nama',Stok='$stok',Harga=$harga,gambar= '$gambar' where idBarang = '$idBarang'");
    if($query){
        $message = "data updated successfully";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'barangtabel.php';
        </script>"; 
        }else{
            echo 'GAGAL MENGUPLOAD GAMBAR';
        }

?>
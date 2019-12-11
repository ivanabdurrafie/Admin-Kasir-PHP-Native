<?php
include "../../db/connection.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenkel = $_POST['jenkel'];
$level = $_POST['level'];

$query = mysqli_query($conn,"UPDATE user set Email='$email',Password='$password',Nama='$nama',Alamat= '$alamat',JenisKelamin = '$jenkel',Level='$level' where Username = '$username'");
    if($query){
        $message = "data updated successfully";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'usertabel.php';
        </script>"; }
    else{
        $message = "Failed to update Data ".$conn->error;
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'usertabel.php';
        </script>";
        
     }
     $conn->close();

?>
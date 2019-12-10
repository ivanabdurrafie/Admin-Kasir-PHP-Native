<?php
include "../../db/connection.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenkel = $_POST['jenkel'];
$level = $_POST['level'];


$query = $conn->query("INSERT INTO user VALUES('$username','$email','$password', '$nama','$alamat','$jenkel','$level')");
    if($query){
        $message = "data entered successfully";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'usertabel.php';
        </script>"; 
        }else{
            echo $conn->error;
        }

?>
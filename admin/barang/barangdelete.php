<?php
include "../../db/connection.php";
$idBarang = $_GET['idBarang'];
$sql = "delete from barang where idBarang = '$idBarang'";
$res = $conn->query($sql);
if($res)
{
    $message = "data successfully deleted";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'barangtabel.php';
    </script>"; 
}else {
    $message = "Failed to delete Data ".$conn->error;
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'barangtabel.php';
    </script>";
    
}
$conn->close();
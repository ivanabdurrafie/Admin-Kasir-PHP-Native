<?php
include "../../db/connection.php";
$idcart = $_GET['idcart'];
$sql = "delete from cart where idcart = '$idcart'";
$res = $conn->query($sql);
if($res)
{
    $message = "data successfully deleted";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'orderinsert.php';
    </script>"; 
}else {
    
}
$conn->close();
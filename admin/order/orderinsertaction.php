<?php
include "../../db/connection.php";

$barang = $_POST['barang'];
$queryBarang = $conn->query("Select * from barang where idBarang='$barang'");
$row = $queryBarang->fetch_assoc();
$Harga = $row['Harga'];
$qty = $_POST['qty'];
$subtotal = $Harga*$qty;


$query = $conn->query("INSERT INTO cart(idBarang, qty, subtotal) VALUES('$barang','$qty', '$subtotal')");

    if($query){
        $message = "data entered successfully";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'orderinsert.php';
        </script>"; 
        }else{
            $message = "Failed to Insert Data ".$conn->error;
            echo "<script type='text/javascript'>alert('$message');
            window.location.href = 'usertabel.php';
            </script>";
        }

?>
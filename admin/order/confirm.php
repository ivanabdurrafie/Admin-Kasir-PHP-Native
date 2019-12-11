<?php
include "../../db/connection.php";
session_start();
$username  =$_SESSION['username'];
$date = date("Y-m-d");
$addOrder = $conn->query("insert into orders (tanggal,username) values ('$date','$username')");
$getidorder = $conn->query("select * from orders order by idorder desc limit 1");
$rowOrder = $getidorder->fetch_assoc();
$idorder = $rowOrder['idorder'];




$querycart = $conn->query("select * from cart");


while($rowcart = $querycart->fetch_assoc()){
$idBarang = $rowcart['idBarang'];

$qty = $rowcart['qty'];
$updateStok = $conn->query("update barang set Stok = stok - $qty where idBarang = $idBarang");

$queryBarang = $conn->query("select * from barang where idBarang = $idBarang");

$rowBarang = $queryBarang->fetch_assoc();
$harga = $rowBarang['Harga'];
$subtotal =  $harga * $qty;

$addOrderDetail = $conn->query("insert into orderdetail (idOrder,idBarang,qty,subtotal) values ('$idorder','$idBarang','$qty',$subtotal)");
}

$queryTotal = $conn->query("select sum(subtotal) total from orderdetail where idorder = $idorder");
$rowTotal = $queryTotal->fetch_assoc();
$grandtotal = $rowTotal['total'];

$updateTotal = $conn->query("update orders set grandtotal = $grandtotal where idorder = $idorder ");

$deleteCart = $conn->query("truncate table cart");

$message = "Transaction Success";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href = 'ordertabel.php';
        </script>"; 

?>
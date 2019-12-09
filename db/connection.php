<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="kasir";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection Failed :".$conn->connect_error);
} else {
    echo "<script>console.log('Connection Success')</script>";
}
?>
<html>

</html>
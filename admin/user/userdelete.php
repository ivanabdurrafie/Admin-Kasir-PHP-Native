<?php
include "../../db/connection.php";
$username = $_GET['username'];
$sql = "delete from user where Username = '$username'";
$res = $conn->query($sql);
if($res)
{
    $message = "data successfully deleted";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'usertabel.php';
    </script>"; 
}else {
    
}
$conn->close();
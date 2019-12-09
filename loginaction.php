<?php
include "db/connection.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "select * from user where username = '$username' and password='$password'";
$res = $conn->query($sql);
$row = mysqli_fetch_assoc($res);
    if ($row) {
        if ($row['Level'] == 'Admin') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            $_SESSION['Level'] = 'Admin';
            $message = "Selamat datang ".$_SESSION['username'];
            echo "<script type='text/javascript'>alert('$message');
            window.location.href = 'admin/index.php';
            </script>"; 
        } else if($row['Level']== 'Kasir') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            $_SESSION['Level'] = 'Kasir';
            $message = "Selamat datang ".$_SESSION['username'];
            echo "<script type='text/javascript'>alert('$message');
            window.location.href = 'kasir/index.php';
            </script>"; 
        }else {
            $message = "Username or Password incorrect.";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('login.html');
            </script>";  
            echo $conn->error;
        }
    }else {
        $message = "Username or Password incorrect.";
        echo "<script type='text/javascript'>alert('$message');
        window.location.replace('login.html');
        </script>";  
        echo $conn->error;
    }


$conn->close();
?>
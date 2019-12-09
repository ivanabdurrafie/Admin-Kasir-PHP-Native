<?php
    session_start();
    session_destroy();
    
    $message = "You have successfully logged out.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.replace('login.html');
    </script>"; 
?>
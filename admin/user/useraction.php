<?php
include "../../db/connection.php";
if(isset($_POST['delete']))
{
    $chkbox = $_POST['chkbox'];
 $cnt=array();
 $cnt=count($chkbox);
 for($i=0;$i<$cnt;$i++)
  {
    $del_id=$chkbox[$i];
    $query="delete from user where username=".$del_id;
    $conn->query($query);
    $message = "data successfully deleted";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'usertabel.php';
    </script>"; 
  }
}
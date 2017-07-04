<?php   

include("con_db.php");
$query="update `login`  set  `last_login`= '".date('d-m-y')."'";

mysql_query($query);







session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>
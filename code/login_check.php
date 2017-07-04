<?php

include("con_db.php");


$query="SELECT `user` FROM 	`login` WHERE `user`='". $_POST['user']."'";
$query1="SELECT `pass` FROM 	`login` WHERE `pass`='".md5($_POST['pass'])."'";
$result=mysql_query($query);
$result1=mysql_query($query1);

$count = mysql_num_rows($result);
$count1 = mysql_num_rows($result1);
if($count > 0 )
{
  if($count1 > 0)
  {
	  session_start();
	  $_SESSION['ADMIN'] = 'LOGIN';
	   header("location: ../home.php");

	  
	  
   }
   else
   {
	  header("location: ../index.php");
	   
	}	
	


	}
else {
	
	
	echo'<script>  location.href="../index.php?msg=Wrong User Name and Password";        </script>';

	
}







?>
<?php
include("con_db.php");
if(isset($_GET['id']))
{
$query="Delete From menu Where id = '$_GET[id]'";	
mysql_query($query);
header("location: ../menu.php");
exit();
	
}


?>
<?php
include("con_db.php");
if(isset($_GET['id']))
{
$query="Delete From category Where id = '$_GET[id]' or perant_id = '$_GET[id]'";	
mysql_query($query);
header("location: ../category.php");
exit();
	
}


?>
<?php
include("con_db.php");
if(isset($_GET['id']))
{
$query="Delete From content Where content_id = '$_GET[id]'";	
mysql_query($query);
header("location: ../artical.php");
exit();
	
}


?>
<?php
include("con_db.php");
if(isset($_GET['id']))
{
$query="Delete From package Where package_id = '$_GET[id]'";	
mysql_query($query);

header("location: ../package.php");
exit();
	
}


?>
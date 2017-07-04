<?php
include("con_db.php");
if(isset($_GET['id']))
{
$query="Delete From rules Where rules_id = '$_GET[id]'";	
mysql_query($query);
header("location: ../rules.php");
exit();
	
}


?>
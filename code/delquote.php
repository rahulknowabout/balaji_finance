<?php
include("con_db.php");
if(isset($_GET['d']))
{
$query="Delete From quote Where id = '$_GET[d]'";	
mysql_query($query);
header("location: ../quote.php");
exit();
	
}


?>
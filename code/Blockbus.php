<?php
include("con_db.php");
if(isset($_GET['id']))
{

$query = "Select * From business WHERE bus_id = '$_GET[id]'";	
$res = mysql_query($query);
$row = mysql_fetch_array($res);
if($row['status']=='1')
{
$query="update business set status='0' WHERE bus_id = '$_GET[id]'";
}
else{
$query="update business set status='1' WHERE bus_id = '$_GET[id]'";

}	
mysql_query($query);
header("location: ../business.php");
exit();
	
}


?>
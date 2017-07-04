<?php
if( $_SERVER['HTTP_HOST'] == "localhost" ) 
{
$con =	mysql_connect("localhost","root","");
mysql_query("SET NAMES utf8");
mysql_select_db("balaji_fin",$con);
}
else 
{
$con =	mysql_connect("localhost","neelneco_tech","Na82HAHOt~d5");
mysql_query("SET NAMES utf8");
mysql_select_db("balaji_fin",$con);
}
?>
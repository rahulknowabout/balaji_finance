<?php 
include("con_db.php");
include('kfun.php');
if(isset($_GET['img_name']) && $_GET['img_name']!="")
{

unlink($_GET['img_name']);
 
}
if(isset($_GET['state']) && $_GET['state']!="")
{ 
  $sqla="SELECT DISTINCT `suburb` FROM `postcode_db` WHERE `state` LIKE '".$_GET['state']."'";
$resa=mysql_query($sqla);
if(mysql_num_rows($resa)>0)
{
?>
<td>
<div class="querybox" >
<label class="querytxt">Suburb :</label>
</div>

<div class="inputpart">
<select  name="suburb[]">
<option disabled="disabled"  value="">Select suburb</option>
<?php
while($rowsa=mysql_fetch_assoc($resa))
{
?>



<option value="<?php echo $rowsa['suburb']; ?>"><?php echo $rowsa['suburb']; ?></option><?php


 //echo ucwords( $rows['keyword_text'] ); 

}
?></select>
</div>
</td>
<?php



}

}
if(isset($_GET['jobs']) && isset($_GET['status']) && $_GET['jobs']>0)
{ 
if($_GET['status']==0)
{

$_GET['status']=1;
}
else if($_GET['status']==1) { $_GET['status']=0; }
 echo  $sqla="update bus_jobs set status='".$_GET['status']."' WHERE id ='".$_GET['jobs']."'";
$resa=mysql_query($sqla);


}
if(isset($_GET['statesingle']) && $_GET['statesingle']!="")
{ 
$sqla="SELECT DISTINCT `suburb` FROM `postcode_db` WHERE `state` LIKE '".$_GET['statesingle']."'";
$resa=mysql_query($sqla);
if(mysql_num_rows($resa)>0)
{
?>
<td>
<div class="querybox" >
<label class="querytxt">Suburb :</label>
</div>

<div class="inputpart">
<select   name="bus_suburb">
<option disabled="disabled" value="">Select suburb</option>
<?php
while($rowsa=mysql_fetch_assoc($resa))
{
?>



<option value="<?php echo $rowsa['suburb']; ?>"><?php echo $rowsa['suburb']; ?></option><?php


 //echo ucwords( $rows['keyword_text'] ); 

}
?></select>
</div>
</td>
<?php



}

}

if(isset($_GET['statesignup']) && $_GET['statesignup']!="")
{ 
$sqla="SELECT DISTINCT `suburb` FROM `postcode_db` WHERE `state` LIKE '".$_GET['statesignup']."'";
//echo $sqla;
$resa=mysql_query($sqla);
if(mysql_num_rows($resa)>0)
{
?>
<td>
<div class="querybox" >
<label class="querytxt">Suburb :</label>
</div>

<div class="inputpart">
<select   name="u_sub">
<option disabled="disabled" value="">Select suburb</option>
<?php
while($rowsa=mysql_fetch_assoc($resa))
{
?>



<option value="<?php echo $rowsa['suburb']; ?>"><?php echo $rowsa['suburb']; ?></option><?php


 //echo ucwords( $rows['keyword_text'] ); 

}
?></select>
</div>
</td>
<?php



}

}

if(isset($_GET['cat_id']) && $_GET['cat_id']!="" ) 
{
$where=array();
	
	if(isset($_GET['cat_id']) && $_GET['cat_id']!="" )
	{
		$where[]=" (bc.bus_cat_id='".$_GET['cat_id']."' OR bc.bus_cat LIKE '%".$_GET['cat_id'].",%' OR bc.bus_cat LIKE '%,".$_GET['cat_id']."%' ) ";
	}
	
	

if(count($where)>0)
{

$where=implode(" AND ",$where);
 $query="Select * From business b JOIN bus_category bc ON bc.bus_id = b.bus_id WHERE ".$where." ORDER BY bc.bus_id DESC";
 $res = mysql_query($query);
 if(mysql_num_rows($res)>0)
{
?>
<hr />
Select Bussiness(If You Want To Set Bussiness Banner )<br />
<select name="bussname">
<option value="">Select Bussiness</option>
<?php
while($row = mysql_fetch_array($res))
{
?><option value="<?php echo $row['bus_id']; ?>"><?php echo $row['bus_name']; ?></option><?php

}
?></select><hr /><?php
}

	
}

}
if(isset($_GET['type']) && $_GET['type']!="")
{
 $sql="select DISTINCT id,title as keyword_text FROM category  WHERE title LIKE '%".$_GET['type']."%' ORDER BY title ASC LIMIT 15";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{

while($rows=mysql_fetch_assoc($res))
{
?>

<p id="<?php echo $rows['id']?>" align="left" style="vertical-align:middle; margin-left:10px;" onclick="document.basearch.bsearch.value = this.innerHTML.replace(/amp;/g, ''); document.basearch.cat_id.value=this.id;   document.getElementById('tradeout').style.display='none'"><?php echo ucwords( $rows['keyword_text'] ) ?></p>
<?php
 //echo ucwords( $rows['keyword_text'] ); 

}


}
}
if(isset($_GET['city']) && $_GET['city']!="")
{
//SELECT DISTINCT `suburb` FROM `postcode_db` WHERE `state` LIKE '".$_GET['statesignup']."'
 $sqla="select DISTINCT suburb as city FROM postcode_db WHERE suburb LIKE '%".$_GET['city']."%' ORDER BY suburb ASC LIMIT 5";
$resa=mysql_query($sqla);
if(mysql_num_rows($resa)>0)
{

while($rowsa=mysql_fetch_assoc($resa))
{
?>

<p  align="left" style="vertical-align:middle; margin-left:10px;" onclick="document.basearch.city.value = this.innerHTML.replace(/amp;/g, '');    document.getElementById('tradeoutcity').style.display='none'"><?php echo ucwords( $rowsa['city'] ) ?></p>
<?php
 //echo ucwords( $rows['keyword_text'] ); 

}


}

}


$success="";

if(isset($_POST['subject']))
{

$sa="select email from login WHERE id=1";
$resa=mysql_query($sa);
$as=mysql_fetch_assoc($resa);

$msg=" Name: $_POST[Name]<br><br>

Email: $_POST[Email]<br><br>

Phone: $_POST[Phone]<br><br>

Message: $_POST[Message]<br><br>
";

mailsend( $_POST['Email'], "", "", 2 );
	
mailsend( $as['email'], $_POST['subject'], $msg );
echo "Thank You For Contacting Us.";
}

?>
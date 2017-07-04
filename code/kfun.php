<?php 
//include("con_db.php");
function planname($p)
{
$query = "Select title From `package` where package_id='$p'";
$res = mysql_query($query);	
$row = mysql_fetch_array($res);
echo $row['title'];


}
function buildurl($url="")
{
//DEFINE('HTTP_TYPE', $_SERVER['HTTP_X_FORWARDED_PROTO']);

DEFINE('HTTP_ROOT', $_SERVER['HTTP_HOST']);
$domain    = $_SERVER['SERVER_NAME']; 
if( $domain == "localhost" )
{
	$domain = $domain."/tech1000/";
}else
{
	$domain = $domain."/tech1000/";
}
 $base_dir  = __DIR__;  // Absolute path to your installation, ex: /var/www/mywebsite
 //$doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); echo "<hr>"; # ex: /var/www 
//	 $base_url  = preg_replace("!^{$doc_root}!", '', $base_dir);  # ex: '' or '/mywebsite'
 $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https'; 
 $port      = $_SERVER['SERVER_PORT']; 
 $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port"; 
 
 /*if(strpos(HTTP_FOLDER,'/blog/'))
 {
 $f=str_replace('/blog','',HTTP_FOLDER);
 $base  = "$protocol://{$domain}{$disp_port}".$f;
 }
 else{
 $base  = "$protocol://{$domain}{$disp_port}".HTTP_FOLDER; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc.
 }*/
 $base  = "$protocol://{$domain}";
return $base.$url;


} 

function get_payment_mail()
{


$sql="select * from  revertmails where id='8'";
		$res=mysql_query($sql);
		$Rows=mysql_fetch_assoc($res);
		 return $Rows['mail_format']; 


}
function update_payment_mail()
{
$sql="update revertmails set mail_format='".addslashes($_POST['payment_mail'])."',mail_sub='".addslashes($_POST['payment_sub_revert'])."'  where id='8'";
		$res=mysql_query($sql);
		

}
function getstate()
{

 $sql="SELECT * FROM `postcode_db` GROUP BY `state`";
$re=mysql_query($sql);
if(mysql_num_rows($re)>0)
{
?><option selected='selected'  disabled='disabled'>Select State</option><?php 
while($rows=mysql_fetch_assoc($re))
{

echo "<option value=".$rows['state'].">".$rows['state']."</option>"; 

}
?><?php 
}
else{ echo "No Menu found"; }


}
function getstatecopy()
{
if(isset($_SESSION['bus_state']))
{
$resultr=explode(",",$_SESSION['bus_state']);
}

 $sql="SELECT * FROM `postcode_db` GROUP BY `state`";
$re=mysql_query($sql);
if(mysql_num_rows($re)>0)
{
?><option selected='selected' disabled='disabled'>Select State</option><?php 
while($rows=mysql_fetch_assoc($re))
{

?><option <?php echo ( isset( $_SESSION['bus_state'] ) && in_array($rows['state'],$resultr)) ? 'selected="selected"' : ''  ?> value="<?php echo $rows['state'] ?>"><?php echo $rows['state']; ?></option> 
<?php
}
?><?php 
}
else{ echo "No Menu found"; }


}

function showmenu()
{
if(isset($_GET['edit']) && $_GET['edit'])
{
 $sql="select menu_id from content WHERE content_id='".$_GET['edit']."'";
$re=mysql_query($sql);
$rs=mysql_fetch_assoc($re);
//print_r($rs);
}
$sql="select * from menu";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{
?><select name="menuitems" required><?php 
while($rows=mysql_fetch_assoc($res))
{

?><option <?php echo(isset($_GET['id']) && $_GET['id'] && $rs['menu_id'] ==$rows['id'] )  ? 'selected="selected"' : ''  ?> value="<?php echo $rows['id'] ?>"><?php echo $rows['title'] ?></option><?php 

}
?></select><?php 
}
else{ echo "No Menu found"; }
}


function create_arti()
{
//echo "<pre>"; print_r($_POST); 

if( isset( $_POST['update_arti'] ) && $_POST['update_arti'] != "" )
{
  $sd="update `content` set menu_id='".$_POST['menuitems']."',published='".$_POST['status']."',content_title='".$_POST['title']."',content_dis='".addslashes($_POST['content'])."' WHERE content_id='".$_POST['edit']."'";
//die();
mysql_query($sd);

}



if(isset($_POST['create_arti']) && $_POST['create_arti']!="" )
{
$s="insert into content set menu_id='".$_POST['menuitems']."',content_title='".$_POST['title']."',content_dis='".addslashes($_POST['content'])."',c_create_date=NOW(),published='".$_POST['status']."'";
mysql_query($s);

}


}
function menu_name($menuid)
{
$d="select title from menu where id=".$menuid."";
$res = mysql_query($d);	
$row = mysql_fetch_array($res);
echo $row['title'];


}
function showhomiecontent()
{
	$from=0;
					$to=10;
					
					if(isset($_GET['p']) && $_GET['p']>0)
					{
					$p=$_GET['p'];
					 $from=$p*$to;
					
					}
$sql="select count(id) as count from homepagecontent";
					$mysql=mysql_query($sql);
					$mysql_re=mysql_fetch_array($mysql);
					//print_r($mysql_re);
					 $total=$mysql_re['count'];
					 $page=buildurl("artical.php");
					 
$que = "Select * From `homepagecontent` LIMIT ".$from.",".$to."";
$res = mysql_query($que);
$count =1;
getpaginationadmin($total,$to,$p,$page);
while($row = mysql_fetch_array($res)){
?>
	
<tr> 
<td><?php echo $count;   ?></td> 

<td> 
<?php echo $row['title'];   ?>
</td>



<td ><?php echo $row['status'];   ?> </td><td><a href="?edit=<?php  echo $row['id'];  ?>" class="btn bg-olive margin">Edit</a> </td><td><a href="code/delete_homie.php?id=<?php echo $row['id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 
$level = 2;
$count++;
}	

}
function showcontent()
{
	$from=0;
					$to=10;
					
					if(isset($_GET['p']) && $_GET['p']>0)
					{
					$p=$_GET['p'];
					 $from=$p*$to;
					
					}
$sql="select count(content_id) as count from content";
					$mysql=mysql_query($sql);
					$mysql_re=mysql_fetch_array($mysql);
					//print_r($mysql_re);
					 $total=$mysql_re['count'];
					 $page=buildurl("artical.php");
					 
$que = "Select * From `content` LIMIT ".$from.",".$to."";
$res = mysql_query($que);
$count =1;
getpaginationadmin($total,$to,$p,$page);
while($row = mysql_fetch_array($res)){
?>
	
<tr> 
<td><?php echo $count;   ?></td> 

<td> 
<?php echo $row['content_title'];   ?>
</td>
<td ><?php  menu_name($row['menu_id']);   ?></td>

<td ><?php echo $row['c_create_date'];   ?></td>
<td ><?php echo $row['published'];   ?> </td><td><a href="?edit=<?php  echo $row['content_id'];  ?>&id=<?php  echo $row['menu_id'];  ?>" class="btn bg-olive margin">Edit</a> </td><td><a href="code/delete_content.php?id=<?php echo $row['content_id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 
$level = 2;
$count++;
}	

}
function showcontentitems()
{
if(isset($_REQUEST['itemid']) && $_REQUEST['itemid']>0 )
{
 $sl="select * from content where menu_id='".$_REQUEST['itemid']."' AND published='1'";
$res = mysql_query($sl);
if(mysql_num_rows($res)>0 )
{	
while($row = mysql_fetch_assoc($res))
{
?><h1 style="color:#F5874F"><?php echo  $row['content_title'];  ?></h1><div style="border-bottom: 1px solid #e9ebeb; color:#333333"><?php 
echo  $row['content_dis'];
?></div><?php
}

}else { echo "No Content avilable";  }
}
//print_r($_REQUEST);



}
function get_menutop(){

$query="Select * From menu WHERE location='1'";
$res = mysql_query($query);	
while($row = mysql_fetch_array($res))
{
if($row['location']=='1')
{
$link="";

}
else{
$link="?itemid=".$row['id'];

}

?>
<li><a href="<?php echo buildurl($row['link'].$link); ?>" title=""><?php  echo $row['title'];  ?></a></li>	
<?php 
}
}
function getbotmenu(){
$query="Select * From menu WHERE location='2'";
$res = mysql_query($query);
$count=0;	
while($row = mysql_fetch_array($res))
{
if($count==6)
{
?></ul></div><div class="tradies-footerlink">

<ul style="list-style-type: none; "><?php
}
if($row['location']=='1')
{
$link="";

}
else{
$link="?itemid=".$row['id'];

}

?>

<li ><a   href="<?php echo buildurl($row['link'].$link); ?>" title=""><?php  echo $row['title'];  ?></a></li>	
<?php 
$count++;}
}


function create_faq()
{

if(isset($_POST['create_faq']) && $_POST['create_faq']!="")
{
$s="insert into faq_title set title='".$_POST['title']."'";
mysql_query($s);	
}
}


function create_answer()
{
//echo "<pre>"; print_r($_POST);
if(isset($_POST['update_faq']) && $_POST['update_faq']!="" )
{
  $query="update faq set title_id='".$_POST['faq_title']."',ques='".$_POST['ques']."',ans='".addslashes($_POST['content'])."',status='".$_POST['status']."' WHERE id='".$_POST['edit']."'";
//die();
mysql_query($query);

}

if(isset($_POST['create_answer']) && $_POST['create_answer']!="")
{
$query="insert into faq set title_id='".$_POST['faq_title']."',ques='".$_POST['ques']."',ans='".addslashes($_POST['content'])."',status='".$_POST['status']."'";
$res = mysql_query($query);	
}
}

function faq_name($title_id)
{
$se="select title from faq_title WHERE id='".$title_id."'";
$res = mysql_query($se);
$es=mysql_fetch_assoc($res);
echo $es['title'];

}
function showfaq()
{
$se="select * from faq";
$res = mysql_query($se);	
if(mysql_num_rows($res)>0)
{
$count =1;
while($row=mysql_fetch_assoc($res))
{
?>
<tr> 
<td><?php echo $count;   ?></td> 

<td> 
<?php echo faq_name($row['title_id']);   ?>
</td>
<td ><?php echo $row['ques'];   ?></td>


<td ><?php echo $row['status'];   ?> </td><td><a href="?edit=<?php  echo $row['id'];  ?>" class="btn bg-olive margin">Edit</a> </td><td><a href="code/delete_faq.php?id=<?php echo $row['id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 <?php
 
 $level = 2;
$count++;
}


}

else { "No FAQ found"; }


}
/*function updte_news()
{

if(isset($_POST['updte_news']) && $_POST['updte_news'] != "" && isset( $_POST['sub'] ))
{
$s="update newsletter_format set format='".addslashes($_POST['news_content'])."', subject='".$_POST['sub']."' WHERE id='1'";
        echo $s;
		//die('sssss');
mysql_query($s);

}



}*/

/*function shownewsletteruser()
{
$df="select * from newsletter";
$res=mysql_query($df);
if(mysql_num_rows($res)>0)
{
?><select name="newsuser[]" multiple="multiple"><?php 
while($rows=mysql_fetch_assoc($res))
{
?><option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Email : </strong><?php echo $rows['email']; ?>)&nbsp;&nbsp;&nbsp;<strong>Created Date : </strong><?php echo $rows['created_date']; ?></option><?php

}

?></select>

<?php

}

else

{
echo "No User subscribe for Newsletter";

}



}*/
function get_news_format()
{
$s="select format from newsletter_format WHERE id='1'";
$my=mysql_query($s);
$res=mysql_fetch_assoc($my);
return $res['format'];

}
function get_name($id)
{
$s="select name from newsletter WHERE id='".$id."'";
$my=mysql_query($s);
$res=mysql_fetch_assoc($my);
return $res['name'];
}
function get_email($id)
{
$s="select email from newsletter WHERE id='".$id."'";
$my=mysql_query($s);
$res=mysql_fetch_assoc($my);
return $res['email'];

}
/*function send_newsletter()
{
//echo "<pre>"; print_r($_POST); 
if(isset($_POST['send_newsletter']) && $_POST['send_newsletter']!="")
{
foreach($_POST['newsuser'] as $node=>$id)
{
 $name=get_name($id);
 $email=get_email($id);
$tags['name'] = $name;
mailsend( $email, "", "", 1, $tags );

}
//die();
}



}*/
function updte_adminmail()
{
$sql="update login set email='".$_POST['adminemail']."',user='".$_POST['user']."',spass='".$_POST['pass']."',pass='".md5($_POST['pass'])."' where id='1'";
		$res=mysql_query($sql);

}
function getadminmail()
{
$sql="select * from  login";
		$res=mysql_query($sql);
		?><table ><?php
		 while($Rows=mysql_fetch_assoc($res))
{
?> <tr><td>User Name</td><td><input  type="text" name="user" value="<?php echo $Rows['user'] ?>" /></td>
<tr><td>Password</td><td><input type="text"  name="pass" value="<?php echo $Rows['spass'] ?>" /></td></tr>
<tr><td>Email</td><td><input type="text"  name="adminemail" value="<?php echo $Rows['email'] ?>" /></td></tr><?php


}
echo '</table>';
}

//NewsLetter:1,Contact:2,Registration:3,After Registration:4,Bussiness Added:5,Job Apply:6,Quote Mail:7
function get_revert_mail( $id )
{
	$sql="select * from  revertmails where id='".$id."'";
	$res=mysql_query($sql);
	$Rows=mysql_fetch_assoc($res);
	return $Rows;
}


function update_revert_mail_news()
{
$sql="update revertmails set mail_format='".addslashes($_POST['news_revert'])."',mail_sub='".addslashes($_POST['news_sub_revert'])."'  where id='1'";
		$res=mysql_query($sql);
		

}
function update_revert_mail_about()
{
$sql="update revertmails set mail_format='".addslashes($_POST['about_revert'])."',mail_sub='".addslashes($_POST['about_sub_revert'])."' where id='2'";
		$res=mysql_query($sql);

}
function update_revert_mail_onreg()
{
$sql="update revertmails set mail_format='".addslashes($_POST['onreg_revert'])."',mail_sub='".addslashes($_POST['onreg_sub_revert'])."' where id='3'";
		$res=mysql_query($sql);
}
////////////////////////
function update_revert_mail_afterreg()
{
$sql="update revertmails set mail_format='".addslashes($_POST['afterreg_revert'])."',mail_sub='".addslashes($_POST['afterreg_sub_revert'])."' where id='4'";
		$res=mysql_query($sql);
}
////////////////////////////////
function update_revert_mail_addbuss()
{
$sql="update revertmails set mail_format='".addslashes($_POST['addbuss_revert'])."',mail_sub='".addslashes($_POST['addbuss_sub_revert'])."' where id='5'";
		$res=mysql_query($sql);

}
//////////////////////////////////////
function update_revert_mail_jobs()
{
$sql="update revertmails set mail_format='".addslashes($_POST['jobs_revert'])."',mail_sub='".addslashes($_POST['jobs_sub_revert'])."' where id='6'";
		$res=mysql_query($sql);

}
////////////////////////////////////////////
function update_revert_mail_quote()
{
	$sql="update revertmails set mail_format='".addslashes($_POST['quote_revert'])."',mail_sub='".addslashes($_POST['quote_sub_revert'])."' where id='7'";
	$res=mysql_query($sql);
}

function get_jobs_category()
{
$sql="select * from  jobscategory where id='1'";
		$res=mysql_query($sql);
		$Rows=mysql_fetch_assoc($res);
		 return $Rows['categoryname']; 

}
function insert_jobs_category()
{
$sql="update jobscategory set categoryname='".$_POST['jobscat']."'  where id='1'";
		$res=mysql_query($sql);
}

/*function showjobscand()
{
$from=0;
					$to=20;
					
					if(isset($_GET['p']) && $_GET['p']>0)
					{
					$p=$_GET['p'];
					 $from=$p*$to;
					
					}
$sql="select count(id) as count from jobsapply";
					$mysql=mysql_query($sql);
					$mysql_re=mysql_fetch_array($mysql);
					//print_r($mysql_re);
					 $total=$mysql_re['count'];
					 $page=buildurl("jobs.php");
					 
 $sql="select * from jobsapply LIMIT ".$from.",".$to."";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{
getpaginationadmin($total,$to,$p,$page);
$count =1;
while($row=mysql_fetch_assoc($res))
{
?>
<tr> 
<td><?php echo $count;   ?></td> 

<td> 
<?php echo $row['post'];   ?>
</td>
<td ><?php echo $row['name'];   ?></td>


<td ><?php echo $row['email'];   ?> </td>
<td ><?php echo $row['phn_no'];   ?> </td>
<td ><?php echo $row['address'];   ?> </td>
<td ><?php echo $row['city'];   ?> </td>
<td ><?php echo $row['dis_yourself'];   ?> </td>
<td><a href="../uploads/<?php  echo $row['attached'];  ?>" class="btn bg-olive margin">View Resume</a> </td>
<td><a href="code/deletecand.php?id=<?php echo $row['id']; ?>" class="btn bg-navy margin">Delete</a> </td>
 </tr>	
 <?php
 
 $level = 2;
$count++;
}

}
else{


echo "No record found"; }

}
*/
function getvisitor($bus_id)
{
$select="select visitor from business where bus_id='".$bus_id."'";
$mysql=mysql_query($select);
$sget=mysql_fetch_assoc($mysql);
return $sget['visitor'];

}

function getpagination($total,$to,$p,$page)
{

if(isset($_POST['submit']) && $_POST['submit']!="")
					{
					
					
					if(isset($_POST['date']) && $_POST['date'] !="" && isset($_POST['endate']) && $_POST['endate'] !="" )
		{
		
	$time = strtotime($_POST['date']);
    $date = date("d/m/Y", $time);

$originalDate = $_POST['endate'];
$newDate = date("d/m/Y", strtotime($originalDate));

	$_SESSION['date']=$date;
	$_SESSION['endate']=$newDate;
}
if(isset($_POST['date']) && $_POST['date'] !="" && isset($_POST['endate']) && $_POST['endate'] =="" )
{

$mdate=date('d/m/Y', strtotime($_POST['date']));
$_SESSION['date']=$mdate;

}
}


 $counter =$total/$to;
 //$counters=round($counter,0, PHP_ROUND_HALF_DOWN);
 $counters=ceil($counter);
if($counters>1)
{
?><div style="margin-top: 10px;

    text-align: center;margin-bottom: 10px;"><a style="padding: 3px; text-decoration:none;background: teal; margin-top: 91px;color: white; " href="<?php echo $page ?>&p=0">Start</a><?php
for($i=0;$i<$counters;$i++)
{
$show=$i+1;
$bold="background: teal;";
if($i==$p)
{
$bold="background:#000000;";
}
?>&nbsp;<a style="padding: 3px; text-decoration:none; margin-top: 91px;color: white; <?php echo $bold; ?> " href="<?php echo $page ?>&p=<?php echo $i; ?>"><?php echo $show; ?></a>&nbsp;<?php

}
?><a style="padding: 3px;background: teal; text-decoration:none; margin-top: 91px;color: white; " href="<?php echo $page ?>&p=<?php echo $counters-1; ?>">End</a></div><?php
}
}
function buss_id($name)
{
$d="select bus_id from business WHERE bus_name LIKE '%".$name."%'";
$f=mysql_query($d);
if(mysql_num_rows($f)>0)
{
$ro=mysql_fetch_assoc($f);
return $ro['bus_id'];

}


}
function getpaginationadmin($total,$to,$p,$page)
{

if(isset($_POST['serchpay']) && $_POST['serchpay']!="")
					{
					
					
					if(isset($_POST['sbid']) && $_POST['sbid'] !="" )
		{
	
	$_SESSION['sbid']=$_POST['sbid'];
	//$_SESSION['endate']=$newDate;
}
if(isset($_POST['status']) && $_POST['status'] !="")
{

$_SESSION['status']=$_POST['status'];

}
}


 $counter =$total/$to;
 //$counters=round($counter,0, PHP_ROUND_HALF_DOWN);
 $counters=ceil($counter);
if($counters>1)
{
?><div style="margin-top: 10px;

    text-align: center;margin-bottom: 10px;"><a style="padding: 3px; text-decoration:none;background: teal; margin-top: 91px;color: white; " href="<?php echo $page ?>?p=0">Start</a><?php
for($i=0;$i<$counters;$i++)
{
$show=$i+1;
$bold="background: teal;";
if($i==$p)
{
$bold="background:#000000;";
}
?>&nbsp;<a style="padding: 3px; text-decoration:none; margin-top: 91px;color: white; <?php echo $bold; ?> " href="<?php echo $page ?>?p=<?php echo $i; ?>"><?php echo $show; ?></a>&nbsp;<?php

}
?><a style="padding: 3px;background: teal; text-decoration:none; margin-top: 91px;color: white; " href="<?php echo $page ?>?p=<?php echo $counters-1; ?>">End</a></div><?php
}
}

function mailsend( $toEmail, $sub, $msg, $mid = 0, $tags = array() )
{
	if( $mid > 0 )
	{
		$getmailformat	=	get_revert_mail($mid);
		$msg	=	$getmailformat['mail_format'];
		$sub	=	$getmailformat['mail_sub'];
	}
	$fromemail	=	"admin@neelnetworks.co";
	
	$msg	=	( isset( $tags['subject'] ) ) ? str_replace('$subject',$tags['subject'],$msg) : $msg;
	$msg	=	( isset( $tags['name'] ) ) ? str_replace('$name',$tags['name'],$msg) : $msg;
	$msg	=	( isset( $tags['email'] ) ) ? str_replace('$email',$tags['email'],$msg) : $msg;
	$msg	=	( isset( $tags['message'] ) ) ? str_replace('$message',$tags['message'],$msg) : $msg;
	
	$msg	=	( isset( $_POST['Name'] ) ) ? str_replace('$name',$_POST['Name'],$msg) : $msg;
	$msg	=	( isset( $_POST['post'] ) ) ? str_replace('$category',$_POST['post'],$msg) : $msg;
	$msg	=	( isset( $_POST['post'] ) ) ? str_replace('$email',$_REQUEST['payer_email'],$msg) : $msg;
	
	
	
	$headers = 'From: UrbanTradies <' . $fromemail . ">\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . '\r\n'.
			'Reply-To:' . $fromemail . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	$msg	=	nl2br($msg, false);
	 mail($toEmail,$sub,$msg,$headers);
}
?>
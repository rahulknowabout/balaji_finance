<?php
      //echo "<pre>";
	  //print_r( $_POST );
	  //die();
function edit() {
	
	$sva = array("name" => "'".$_POST['user_name']."'","password" => "'".$_POST['user_password']."'", "email" => "'".$_POST['user_email']."'","phone" => "'".$_POST['user_phone']."'","fax" => "'".$_POST['user_fax']."'","address" => "'".$_POST['user_address']."'","flink"=>"'".$_POST['f_link']."'","glink"=>"'".$_POST['g_link']."'","lin_link"=>"'".$_POST['lin_link']."'","tlink"=>"'".$_POST['t_link']."'");
	
	runquery("UPDATE","","settinga",$sva);
}
//add(); 
edit(); 
$_SESSION['smsg'] = "Admin Setting Updated Successfully!";
if( isset( $_REQUEST['ind'] ) && $_REQUEST['ind'] == 'ind') {
	header('location:index.php');
}
else {
header('location:index.php?f=setting&t=setting');
}
?>
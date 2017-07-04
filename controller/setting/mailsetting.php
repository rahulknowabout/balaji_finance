<?php
     // echo "<pre>";
	  //print_r( $_POST );
	 // die();
function edit() {
	
	$svan =  array("mail_format" => "'".$_POST['r_newsletter']."'","mail_subject" => "'".$_POST['nemail_sub']."'");
	runquery("UPDATE","","mailsetting",$svan,"where id = 1");
	
	$svac =  array("mail_format" => "'".$_POST['r_contact']."'","mail_subject" => "'".$_POST['cemail_sub']."'");
	runquery("UPDATE","","mailsetting",$svac,"where id = 2");
	
	$svar =  array("mail_format" => "'".$_POST['r_registration']."'","mail_subject" => "'".$_POST['remail_sub']."'");
	runquery("UPDATE","","mailsetting",$svar,"where id = 3");
	
	$svara =  array("mail_format" => "'".$_POST['r_registrationa']."'","mail_subject" => "'".$_POST['raemail_sub']."'");
	runquery("UPDATE","","mailsetting",$svara,"where id = 4");
	
}

//add(); 
edit(); 
$_SESSION['smsg'] = "Mail Setting Updated Successfully!";
header('location:index.php?f=setting&t=setting');
?>
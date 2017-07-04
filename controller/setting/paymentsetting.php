<?php function edit() {
//echo "<pre>";
//print_r( $_POST);
//die();

$svapm =  array("mail_format" => "'".$_POST['payment_mail']."'","mail_subject" => "'".$_POST['payment_sub_revert']."'");
runquery("UPDATE","","mailsetting",$svapm,"where id = 5");

$svap =  array("currency_code" => "'".$_POST['currency_code']."'","mode" => "'".$_POST['mode']."'");
runquery("UPDATE","","paymentsetting",$svap);
}

edit();
$_SESSION['smsg'] = " Payment Setting Updated Successfully!";
header('location:index.php?f=setting&t=setting');
?>
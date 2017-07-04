<?php function send_newsletter() {
    // echo "<pre>";
	//print_r($_POST);
	//die();
	$str = implode($_POST['nuser'] ,",");
	//echo $str;
	//die();	
	$rown = select_newsletter($_POST['ntem'] );
	//echo "<pre>";
	//print_r($rown);
	//die();
	$sub = $rown['0']['subject'];
	$des = $rown['0']['des'];
	//echo $sub;
	//echo $des;
	//die();
$fromemail="info@balaji_fin.com";

$headers = 'From: Teach1000 <' . $fromemail . ">\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . '\r\n'.
			'Reply-To:' . $fromemail . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			
$rowu = newsletter_user(" where id in ( ".$str." )");
	if( count( $rowu ) > 0 ) {
		foreach( $rowu as $row ) {
			$sub = str_replace('$name',$row['name'],$sub );
			$sub = str_replace('$email', $row['email'],$sub);
			$des =  str_replace('$name',$row['name'],$des );
			$des =  str_replace('$email',$row['email'],$des );
			//echo $sub;
			//echo "<br/>";
			//echo $des;
			//echo "<br/>";
			mail($row['email'],$sub,$des,$headers)
			//die();
			
		//mail("".$row['email']."" )
	    //echo $row['name'];
		//echo $row['email'];
	    }
	}	


}
send_newsletter();
$_SESSION['smsg'] = "Newsletter send Successfully!";
//header('location:index.php?f=newsletter&t=newsletter');

?>
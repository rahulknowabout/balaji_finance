<?php
function add() {
$total = runquery("SELECT","*","faq","","where title='".$_POST['title']."'","num_rows");
	if( $total > 0) {
	}
	else {
		$sva = array("title" => "'".$_POST['title']."'","ques" => "'".$_POST['ques']."'","ans" => "'".$_POST['answer']."'","status" => "".$_POST['status']."");
	runquery("INSERT","","faq",$sva);
	}

}

function edit() {
	 $sva = array("title" => "'".$_POST['title']."'","ques" => "'".$_POST['ques']."'","ans" => "'".$_POST['answer']."'","status" => "".$_POST['status']."");
	 	runquery("UPDATE","","faq",$sva,"where id = ".$_POST['fhid']."");
	
}

function delete() {
$whe = "WHERE id = ".$_GET['id']."";
runquery('DELETE','','faq','',$whe);
} 

if( isset( $_GET['del'] )  ) {
delete();
$_SESSION['smsg'] = "FAQ Deleted Successfully!";
header('location:index.php?f=faq&t=faq');
}
else{
	if( isset( $_POST['fhid'] ) && $_POST['fhid']!="" ) {
		edit();
		$_SESSION['smsg'] = "FAQ Page Updated Successfully!";
		 header('location:index.php?f=faq&t=faq');
	}
	else {
 		add();
	   $_SESSION['smsg'] = "FAQ Added Successfully!";
	   header('location:index.php?f=faq&t=faq');
	}
}	
	
?>
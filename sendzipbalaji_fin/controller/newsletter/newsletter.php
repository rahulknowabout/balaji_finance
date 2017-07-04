<?php
function add() {
$total = runquery("SELECT","*","newsletter","","where title='".$_POST['title']."'","num_rows");
	if( $total > 0) {
	}
	else {
		$sva = array("title" => "'".$_POST['title']."'","subject" => "'".$_POST['sub']."'","des" => "'".$_POST['des']."'");
	runquery("INSERT","","newsletter",$sva);
	}

}

function edit() {
	 $sva = array("title" => "'".$_POST['title']."'","subject" => "'".$_POST['sub']."'","des" => "'".$_POST['des']."'");
	 	runquery("UPDATE","","newsletter",$sva,"where id = ".$_POST['fhid']."");
	
}

function delete() {
$whe = "WHERE id = ".$_GET['id']."";
runquery('DELETE','','newsletter','',$whe);
} 

if( isset( $_GET['del'] )  ) {
delete();
$_SESSION['smsg'] = "Newsletter Deleted Successfully!";
header('location:index.php?f=newsletter&t=newsletter');
}
else{
	if( isset( $_POST['fhid'] ) && $_POST['fhid']!="" ) {
		edit();
		$_SESSION['smsg'] = "Newsletter Page Updated Successfully!";
		header('location:index.php?f=newsletter&t=newsletter');
	}
	else {
 		add();
	   $_SESSION['smsg'] = "Newsletter Added Successfully!";
	   header('location:index.php?f=newsletter&t=newsletter');
	}
}	
	
?>
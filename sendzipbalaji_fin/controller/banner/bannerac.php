<?php
//echo "<pre>";
//print_r( $_POST);
//print_r( $_FILES );
//die();
function add() {
	$moveResult = move_uploaded_file($_FILES['icon']['tmp_name'],"banner/".$_FILES['icon']['name'].""); 
	if ($moveResult == true) {
   	$total = runquery("SELECT","*","banner","","where banner_path='banner/".$_FILES['icon']['name']."'","num_rows");
	 if( $total > 0) {
	 }
	 else {
		$sva = array("banner_path" => "'".$_FILES['icon']['name']."'","ordering" => "'".$_POST['ordering']."'","title" => "'".$_POST['title']."'" , "subtitle" => "'".$_POST['subtitle']."'","menu_id" => "'".$_POST['menu_id']."'");
	runquery("INSERT","","banner",$sva);
	//die();
	}
}
}

function edit() {
                    if( isset($_FILES['file']['name']) && $_FILES['file']['name']!="" ) {
	 $sva = array("banner_path" => "'".$_FILES['icon']['name']."'","ordering" => "'".$_POST['ordering']."'","title" => "'".$_POST['title']."'","subtitle" => "'".$_POST['subtitle']."'","menu_id" => "'".$_POST['menu_id']."'");                   //die();
	                       //echo "<pre>";
							//print_r($_FILES);
	                }
					else {
					 		$sva = array("ordering" => "'".$_POST['ordering']."'","title" => "'".$_POST['title']."'","subtitle" => "'".$_POST['subtitle']."'","menu_id" => "'".$_POST['menu_id']."'");
							//echo "<pre>";
							//print_r($_FILES);
							//die();
					}
					        //echo "<pre>";
							//print_r($sva);
						  runquery("UPDATE","","banner",$sva,"where id=".$_POST['bhid']."");
	
		
}

function delete() {
	  $whe = "WHERE id = ".$_GET['id']."";
	  runquery('DELETE','','banner','',$whe);
	 } 


if( isset( $_POST['bhid'] ) && !isset($_GET['del']) ) { 
	
	edit();
	$_SESSION['smsg'] = "Banner Updated Successfully!";
 	header('location:index.php?f=banner&t=banner');
	}
else {
		if( isset( $_GET['id'] ) && isset( $_GET['del'] )  ) {
			delete();
			$_SESSION['smsg'] = "Banner Deleted Successfully!";
			header('location:index.php?f=banner&t=banner');
		}
		else {
 				add();
				$_SESSION['smsg'] = "Banner Added Successfully!";
				header('location:index.php?f=banner&t=banner');
			}	
}
	


 ?>
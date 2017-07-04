<?php
function add() {
//echo "<pre>";
//print_r( $_POST);
//print_r($_FILES);
//die();
	$moveResult = move_uploaded_file($_FILES['imageposition']['tmp_name'],"uploadimages/".$_FILES['imageposition']['name'].""); 
	if ($moveResult == true) {
   	$total = runquery("SELECT","*","imagegallary","","where image_name='".$_FILES['imageposition']['name']."'","num_rows");
	 if( $total > 0) {
	 }else {
	 if( isset( $_POST['gimage'] ) && $_POST['gimage'] == "gallaryimage" ) {
			    $gis = 1;
				
			
         	}else {
			      $gis = 0;
			}
			 if( isset( $_POST['hpimage1'] ) && $_POST['hpimage1'] == "homepageimage1" ) {
			    $his1 = 1;
			}else {
			      $his1 = 0;
			}
			if( isset( $_POST['hpimage2'] ) && $_POST['hpimage2'] == "homepageimage2" ) {
			    $his2 = 1;
			}else {
			      $his2 = 0;
			}
			 if( isset( $_POST['ftimage'] ) && $_POST['ftimage'] == "footerimage" ) {
			    $fis = 1;
			}else {
			      $fis = 0;
			}
	          $tagstr = implode(",",$_POST['tagid']);
			$sva = array("image_name" => "'".$_FILES['imageposition']['name']."'","title" => "'".$_POST['title']."'","subtitle" => "'".$_POST['subtitle']."'","gis" => "".$gis."","hpis" => "".$his1."" ,"hpis1" => "".$his2."", "fis" => "".$fis."", "tagid" => "'". $tagstr."'");
	           runquery("INSERT","","imagegallary",$sva);
	}
}
}

function edit() {
//echo "<pre>";
//print_r( $_POST);
//print_r($_FILES);
//imagetype();
//die();
if( isset( $_POST['gimage'] ) && $_POST['gimage'] == "gallaryimage" ) {
			    $gis = 1;
				
			
         	}else {
			      $gis = 0;
			}
			 if( isset( $_POST['hpimage1'] ) && $_POST['hpimage1'] == "homepageimage1" ) {
			    $his1 = 1;
			}else {
			      $his1 = 0;
			}
			if( isset( $_POST['hpimage2'] ) && $_POST['hpimage2'] == "homepageimage2" ) {
			    $his2 = 1;
			}else {
			      $his2 = 0;
			}
			 if( isset( $_POST['ftimage'] ) && $_POST['ftimage'] == "footerimage" ) {
			    $fis = 1;
			}else {
			      $fis = 0;
			}
    if( $_FILES['imageposition']['name'] != "" ) {
		$moveResult = move_uploaded_file($_FILES['imageposition']['tmp_name'],"uploadimages/".$_FILES['imageposition']['name'].""); 
		  $tagstr = implode(",",$_POST['tagid']);
			if ($moveResult == true) {
   		 		
	    			$sva = array("image_name" => "'".$_FILES['imageposition']['name']."'","title" => "'".$_POST['title']."'","subtitle" => "'".$_POST['subtitle']."'","gis" => "".$gis."","hpis" => "".$his1."" ,"hpis1" => "".$his2."", "fis" => "".$fis."","tagid" => "'". $tagstr."'");
			}
	}		
	else {
	  
		$sva = array("title" => "'".$_POST['title']."'","subtitle" => "'".$_POST['subtitle']."'","gis" => "".$gis."","hpis" => "".$his1."" ,"hpis1" => "".$his2."", "fis" => "".$fis."","tagid" => "'". $tagstr."'");
	}	
		runquery("UPDATE","","imagegallary",$sva,"where id = ".$_POST['bhid']."");
	}


function delete() {

$whe = "WHERE id = ".$_GET['id']."";
runquery('DELETE','','imagegallary','',$whe);

}

	if( isset( $_GET['id'] ) && isset( $_GET['del'] )  ) {
	  delete();
	  $_SESSION['smsg'] = "image Deleted Successfully!";
	  header('location:index.php?f=imagegallary&t=imagegallary');
	}
	else {
		if( isset( $_POST['bhid'] ) ) { 
			edit();
			$_SESSION['smsg'] = "image Updated Successfully!";
 			header('location:index.php?f=imagegallary&t=imagegallary');
		}
		else {
			add();
			$_SESSION['smsg'] = "image Added Successfully!";
 			header('location:index.php?f=imagegallary&t=imagegallary');
		}	
	}

?>
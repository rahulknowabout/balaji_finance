<?php
function add() {
//echo "<pre>";
//print_r($_POST);
     if( $_POST['alias'] == "") { 
     $insatr = str_replace("@","",$_POST['title']);
	 $insatr = str_replace("#","",$_POST['title']);
	 $insatr = str_replace("$","",$_POST['title']);
	 $insatr = str_replace("%","",$_POST['title']);
	 $insatr = str_replace("^","",$_POST['title']);
	 $insatr = str_replace("&","",$_POST['title']);
	 $insatr = str_replace("*","",$_POST['title']);
	 $insatr = str_replace("(","",$_POST['title']);
	 $insatr = str_replace(")","",$_POST['title']);
	 $insatr = str_replace("[","",$_POST['title']);
	 $insatr = str_replace("]","",$_POST['title']);
	 $insatr = str_replace(" ","",$_POST['title']);
	 $insatr = strtolower( $insatr);
	 }
	 else {
			$insatr = str_replace("@","",$_POST['alias']);
	 		$insatr = str_replace("#","",$_POST['alias']);
	 		$insatr = str_replace("$","",$_POST['alias']);
	    	$insatr = str_replace("%","",$_POST['alias']);
	 		$insatr = str_replace("^","",$_POST['alias']);
	 		$insatr = str_replace("&","",$_POST['alias']);
	 		$insatr = str_replace("*","",$_POST['alias']);
	 		$insatr = str_replace("(","",$_POST['alias']);
	 		$insatr = str_replace(")","",$_POST['alias']);
	 		$insatr = str_replace("[","",$_POST['alias']);
			$insatr = str_replace("]","",$_POST['alias']);
	 		$insatr = str_replace(" ","",$_POST['alias']);
	 		$insatr = strtolower( $insatr);
	 }
	 $total = runquery("SELECT","*","artical","","where alias='".$insatr."'","num_rows");
	 if( $total > 0) {
	 }
	 else {
$posar = str_replace(" ","",$_POST['position']);
$posar = strtolower( $posar);
		$sva = array("cat_id" => "'".$_POST['atr']."'","position" => "'".$posar."'", "title" => "'".$_POST['title']."'","alias" => "'".$_POST['alias']."'","subtitle" => "'".$_POST['subtitle']."'","s_des" => "'".$_POST['s_content']."'","text_atr" => "'".$_POST['content']."'","status" => "".$_POST['status']."");
	runquery("INSERT","","artical",$sva);
	}

}

function edit() {
	  if( $_POST['alias'] == "") { 
     $insatr = str_replace("@","",$_POST['title']);
	 $insatr = str_replace("#","",$_POST['title']);
	 $insatr = str_replace("$","",$_POST['title']);
	 $insatr = str_replace("%","",$_POST['title']);
	 $insatr = str_replace("^","",$_POST['title']);
	 $insatr = str_replace("&","",$_POST['title']);
	 $insatr = str_replace("*","",$_POST['title']);
	 $insatr = str_replace("(","",$_POST['title']);
	 $insatr = str_replace(")","",$_POST['title']);
	 $insatr = str_replace("[","",$_POST['title']);
	 $insatr = str_replace("]","",$_POST['title']);
	 $insatr = str_replace(" ","",$_POST['title']);
	 $insatr = strtolower( $insatr);
	 }
	 else {
			$insatr = str_replace("@","",$_POST['alias']);
	 		$insatr = str_replace("#","",$_POST['alias']);
	 		$insatr = str_replace("$","",$_POST['alias']);
	    	$insatr = str_replace("%","",$_POST['alias']);
	 		$insatr = str_replace("^","",$_POST['alias']);
	 		$insatr = str_replace("&","",$_POST['alias']);
	 		$insatr = str_replace("*","",$_POST['alias']);
	 		$insatr = str_replace("(","",$_POST['alias']);
	 		$insatr = str_replace(")","",$_POST['alias']);
	 		$insatr = str_replace("[","",$_POST['alias']);
			$insatr = str_replace("]","",$_POST['alias']);
	 		$insatr = str_replace(" ","",$_POST['alias']);
	 		$insatr = strtolower( $insatr);
	 }
$posar = str_replace(" ","",$_POST['position']);
$posar = strtolower( $posar);
		$sva = array("cat_id" => "".$_POST['atr']."","position" => "'".$posar."'","title" => "'".$_POST['title']."'","alias" => "'".$insatr."'","text_atr" => "'".$_POST['content']."'","status" => "".$_POST['status']."");
	 	runquery("UPDATE","","artical",$sva,"where id = ".$_POST['aid']."");
	
}

function delete() {
	  $whe = "WHERE id = ".$_GET['aid']."";
	  runquery('DELETE','','artical','',$whe);
	 } 

if( isset( $_GET['aid'] ) && isset( $_GET['del'] )  ) {
	delete();
	$_SESSION['smsg'] = "Landing Page Deleted Successfully!";
	header('location:index.php?f=content&t=artical_list');
}
else{
if( isset( $_POST['aid'] ) && $_POST['aid']!="" ) {
	edit();
	$_SESSION['smsg'] = "Landing Page Updated Successfully!";
   header('location:index.php?f=content&t=artical_list');
	}
else {
 	add();
	//die();
	$_SESSION['smsg'] = "Landing Page Added Successfully!";
	header('location:index.php?f=content&t=artical_list');
}
}	
	

 ?>

<?php
function add() {
  if( $_POST['atr_alias'] == "") { 
     $insatr = str_replace("@","",$_POST['atr_cat']);
	 $insatr = str_replace("#","",$_POST['atr_cat']);
	 $insatr = str_replace("$","",$_POST['atr_cat']);
	 $insatr = str_replace("%","",$_POST['atr_cat']);
	 $insatr = str_replace("^","",$_POST['atr_cat']);
	 $insatr = str_replace("&","",$_POST['atr_cat']);
	 $insatr = str_replace("*","",$_POST['atr_cat']);
	 $insatr = str_replace("(","",$_POST['atr_cat']);
	 $insatr = str_replace(")","",$_POST['atr_cat']);
	 $insatr = str_replace("[","",$_POST['atr_cat']);
	 $insatr = str_replace("]","",$_POST['atr_cat']);
	 $insatr = str_replace(" ","",$_POST['atr_cat']);
	 $insatr = strtolower( $insatr);
	}else {
			$insatr = str_replace("@","",$_POST['atr_alias']);
	 		$insatr = str_replace("#","",$_POST['atr_alias']);
	 		$insatr = str_replace("$","",$_POST['atr_alias']);
	    	$insatr = str_replace("%","",$_POST['atr_alias']);
	 		$insatr = str_replace("^","",$_POST['atr_alias']);
	 		$insatr = str_replace("&","",$_POST['atr_alias']);
	 		$insatr = str_replace("*","",$_POST['atr_alias']);
	 		$insatr = str_replace("(","",$_POST['atr_alias']);
	 		$insatr = str_replace(")","",$_POST['atr_alias']);
	 		$insatr = str_replace("[","",$_POST['atr_alias']);
			$insatr = str_replace("]","",$_POST['atr_alias']);
	 		$insatr = str_replace(" ","",$_POST['atr_alias']);
	 		$insatr = strtolower( $insatr);
	}
	 
	 $total = runquery("SELECT","atr_cat","artical_cat","","where atr_cat='".$_POST['atr_cat']."'","num_rows");
	 if( $total > 0) {
	 }
	 else {
		$sva = array("atr_cat" => "'".$_POST['atr_cat']."'","atr_alias" => "'".$insatr."'");
	 	runquery("INSERT","","artical_cat",$sva);
	}

}

function edit() {
 if( $_POST['atr_alias'] == "") { 
	 $insatr = str_replace("@","",$_POST['atr_cat']);
	 $insatr = str_replace("#","",$_POST['atr_cat']);
	 $insatr = str_replace("$","",$_POST['atr_cat']);
	 $insatr = str_replace("%","",$_POST['atr_cat']);
	 $insatr = str_replace("^","",$_POST['atr_cat']);
	 $insatr = str_replace("&","",$_POST['atr_cat']);
	 $insatr = str_replace("*","",$_POST['atr_cat']);
	 $insatr = str_replace("(","",$_POST['atr_cat']);
	 $insatr = str_replace(")","",$_POST['atr_cat']);
	 $insatr = str_replace("[","",$_POST['atr_cat']);
	 $insatr = str_replace("]","",$_POST['atr_cat']);
	 $insatr = str_replace(" ","",$_POST['atr_cat']);
	 $insatr = strtolower( $insatr);
} 
	 else {
			$insatr = str_replace("@","",$_POST['atr_alias']);
	 		$insatr = str_replace("#","",$_POST['atr_alias']);
	 		$insatr = str_replace("$","",$_POST['atr_alias']);
	    	$insatr = str_replace("%","",$_POST['atr_alias']);
	 		$insatr = str_replace("^","",$_POST['atr_alias']);
	 		$insatr = str_replace("&","",$_POST['atr_alias']);
	 		$insatr = str_replace("*","",$_POST['atr_alias']);
	 		$insatr = str_replace("(","",$_POST['atr_alias']);
	 		$insatr = str_replace(")","",$_POST['atr_alias']);
	 		$insatr = str_replace("[","",$_POST['atr_alias']);
			$insatr = str_replace("]","",$_POST['atr_alias']);
	 		$insatr = str_replace(" ","",$_POST['atr_alias']);
	 		$insatr = strtolower( $insatr);
	}
	 
	
	 $total = runquery("SELECT","atr_cat","artical_cat","","where atr_cat='".$insatr."'","num_rows");
	  if( $total > 0) {
	 }
	 else {
		$sva = array("atr_cat" => "'".$_POST['atr_cat']."'","atr_alias" => "'".$insatr."'");
	 	runquery("UPDATE","","artical_cat",$sva,"where id = ".$_POST['uid']."");
	}
}

function delete() {
	  $whe = "WHERE id = ".$_GET['uid']."";
	  runquery('DELETE','','artical_cat','',$whe);
	 } 

if( isset( $_GET['uid'] ) && isset( $_GET['del'] )  ) {
	delete();
	$_SESSION['smsg'] = "Article Category Deleted Successfully!";
	header('location:index.php?f=content&t=artical_cat_list');
}
else {
if( isset( $_POST['uid'] ) ) { 
	if( $_POST['uid']!=""  ){
	edit();
	$_SESSION['smsg'] = "Article Category Updated Successfully!";
   header('location:index.php?f=content&t=artical_cat_list');
	}
	else {
 	add();
	$_SESSION['smsg'] = "Article Category Added Successfully!";
	header('location:index.php?f=content&t=artical_cat_list');
	}
}
}	

 ?>

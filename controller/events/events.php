<?php
function add() {
echo "<pre>";
print_r($_POST); 
    
	 $total = runquery("SELECT","*","events","","where title LIKE '%".$_POST['title']."%'","num_rows");
	 if( $total > 0) {
	 }
	 else {
	  $start_date = date("Y-m-d", strtotime($_POST['startdate']));
	 	  $end_date = date("Y-m-d", strtotime($_POST['enddate']));
		  $startdatetime=$start_date." ".$_POST['starttiming'];
		  $startdatetime=strtotime($startdatetime);
		  
		  
			$sva = array("startdate" => "'".$start_date."'","starttime" => "'".$_POST['starttiming']."'", "title" => "'".$_POST['title']."'","endate" => "'".$end_date."'","short_dis" => "'".$_POST['s_content']."'","status" => "".$_POST['status']."","endtime" => "'".$_POST['endtiming']."'","eventtype" => "'".$_POST['eventtype']."'","audience_type" => "'".$_POST['auditype']."'","longdis" => "'".$_POST['content']."'","address"=>"'".$_POST['address']."'","startdatetime"=>"'".$startdatetime."'");
		
			
	runquery("INSERT","","events",$sva);
//	die();
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

 $start_date = date("Y-m-d", strtotime($_POST['startdate']));
	 	  $end_date = date("Y-m-d", strtotime($_POST['enddate']));
		  $startdatetime=$start_date." ".$_POST['starttiming'];
		  $startdatetime=strtotime($startdatetime);

		$sva =  array("startdate" => "'".$start_date."'","starttime" => "'".$_POST['starttiming']."'", "title" => "'".$_POST['title']."'","endate" => "'".$end_date."'","short_dis" => "'".$_POST['s_content']."'","status" => "".$_POST['status']."","endtime" => "'".$_POST['endtiming']."'","eventtype" => "'".$_POST['eventtype']."'","audience_type" => "'".$_POST['auditype']."'","longdis" => "'".$_POST['content']."'","address"=>"'".$_POST['address']."'","startdatetime"=>"'".$startdatetime."'");
		//	print_r($sva); die();
	 	runquery("UPDATE","","events",$sva,"where id = ".$_POST['aid']."");
	
}

function delete() {
	  $whe = "WHERE id = ".$_GET['aid']."";
	  runquery('DELETE','','events','',$whe);
	 } 

if( isset( $_GET['aid'] ) && isset( $_GET['del'] )  ) {
	delete();
	$_SESSION['smsg'] = "Event Deleted Successfully!";
	header('location:index.php?f=events&t=events_list');
}
if( isset( $_POST['aid'] ) && $_POST['aid']!="" ) {
	edit();
	$_SESSION['smsg'] = "Event Updated Successfully!";
   header('location:index.php?f=events&t=events_list');
	}
else {
 	add();
	$_SESSION['smsg'] = "Event Added Successfully!";
	header('location:index.php?f=events&t=events_list');
}
	
	

 ?>

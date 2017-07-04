<?php
/// pagination function
function paginate( $path,$hold ) {
	if( ( $hold%10 ) == 0 ){
		$total = $hold/10;
	}
    else {
    	$total = ($hold/10)+1;
     }
	 $returnp =   '<ul class = "pagination">';
	 if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid']>1 ) {
	 	$pre = $_REQUEST['vid']-1;
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$pre.'">Previous</a></li>';
	}
     for( $i = 1; $i <= $total; $i++ ) {
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$i.'">'.$i.'</a></li>';
	 }
	if( isset( $_REQUEST['vid'] ) &&  $_REQUEST['vid']<=($total-1) ) {
		$nex = $_REQUEST['vid']+1;
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$nex.'">Next</a></li>';
	}
	$returnp = $returnp.'</ul>';
	return $returnp;
}
function event_list()
{


 
if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$rowcs = runquery("SELECT","*","artical_cat");
	 if( count( $rowcs )>0 ) {
	foreach( $rowcs as $rcs) {
	      if( $rcs['atr_cat'] == $_REQUEST['search'] ){
		      $csid = $rcs['id'];
		  }
		  else {
		  }
	}
 }	
if( $_REQUEST['search'] == "publish" ) {
        $status = 1;
 }

 if( $_REQUEST['search'] == "unpublish" ) {
        $status = 0;
		//die();
 }

	if( isset( $csid ) ) {
		$where = "where title like '%".$_REQUEST['search']."%'  ";
		
	}
	else {
     if( isset( $status ) ) {
	  $where = "where title like '%".$_REQUEST['search']."%' or alias like '%".$_REQUEST['search']."%' or status = ". $status." ";
	}
	else {
	 $where = "where title like '%".$_REQUEST['search']."%' or alias like '%".$_REQUEST['search']."%'";
	}	
	
	}
	//echo $where;
	}
	
else {
       $where = "";
}	
$rowc = runquery("SELECT","count(*)","events","",$where);
if( count( $rowc ) > 0) {
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
}	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","events","","".$where."limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","events","","".$where."limit 0,10");
    $count = 1;
	} ?>
	<form action="" method="post">
	<?php
 if( count($rowe) >0) {	
	foreach($rowe as $row){
	   // $rowc = runquery("SELECT","atr_cat","artical_cat","","where id = ".$row['cat_id'].""); ?>
		<tr><td><?php echo $count;   ?> </td>   <td> <?php echo $row['title'];   ?>  </td> 
		   <td> <?php if( $row['status'] == 1){?><img src="images/check.jpg"/> <?php }else {?><img src="images/uncheck1.png"/> <?php }  ?>  </td>
		
        
		<td>
			<a href="index.php?f=events&t=events&aid=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
			<a href="index.php?f=events&t=events&aid=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
		</td>
         </tr>	
		 
<?php 
		 $count++;
	} 
  }	?>
	
<?php	
$path = 'index.php?f=events&t=events_list';
echo '<tr><td align = "center" colspan = "5">'; 
echo paginate($path,$hold);
echo '</td><td colspan="3">' ?>
<?php
echo '<td></tr>'; 

	if( isset( $_POST['saveorder'] ) ) {
		saveordera();
	}
}	
/// show_user functions   
 function show_users() {
 if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$where = "where user_profile_name like '%".$_REQUEST['search']."%' or user_email like '%".$_REQUEST['search']."%' or user_suburb like '%".$_REQUEST['search']."%' or user_state like '%".$_REQUEST['search']."%'";
	//echo $where;
	}
	
else {
       $where = "";
}	
	$rowc = runquery("SELECT","count(*)","users","",$where);
  if( count( $rowc ) > 0 ) { 	
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
   }	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","users","","".$where."limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","users","","".$where."limit 0,10");
    $count = 1;
	} 
if( count( $rowe ) > 0 ) { 
	foreach($rowe as $row){
?>	    
		<tr><td><?php echo $count;   ?> </td>  <td>  <img src="../uploads/<?php echo $row['user_p_photo'] ;  ?>" width="50px" height="40px" />  </td> 
		<td><?php echo $row['user_email'] ;  ?>  </td>  <td><?php echo $row['user_profile_name'] ;  ?>  </td>   <td><?php echo $row['user_suburb'] ;  					        ?> </td>   
        <td><?php echo $row['user_state'] ;  ?>  </td>   <td><a href="index.php?f=user&t=users&bid=<?php echo $row['status']; ?>&ubid=<?php echo $row['user_id']        ; ?>&act=act" class="btn bg-navy margin"><?php if($row['status'] == 0){ echo "Block"; } else { echo "unblock"; }?></a></td>
        <td> <a href="index.php?f=user&t=useraddedit&uid=<?php echo $row['user_id']; ?>&edi=edi" class="btn bg-navy margin">View/Edit</a></td>
        <td> <a href="index.php?f=user&t=users&uid=<?php echo $row['user_id']; ?>&del=del&act=act" class="btn bg-navy margin">DELETE</a></td>
         </tr>	
<?php 
		 $count++;
}
	}
$path = 'index.php?f=user&t=users';
echo '<tr><td align = "center" colspan = "6">'; 
echo paginate($path,$hold);
echo '</td></tr>'; 
}
/// cat_list function
function cat_list() {
if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$where = "where atr_cat like '%".$_REQUEST['search']."%'";
	//echo $where;
	}
	
else {
       $where = "";
}	
$rowc = runquery("SELECT","count(*)","artical_cat","",$where);
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","artical_cat","","".$where."limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","artical_cat","","".$where."limit 0,10");
    $count = 1;
	} 
	foreach($rowe as $row){
?>	    
		<tr>
			<td><?php echo $count;   ?></td>
			<td>
				<a><?php echo $row['atr_cat'];   ?> </a>
			</td>
			<td>
				<a href="index.php?f=content&t=artical_cat&uid=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
				<a href="index.php?f=content&t=artical_cat&uid=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
			</td>
		</tr>
<?php 
		 $count++;
	}
$path = 'index.php?f=user&t=users';
echo '<tr><td align = "center" colspan = "6">'; 
echo paginate($path,$hold);
echo '</td></tr>'; 
}
function saveordera() {
	foreach( $_POST['ord'] as $k => $ord) {
	    if($ord == "") {
		$sva = array("ord" =>"' '");
		}
		else {
		$sva = array("ord" => "'".$ord."'");
		}
		runquery("UPDATE","","artical",$sva,"where id = ".$k."");
		$_SESSION['smsg'] = "Order Change Successfully!";
		header('location:index.php?f=content&t=artical_list');
	}
}

function artical_list() {
 
if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$rowcs = runquery("SELECT","*","artical_cat");
	 if( count( $rowcs )>0 ) {
	foreach( $rowcs as $rcs) {
	      if( $rcs['atr_cat'] == $_REQUEST['search'] ){
		      $csid = $rcs['id'];
		  }
		  else {
		  }
	}
 }	
if( $_REQUEST['search'] == "publish" ) {
        $status = 1;
 }

 if( $_REQUEST['search'] == "unpublish" ) {
        $status = 0;
		//die();
 }

	if( isset( $csid ) ) {
		$where = "where title like '%".$_REQUEST['search']."%' or alias like '%".$_REQUEST['search']."%' or cat_id = ".$csid." ";
		
	}
	else {
     if( isset( $status ) ) {
	  $where = "where title like '%".$_REQUEST['search']."%' or alias like '%".$_REQUEST['search']."%' or status = ". $status." ";
	}
	else {
	 $where = "where title like '%".$_REQUEST['search']."%' or alias like '%".$_REQUEST['search']."%'";
	}	
	
	}
	//echo $where;
	}
	
else {
       $where = "";
}	
$rowc = runquery("SELECT","count(*)","artical","",$where);
if( count( $rowc ) > 0) {
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
}	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","artical","","".$where."limit 0,10");
    $count = 1;
	} ?>
	<form action="" method="post">
	<?php
 if( count($rowe) >0) {	
	foreach($rowe as $row){
	    $rowc = runquery("SELECT","atr_cat","artical_cat","","where id = ".$row['cat_id'].""); ?>
		<tr><td><?php echo $count;   ?> </td>  <td> <?php echo ( $rowc['0']['atr_cat'] == "" ) ? "Un-Categorized" : $rowc['0']['atr_cat']; ?> </td> <td> <?php echo $row['title'];   ?>  </td> 
		<td> <?php echo $row['alias'];   ?>  </td>   <td> <?php if( $row['status'] == 1){?><img src="images/check.jpg"/> <?php }else {?><img src="images/uncheck1.png"/> <?php }  ?>  </td>
		<td><input type = "text" name="ord[<?php echo $row['id'];?>]" value="<?php echo $row['ord'];?>" size = "1px"/></td>    
        
		<td>
			<a href="index.php?f=content&t=artical&aid=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
			<a href="index.php?f=content&t=artical&aid=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
		</td>
         </tr>	
		 
<?php 
		 $count++;
	} 
  }	?>
	
<?php	
$path = 'index.php?f=content&t=artical_list';
echo '<tr><td align = "center" colspan = "5">'; 
echo paginate($path,$hold);
echo '</td><td colspan="3">' ?>
<input type = "submit" name="saveorder" value="Save Order" class="btn btn-dark btn-xs"/></td></tr>
<?php
echo '<td></tr>'; 

	if( isset( $_POST['saveorder'] ) ) {
		saveordera();
	}
}

function getartical_cat() {
   $rowa = runquery("SELECT","*","artical_cat");
   return $rowa;
}
function getartical($catid) {
   $rowa = runquery("SELECT","*","artical","","where cat_id=".$catid."");
   return $rowa;
}
function show_menud(){
	$rowc = runquery("SELECT","count(*)","menu");
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","menu","","limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","menu","","limit 0,10");
    $count = 1;
	} 
  if( count( $rowe ) > 0 ) {	
	foreach($rowe as $row){
?>	    
<tr> 
<td><?php echo $count;   ?></td> 

<td><?php echo $row['title'];   ?></td>
<td style="min-width:200px"><?php  if($row['location'] == 1){ echo "Header Location";} else { echo "Bottom Location";}   ?></td> 
<td><a href="index.php?f=menu&t=menu&edit=<?php echo $row['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a> &nbsp; <a href="index.php?f=menu&t=menuac&act=act&id=<?php echo $row['id'];   ?>&del=del"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td>
 </tr>	
 

<?php 
		 $count++;
	}
}	
$path = 'index.php?f=menu&t=menu';
echo '<tr><td align = "center" colspan = "6">'; 
echo paginate($path,$hold);
echo '</td></tr>'; 
}
function get_menud($mid) {
   $rowa = runquery("SELECT","*","menu","","where id=".$mid."");
   return $rowa;
}
function get_menuad() {
   $rowa = runquery("SELECT","*","menu");
   return $rowa;
}
function saveorderb() {
	foreach( $_POST['ordering'] as $k => $ord) {
	    if($ord == "") {
		$sva = array("ordering" =>"' '");
		}
		else {
		$sva = array("ordering" => "'".$ord."'");
		}
		runquery("UPDATE","","banner",$sva,"where id = ".$k."");
		header('location:/donation/admin/index.php?f=banner&t=banner');
	}
}
function show_bannert(){
	$rowc = runquery("SELECT","count(*)","banner");
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","banner","","limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","banner","","limit 0,10");
    $count = 1;
	} 
	foreach($rowe as $row){?>
<tr> 
<td><?php echo $count;   ?></td> 
<td><?php  $mrow = get_menud($row['menu_id']);
            echo $mrow['0']['title'];
 ?></td>
<td> <a href="#login_form<?php echo $row['id']; ?>" id="login_pop"><img width="150" height="100" src = "<?php echo $row['banner_path'];   ?>" ></a>

<a href="#x" class="overlaya" id="login_form<?php echo $row['id']; ?>"></a>
</td>


<td ><input type="text" value="<?php echo $row['ordering'];   ?>" name="ordering[<?php echo  $row['id'];  ?>]" size = "1px"/></td>
<td>
	<a href="index.php?f=banner&t=banner&edit=<?php echo $row['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
	<a href="index.php?f=banner&t=bannerac&act=act&del=del&id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
</td>
</tr>	
<?php 
$level = 2;
$count++;
}	
$path = 'index.php?f=banner&t=banner';	
echo '<tr><td align = "center" colspan = "8">';
echo paginate($path,$hold);	                          
echo '</td></tr>';
	if( isset( $_POST['saveorder'] ) ) {
		saveorderb();
	}
}
function select_banner($bid){
 $rowa = runquery("SELECT","*","banner","","where id=".$bid."");
  return $rowa;
}
function get_newsletter_format(){
$rown = runquery("SELECT","*","newsletter_format","","where id = 1");
	if( count( $rown ) == 1) {
		return $rown['0'];
	}
	else {
		return $rown;
	}
 
}

function shownewsletteruser()
{

$rown = runquery("SELECT","*","newsletter");
//$df="select * from newsletter";
//$res=mysql_query($df);
if(count($rown)>0)
{
?><select name="newsuser[]" multiple="multiple"><?php 
foreach( $rown as $rows) {

?><option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Email : </strong><?php echo $rows['email']; ?>)&nbsp;&nbsp;&nbsp;<strong>Created Date : </strong><?php echo $rows['created_date']; ?></option><?php

}

?></select>

<?php

}

else

{
echo "No User subscribe for Newsletter";

}

}


function showjobscand()
{
if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$where = "where post like '%".$_REQUEST['search']."%' or name like '%".$_REQUEST['search']."%' or email like '%".$_REQUEST['search']."%' or phn_no like '%".$_REQUEST['search']."%' or city like '%".$_REQUEST['search']."%' or address like '%".$_REQUEST['search']."%'";
	//echo $where;
	}
	
else {
       $where = "";
}	
$rowc = runquery("SELECT","count(*)","jobsapply","",$where);
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","jobsapply","","".$where."limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","jobsapply","","".$where."limit 0,10");
    $count = 1;
	} 
if( count( $rowe ) > 0) {
	foreach($rowe as $row){
?>	    
<tr> 
<td><?php echo $count;   ?></td> 

<td> 
<?php echo $row['post'];   ?>
</td>
<td ><?php echo $row['name'];   ?></td>


<td ><?php echo $row['email'];   ?> </td>
<td ><?php echo $row['phn_no'];   ?> </td>
<td ><?php echo $row['address'];   ?> </td>
<td ><?php echo $row['city'];   ?> </td>
<td ><?php echo $row['dis_yourself'];   ?> </td>
<td><a href="../uploads/<?php  echo $row['attached'];  ?>" class="btn bg-olive margin">View Resume</a> </td>
<td><a href="index.php?f=carrer&t=carrer&id=<?php echo $row['id']; ?>&del=del&act=act" class="btn bg-navy margin">Delete</a> </td>
 </tr>	
<?php 
		 $count++;
	}
}	
$path = 'index.php?f=carrer&t=carrer';
echo '<tr><td align = "center" colspan = "6">'; 
echo paginate($path,$hold);
echo '</td></tr>'; 
}

function show_image() {

$rowc = runquery("SELECT","count(*)","imagegallary");
if( count( $rowc ) > 0) {
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
}	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","imagegallary","","limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","imagegallary","","limit 0,10");
    $count = 1;
	} ?>
	<form action="" method="post">
	<?php
 if( count($rowe) >0) {	
	foreach($rowe as $row){
	   ?>
		<tr><td><?php echo $count;   ?> </td>  <td> <td> <?php echo $row['title'];   ?>  </td> 
		  <td> <img src="<?php echo 'uploadimages/'.$row['image_name'].'';?> " style="width:100px;height:200px%"/> </td>
		  <td>
			<a href="index.php?f=imagegallary&t=imagegallary&edit=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
			<a href="index.php?f=imagegallary&t=imagegallary&id=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
		</td>
         </tr>	
		 
<?php 
		 $count++;
	} 
  }	?>
	
<?php	
$path = 'index.php?f=imagegallary&t=imagegallary';
echo '<tr><td align = "center" colspan = "5">'; 
echo paginate($path,$hold);
echo '<td></tr>'; 
}

function select_image($bid){
 $rowa = runquery("SELECT","*","imagegallary","","where id=".$bid."");
  return $rowa;
}
?>


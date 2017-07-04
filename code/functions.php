<?php
//include("con_db.php");

//**********************
function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//************************
function icon_name(){
	
$query="Select count(*) As num From category";
$res= mysql_query($query);
$row = mysql_fetch_array($res);
return $row['num']+1;

}
//**************************
function print_message($res, $success, $error){
 if($res){	
 
 echo "<script> alert('$success');</script>";
  }
 else
 {
 echo "<script> alert('$error');</script>";
 
}	
	
}
//******************************
function get_cat_title_by_id($id)
{
$query ="Select title From category Where id = '$id'";
$res = mysql_query($query);
return $row = mysql_fetch_array($res);

}
//************************
function get_p_cat_id_by_id($id)
{
$query ="Select perant_id From category Where id = '$id'";
$res = mysql_query($query);
return $row = mysql_fetch_array($res);

}
//**************************
function add_cat(){
if($_FILES["icon"]['tmp_name'] !=""){	

$image	=	$_FILES['icon']['tmp_name'];
			$imageName	=	$_FILES['icon']['name'];
			$extension = strtolower( pathinfo($imageName, PATHINFO_EXTENSION) );
			/*echo "<pre>"; print_r(getimagesize($image));
			echo "<pre>";print_r($_FILES['lfile']);
			 die();*/
			if( $_FILES['icon']['error'] > 0 )
			{
			 	$error[] = "There is some error in this Image: ".$imageName;	
			}else if( trim( $extension ) == "jpg" || trim( $extension ) == "jpeg" || trim( $extension ) == "png" )
			{
			
				$logoSize = ( $_FILES['icon']['size'] / 1024 );
				$logoInfo = getimagesize($image);
				$logoInfoW = $logoInfo[0];
				$logoInfoH = $logoInfo[1];
				if( $logoSize > 1024 )
				{
					$error[] = $imageName." Image Failed To Upload, Size should be max 1MB!";	
				}else
				{
					if( $logoInfoW < 800 || $logoInfoH < 250 )
					{
						$error[] = "For better logo quality please use (800*250) image for ".$imageName;	
					}
					
					$dimensions=imageresize( "400", "400", $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					
					
					$thumbPath="icon/".test_input(icon_name().$_FILES["icon"]['name']);
					//$thumbPath = JPATH_ROOT."/images/business/".$bussId."/images/logo.jpg";
					
					createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 50);
					
					}
					}
					
//$path="icon/".test_input(icon_name().$_FILES["icon"]['name']);

//move_uploaded_file ($_FILES['icon'] ['tmp_name'],$path);	
$query1="INSERT INTO `category` (`title`, `icon_path`, `perant_id`) values('".$_POST['cat_name']."', '".$thumbPath."', '".$_POST['p_cat']."')";
$res1=mysql_query($query1);		
	
print_message($res1, "Category Add SuccessFully.....", "Error..............");


}
else{
$query1="INSERT INTO `category` (`title`, `perant_id`) values('".$_POST['cat_name']."',  '".$_POST['p_cat']."')";
$res1=mysql_query($query1);		
	
print_message($res1, "Category Add SuccessFully.....", "Error..............");	
	
	
}

 }
//////////////// pagination ////////////// 	
/* 
function paginate($path,$hold) {

                         if( ( $hold%10 ) == 0 ){
                                 $total = $hold/10;
                           }
                       else {
                               $total = ($hold/10)+1;
                        }

                         $returnp =   '<ul class = "pagination">';
				               
								if( isset( $_REQUEST['vid']) && $_REQUEST['vid']>1 ) {
								
								$pre = $_REQUEST['vid']-1;
								
								$returnp = $returnp.'<li><a href = "'.$path.'?vid='.$pre.'">Previous</a></li>';
							   }
							   
							   
							  
							   for($i = 1;$i<=$total;$i++) {
							   
							   
							   $returnp = $returnp.'<li><a href = "'.$path.'?vid='.$i.'">'.$i.'</a></li>';
							   }
							    if( isset($_REQUEST['vid']) &&  $_REQUEST['vid']<( $total-1 ) ) {
							   
							    $nex = $_REQUEST['vid']+1;
							    
							   $returnp = $returnp.'<li><a href = "'.$path.'?vid='.$nex.'">Next</a></li>';
							   
							   }
							   $returnp = $returnp.'</ul>';
							
							   
							   return $returnp;


}



*/

//////////////////////////////////////////////////
function add_banner(){
if($_FILES["icon"]['tmp_name'] !=""){	

$path="banner/".test_input(icon_name().$_FILES["icon"]['name']);

move_uploaded_file ($_FILES['icon'] ['tmp_name'],
       $path);	
$query1="INSERT INTO `banner` (`banner_path`, `cat_id`) values('".$path."', '".$_POST['p_cat']."')";
$res1=mysql_query($query1);		
	
print_message($res1, "Banner Add SuccessFully.....", "Error..............");

}

else{
$query1="INSERT INTO `banner` (`cat_id`) values('".$_POST['p_cat']."')";
$res1=mysql_query($query1);		
	
print_message($res1, "Category Add SuccessFully.....", "Error..............");	
	
	
}

}

function imageresize($max_width,$max_height,$image){

		$dimensions=getimagesize($image);
		$width_percentage=$max_width/$dimensions[0];
		$height_percentage=$max_height/$dimensions[1];

		if($width_percentage <= $height_percentage){

		$new_width=$width_percentage*$dimensions[0];

		$new_height=$width_percentage*$dimensions[1];

		}else{

		$new_width=$height_percentage*$dimensions[0];

		$new_height=$height_percentage*$dimensions[1];

		}

		

		$new_image=array($new_width,$new_height);

		return $new_image;

	}
	
	function createThumbnail($img, $imgPath, $suffix, $newWidth, $newHeight, $quality,$imgtype="jpg")

	{
		//echo "<pre>"; print_r($img); die();
	  // Open the original image.
	
	
if($imgtype=="png")	
{

//echo	  $original = imagecreatefrompng("$img") or die("Error Opening original (<em>$imgPath/$img</em>)");
	
	 // list($width, $height, $type, $attr) = getimagesize("$img");
	
	
	
//	echo $tempImg.">".$height."/".$type."/".$attr;
	  // Resample the image.
	
	  //$tempImg = imagecreatetruecolor($newWidth, $newHeight) or die("Cant create temp image");
	
	  //imagecopyresized($tempImg, $original, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) or die("Cant resize copy");
	
	
	
	  // Save the image.
	
	//  imagepng($original, "$imgPath", $quality) or die("Cant save image");
	
	  //echo $tempImg.">".$height."/".$type."/".$attr;
	
	// die();
	
	  // Clean up.
	
	 // imagedestroy($original);
	
	//  imagedestroy($tempImg);
	
	 // return true;
	
 }
 
 else
 {
 	
	  $original = imagecreatefromjpeg("$img") or die("Error Opening original (<em>$imgPath/$img</em>)");
	
	  list($width, $height, $type, $attr) = getimagesize("$img");
	
	 
	
	  // Resample the image.
	
	  $tempImg = imagecreatetruecolor($newWidth, $newHeight) or die("Cant create temp image");
	
	  imagecopyresized($tempImg, $original, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) or die("Cant resize copy");
	
	 
	
	  // Save the image.
	
	  imagejpeg($tempImg, "$imgPath", $quality) or die("Cant save image");
	
	 
	
	  // Clean up.
	
	  imagedestroy($original);
	
	  imagedestroy($tempImg);
	
	  return true;
	  }
	
	}
	


function update_banner_replace()
{

if(isset($_POST['update_banner']))
{
if($_FILES["icon"]['tmp_name'] !=""){	

/*$path="banner/".test_input(icon_name().$_FILES["icon"]['name']);

move_uploaded_file ($_FILES['icon'] ['tmp_name'],
       $path);	*/
	   
	 
			$image	=	$_FILES['icon']['tmp_name'];
			$imageName	=	$_FILES['icon']['name'];
			$extension = strtolower( pathinfo($imageName, PATHINFO_EXTENSION) );
			/*echo "<pre>"; print_r(getimagesize($image));
			echo "<pre>";print_r($_FILES['lfile']);
			 die();*/
			if( $_FILES['icon']['error'] > 0 )
			{
			 	$error[] = "There is some error in this Image: ".$imageName;	
			}else if( trim( $extension ) == "jpg" || trim( $extension ) == "jpeg" )
			{
				$logoSize = ( $_FILES['icon']['size'] / 1024 );
				$logoInfo = getimagesize($image);
				$logoInfoW = $logoInfo[0];
				$logoInfoH = $logoInfo[1];
				if( $logoSize > 1024 )
				{
					$error[] = $imageName." Image Failed To Upload, Size should be max 1MB!";	
				}else
				{
					if( $logoInfoW < 1024 || $logoInfoH < 250 )
					{
						$error[] = "For better logo quality please use (1024*250) image for ".$imageName;	
					}
					if($_POST['position']=="homepage")
					{
					
					$dimensions=imageresize( $logoInfoW, $logoInfoH, $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					
					
					}
					else{
					$dimensions=imageresize( "1160", "400", $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					}
					
					$thumbPath="banner/".test_input(icon_name().$_FILES["icon"]['name']);
					//$thumbPath = JPATH_ROOT."/images/business/".$bussId."/images/logo.jpg";
					if($_POST['position']=="homepage")
					{
					
										createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 100);

					
					}
					else{
					createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 50);
					}
				}
			}else
			{
				$error[] = $imageName." Image Failed To Upload, Please check extesion!";	
			}
		  
	   
	   $query1="update `banner` set `banner_path`='".$thumbPath."' WHERE id='".$_GET['id']."'";
	   $res1=mysql_query($query1);	
	   }
	   if($_POST['position']=="homepage")
	   {
	  $query1="update `banner` set startingdate='".$_POST['startdate']."',enddate='".$_POST['enddate']."',ordering='".$_POST['ordering']."',position='".$_POST['position']."' WHERE id='".$_GET['id']."'";
$res1=mysql_query($query1);

	   }
	   else{
 $query1="update `banner` set buss_id='".$_POST['bussname']."',startingdate='".$_POST['startdate']."',enddate='".$_POST['enddate']."',ordering='".$_POST['ordering']."', `cat_id`='".$_POST['p_cat']."',position='".$_POST['position']."' WHERE id='".$_GET['id']."'";
$res1=mysql_query($query1);
//die();
}		
	//die();
print_message($res1, "Banner update SuccessFully.....", "Error..............");

}


}
function add_banner_replace(){

//echo "<pre>"; print_r($_POST);
if($_FILES["icon"]['tmp_name'] !=""){	

/*$path="banner/".test_input(icon_name().$_FILES["icon"]['name']);

move_uploaded_file ($_FILES['icon'] ['tmp_name'],
       $path);	*/
	   
	 
			$image	=	$_FILES['icon']['tmp_name'];
			$imageName	=	$_FILES['icon']['name'];
			$extension = strtolower( pathinfo($imageName, PATHINFO_EXTENSION) );
			/*echo "<pre>"; print_r(getimagesize($image));
			echo "<pre>";print_r($_FILES['lfile']);
			 die();*/
			if( $_FILES['icon']['error'] > 0 )
			{
			 	$error[] = "There is some error in this Image: ".$imageName;	
			}else if( trim( $extension ) == "jpg" || trim( $extension ) == "jpeg" )
			{
			
				$logoSize = ( $_FILES['icon']['size'] / 1024 );
				$logoInfo = getimagesize($image);
				$logoInfoW = $logoInfo[0];
				$logoInfoH = $logoInfo[1];
				if( $logoSize > 1024 )
				{
					$error[] = $imageName." Image Failed To Upload, Size should be max 1MB!";	
				}else
				{
					if( $logoInfoW < 1024 || $logoInfoH < 250 )
					{
						$error[] = "For better logo quality please use (1024*250) image for ".$imageName;	
					}
					if($_POST['position']=="homepage")
					{
					
					$dimensions=imageresize( $logoInfoW, $logoInfoH, $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					
					
					}
					else{
					$dimensions=imageresize( "1160", "400", $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					}
					
					$thumbPath="banner/".test_input(icon_name().$_FILES["icon"]['name']);
					//$thumbPath = JPATH_ROOT."/images/business/".$bussId."/images/logo.jpg";
					if($_POST['position']=="homepage")
					{
					
										createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 100);

					
					}
					else{
					createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 50);
					}
				}
			}else
			{
				$error[] = $imageName." Image Failed To Upload, Please check extesion!";	
			}
		  
	   
	   if($_POST['position']=="homepage")
	   {
	   
	    $query1="INSERT INTO `banner` (`banner_path`,position,ordering,startingdate,enddate) values('".$thumbPath."','".$_POST['position']."','".$_POST['ordering']."','".$_POST['startdate']."','".$_POST['enddate']."')";
$res1=mysql_query($query1);
//die();
	   
	   }
	   else{
	   
  $query1="INSERT INTO `banner` (`banner_path`,buss_id,startingdate,enddate,ordering, `cat_id`,position) values('".$thumbPath."','".$_POST['bussname']."','".$_POST['startdate']."','".$_POST['enddate']."','".$_POST['ordering']."', '".$_POST['p_cat']."','".$_POST['position']."')";
$res1=mysql_query($query1);
}		
//0 die();
	//die();
print_message($res1, "Banner Add SuccessFully.....", "Error..............");

}

else{
$query1="INSERT INTO `banner` (`cat_id`) values('".$_POST['p_cat']."')";
$res1=mysql_query($query1);		
	
print_message($res1, "Category Add SuccessFully.....", "Error..............");	
	
	
}

}


//**********************************

function show_admin_category(){
$query = "Select * From `category` Where `perant_id` = '0'";
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td><?php echo $count;   ?></td> 

<td><img width="40" height="40" src = "<?php echo $row['icon_path'];   ?>" ></td>
<td style="min-width:200px"><?php echo $row['title'];   ?></td> 
<td><a href="?edit=<?php  echo $row['id'];  ?>" class="btn bg-olive margin">Edit</a> &nbsp; <a href="code/delete_cat.php?id=<?php  echo $row['id'];  ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 
$level = 2;
get_sub_cat( $row['id'], $level);
$count++;
}	
	



}


/////////////////////////////////////////////

function show_admin_category_for_banner(){
$query = "Select * From `banner`";
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td><?php echo $count;   ?></td> 

<td><img width="200" height="200" src = "<?php echo $row['banner_path'];   ?>" ></td>
<td style="min-width:200px"><?php cat_name($row['cat_id']);   ?></td>
 
<td><a href="code/delete_banner.php?id=<?php  echo $row['id'];  ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 
$level = 2;
$count++;
}	
	



}


function show_admin_category_for_banner_replace(){

$qer = "select count(*) from banner";
$resultc = mysql_query($qer);
//echo $qer;
$rowc = mysql_fetch_array($resultc);
$hold = $rowc['count(*)'];

if(isset($_GET['vid']) && $_GET['vid']!="") {
$vid1 = ($_GET['vid']-1)*10;
//echo $vid1;
$query = "select * from  `banner` limit " .$vid1.",10";
//echo $query;
 $count= $vid1+1;
}
else {
$query = "select * from  `banner` limit 0,10";
//echo $query;
$count = 1;
} 
$res = mysql_query($query);
while($row = mysql_fetch_array($res)){
?>
	
<tr> 
<td><?php echo $count;   ?></td> 
<td ><?php echo $row['position'];   ?></td>
<td> <a href="#login_form<?php echo $row['id']; ?>" id="login_pop"><img width="150" height="100" src = "<?php echo $row['banner_path'];   ?>" ></a>

<a href="#x" class="overlaya" id="login_form<?php echo $row['id']; ?>"></a>
        <div class="popup">
            
<img style="width:100%; height:500px" src = "<?php echo $row['banner_path'];   ?>" >
            <a class="close" href="#close"></a>
        </div>
</td>
<td ><?php cat_name($row['cat_id']);   ?></td>
<td ><?php echo buss_name($row['buss_id']);   ?></td>
<td ><?php echo $row['startingdate'];   ?></td>
<td ><?php echo $row['enddate'];   ?></td>
<td ><input type="text" value="<?php echo $row['ordering'];   ?>" name="ordering[<?php echo  $row['id']  ?>]" /></td>
<?php if($row['position']=="homepage")
{ ?>
 <td><a href="?id=<?php  echo $row['id'];  ?>&p=<?php  echo $row['position'];  ?>">Edit</a></td><?php }else { ?>
 <td><a href="?edit=<?php echo  $row['cat_id'];  ?>&id=<?php  echo $row['id'];  ?>&p=<?php  echo $row['position'];  ?>">Edit</a></td><?php } ?>
<td><a href="code/delete_banner.php?id=<?php  echo $row['id'];  ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 
$level = 2;
$count++;
}	
$path = 'banner.php';	
echo '<tr><td align = "center" colspan = "8">';
//echo paginate($path,$hold);	                          
 echo '</td></tr>';


}

function saveorder()
{
if(isset($_POST['saveorder']) && $_POST['saveorder']!="" )
{
	foreach($_POST['ordering'] as $v=>$k)
	{
	
	$query = "update `banner` set ordering='".$k."' WHERE id='".$v."'";
$res = mysql_query($query);
	
	}



}

print_message($res, "Ordering Updated.....", "Error..............");	
}

function cat_name($cat_id)
{
$query = "Select title From `category` where id='$cat_id'";
$res = mysql_query($query);	
$row = mysql_fetch_array($res);
echo $row['title'];
}

function buss_name($buss_id)
{
$query = "Select bus_name From `business` where bus_id='$buss_id'";
$res = mysql_query($query);	
$row = mysql_fetch_array($res);
echo $row['bus_name'];
}


//***************************

function level($level){
$l="";
for($i=1; $i <= $level; $i++)
{
$l .= ' -';
}	
return $l;	
}


//**************************************

function get_sub_cat($id, $level)
{


$query = "Select * From `category` Where `perant_id` = '$id'";
$res = mysql_query($query);

while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td></td> 

<td><img width="40" height="40" src = "<?php echo $row['icon_path'];   ?>" ></td>
<td style="min-width:200px"><?php echo level($level).' '.$row['title'];   ?></td> 
<td><a href="?edit=<?php  echo $row['id'];  ?>" class="btn bg-olive margin">Edit</a> &nbsp; <a href="code/delete_cat.php?id=<?php  echo $row['id'];  ?>" class="btn bg-navy margin">Delete</a></td>
 
</tr>	
 
<?php 
$level = get_sub_cat($row['id'], $level+1 );

}		
return $level-1;	
}



//*******************************************

function get_drop_down_category()
{
if(isset($_GET['edit'])) {
$query = "Select * From `category` Where `perant_id` = '0' And id != '$_GET[edit]'";
}
else{
$query = "Select * From `category` Where `perant_id` = '0'";	
	}
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<option value="<?php echo $row['id']  ?>"> <?php echo $row['title']  ?>  </option>	
	
	
	
<?php
$level = 2;
get_drop_down_category_sub_cat( $row['id'], $level);

 }
	
	
}

//////////////////////////////////////////////
function get_drop_down_category_for_banner_replace()
{
 $query = "Select * From `category` Where `perant_id` = '0'";	

$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<option  <?php echo ( isset( $_GET['edit'] ) && $_GET['edit'] == $row['id'] ) ? 'selected="selected"' : ''  ?>  value="<?php echo $row['id']  ?>" > <?php echo $row['title']  ?>  </option>	
	
	
	
<?php
$level = 2;

 }
	
	
}

//*******************************************

function get_drop_down_package()
{

$query = "Select * From `package`";
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<option value="<?php echo $row['package_id']  ?>"> <?php echo $row['title']  ?>  </option>	
	
<?php
}


}

//************************************


function get_drop_down_category_sub_cat($id, $level)
{


$query = "Select * From `category` Where `perant_id` = '$id'";
$res = mysql_query($query);

while($row = mysql_fetch_array($res)){
?>	
<option value="<?php echo $row['id'];  ?>"> <?php echo level($level).' '.$row['title'];  ?>  </option>	

 
<?php 
$level = get_drop_down_category_sub_cat($row['id'], $level+1 );

}		
return $level-1;	
}

//************************
function total_num_cat(){
$query = "Select count(id) as no From `category` Where";
$res = mysql_query($query);	
$row = mysql_num_array();	
	
}

//*********************************

function add_menu(){
	
$query1="INSERT INTO `menu` (`title`, `location`, `link`) values('".$_POST['menu_name']."', '".$_POST['m_location']."', '".$_POST['menu_link']."')";
$res1=mysql_query($query1);		
	

print_message($res1, "Menu Add SuccessFully.....", "Error..............");	
	
	
	
	
}



//*********************************

function add_rules(){
	
$query="INSERT INTO `rules` (`title`, `package_id`) values('".$_POST['rules_name']."', '".$_POST['package']."')";
$res=mysql_query($query);		


print_message($res, "Rules Add SuccessFully.....", "Error..............");	
	
	
	
	
}

//***********************************************

function add_package(){
	
$query1="INSERT INTO `package` (`title`, `price`) values('".$_POST['package_name']."', '".$_POST['package_price']."')";
$res1=mysql_query($query1);		
	

print_message($res1, "Package Add SuccessFully.....", "Error..............");	
	
	
	
	
}



//***********************************************


function show_menu(){
	

$query = "Select * From `menu`";
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td><?php echo $count;   ?></td> 

<td><?php echo $row['title'];   ?></td>
<td style="min-width:200px"><?php  if($row['location'] == 1){ echo "Header";} else { echo "Bottom";}   ?></td> 
<td><a href="?edit=<?php echo $row['id'];   ?>" class="btn bg-olive margin">Edit</a> &nbsp; <a href="code/delete_menu.php?id=<?php echo $row['id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 

$count++;
}		
	
}


//*****************************************

function show_rules(){
	

$query = "Select * From `rules`";
$res = mysql_query($query);

$count =1;
while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td><?php echo $count;   ?></td> 

<td><?php echo $row['title'];   ?></td>
<td style="min-width:200px"><?php echo package($row['package_id']);   ?></td> 
<td><a href="?edit=<?php echo $row['rules_id'];   ?>" class="btn bg-olive margin">Edit</a> &nbsp; <a href="code/delete_rules.php?id=<?php echo $row['rules_id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 

$count++;
}		
	
}
function package($package_id)
{
	$query="select title from package where package_id=$package_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['title'];
}

//******************************************

function show_package(){
	

$query = "Select * From `package`";
$res = mysql_query($query);
$count =1;
while($row = mysql_fetch_array($res)){
?>	
<tr> 
<td><?php echo $count;   ?></td> 

<td><?php echo $row['title'];   ?></td>
<td style="min-width:200px"><?php echo $row['price'];?></td> 
<td><a href="?edit=<?php echo $row['package_id'];   ?>" class="btn bg-olive margin">Edit</a> &nbsp; <a href="code/delete_package.php?id=<?php echo $row['package_id'];   ?>" class="btn bg-navy margin">Delete</a></td>
 </tr>	
 
<?php 

$count++;
}		
	
}

//***********************

function location($l){
if($l == 1){ return "Header location";}	
	
	
}

//************user list********************************

/*function show_users()
{
$qer = "select count(*) from users";
$resultc = mysql_query($qer);
echo $qer;
$rowc = mysql_fetch_array($resultc);
$hold = $rowc['count(*)'];



if(isset($_GET['vid']) && $_GET['vid']!="") {
$vid1 = ($_GET['vid']-1)*10;
//echo $vid1;
$query = "select * from  `users` limit " .$vid1.",10";
//echo $query;
 $count= $vid1+1;
}
else {
$query = "select * from  `users` limit 0,10";
//echo $query;
$count = 1;
} 


$res = mysql_query($query);

while($row = mysql_fetch_array($res))
{
?>	
<tr><td><?php echo $count;   ?> </td>  <td>  <img src="../uploads/<?php echo $row['user_p_photo'] ;  ?>" width="50px" height="40px" />  </td> 

<td><?php echo $row['user_email'] ;  ?>  </td>  <td><?php echo $row['user_profile_name'] ;  ?>  </td>   <td><?php echo $row['user_suburb'] ;  ?>  </td>   
<td><?php echo $row['user_state'] ;  ?>  </td>   <td><a href="manageuser.php?bid=<?php echo $row['status']; ?>&&ubid=<?php echo $row['user_id']; ?>" class="btn bg-navy margin"><?php if($row['status'] == 0){ echo "Block"; } else { echo "unblock"; }?></a></td>
<td> <a href="manageuser.php?uid=<?php echo $row['user_id']; ?>&&edi=edi" class="btn bg-navy margin">View/Edit</a></td>
</tr>	


	
<?php 
$count++;
}


$path = 'users.php';
	echo '<tr><td align = "center" colspan = "6">'; 
    echo paginate($path,$hold);
    echo '</td></tr>'; 

}

*/

////////////////////////////////////////////////////////////////

function show_quote()
{
$query = "Select * From quote";	
$res = mysql_query($query);
$count=1;
while($row = mysql_fetch_array($res))
{
?>	
<tr><td><?php echo $count;   ?> </td>  <td><a class="btn bg-olive margin" href="sharequote.php?q=<?php echo $row['id']; ?>&b=<?php echo $row['bus_id']  ?>">Share This Quote</a></td> <td><?php echo $row['title'] ;  ?>  </td> 
<td><?php echo $row['mess'] ;  ?></td>  
<?php
if($row['user_id'] == "0")
{
?> 
<td><?php echo $row['name']."<br />"."(".$row['email'].")"; ?> </td> 
<?php 
}
else{
?>  
<td><?php echo get_user_name($row['user_id']);  ?> </td>  
<?php 
}
?> 
<td><?php echo get_bus_name($row['bus_id']);  ?>  </td>   
<td><?php echo "StartDate:-".$row['date']."<br>"; echo "EndDate:-".$row['endate']."";  ?>   </td>
 <td><a class="btn bg-olive margin" href="code/delquote.php?d=<?php echo $row['id']; ?>">Delete</a></td>

</tr>	
	
	
<?php 
$count++;
}
}
function get_user_name($user_id)
{
$query = "Select user_profile_name From users where user_id='$user_id'";	
$res = mysql_query($query);
$row = mysql_fetch_array($res);
return $row[0]."<br />(user)";
}
function get_bus_name($bus_id)
{
$query = "Select bus_name From business where bus_id='$bus_id'";	
$res = mysql_query($query);
$row = mysql_fetch_array($res);
return $row[0];
}
/////////////business////////////////////////////

function get_business()
{
	$qer = "select count(*) from  business";
$resultc = mysql_query($qer);
//echo $qer;
$rowc = mysql_fetch_array($resultc);
$hold = $rowc['count(*)'];

if(isset($_GET['vid']) && $_GET['vid']!="") {
$vid1 = ($_GET['vid']-1)*10;
//echo $vid1;
$query = "select * from  `business` limit " .$vid1.",10";
//echo $query;
 $count= $vid1+1;
}
else {
$query = "select * from  `business` limit 0,10";
//echo $query;
$count = 1;
} 	
$res = mysql_query($query);
while($row = mysql_fetch_array($res))
{
	
?>	
<tr><td><?php echo $count;   ?> </td>  <td>  <img src="" width="50px" height="40px" />  </td> 

<td><?php echo $row['bus_name'] ;  ?>  </td>  <td><?php getusername($row['user_id']); ?>  </td>   <td><?php getcategory($row['bus_id']);  ?>  </td>   
<td><a href="code/Blockbus.php?id=<?php echo $row['bus_id']; ?>" class="btn bg-navy margin"><?php if($row['status']=='1') { echo "Block"; } else {  echo "UnBlock";  } ?></a><a href="#" class="btn bg-navy margin">View Details</a></td>

</tr>	
	
	
<?php 
$count++;
}
    $path = 'business.php';
	echo '<tr><td align = "center" colspan = "6">';
	echo paginate($path,$hold);
	echo '</td></tr>';
}

function getusername($user_id)
{
	$query="select user_profile_name from users where user_id=$user_id";
	
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	echo $row['user_profile_name'];

}

function getcategory($bus_id)
{
	$query="select bus_industry from bus_sub_detail where bus_id=$bus_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	echo $row['bus_industry'];
}
//**********************************************
function add_class($page)
{
if( isset( $_REQUEST['f'] ) ) {
	if($_REQUEST['f'] == $page)
	{
		echo"class='active'";	
	}
}
	
	
}

//*************************************
function edit_cat($arg)
{
if(isset($_GET['edit'])) {

$query = "Select * From category Where id = $_GET[edit]"	;
$res = mysql_query($query);
$row = mysql_fetch_array($res);
 
 if($arg == "perant_id")
 {
?> 
<script>
$(document).ready(function(){
	
var myText = "<?php echo $row[$arg];  ?>";
var myText2 = "<?php echo $_GET[edit];  ?>";
$('#p_cat option[value="' + myText + '"]').prop('selected', true);	
	
}); 
</script>	 
<?php }
 else {
 echo $row[$arg];
 }




	
}}


//*************************************
function edit_rules($arg)
{
if(isset($_GET['edit'])) {

$query = "Select * From rules Where rules_id = $_GET[edit]"	;
$res = mysql_query($query);
$row = mysql_fetch_array($res);
 
 if($arg == "package_id")
 {
	 
?> 
<script>
$(document).ready(function(){
	
var myText = "<?php echo package($row[$arg]);  ?>";

$('#package option[value="' + myText + '"]').prop('selected', true);	
	
}); 
</script>	 
<?php }
 else {
 echo $row[$arg];
 }
	
}}


//*****************************************

function update_cat()
{
//echo "<pre>"; print_r($_FILES);
if($_FILES["icon"]['tmp_name'] !=""){	

	
if($_FILES["icon"]['tmp_name'] !=""){	

$image	=	$_FILES['icon']['tmp_name'];
			$imageName	=	$_FILES['icon']['name'];
			$extension = strtolower( pathinfo($imageName, PATHINFO_EXTENSION) );
			/*echo "<pre>"; print_r(getimagesize($image));
			echo "<pre>";print_r($_FILES['lfile']);
			 die();*/
			if( $_FILES['icon']['error'] > 0 )
			{
			 	$error[] = "There is some error in this Image: ".$imageName;	
			}else if( trim( $extension ) == "jpg" || trim( $extension ) == "jpeg" )
			{
			
				$logoSize = ( $_FILES['icon']['size'] / 1024 );
				$logoInfo = getimagesize($image);
				$logoInfoW = $logoInfo[0];
				$logoInfoH = $logoInfo[1];
				if( $logoSize > 1024 )
				{
					$error[] = $imageName." Image Failed To Upload, Size should be max 1MB!";	
				}else
				{
					if( $logoInfoW < 800 || $logoInfoH < 250 )
					{
						$error[] = "For better logo quality please use (800*250) image for ".$imageName;	
					}
					
					$dimensions=imageresize( "400", "400", $image );
					$newThumbWidth = $dimensions[0];
					$newThumbHeight = $dimensions[1];
					
					
					$thumbPath="icon/".test_input(icon_name().$_FILES["icon"]['name']);
					//$thumbPath = JPATH_ROOT."/images/business/".$bussId."/images/logo.jpg";
					
					createThumbnail( $image, $thumbPath, "-thumb", $newThumbWidth, $newThumbHeight, 50,$extension);
					
					}
					}
					
					else if(trim( $extension ) == "png")
					{
					$thumbPath="icon/".test_input(icon_name().$_FILES["icon"]['name']);
					
					move_uploaded_file($_FILES["icon"]["tmp_name"],
			$thumbPath);	
					
					}
					


$query1 = "Update category Set title = '$_POST[cat_name]', icon_path = '$thumbPath', perant_id = '$_POST[p_cat]'  Where id = $_POST[id] ";
$res1=mysql_query($query1);		
	
print_message($res1, "Category Add SuccessFully.....", "Error..............");


}
}
else{	
$query = "Update category Set title = '$_POST[cat_name]', perant_id = '$_POST[p_cat]'  Where id = $_POST[id] ";	
$res = mysql_query($query);
print_message($res, "Update SuccessFully.....", "Error..............");		
}
}




//*****************************************
//********************************

function update_rules()
{
	
$query = "Update rules Set title = '$_POST[rules_name]', package_id = '$_POST[package]' Where rules_id = $_POST[id] ";

$res = mysql_query($query);
print_message($res, "Update SuccessFully.....", "Error..............");		
	
}



//*************************************
function edit_menu($arg)
{
if(isset($_GET['edit'])) {

$query = "Select * From menu Where id = $_GET[edit]"	;
$res = mysql_query($query);
$row = mysql_fetch_array($res);
 
 if($arg == "location")
 {
?> 
<script>
$(document).ready(function(){
	
var myText = "<?php echo $row[$arg];  ?>";
var myText2 = "<?php echo $_GET[edit];  ?>";
$('#m_location option[value="' + myText + '"]').prop('selected', true);	
	
}); 
</script>	 
<?php }
 else {
 echo $row[$arg];
 }




	
}}

function edit_menu_option()
{
if(isset($_GET['edit'])) {

$query = "Select * From menu Where id = $_GET[edit]";
$res = mysql_query($query);
$row = mysql_fetch_array($res);
return $row['location']; 
 
}}


//*************************************
function edit_package($arg)
{
if(isset($_GET['edit'])) {

$query = "Select * From package Where package_id = $_GET[edit]"	;
$res = mysql_query($query);
$row = mysql_fetch_array($res);
 echo $row[$arg];
 }
}


//********************************

function update_menu()
{
$query = "Update menu Set title = '$_POST[menu_name]', location = '$_POST[m_location]',  link = '$_POST[menu_link]'  Where id = $_POST[id] ";	
$res = mysql_query($query);
print_message($res, "Update SuccessFully.....", "Error..............");		
	
}

//********************************

function update_package()
{
$query = "Update package Set title = '$_POST[package_name]', price = '$_POST[package_price]' Where package_id = $_POST[id] ";	
$res = mysql_query($query);
print_message($res, "Update SuccessFully.....", "Error..............");		
	
}


//**********************************************

function num_of_user( $table = "users" )
{
$query ="Select count(*) As num From ".$table;
$res = mysql_query($query);
$row = mysql_fetch_array($res);
echo $row['num'];	
	
}

//***********************************
function upload_logo()
{
if($_FILES["logo"]['tmp_name'] !=""){	
if($_FILES["logo"]['type'] != 'image/png')	{
	
echo'<script> alert("Select only Png File");     </script>';	
	
}
else{
$path="logo/logo.png";

$res = move_uploaded_file ($_FILES['logo'] ['tmp_name'],
       $path);	
print_message($res, "Upload SuccessFully.....", "Error..............");	
}
}

}

?>
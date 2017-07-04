<?php
/// pagination function
function emir($amt = "",$ir = "",$ten="")
			{
			$hole = 1+$ir /1200;
			$subea = pow($hole,$ten)-1;
			$subb = pow($hole,$ten);
			$subc = $amt*$ir/1200;
			$holde =  $subc *$subb;
			if($subea!=0)
			{
			$emim  =  round($holde/$subea);
			}
			else
			{
				$emim = 0;
			}
			return  $emim;
			}
function nuyear($period=array(),$month=array())
		{
		$perioda = $period-(12-$month);
		if($perioda!=$period)
		{
			$nyear = 1;
		}	
		$nyear+=floor($perioda/12);
		//echo $nyear;
		if($perioda%12 == 0){
		
		}
		else{
		$nyear++;
		}
			return $nyear;
		}
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
	  $where = "where title like '%".$_REQUEST['search']."%' or status = ". $status." ";
	}
	else {
	 $where = "where title like '%".$_REQUEST['search']."%'";
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
 $tablename = "financeuser";
 if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$where = "where financeuser.agreement_no like '%".$_REQUEST['search']."%' or f_name like '%".$_REQUEST['search']."%'";
//	echo $where;
	}
	
else {
       $where = "";
}	
	$rowc = runquery("SELECT","count(*)", $tablename,"",$where);
  if( count( $rowc ) > 0 ) { 	
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$query = "select * from financeuser INNER JOIN financestatement ON financeuser.agreement_no = financestatement.agreement_no ".$where." limit ".$vid1.",10";
	//echo $query;
	//die();
	$result = mysql_query($query);
	while( $rowa = mysql_fetch_assoc ($result)) 
	{
	$roweu[] = $rowa;
	}
	//echo "<pre>";
	//print_r($rowe);
    $count= $vid1+1;
	}
	else {
	$query = "select * from financeuser INNER JOIN financestatement ON financeuser.agreement_no = financestatement.agreement_no ".$where." limit 0,10";
	//echo $query;
	//die();
	
	
	$result = mysql_query($query);
	while( $rowa = mysql_fetch_assoc ($result)) 
	{
	$roweu[] = $rowa;
	}
	//echo "<pre>";
	//print_r($rowe);
	//die();
	//$rowe = runquery("SELECT","*", $tablename,"","".$where."limit 0,10");
    $count = 1;
	}
	if( count( $roweu ) > 0 ) { 
	foreach($roweu as $row){
	//echo "<pre>";
	//echo $row;
	//die();
	$calculatept =array();
	$rowe=array();
	$rowf = array();
	$calculatep = array();
	$rowam = array();
	$calculatepytr="";
	$calculatepytpr="";
	$calculatepytprp="";
	$tpenalty="";
	$penaltyt="";
	$pen_fin = 0;
		$query = "select * from financeuser INNER JOIN financestatement ON financeuser.agreement_no = financestatement.agreement_no  where financeuser.agreement_no = '".$row['agreement_no']."'";
					//$queryf = "SELECT STR_TO_DATE(finance_date, '%d/%m/%y') FROM financedetail";


					$queryf = "select * from financedetail where agreement_no = '".$row['agreement_no']."'" ;
					//echo $queryf ;
					//die();
					$resultf = mysql_query($queryf);
					while( $rowfa = mysql_fetch_assoc ($resultf)) 
	                {
	                  	$rowf[] = $rowfa;
					}
					//echo $query;
					//die();
					$result = mysql_query($query);
	                 while( $rowa = mysql_fetch_assoc ($result)) 
	                {
	                  	$rowe[] = $rowa;
					}
					//echo "<pre>";
					//print_r($rowf);
					//die();
					
					
			//echo  $rowe['0']['emi'];
			// function return emi 
			
			$emic =  emir($rowe['0']['amt_financed'],$rowe['0']['emi'],$rowe['0']['tenure']);
			//echo $emic;
			
	       $mper = $rowe['0']['emi']/(12*100);
		  // die();
	
	//echo $rowe['0']['amt_financed'];
		 // echo "ssff";
		//echo  $rowe['0']['emi'];
	    // echo pow(2,5);
		// die();
		// $hole = 1+$rowe['0']['emi']/1200;
		 //echo $hole;
		// die();
		// $subea =  pow($hole,50)-1;
		 //echo $subea; 
		// die();
		 //echo $subea;
		 //die();
		 //$subb =  pow($hole,50);
		// $subc = $rowe['0']['amt_financed']*$rowe['0']['emi']/1200;
		// $holde =  $subc *$subb;
		  //$emim  =   $holde/subea
		// echo $emim;
			//die('');
		 	//$total = $rowe['0']['emi']*$rowe['0']['tenure'];
		 	//echo $total;
		  //	$per  = (($total-$rowe['0']['amt_financed'])/$rowe['0']['amt_financed'])*100;
		  	
		  //echo "per";
		    //echo $per;
		  //echo $mper;
		   $install_fromto = $rowe['0']['install_from']; 
		   $year =   date('y',strtotime($rowe['0']['install_from']));
		   $month =  date('m',strtotime($rowe['0']['install_from']));
		   $day =  date('d',strtotime($rowe['0']['install_from']));
	       //$month = substr($install_fromto,0,2);
		   //$year =  substr($install_fromto,6);
		   //echo $year;
		   //echo $month;
		   //$yearnumber = $rowe['0']['tenure']/12;
		   //$yearmonth = $rowe['0']['tenure']%12;
		   //$month = $month+$yearmonth;
		  
		   
		   //echo $yearnumber; echo"ss";
		  // echo $yearmonth;
		  $period = (int)$rowe['0']['tenure'];
		  $counter = $month;
		  $rprincipal = $rowe['0']['amt_financed'];
		  $penalty = $rowe['0']['penalty'];
		  //echo $penalty;
		  //die();
		  for($i = 1;$i<=$period;$i++)
		  {
		
			
			if($counter>12)
			{
					
				$year = (int)$year+1;
				$month = 0;
				$counter = 0;
				$i--;
			}
			else
			{
				
					
					$months =  date('M',strtotime($year."-".$month."-".$day));
					$days =  date('d',strtotime($year."-".$month."-".$day));
					$calculatep["20".$year][$months]['mone'] = $months;
					$calculatep["20".$year][$months]['day'] = $days;
					//echo $months;	
					//die();
					$pen_fin = 0;
					foreach($rowf as $rowam)
					{
					
					  $fin_year = date('y',strtotime($rowam['finance_date']));
					  $fin_mont = date('M',strtotime($rowam['finance_date']));
					  $fin_date = date('d',strtotime($rowam['finance_date']));
					  $calculatef['date'] = $fin_date;
					  $pen_fin+=$rowam['pen_amount'];
					  
					   if ( $fin_mont == $months && $fin_year == $year)
					   {
					    if($rowam['amt_finance']>=$emic)
						{
					     $calculatep["20".$year][$months]['amountr']+=$emic;
						}
						else
						{
							$calculatep["20".$year][$months]['amountr']+=$rowam['amt_finance'];
						}
						 $calculatep["20".$year][$months]['dayf'] = $fin_date;
					    
					   }
					}
					
				
					
					 $calculatep["20".$year][$months]['interest'] = $rprincipal*$mper;
					 //$interest =  $rprincipal*$mper;
					 $calculatep["20".$year][$months]['rpr'] =  $emic-$calculatep["20".$year][$months]['interest'];
					 	if(isset($calculatep["20".$year][$months]['amountr']))
							{
								if(($calculatep["20".$year][$months]['amountr']-$calculatep["20".$year][$months]['interest'])>0)
								{
								  //echo $calculatep["20".$year][$months]['amountr'];
								  $rprincipal = $rprincipal-($calculatep["20".$year][$months]['amountr']-$calculatep["20".$year][$months]['interest']);
								  $calculatept["20".$year]['trinterest']+=$calculatep["20".$year][$months]['interest'];
								  $calculatept["20".$year]['trprincipal']+=($calculatep["20".$year][$months]['amountr']-$calculatep["20".$year][$months]['interest']);
								 // $calculatept["20".$year]['penalty']+=$calculatep["20".$year][$months]['penalty'];
								}
							}
					 //$rpr =       $emic-$interest;
					 //$rprincipal = $rprincipal-$calculatep["20".$year][$months]['rpr'];
					 
					 if($rprincipal>0)
					 {
					 $calculatep["20".$year][$months]['balance'] =  $rprincipal;
					 }
					 else
					 {
					 $calculatep["20".$year][$months]['balance'] = 0;
					 }
					 $calculatept["20".$year]['tinterest'] =  $calculatept["20".$year]['tinterest']+$calculatep["20".$year][$months]['interest'];
					
					 //$tinterest = $tinterest+$calculatep["20".$year][$months]['interest'];
					 $calculatept["20".$year]['trpr'] = $calculatept["20".$year]['trpr']+$calculatep["20".$year][$months]['rpr'];
					 $calculatept["20".$year]['tamountr']+=$calculatep["20".$year][$months]['amountr'];
					 
					 if($rprincipal>0)
					 {
						$calculatept["20".$year]['balance'] =   $rprincipal;
						$calculateptb = $rprincipal;
					 }
					 else
					 {
							$calculatept["20".$year]['balance'] =   0;
							$calculateptb = 0;
					 }
				
					
					
					 //$trpr = $trpr + $calculatep["20".$year][$months]['rpr'];
					 // echo floor($rpr);
					
				
					// echo floor($interest);
			
				
				//
					// $totalp = $calculatep["20".$year][$months]['interest'+$calculatep["20".$year][$months]['rpr'];
					
					 // echo  round($totalp);
					
					?>
				
					<?php //echo round($rprincipal); 
				     
				 } 
				       
					    
		
			
		
			$month++;
			$counter++;
		  }
		  //echo $calculatepytprp;
	//die();
		  
		 // echo "<pre>";
		// print_r($calculatep["20".$year]);
		  //print_r($calculatept);
		 // die();
		// print_r($calculate);
		 	$install_fromto = $rowe['0']['install_from']; 
		   $year =   date('y',strtotime($rowe['0']['install_from']));
		   $month =  date('m',strtotime($rowe['0']['install_from']));
		   $period = (int)$rowe['0']['tenure'];
		   $counter = $month;
		/**
		 * funtion to get number of year from month
		 *
		 * @param	$period	number of month
		 * @param 	$month	install date month
		 *
		 * @return	number of year
		 
		 */
		
		$nyeart = nuyear($period,$month);
		  for($i = 1;$i<=$nyeart;$i++)
		  {
		
		  	if( isset($calculatept["20".$year]['trinterest']))
			{
		  		$calculatepyt+=$calculatept["20".$year]['trinterest'];
			}
			if( isset($calculatept["20".$year]['trprincipal']))
			{
		  		$calculatepytp+=$calculatept["20".$year]['trprincipal'];
			}
			
	foreach($calculatep["20".$year] as $mont) 
	{
			 
	  if(isset($mont['dayf']) && $mont['dayf']!="")
	   { 
	  		  
		if($mont['day']<$mont['dayf'])
		{											  
		 $penaltyt["20".$year]+=$penalty;
		}
	
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']<2) {
					 $installp++;
		}
	} 
	
	else { if($year<date('y')){ $penaltyt["20".$year]+=$penalty;
					 $install++; } if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {  $penaltyt["20".$year]+=$penalty;
					 $install++; }
		 } 
		
	}	
		
			
			
			 $tpenalty+=$penaltyt["20".$year];
			
			
		  	$year++;
			
		
		  }
	
	
	
	 //$tpenalty = 	 $tpenalty-$pen_fin;
	
	
	
	
	
	
	
	
	
	
	
	
	
?>	    
		<tr>
			<td><?php echo $count;   ?> </td>
			<td><?php echo $row['agreement_no']; ?></td>	  
        
		<td><?php echo $row['f_name']; ?></td> <td><?php echo $row['amt_financed'];?><td><?php  echo floor($calculatepytpr);?></td><td><?php  echo floor($calculatepytr);?></td><td><?php echo $tpenalty; ?></td><td><?php echo floor($calculateptb);  ?></td>
		
        <td><a href="index.php?f=user&t=useraddedit&uid=<?php echo $row['id']; ?>&edi=edi&edit=edit&agreement_no=<?php echo $row['agreement_no']; ?>"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>View/Edit</a><a href="index.php?f=menu&t=menu&agreement_no=<?php echo $row['agreement_no']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Add Finance Detail </a><a href="index.php?f=user&t=users&viewhistory=viewhistory&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Check Report(R) </a><a href="index.php?f=user&t=usersf&viewhistory=viewhistory&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Check Report(F)</a><a href="index.php?f=user&t=pdf&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-trash-o" ></i> PDF(R) </a><a href="index.php?f=user&t=pdff&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-trash-o"></i> PDF(F) </a><a href="index.php?f=user&t=users&uid=<?php echo $row['id']; ?>&agreement_no=<?php echo $row['agreement_no']; ?>&del=del&act=act" class="btn btn-danger btn-xs" onclick = " return ConfirmDelete(<?php  echo $row['id']; ?>)"><i class="fa fa-trash-o"></i>DELETE</a></td>
         </tr>	
<?php 
		 $count++;
		
}
	}
$path = 'index.php?f=user&t=users';
echo '<tr><td align = "center" colspan = "10">'; 
echo paginate($path,$hold);
echo '</td></tr>'; 
   }	
   else
   {
   echo "No Result found";
   }
	 


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
function show_financedetail(){

if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ) { 
	$where = "where agreement_no like '%".$_REQUEST['search']."%' or receipt_no = '".$_REQUEST['search']."'";
	
//	echo $where;
	}
	
else {
       $where = "";
}	
$table = "financedetail";
	$rowc = runquery("SELECT","count(*)",$table);
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*",$table,"","".$where." limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	
	$rowe = runquery("SELECT","*",$table,"","".$where." limit 0,10");
	//die();
    $count = 1;
	} 
  if( count( $rowe ) > 0 ) {	
	foreach($rowe as $row){
?>	    
<tr> 
<td><?php echo $count;   ?></td> 

<td><?php echo $row['agreement_no'];?></td>
<td><?php echo $row['receipt_no'];?></td>
<td><?php  if($row['amt_finance'] == ""){ echo "0";} else{ echo $row['amt_finance']; }?></td>
<td><?php  if( $row['pen_amount'] == "") { echo "0";} else {echo $row['pen_amount'];}?> </td>
<td><?php  if( $row['od_recieve'] == "") { echo "0";} else {echo $row['od_recieve'];}?> </td>
<td><?php echo $row['finance_date'];?></td>
<td><a href="index.php?f=menu&t=menu&edit=<?php echo $row['id'];?>&agreement_no=<?php echo $row['agreement_no'];?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a> &nbsp; <a href="index.php?f=menu&t=menuac&act=act&id=<?php echo $row['id'];   ?>&del=del"  class="btn btn-danger btn-xs" onclick = " return ConfirmDelete(<?php  echo $row['id']; ?>)" ><i class="fa fa-trash-o"</i>Delete</a></td>
 </tr>	
 

<?php 
		 $count++;
	}
}	
$path = 'index.php?f=menu&t=menu';
echo '<tr><td align = "center" colspan = "8">'; 
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
<td> <a href="#login_form<?php echo $row['id']; ?>" id="login_pop"><img width="150" height="100" src = "banner/<?php echo $row['banner_path'];   ?>" ></a>

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

function show_faq() {

$rowc = runquery("SELECT","count(*)","faq");
if( count( $rowc ) > 0) {
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
}	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","faq","","limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","faq","","limit 0,10");
    $count = 1;
	} ?>
	<form action="" method="post">
	<?php
 if( count($rowe) >0) {	
	foreach($rowe as $row){
	   ?>
		<tr><td><?php echo $count;   ?> </td><td> <?php echo $row['title'];   ?>  </td> 
		  <td> <?php echo $row['ques'];  ?> </td>
		   <td> <?php echo $row['status']; ?> </td>
		  <td>
			<a href="index.php?f=faq&t=faqadd&edit=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
			<a href="index.php?f=faq&t=faq&id=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
		</td>
         </tr>	
		 
<?php 
		 $count++;
	} 
  }	?>
	
<?php	
$path = 'index.php?f=faq&t=faq';
echo '<tr><td align = "center" colspan = "5">'; 
echo paginate($path,$hold);
echo '<td></tr>'; 
}
function select_faq($bid){
 $rowa = runquery("SELECT","*","faq","","where id=".$bid."");
  return $rowa;
}
function show_newsletter() {

$rowc = runquery("SELECT","count(*)","newsletter");
if( count( $rowc ) > 0) {
	foreach($rowc as $row) {
		$hold = $row['count(*)'];
	}
}	
	if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$rowe = runquery("SELECT","*","newsletter","","limit ".$vid1.",10");
    $count= $vid1+1;
	}
	else {
	$rowe = runquery("SELECT","*","newsletter","","limit 0,10");
    $count = 1;
	} ?>
	<form action="" method="post">
	<?php
 if( count($rowe) >0) {	
	foreach($rowe as $row){
	   ?>
		<tr><td><?php echo $count;   ?> </td><td> <?php echo $row['title'];   ?>  </td> 
		  <td> <?php echo $row['subject'];  ?> </td>
		   
		  <td>
			<a href="index.php?f=newsletter&t=newsletteradd&edit=<?php echo $row['id']; ?>&edi=edi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View/Edit </a>
			<a href="index.php?f=newsletter&t=newsletter&id=<?php echo $row['id']; ?>&del=del&act=act" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
		</td>
         </tr>	
		 
<?php 
		 $count++;
	} 
  }	?>
	
<?php	
$path = 'index.php?f=newsletter&t=newsletter';
echo '<tr><td align = "center" colspan = "5">'; 
echo paginate($path,$hold);
echo '<td></tr>'; 
}
function select_newsletter($bid){
 $rowa = runquery("SELECT","*","newsletter","","where id=".$bid."");
  return $rowa;
}

function newsletter_user($con) {
$rowa = runquery("SELECT","*","newsletter_user","",$con);
 return $rowa;
}
function admin_setting() {
$rowa = runquery("SELECT","*","settinga");
return $rowa;
}

function select_mailsetting($con) {
$rowa = runquery("SELECT","*","mailsetting","","where id =".$con);
return $rowa;
}
function select_paymentsetting($con) {
$rowa = runquery("SELECT","*","paymentsetting","","where id =".$con);
return $rowa;
}

function select_tag() {
$rowa = runquery("SELECT","*","tags");
return $rowa;
}

?>


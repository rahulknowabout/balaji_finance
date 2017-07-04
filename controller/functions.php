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
	//print_r($roweu);
	//die();
	//$rowe = runquery("SELECT","*", $tablename,"","".$where."limit 0,10");
    $count = 1;
	}
	if( count( $roweu ) > 0 ) { 
	foreach($roweu as $row){
	//echo "<pre>";
	//print_r($row);
	//die();
	$calculatept =array();
	$rowe=array();
	$rowf = array();
	$calculatep = array();
	$rowam = array();
	$calculatepytr="";
	$calculatepytpr="";
	$calculatepytprp="";
	$calculatepytprp="";
	$calculatepyti="";
	$toverduecharges="";
	$overdduechargest="";
	$overduehc="";
	$overduecharges="";
	$yeardiff="";
	$monthyeardue="";
	$tilloverdue="";
	$tilloverduepr="";
	$ioverduec="";
	$tpenalty="";
	$penaltyt="";
	$pen_fin = 0;
		
					$query = "select * from financeuser INNER JOIN financestatement ON financeuser.agreement_no = financestatement.agreement_no  where financeuser.agreement_no = '".$row['agreement_no']."'";
					//$queryf = "SELECT STR_TO_DATE(finance_date, '%d/%m/%y') FROM financedetail";

					//echo $query;
					//die();
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
					$queryfv = "select * from vehicle where agreement_no = '".$row['agreement_no']."'";
					$resultv = mysql_query($queryfv);
					$rowv = mysql_fetch_array ($resultv);
					//echo $queryfv ;
					//echo "<pre>";
					//print_r($rowf);
					//die();
					
					
			//echo  $rowe['0']['emi'];
			// function return emi 
			
			$emic =  emir($rowe['0']['amt_financed'],$rowe['0']['emi'],$rowe['0']['tenure']);
			//echo $emic;
			//die();
			
	       $mper = $rowe['0']['emi']/(12*100);
		  //echo $mper;
		   //die();
	
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
		  
		  $overduecharges = $rowe['0']['overdue_charges'];
		 // echo $rprincipal;
		  //die();
		  $sqlsf = "select addition_amount from financedetail where agreement_no = '".$row['agreement_no']."'";
		   //echo  $sqlsf;
		  // die();
		  $resultsf = mysql_query($sqlsf);
		  while($rowsf = mysql_fetch_array($resultsf))
		  {
		  	$addition_am+=$rowsf['addition_amount'];
		  }
		  $lessmonth = floor($addition_am/$emic);
		  //echo $lessmonth;
		  //die();
		  $period =  $period-$lessmonth;
		  
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
					
					  $fin_year_f = date('y',strtotime($rowam['finance_date_f']));
					  $fin_mont_f = date('M',strtotime($rowam['finance_date_f']));
					  $fin_montn_f = date('m',strtotime($rowam['finance_date_f']));
					  $fin_date_f = date('d',strtotime($rowam['finance_date_f']));
					  if($fin_date_f == $days &&  $fin_mont_f == $months && $fin_year_f == $year)
					  {
					
					  $fin_year = date('y',strtotime($rowam['finance_date']));
					  $fin_mont = date('M',strtotime($rowam['finance_date']));
					  $fin_montn = date('m',strtotime($rowam['finance_date']));
					  $fin_date = date('d',strtotime($rowam['finance_date']));
					  $pen_fin+=$rowam['pen_amount'];
					  $calculatef['date'] = $fin_date;
					 
					  
					
					   	if($rowam['amt_finance']>$emic)
						{
					     $calculatep["20".$year][$months]['amountr']+=$emic;
						 $adam = $rowam['amt_finance']-$emic;
						 $dstring = $fin_montn."/". $fin_date."/20".$fin_year; 
						 
						 $sqlf = "update financedetail set addition_amount=".$adam." where agreement_no = '".$_GET['agreement_no']."' and finance_date='".$dstring ."'";
						 //echo $sqlf;
						 //die();
						 mysql_query($sqlf);
						}
						
						if($rowam['amt_finance']==$emic )
						{
							$calculatep["20".$year][$months]['amountr']+=$emic;
						}
						else
						{
							//$calculatep["20".$year][$months]['amountr']+=$rowam['amt_finance'];
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
								  $rprincipal = $rprincipal-($calculatep["20".$year][$months]['amountr']-$calculatep["20".$year][$months]['interest']);
								  $calculatept["20".$year]['trinterest']+=$calculatep["20".$year][$months]['interest'];
								   $calculatept["20".$year]['penalty']+=$calculatep["20".$year][$months]['penalty'];
								  $calculatept["20".$year]['trprincipal']+=($calculatep["20".$year][$months]['amountr']-$calculatep["20".$year][$months]['interest']);
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
		 // echo "<pre>";
		 // print_r($calculatept);
		 // die();
		 //echo $calculateptb;
		// print_r($calculatep);
		// die();
		  //print_r($calculatept);
		// print_r($calculate);
		 $install_fromto = $rowe['0']['install_from']; 
		   $year =   date('y',strtotime($rowe['0']['install_from']));
		   $month =  date('m',strtotime($rowe['0']['install_from']));
		   //$period = (int)$rowe['0']['tenure'];
		   $counter = $month;
		  
		 // echo $period;
		  //die();
		/**
		 * funtion to get number of year from month
		 *
		 * @param	$period	number of month
		 * @param 	$month	install date month
		 *
		 * @return	number of year
		 
		 */
		$install = 0;
		$installp = 0;
		$installt = 0;
		$nyeart = nuyear($period,$month);
		//echo $nyeart;
		//die();
;
		for($i = 1;$i<=$nyeart;$i++)
		{
		
		  	if( isset($calculatept["20".$year]['trinterest']))
			{
		  		$calculatepyti+=$calculatept["20".$year]['trinterest'];
			}
			if( isset($calculatept["20".$year]['trprincipal']))
			{
		  		$calculatepytprp+=$calculatept["20".$year]['trprincipal'];
			}
			
	foreach($calculatep["20".$year] as $mont) 
	{
		$installt++;
			  
			  
			   	                        if($year<date('y'))
																{
																	$yeardiff = date('y')-$year;
																	$monthyeardue = 12*$yeardiff;
																    $realstr = date('m',strtotime($mont['mone']));
																	$realstr = $realstr+1;
																	$tilloverdue = $monthyeardue - $realstr;
																	
																	$tilloverduepr = date('m')-1;
																	$tilloverdue = $tilloverdue + $tilloverduepr;
																	 if($mont['day']<date('d'))
																	 {
																	 	$tilloverdue++;
																	 }
																	
																}
																else
																{
																
																$tilloverdue = date('m')-((date('m',strtotime($mont['mone'])))+1);
																 if($mont['day']<date('d'))
																	 {
																	 	$tilloverdue++;
																	 }
																}
																//echo $tilloverdue;
																$ioverduec = 0;
																		for($ioverdue = 1;$ioverdue<=$tilloverdue;$ioverdue++)
																		{
																	 if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=(date('m',strtotime($mont['mone'])))+1) { $ioverduec++;} else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ $ioverduec++;} }  else { if($year<date('y')){	  $ioverduec++;} if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {   $ioverduec++;
																	 }} }
																		
																		}
																//echo $ioverduec;
																//die();
																$overduehc = $penalty;
																$overdueam = 0;
																
																  if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=(date('m',strtotime($mont['mone'])))+1) { for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100);
															   $overduehc+=(($overduehc*$overduecharges)/100); } $overdduechargest["20".$year]+=  round($overdueam); } else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100); $overduehc+=(($overduehc* $overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);} }  else { if($year<date('y')){	 for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc* $overduecharges)/100);$overduehc+=(($overduehc* $overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);} if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {   for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100); $overduehc+=(($overduehc*$overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);}} } 
			  
			  
			
			  
			  
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
		
			
			//echo $calculatepytprp;
			 $tpenalty+=$penaltyt["20".$year];
			$toverduecharges+=$overdduechargest["20".$year];
			
		  	$year++;
			
		
		  }
		  
		    //die();
			  //echo $calculatepytprp;
			  //print_r($overdduechargest);
			  //die();
		  $tinstallmentdue = $install*$emic;
		  $tinstallmentpaid = $installp*$emic;
		  $tinstallment = $installt*$emic;
		  $finstallmentpaid = $tinstallment-($tinstallmentdue+$tinstallmentpaid);
		 // echo "<pre>";
		  //print_r($calculatep["20".$year]);
		 // die();
		 $install_tod = date('d',strtotime($rowe['0']['install_from']));
		 $install_tom = date('m',strtotime($rowe['0']['install_from']));
		 $install_toy = date('y',strtotime($rowe['0']['install_from']));
		 
	      $toyear = floor($period/12);
		  $tomonth = $period%12;
		  $tomonth+=($install_tom-1);
		  if($tomonth>12)
		  {
		  	$toyear++;
			$tomonth = $tomonth-12;	
		  
		  }
		  $toyear+=$install_toy;
	
	 //$tpenalty = 	 $tpenalty-$pen_fin;
	
	
	
	
	
	
	
	
	
	
	
	
	
?>	    
		<tr>
			<td><?php echo $count;   ?> </td>
			<td><?php echo $row['agreement_no']; ?></td>	  
        
		<td><?php echo $row['f_name']; ?></td> <td><?php echo $row['amt_financed'];?></td><td><?php if($tomonth<10) { echo date('d/m/Y',strtotime($rowe['0']['install_from']))." to ".$install_tod."/0".$tomonth."/20".$toyear;}else { echo date('d/m/Y',strtotime($rowe['0']['install_from']))." to ".$install_tod."/".$tomonth."/20".$toyear; }?><td><?php  echo floor($calculatepytprp);?></td><td><?php  echo floor(	$calculatepyti);?></td><td><?php echo $tpenalty; ?></td><td><?php echo $toverduecharges;?></td><td><?php echo floor($calculateptb);  ?></td>
		
        <td><a href="index.php?f=user&t=useraddedit&uid=<?php echo $row['id']; ?>&edi=edi&edit=edit&agreement_no=<?php echo $row['agreement_no']; ?>"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>View/Edit</a><a href="index.php?f=menu&t=menu&agreement_no=<?php echo $row['agreement_no']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Add Finance Detail </a><a href="index.php?f=user&t=users&viewhistory=viewhistory&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Check Report(R) </a><a href="index.php?f=user&t=usersf&viewhistory=viewhistory&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Check Report(F)</a><a href="index.php?f=user&t=pdf&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-trash-o" ></i> PDF(R) </a><a href="index.php?f=user&t=pdff&agreement_no=<?php echo $row['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-trash-o"></i> PDF(F) </a><a href="index.php?f=user&t=users&uid=<?php echo $row['id']; ?>&agreement_no=<?php echo $row['agreement_no']; ?>&del=del&act=act" class="btn btn-danger btn-xs" onclick = " return ConfirmDelete(<?php  echo $row['id']; ?>)"><i class="fa fa-trash-o"></i>DELETE</a></td>
         </tr>	
<?php 
		 $count++;
		
}
	}
$path = 'index.php?f=user&t=users';
echo '<tr><td align = "center" colspan = "15">'; 
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


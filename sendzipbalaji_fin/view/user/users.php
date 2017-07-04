<head>
<style>
#ptad{

width: 420px;
height: 25px;
padding:10px;




}
</style>
<script>

function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if(x)
  {
      return x;
  }	  
  else
  {
    return x;
  }	
}


/*<input type="button" Onclick="ConfirmDelete()">*/
</script>
</head>

<div class="">
	<div class="page-title">
		<div class="title_left">
			<?php if(isset($_GET['viewhistory'])) {echo "<h3>User<small>History(Reduced)</small></h3>";} else {echo "<h3>User<small>Listing</small></h3>"; }?>
		</div>

		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
				<?php if(isset($_GET['viewhistory'])) { ?><span><a href="index.php?f=user&t=users"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>UserListing</a><span><a href="index.php?f=user&t=useraddedit&uid=<?php echo $_REQUEST['id']; ?>&edi=edi&agreement_no=<?php echo  $_REQUEST['agreement_no']; ?>"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>View/Edit</a></span><span><a href="index.php?f=menu&t=menu&agreement_no=<?php echo  $_REQUEST['agreement_no']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Add Finance Detail </a></span><span><a href="index.php?f=user&t=usersf&viewhistory=viewhistory&agreement_no=<?php echo $_REQUEST['agreement_no']; ?>&calculatepyt=<?php echo  floor($calculatepytr);?>&calculatepytp=<?php echo floor($calculatepytpr); ?>&pent=<?php echo  $tpenalty;?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> Check Report(F)</a></span><span><a href="index.php?f=user&t=pdf&agreement_no=<?php echo $_REQUEST['agreement_no']; ?>&calculatepyt=<?php echo  $_REQUEST['calculatepyt'];?>&calculatepytp=<?php echo $_REQUEST['calculatepytp']; ?>&pent=<?php echo  $_REQUEST['pent']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i>PDF(R)</a><a href="index.php?f=user&t=pdff&agreement_no=<?php echo $_REQUEST['agreement_no']; ?>&calculatepyt=<?php echo  $_REQUEST['calculatepyt'];?>&calculatepytp=<?php echo $_REQUEST['calculatepytp']; ?>&pent=<?php echo  $_REQUEST['pent']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i>PDF(F)</a></span><?php } else { ?>
					<form action="index.php?f=user&t=users" method="post">
						<input type="text" class="form-control" value="<?php if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ){echo                         $_REQUEST['search']; } ?>" name="search" id="search" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Go!</button>
						 </span>
			  </form>
				<?php } ?>	
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
				
					<h2><?php if(isset($_GET['viewhistory'])) { 
					
					
					
					
					  echo "User History(Reduced)";}else {echo "User's Pages"; }?></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?f=user&t=useraddedit">Add User</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
					<?php if(isset($_GET['viewhistory'])) {
					
					$query = "select * from financeuser INNER JOIN financestatement ON financeuser.agreement_no = financestatement.agreement_no  where financeuser.agreement_no = '".$_GET['agreement_no']."'";
					//$queryf = "SELECT STR_TO_DATE(finance_date, '%d/%m/%y') FROM financedetail";


					$queryf = "select * from financedetail where agreement_no = '".$_GET['agreement_no']."'" ;
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
					$queryfv = "select * from vehicle where agreement_no = '".$_GET['agreement_no']."'";
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
		  $overduecharges = $rowe['0']['overdue_charges'];
		  $sqlsf = "select addition_amount from financedetail where agreement_no = '".$_GET['agreement_no']."'";
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
		 //print_r($calculatep);
		 //die();
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
		  		$calculatepyt+=$calculatept["20".$year]['trinterest'];
			}
			if( isset($calculatept["20".$year]['trprincipal']))
			{
		  		$calculatepytp+=$calculatept["20".$year]['trprincipal'];
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
		
			
			
			$tpenalty+=$penaltyt["20".$year];
			$toverduecharges+=$overdduechargest["20".$year];
			
		  	$year++;
			
		
		  }
		  
		    
			  //echo "<pre>";
			  //print_r($overdduechargest);
			// die();
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
		  
		  if($rowe['0']['landline1'] != "")
						{
							 $landline = "Ph:".$rowe['0']['landline1']."";
						}
						
						if($rowe['0']['landline2'] != "")
						{
							 $landline = " Ph:".$rowe['0']['landline2']."";
						}
						
						if($rowe['0']['landline1'] != "" && $rowe['0']['landline2'] != "")
						{
						 $landline = " Ph:".$rowe['0']['landline1'].",".$rowe['0']['landline2']."";
						}
						
						if($rowe['0']['mobile1'] != "")
						{
								 $mobile = "<br/>Mobile:".$rowe['0']['mobile1']."";
						}
						if($rowe['0']['mobile2'] != "")
						{
								 $mobile = "<br/>Mobile:".$rowe['0']['mobile2']."";
						}
						
						if($rowe['0']['mobile1'] != "" && $rowe['0']['mobile2'] != "")
						{
						 $mobile = "<br/>Mobile:".$rowe['0']['mobile1'].",".$rowe['0']['mobile2']."";
						}
	
		 //echo $toyear;
		 //die();
		 
		
		 //echo  $_GET['pent'];
		 //echo $pen_fin;
		 //die();
		 $totalamount = $tinstallmentdue+$finstallmentpaid+$tinstallmentpaid;
		  ?>
					
	<table>
 	<tr>
		<td>
 	<tr>
		<td colspan="2"><?php echo $rowe['0']['f_name']." ".$rowe['0']['m_name']." ".$rowe['0']['l_name'];?></td>
	</tr>
	
	<tr>
	<td colspan="5">
			<hr/>
			
	</td>
	</tr>
	
	<tr>
		<td><?php echo "Current Address - ".$rowe['0']['c_address']."<br/>".$rowe['0']['c_city']."-".$rowe['0']['c_pincode'].",".$rowe['0']['c_state']."<br/>".$landline."".$mobile."";?></td>
	</tr>
	<tr>
	<td colspan="5">
			<hr/>
			
	</td>
	</tr>
	<tr>
		<td><?php echo "Permanent Address - ".$rowe['0']['p_address']."<br/>".$rowe['0']['p_city']."-".$rowe['0']['p_pincode'].",".$rowe['0']['p_state'];?></td>
	</tr>
	<tr>
			<td colspan="5">
			<hr/>
			
			</td>
	</tr>
	<tr>
		<td><?php echo "Office Address - ".$rowe['0']['o_address']."<br/>".$rowe['0']['o_city']."-".$rowe['0']['o_pincode'].",".$rowe['0']['o_state'];?></td>
	</tr>
	<tr>
			<td colspan="5">
			<hr/>
			
			</td>
	</tr>
	
	<tr>
			<td>
				Reference1
			</td>
			<td>
			<table>
			<tr>
			<td>
				<?php echo $rowe['0']['r1_name'].""?>
			</td>
			</tr>
			<tr>
			<td>
				<?php echo $rowe['0']['r1_address'].""?>
			</td>
			</tr>
			<tr>
			<td>
				<?php echo $rowe['0']['r1_mobile'].""?>
			</td>
			</tr>
			
			</table>
			</td>	
			</tr>
			<tr>
			<td colspan="5">
			<br/>
			
			</td>
			</tr>
			<tr>
				<td>
				Reference2
				</td>
				<td>
			<table>
			<tr>
			<td>
				<?php echo $rowe['0']['r2_name'].""?>
			</td>
			</tr>
			<tr>
			<td>
				<?php echo $rowe['0']['r2_address'].""?>
			</td>
			</tr>
			<tr>
			<td>
				<?php echo $rowe['0']['r2_mobile'].""?>
			</td>
			</tr>
			
			</table>
			</td>	
			</tr>
			<tr>
			<td colspan="5">
			<hr/>
			
			</td>
			</tr>
			<tr>
				<td>
					Dealer Name
				</td>
				<td>
				<?php echo $rowv['v_d_name'];?>
				</td>
			</tr>	
			<tr>
				<td>
					Dealer Reference
				</td>
				<td>
				<?php echo $rowv['v_reference'];?>
				</td>
			</tr>	
		<tr>
		<td> <h4>Agreement No:</h4></td>
		
		<td><?php echo $rowe['0']['agreement_no'];?></td>
		
		</td>
	    </tr>
	
			
			

	
	</table>
	
	<hr/>
	<table border="1">
	
		
		
			
	</tr>
	<tr>
		<td  id = "ptad"><b>Location</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['branch'];?></td>
		<td  id = "ptad">
		<b>Amt Financed (Rs)</b>
		</td>
		<td  id = "ptad"><?php  echo $rowe['0']['amt_financed'];?></td>
	</tr>
	<tr>
		<td  id = "ptad"><b>Product</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['product'];?></td>
		<td  id = "ptad"><b>Total Amount(Principal+Interest)</b> </td>
		<td  id = "ptad"><?php echo $totalamount; ?></td>
		
	</tr>
	<tr>
		
		<td id = "ptad"><b>Asset Desc</b></td>
		<td id = "ptad"><?php echo $rowe['0']['asset_desc'];?></td>
	    <td  id = "ptad"><b>Instalment Due (Rs):</b> </td>
	   <td  id = "ptad"><?php echo $tinstallmentdue; ?></td>
	</tr>
	<tr>
		<td id = "ptad"><b>Regn.No.</b></td>
		<td id = "ptad"><?php echo $rowe['0']['reg_no'];?></td>
		<td  id = "ptad"><b>Penalty Due (Rs): </b></td>
		<td  id = "ptad"><?php  echo $tpenalty;?></td>
	</tr>
	<tr>
		<td id = "ptad"><b>Disbursal Date</b></td>
		<td id = "ptad"><?php echo date('d/m/Y',strtotime($rowe['0']['disbursal_date']));?></td>
		<td  id = "ptad"><b>OD Charges Due (Rs):</b> </td>
		<td  id = "ptad"><?php echo $toverduecharges;?></td>
	</tr>
	<!--
	<tr>
		<td>Interest Rate Type:</td>
		<td><?php //echo $rowe['0']['interest_rate_type'];?></td>
	</tr>-->
	<tr>
	
		<td  id = "ptad"><b>Interest Rate Type</b></td>
		<td  id = "ptad">Fixed</td>
		<td  id = "ptad"><b>Net Receivable (Rs)</b> </td>
		<td  id = "ptad"><?php echo $tpenalty+$tinstallmentdue+$toverduecharges; ?></td>
	</tr>
	<!--<tr>
		<td>Customer IRR:</td>
		<td><?php //echo $rowe['0']['customer_irr'];?></td>
	</tr>
	-->
	<tr>
	<td  id = "ptad"><b>Tenure:</b></td>
	<td  id = "ptad"><?php echo $rowe['0']['tenure'];?></td>
		
	<td  id = "ptad"><b>Future installments (Rs)</b> </td>
	<td  id = "ptad"><?php echo $finstallmentpaid; ?></td>
	</tr>
	<tr>

		<td  id = "ptad"><b>Frequency</b></td>
		<td  id = "ptad">Monthly EMIs</td>
		<td  id = "ptad"><b>Instalment Paid (Rs)</b> </td>
		<td  id = "ptad"><?php echo $tinstallmentpaid; ?></td>
	</tr>
	<tr>
	
		<td  id = "ptad"><b>Rate of Interest</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['emi'];?></td>
		<td  id = "ptad"><b>Principal Paid (Rs):</b> </td>
		<td  id = "ptad"><?php  echo floor($calculatepytp);?>
		
	</tr>
	<tr>
	<td  id = "ptad"><b>Instl Period </b></td>
		<td  id = "ptad"><?php if($tomonth<10) { echo date('d/m/Y',strtotime($rowe['0']['install_from']))." to ".$install_tod."/0".$tomonth."/20".$toyear;} else { echo date('d/m/Y',strtotime($rowe['0']['install_from']))." to ".$install_tod."/".$tomonth."/20".$toyear; }?></td>
		
		<td  id = "ptad"><b>Insterest Paid (Rs)</b></td>
		<td  id = "ptad"><?php  echo floor($calculatepyt);?></td>
	</tr>
	
	<tr>
	<td  id = "ptad"><b>Repayment Mode</b></td>
	<td  id = "ptad"><?php echo $rowe['0']['repayment_mode'];?></td>
	<td  id = "ptad"><b>EMI (Rs):</b> </td>
	<td  id = "ptad"><?php echo $emic; ?></td>
		
		
		<!--<td>Total Recieved Principal</td>
		<td><?php  echo floor($calculatepytp);?></td>-->
	</tr>
	<tr><td  id = "ptad"><b>Instalment Plan</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['installment_plan'];?></td>
		<td  id = "ptad"><b>Status</b></td>
		<td  id = "ptad"><?php if($finstallmentpaid == 0 && $tinstallmentdue == 0 && $tpenalty == 0){ echo "Close";}else{echo "Active";} ?></td>
		
		<!--<td>Total Recieved Interest</td>
		<td><?php  echo floor($calculatepyt);?></td>-->
	</tr>
	<!--
	<tr>
		<td>Total Penalty</td>
		<td><?php  echo $tpenalty;?></td>
	</tr>
	<tr>
		<td>Total Balance</td>
		<td><?php  echo floor($calculateptb);?></td>
	</tr>
	-->
	</td>
	<?php
		  
		   //echo $counter;
		  // echo $period;
		   //die();
		 //echo "<pre>";
		 //print_r($calculatep);
		// die();
	?>
	<div class="x_content">
	<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
	<div>
		<table>
		<tr>
			<th id = "ptad">Year</th><th id = "ptad">Principal</th><th id = "ptad">Interest</th><th id = "ptad">EMI</th><th id = "ptad">Received EMI</th><th id = "ptad">Penalty</th><th  id = "ptad">Overdue Charges</th><th id = "ptad">Balance</th>
			
		</tr>
		</table>
		</div>
		<?php
		
		  $install_fromto = $rowe['0']['install_from']; 
		   $year =   date('y',strtotime($rowe['0']['install_from']));
		   $month =  date('m',strtotime($rowe['0']['install_from']));
		   //$period = (int)$rowe['0']['tenure'];
		  // $counter = $month;
		   $nyear = nuyear($period,$month);
		//echo $nyear;
		//die();
		
		  for($i = 1;$i<=$nyear;$i++)
		  {
			
		
					
					
					
			?>
			
                                        
                                         <div class="panel">
                                            <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#heading<?php  echo ""."20".$year; ?>" aria-expanded="false" aria-controls="collapse<?php  echo ""."20".$year; ?>">
                                                <h4 class="panel-title"><table><tr  ><td id = "ptad"><?php  echo ""."20".$year; ?></td><td id = "ptad"><?php   echo floor($calculatept["20".$year]['trpr']); ?></td><td id = "ptad"><?php echo floor($calculatept["20".$year]['tinterest']); ?></td><td id = "ptad"><?php  echo floor($calculatept["20".$year]['trpr']+$calculatept["20".$year]['tinterest']);?></td><td id = "ptad"> <?php echo $calculatept["20".$year]['tamountr'];?></td><td id = "ptad"><?php if($penaltyt["20".$year] == ""){echo "0";} else {echo $penaltyt["20".$year];} ?></td><td id = "ptad"><?php if($overdduechargest["20".$year] == ""){ echo "0";}else{echo $overdduechargest["20".$year];} ?></td><td id = "ptad"><?php  echo floor($calculatept["20".$year]['balance']); ?></td></tr></table></h4>
                                            </a>
										
                                            <div id="heading<?php  echo ""."20".$year; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
												
                                                    <table class="table table-bordered">
                                                       <thead>
                                                            <tr>
                                                              <th id = "ptad">Month</th><th id = "ptad">Principal</th><th id = "ptad">Interest</th><th id = "ptad">EMI</th><th id = "ptad">Recieved EMI</th><th  id = "ptad">Penalty</th><th  id = "ptad">Overdue Charges</th><th id = "ptad">Balance</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
														<?php 
														 foreach($calculatep["20".$year] as $mont) 
															  {  
															 // echo date('m',strtotime($mont['mone'])); 
															 // echo $mont['day'];
														?>
															 
															
											<tr>
															 
                                                               <td> <?php echo $mont['mone'];?> </td>
                                                               <td> <?php echo floor($mont['rpr']);?> </td>
                                                               <td> <?php echo floor($mont['interest']);?> </td>
															   <td> <?php echo floor($mont['interest']+$mont['rpr']);?>     </td>
															   <td><?php echo $mont['amountr'];?></td>
															    <td id = "ptad"><?php  if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { echo $penalty;} else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ echo $penalty;} }  else { if($year<date('y')){	  echo $penalty;} if($year == date('y') && date('m')>date('m',strtotime($mont['mone']))) {   echo $penalty;} if($year == date('y') && date('m') == date('m',strtotime($mont['mone'])) && $mont['day']<date('d')) {   echo $penalty;}  } } ?>
															   
															 </td>
															 <?php
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
																$ioverduec = 0;
																		for($ioverdue = 1;$ioverdue<=$tilloverdue;$ioverdue++)
																		{
																	 if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=(date('m',strtotime($mont['mone'])))+1) { $ioverduec++;} else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ $ioverduec++;} }  else { if($year<date('y')){	  $ioverduec++;} if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {   $ioverduec++;
																	 }} }
																		
																		}
																		
																
																$overduehc = $penalty;
																$overdueam = 0;
																
																 ?>
															   <td id = "ptad"><?php  if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=(date('m',strtotime($mont['mone'])))+1) { for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100);
															   $overduehc+=(($overduehc*$overduecharges)/100); } echo  round($overdueam); } else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100); $overduehc+=(($overduehc* $overduecharges)/100); } echo  round($overdueam);} }  else { if($year<date('y')){	 for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc* $overduecharges)/100);$overduehc+=(($overduehc* $overduecharges)/100); } echo  round($overdueam);} if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {   for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam = (($overduehc*$overduecharges)/100); $overduehc+=(($overduehc*$overduecharges)/100); } echo round($overdueam);}} } ?>
															   
															 </td>
                                                               <td> <?php echo floor($mont['balance']);?> </td>
                                                            </tr>
														<?php	  		
														      } 
														?>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
			
			<?php		
					//$trpr = 0;
					//$tinterest = 0;
					
					$year = (int)$year+1;
					
					//$arr[$i] = $counter;
					
					
				  
			
								
						
		  		}
				//echo "<pre>";
				//print_r($arr);
				//die();
				?>
		
																
															
	</div>
	</div>
	
 
 
					
				<?php	} else {?>
				</div>
				<div class="x_content">
					<!-- start project list -->
				<table id="example" class="table table-striped responsive-utilities jambo_table">
                   
                     <tr class="headings">
					 <thead>
                        <th>#</th>
                         
                         <th>Agreement No</th>
                        <th>Name</th>
				
                       
                      <th>Amt Financed</th>
					  <th>Instalment Period</th>
					  <th>Principal Paid</th>
					  <th>Interest Paid</th>
					  <th>Penalty Due</th>
					  <th>OD Charges(Due)</th>
                      <th>Remaining Balance</th>
		
                        <th align="center">#Action</th>
				
					</thead>
						
                     </tr>
                    
                    <tbody>
                    <?php show_users(); 
					       
						  
					
					?>
                     
                                 
                    </tbody>
                   
                  </table>
				  <?php } ?>
					<!-- end project list -->
					
					

				</div>
			</div>
		</div>
	</div>
</div>
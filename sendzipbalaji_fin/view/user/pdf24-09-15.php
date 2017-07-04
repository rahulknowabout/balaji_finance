<?php ob_clean();
?>



<?php

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
					
					$queryfv = "select * from vehicle where agreement_no = '".$_GET['agreement_no']."'" ;
					$resultv = mysql_query($queryfv);
					$rowv = mysql_fetch_array ($resultv);
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
	    // echo pow(2,16.66);
		// die();
		// $hole = 1+$rowe['0']['emi']/1200;
		 //echo $hole;
		// die();
		// $subea =  pow($hole,16.660)-1;
		 //echo $subea; 
		// die();
		 //echo $subea;
		 //die();
		 //$subb =  pow($hole,16.660);
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
					  $fin_year = date('y',strtotime($rowam['finance_date']));
					  $fin_mont = date('M',strtotime($rowam['finance_date']));
					  $fin_date = date('d',strtotime($rowam['finance_date']));
					  $pen_fin+=$rowam['pen_amount'];
					  $calculatef['date'] = $fin_date;
					 
					  
					   if ( $fin_mont == $months && $fin_year == $year)
					   {
					     $calculatep["20".$year][$months]['amountr']+= $rowam['amt_finance'];
						 
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
		  
		  //echo "<pre>";
		// print_r($calculatep["20".$year]);
		  //print_r($calculatept);
		// print_r($calculate);
		 $install_fromto = $rowe['0']['install_from']; 
		   $year =   date('y',strtotime($rowe['0']['install_from']));
		   //$month =  date('m',strtotime($rowe['0']['install_from']));
		   //$period = (int)$rowe['0']['tenure'];
		   $counter = $month;
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
			  $month_numeric = date('m',strtotime($mont['mone']));
				                                                if($year<date('y'))
																{
																	$yeardiff = date('y')-$year;
																	$monthyeardue = 12*$yeardiff;
																	$tilloverdue = $monthyeardue-((date('m',strtotime($mont['mone'])))+1);
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
																
																  if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=(date('m',strtotime($mont['mone'])))+1) { for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam+=(($overduehc*$overduecharges)/100);
															   $overduehc+=(($overduehc*$overduecharges)/100); } $overdduechargest["20".$year]+=  round($overdueam);
			 $overdduechargesta[$mont['day']."/".$month_numeric."/20".$year] = round($overdueam);												    } else { if(isset($mont['dayf']) && $mont['dayf']!=""){if($mont['day']<$mont['dayf']){ for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam+=(($overduehc*$overduecharges)/100); $overduehc+=(($overduehc* $overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);
			  $overdduechargesta[$mont['day']."/".$month_numeric."/20".$year] = round($overdueam);	} }  else { if($year<date('y')){	 for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam+=(($overduehc* $overduecharges)/100);$overduehc+=(($overduehc* $overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);
			   $overdduechargesta[$mont['day']."/".$month_numeric."/20".$year] = round($overdueam);	} if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {   for($ijo = 1;$ijo<=$ioverduec;$ijo++) { $overdueam+=(($overduehc*$overduecharges)/100); $overduehc+=(($overduehc*$overduecharges)/100); } $overdduechargest["20".$year]+=round($overdueam);
			   
			    $overdduechargesta[$mont['day']."/".$month_numeric."/20".$year] = round($overdueam);	}} }   
			  
			  
			  
			  
	   if(isset($mont['dayf']) && $mont['dayf']!="")
	   {		  
		if($mont['day']<$mont['dayf'])
		{											  
		 //$penaltyt["20".$year]+=$penalty;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					$penaltya[$mont['day']."/".$month_numeric."/20".$year] = $penalty;
					 $install++;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']<2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					$penaltya[$mont['day']."/".$month_numeric."/20".$year] = $penalty;
					// $installp++;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']<2) {
					 $installp++;
		}
	}
	else { if($year<date('y')){ $penaltyt["20".$year]+=$penalty;$penaltya[$mont['day']."/".$month_numeric."/20".$year] = $penalty;
					 $install++; } if($year == date('y') && date('m')>=date('m',strtotime($mont['mone']))) {  $penaltyt["20".$year]+=$penalty;
					 $install++; $penaltya[$mont['day']."/".$month_numeric."/20".$year] = $penalty; }
		 } 
		
	}	
		
			
			
			 $tpenalty+=$penaltyt["20".$year];
			 $toverduecharges+=$overdduechargest["20".$year];
			
		  	$year++;
			
		
		  }
		  $tinstallmentdue = $install*$emic;
		  $tinstallmentpaid = $installp*$emic;
		  $tinstallment = $installt*$emic;
		  $finstallmentpaid = $tinstallment-($tinstallmentdue+$tinstallmentpaid);
		 // echo "<pre>";
		  //print_r($calculatep);
		  //die();
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
		 //echo  $_GET['pent'];
		 //echo $pen_fin;
		 //die();
		 $installmentanet =  $_GET['pent']+$tinstallmentdue; 
		 $calculatepytps = floor($calculatepytp);	
		 $calculatepyts =	  floor($calculatepyt);
		 if($finstallmentpaid == 0 && $tinstallmentdue == 0 && $_GET['pen'] == 0){ $status = "Close";}else{$status = "Active";}
		 
		$totalamount = $tinstallmentdue+$finstallmentpaid+$tinstallmentpaid;
		if($tomonth<10){ $toinstallp = "0".$tomonth."/".$install_tod."/20".$toyear."";  } else { $toinstallp = "".$tomonth."/".$install_tod."/20".$toyear."";}
		 if($tomonth<10){ $toinstallps = "".$install_tod."/0".$tomonth."/20".$toyear."";  } else { $toinstallps = "".$install_tod."/".$tomonth."/20".$toyear."";}
			        $installment_months = date('m',strtotime($rowe['0']['install_from']));
					$installment_days = date('d',strtotime($rowe['0']['install_from']));
					$installment_years = date('Y',strtotime($rowe['0']['install_from']));
					
					 if($toyear<date('y'))
					  {
					  	$tostatement = $toinstallps;
					  
					  }	
					  else
					  {
					  	$tostatement = date('d/m/Y');
					  }
					  if( $toyear==date('y'))
					  	{
							if($tomonth<date('m'))
							 {
							 	$tostatement =$toinstallps;
							 
							 }	
						
						
						}
						$statementdate = date('d/m/Y');
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
						
						//echo "<pre>";
						//print_r($penaltya);
						//die();
		
	$pdf1 = "<u>Reduce PDF</u><table><tr><h1>Balaji Finance</h1></tr></table><table>
 	<tr>
		<td>
 	<tr>
		<td colspan=\"2\"><b>".$rowe['0']['f_name']." ".$rowe['0']['m_name']." ".$rowe['0']['l_name']."</b></td>
	</tr>
	<tr>
		<td>".$rowe['0']['c_address']."<br/>".$rowe['0']['c_city']." - ".$rowe['0']['c_pincode'].",".$rowe['0']['c_state']."<br/>".$landline."".$mobile."
</td>
	</tr>
	
	</td>
	</tr>
	

			<tr>
			<td>Account Statement from ".$installment_days."/". $installment_months."/".$installment_years." to ".$tostatement." </td>
			<td>
			</td>
			<td>Statement Date:".$statementdate."</td>
			
			</tr>	
			<tr>
				<td colspan = \"4\">
					<hr/>
				</td>
			</tr>
		<tr>
		<td>Agreement No:</td>
		
		<td><b>".$rowe['0']['agreement_no']."</b></td>
		
		
	</tr>
	
	</table>";
	//echo $pdf1;
	//die();
	
	$pdf2 = "
	
	<table border=\"1\" style = \"border-collapse:collapse;width:100%\">
	
		
		
			
	</tr>
	<tr>
		<td  id = \"ptad\">Location</td>
		<td  id = \"ptad\"><b>".$rowe['0']['branch']."</b></td>
		<td  id = \"ptad\">
		Amt Financed (Rs):
		</td>
		<td  id = \"ptad\"><b>".$rowe['0']['amt_financed']."</b></td>
	</tr>
	<tr>
		<td  id = \"ptad\">Product</td>
		<td  id = \"ptad\"><b>".$rowe['0']['product']."<b/></td>
		<td  id = \"ptad\">Total Amount(Principal+Interest) </td>
		<td  id = \"ptad\"><b>".$totalamount."</b></td>
		
	</tr>
	<tr>
		
		<td id = \"ptad\">Asset Desc</td>
		<td id = \"ptad\"><b>".$rowe['0']['asset_desc']."<b/></td>
		<td  id = \"ptad\">Installment Overdue (Rs) </td>
		<td  id = \"ptad\"><b>".$tinstallmentdue."</b></td>
	</tr>
	<tr>
		<td id = \"ptad\">Regn.No.</td>
		<td id = \"ptad\"><b>".$rowe['0']['reg_no']."<b/></td>
		<td  id = \"ptad\">Penalty Due (Rs) </td>
		<td  id = \"ptad\"><b>".$tpenalty."</b></td>
	</tr>
	<tr>
		<td id = \"ptad\">Disbursal Date</td>
		<td id = \"ptad\"><b>".$rowe['0']['disbursal_date']."<b/></td>
		<td  id = \"ptad\">Overdue Charges(Rs) </td>
		<td  id = \"ptad\"><b>".$toverduecharges."</b></td>
	</tr>
	
	<tr>
	
		<td  id = \"ptad\">Interest Rate Type</td>
		<td  id = \"ptad\">Fixed</td>
		<td  id = \"ptad\">Net Receivable (Rs): </td>
	    <td  id = \"ptad\"><b>".$installmentanet."</b></td>
	</tr>
	
	<tr>
		<td  id = \"ptad\">Tenure</td>
		<td  id = \"ptad\"><b>".$rowe['0']['tenure']."<b/></td>
		
		<td  id = \"ptad\">Future installments (Rs) </td>
		<td  id = \"ptad\"><b>".$finstallmentpaid."<b/></td>
	</tr>
	<tr>

		<td  id = \"ptad\">Frequency</td>
		<td  id = \"ptad\">Monthly EMIs</td>
		<td  id = \"ptad\">Installment Paid (Rs) </td>
		<td  id = \"ptad\"><b>".$tinstallmentpaid."</b></td>
	</tr>
	<tr>
	
		<td  id = \"ptad\">Rate of Interest </td>
		<td  id = \"ptad\"><b>".$rowe['0']['emi']."</b></td>
		<td  id = \"ptad\">Principal Paid (Rs)</td>
		<td  id = \"ptad\"><b>".$calculatepytps."</b></td>
	</tr>
	<tr>
	<td  id = \"ptad\">Instl Period(M/D/Y)</td>
		<td  id = \"ptad\"><b>".$rowe['0']['install_from']." to ".$toinstallp."</b></td>
		
		<td  id = \"ptad\">Insterest Paid (Rs) </td>
		<td  id = \"ptad\"><b>".$calculatepyts."<b/></td>
	</tr>
	
	<tr>
	<td  id = \"ptad\">Repayment Mode</td>
		<td  id = \"ptad\"><b>".$rowe['0']['repayment_mode']."<b/></td>
		<td  id = \"ptad\">EMI(Rs) </td>
		<td  id = \"ptad\"><b>".$emic."</b></td>
		
		
		
	</tr>
	<tr><td  id = \"ptad\">Installment Plan</td>
		<td  id = \"ptad\"><b>".$rowe['0']['installment_plan']."</b></td>
		<td  id = \"ptad\">Status</td>
		<td  id = \"ptad\"><b>". $status."</b></td>
		
		
	</tr>
	</table>";
	//echo $pdf2;
	//die();
	?>
	<?php 
					$installment_date = $rowe['0']['install_from'];
					$installment_month = date('m',strtotime($rowe['0']['install_from']));
					$installment_day = date('d',strtotime($rowe['0']['install_from']));
					$installment_year = date('y',strtotime($rowe['0']['install_from']));
					//echo $installment_year;
				    if($toyear<date('y'))
					  {
					  	$per_d = $install_tod;
					  	$per_year = $toyear;
					  	$per_month = $tomonth;
					  
					  }	
					  else
					  {
					  	$per_month = date('m');
					    //echo $per_month;
					    $per_year = date('y');
					    $per_d = date('d');
					  }
					  if( $toyear==date('y'))
					  	{
							if($tomonth<date('m'))
							 {
							 	$per_d = $install_tod;
					  	        $per_year = $toyear;
					  	        $per_month = $tomonth;
							 
							 }	
						
						
						}
					
					
					//$per_month = date('m');
					//echo $per_month;
					//$per_year = date('y');
					//$per_d = date('d');
					//$peri_date = date('m/d/y');
				
					if($per_year-$installment_year>0)
					{
					
					$totalmonth = 12-$installment_month;
					
				   $totalmonth+=$per_month;
				    }
					else
					{
						$totalmonth = $per_month-$installment_month;
					}
					
							$totalyear = ($per_year-1) - ($installment_year);
						if($totalyear>0)
						{
						$totalmonth = 	$totalmonth+(12*$totalyear);
						}
						
				if($per_d>=$installment_day)
				{
					$totalmonth++;
				}		
						
						//echo $totalmonth;
						//echo $peri_date;
						//echo $installment_date;
					//echo "<pre>";
					//print_r($rowf);
					//die();
					
	
							
	$pdf3 = "<br/><br/><br/><br/>
	<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\">
	
		<tr>
		
			<td id = \"ptad\" width = \"75px\">Date</td><th  id = \"ptad\" width = \"175px\">Particular's</th><th  id = \"ptad\"width = \"75px\">Increased By(Rs):</th><th  id = \"ptad\" width = \"75px\">Decreased By(Rs):</th><th  id = \"ptad\" width = \"75px\">Penalty Due(Rs):</th><th  id = \"ptad\" width = \"75px\">Penalty Recieve (Rs):</th><th  id = \"ptad\" width = \"75px\">OD Due (Rs):</th><th  id = \"ptad\" width = \"75px\">OD Charges Recieve (Rs):</th>
	
		</tr></table>";
			
		//echo $pdf3;
		//die();
				//$strt = $installment_month.$installment_year;
				//echo $strt;
				//die();
			$counter = 0;
			$a=0;
			if($totalmonth<12)
			{
				for($i = 1;$i<=$totalmonth;$i++)
					{
					
				$counter++;
				
				$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\"><tr>
					<td id = \"ptad\" width = \"75px\">
					 ".$installment_day." / ".$installment_month." / 20".$installment_year."
					</td>
					<td id = \"ptad\" width = \"175px\">
					Due for installment
					</td>
					
					<td id = \"ptad\" width = \"75px\">
					 ".$emic."
					</td>
					<td id = \"ptad\" width = \"75px\">
					0	
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
				</tr></table>";
						
					
						foreach($rowf as $rowd)
						{
						
							if(date('y',strtotime($rowd['finance_date'])) == $installment_year)
							{
								if(date('m',strtotime($rowd['finance_date'])) == $installment_month)
								{
								 $ddss = date('d/m/Y',strtotime($rowd['finance_date']));
								 $financeday = date('d',strtotime($rowd['finance_date']));
								 $duepenalty=0;
								 if($installment_day<$financeday)
								 {
								 	if($rowd['pen_amount']== "")
									{
										$duepenalty = $penalty;
										
									}
									
								 }
								 $rtotal = $rowd['amt_finance']+$rowd['pen_amount']+$rowd['od_recieve'];
					$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;width:750px;border-top-style:none;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\"><tr>
					<td id = \"ptad\" width = \"75px\">
					".$ddss."
					</td>
					<td id = \"ptad\" width = \"175px\">
				".$rowd['payment_by']." Rcvd vide Receipt No. ".$rowd['receipt_no']." Rs.".$rtotal." (".$rowd['bank_name'].",".$rowd['branch_name'].",".$rowd['cheque_no'].")
					
					<td id = \"ptad\" width = \"75px\">
				
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$rowd['amt_finance']."	
					</td>
					<td id = \"ptad\" width = \"75px\">
				    
					</td>
				
					<td id = \"ptad\" width = \"75px\">
					".$rowd['pen_amount']."	
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$rowd['od_recieve']."	
					</td>
				</tr></table>";
								
								   
								   if($installment_month==12)
								   {
								   		
										$totalmonth-$counter;
								
										$counter=0;
								   
								   }
								}
							}	
						
						
						}
						$a++;
						
						  if($installment_month==12)
								   {
								   		$installment_month=0;
										$installment_year++;
								   }
								   $installment_month++;
				    }	
				
				
			}
			else
			{
			//echo "<pre>";
			//print_r($rowf);
			//die();
			for($i = $installment_month;$i<=$totalmonth;$i++)
					{
				$counter++;
					
				
					$pdf4 = $pdf4."<table  border=\"1\"  style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;\"><tr>
					<td id = \"ptad\" width = \"75px\" >
					 ".$installment_day."/".$i."/20".$installment_year."
					</td>
					<td id = \"ptad\" width = \"175px\">
					Due for installment
					</td>
				
					<td id = \"ptad\" width = \"75px\">
					 ".$emic."
					</td>
					<td id = \"ptad\" width = \"75px\">
				     0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
						
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
				</tr></table>";	
			
						foreach($rowf as $rowd)
						{
							
							if(date('y',strtotime($rowd['finance_date'])) == $installment_year)
							{
								if(date('m',strtotime($rowd['finance_date'])) == $i)
								{
								 //echo "assddff";
								 //die();
									//$arrstore[$i.$installment_year][] = $rowd;
							 $ddss = date('d/m/Y',strtotime($rowd['finance_date']));
							 $financeday = date('d',strtotime($rowd['finance_date']));
							 $duepenalty=0;
								 if($installment_day<$financeday)
								 {
								 	if($rowd['pen_amount']== "")
									{
										$duepenalty = $penalty;
									}
									
								 }
								  $rtotal = $rowd['amt_finance']+$rowd['pen_amount']+$rowd['od_recieve'];
					$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none;width:750px;border-top-width:0;border-style:none;table-layout:fixed;\"><tr>
					<td id = \"ptad\" width = \"75px\">
					".$ddss."
					</td>
					<td id = \"ptad\" width = \"175px\">
					".$rowd['payment_by']."   Rcvd vide Receipt No. ".$rowd['receipt_no']."  Rs." .$rtotal."(".$rowd['bank_name'].",".$rowd['branch_name'].",".$rowd['cheque_no'].")
					</td>
					
					
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$rowd['amt_finance']."
					</td>
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$rowd['pen_amount']."		
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$rowd['od_recieve']."	
					</td>
					
					
				</tr></table>";
							
								
								  } 
								 } 
								}
								
								
				if(isset($penaltya) && count($penaltya)>0)
				{
					foreach($penaltya as $k=>$v)
					{
						if($v>0)
						{
					$pdfpenalty = $pdfpenalty."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\"><tr>
					<td id = \"ptad\" width = \"75px\" >
					 ".$k."
					</td>
					<td id = \"ptad\" width = \"175px\">
					Penalty Due
					</td>
				
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
				     0
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$v."
					</td>
						
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
				</tr></table>";	
				
				}
					
					}
				
				
				}				
								   if($i==12)
								   {
								  	    //echo $i;
								   		$installment_year++;
										$totalmonth = $totalmonth-$counter;
										$i=0;
										$counter=0;
								   }
						
				   $a++; }	
				}
				
				if(isset($penaltya) && count($penaltya)>0)
				{
					foreach($penaltya as $k=>$v)
					{
						if($v>0)
						{
					$pdfpenalty = $pdfpenalty."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\"><tr>
					<td id = \"ptad\" width = \"75px\" >
					 ".$k."
					</td>
					<td id = \"ptad\" width = \"175px\">
					Penalty Due
					</td>
				
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
				     0
					</td>
					<td id = \"ptad\" width = \"75px\">
					".$v."
					</td>
						
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
				</tr></table>";	
				
				}
					
					}
				
				
				}
				
				if(isset($overdduechargesta) && count($overdduechargesta)>0)
				{
					foreach($overdduechargesta as $k=>$v)
					{
						if($v>0)
						{
					$pdfoverdue = $pdfoverdue."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:750px;border-top-width:0;border-style:none;table-layout:fixed;font-size:11px\"><tr>
					<td id = \"ptad\" width = \"75px\" >
					 ".$k."
					</td>
					<td id = \"ptad\" width = \"175px\">
					Overdue Charges Due
					</td>
				
					<td id = \"ptad\" width = \"75px\">
					
					</td>
					<td id = \"ptad\" width = \"75px\">
				     0
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
						
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
					
					<td id = \"ptad\" width = \"75px\">
					".$v."
					</td>
					<td id = \"ptad\" width = \"75px\">
					0
					</td>
				</tr></table>";	
				
				}
					
					}
				
				
				}
				//echo "<pre>";
				//print_r($arrstore);
				
				
	 			ob_clean();
				$pdfp =  $pdf1.$pdf2.$pdf3.$pdf4.$pdfoverdue.$pdfpenalty;	
				
				//echo $pdfp;
				//die();
				require_once("dompdf/dompdf_config.inc.php");
				$dompdf = new DOMPDF();
				$dompdf->load_html($pdfp);
				$dompdf->render();
				$dompdf->stream($rowe['0']['agreement_no']."pdf",array("Attachment" => 0));
				?>
			
                  
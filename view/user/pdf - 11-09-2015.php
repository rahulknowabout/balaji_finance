<?php ob_clean();
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
	   if(isset($mont['dayf']) && $mont['dayf']!="")
	   {		  
		if($mont['day']<$mont['dayf'])
		{											  
		 $penaltyt["20".$year]+=$penalty;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					 $install++;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']<2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					// $installp++;
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
		 
		$perioda = $period-(12-$month);
		//echo $perioda."<br/>" ;
		//echo $month;
		//die();
		if($perioda!=$period)
		{
		$nayear = 1;
	
		}
	  $nayear+=floor($perioda/12);
		//echo $nyear;
		if($perioda%12 == 0){
		
		}
		else{
		$nayear++;
		$tomonthr = $perioda%12;
		}
			
		 $toyear = $nayear;
		 //echo $toyear;
		 //die();
		 
		 $tomonth = $tomonthr-1;
		 //$tomonth+=$install_tom;
		 $toyear+=$install_toy;
		 $toyear =  $toyear-1;
		 //echo  $_GET['pent'];
		 //echo $pen_fin;
		 //die();
		 $installmentanet =  $_GET['pent']+$tinstallmentdue; 
		 $calculatepytps = floor($calculatepytp);	
		 $calculatepyts =	  floor($calculatepyt);
		 if($finstallmentpaid == 0 && $tinstallmentdue == 0 && $_GET['pen'] == 0){ $status = "Close";}else{$status = "Active";}
	$pdf1 = "<table>
 	<tr>
		<td>
 	<tr>
		<td colspan=\"2\"><b>".$rowe['0']['f_name']." ".$rowe['0']['m_name']." ".$rowe['0']['l_name']."</b></td>
	</tr>
	<tr>
		<td><b>".$rowe['0']['address']."</b></td>
	</tr>
	<tr>
		<td><b>".$rowe['0']['city']."-".$rowe['0']['pincode']." - Ph:".$rowe['0']['landline1']."<br />
Mobile:".$rowe['0']['mobile1']."</b></td>
	</tr>
	
	</td>
	</tr>
	</table>
	<table>
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
		<td  id = \"ptad\">Branch:</td>
		<td  id = \"ptad\"><b>".$rowe['0']['branch']."</b></td>
		<td  id = \"ptad\">
		Amt Financed (Rs):
		</td>
		<td  id = \"ptad\"><b>".$rowe['0']['amt_financed']."</b></td>
	</tr>
	<tr>
		<td  id = \"ptad\">Product:</td>
		<td  id = \"ptad\"><b>".$rowe['0']['product']."<b/></td>
		<td  id = \"ptad\">Installment Overdue (Rs): </td>
		<td  id = \"ptad\"><b>".$tinstallmentdue."</b></td>
		
	</tr>
	<tr>
		
		<td id = \"ptad\">Asset Desc:</td>
		<td id = \"ptad\"><b>".$rowe['0']['asset_desc']."<b/></td>
		<td  id = \"ptad\">Other Overdues (Rs): </td>
		<td  id = \"ptad\"><b>".$_GET['pent']."</b></td>
	</tr>
	<tr>
		<td id = \"ptad\">Regn.No.:</td>
		<td id = \"ptad\"><b>".$rowe['0']['reg_no']."<b/></td>
		<td  id = \"ptad\">Unadjusted Amt (Rs): </td>
		<td  id = \"ptad\">0</td>
	</tr>
	<tr>
		<td id = \"ptad\">Disbursal Date:</td>
		<td id = \"ptad\"><b>".$rowe['0']['disbursal_date']."<b/></td>
		<td  id = \"ptad\">Net Receivable (Rs): </td>
		<td  id = \"ptad\"><b>".$installmentanet."</b></td>
	</tr>
	
	<tr>
	
		<td  id = \"ptad\">Interest Rate Type:</td>
		<td  id = \"ptad\">Fixed</td>
		<td  id = \"ptad\">Future installments (Rs): </td>
		<td  id = \"ptad\"><b>".$finstallmentpaid."<b/></td>
	</tr>
	
	<tr>
		<td  id = \"ptad\">Tenure:</td>
		<td  id = \"ptad\"><b>".$rowe['0']['tenure']."<b/></td>
		
		<td  id = \"ptad\">Installment Paid (Rs): </td>
		<td  id = \"ptad\"><b>".$tinstallmentpaid."</b></td>
	</tr>
	<tr>

		<td  id = \"ptad\">Frequency</td>
		<td  id = \"ptad\">Monthly EMIs</td>
		<td  id = \"ptad\">Principal Paid (Rs):</td>
		<td  id = \"ptad\"><b>".$calculatepytps."</b></td>
	</tr>
	<tr>
	
		<td  id = \"ptad\">Customer IRR: </td>
		<td  id = \"ptad\"><b>".$rowe['0']['emi']."</b></td>
		<td  id = \"ptad\">Insterest Paid (Rs): </td>
		<td  id = \"ptad\"><b>".$calculatepyts."<b/></td>
	</tr>
	<tr>
	<td  id = \"ptad\">Instl Pariod</td>
		<td  id = \"ptad\"><b>".$rowe['0']['install_from']." to 0".$tomonth."/".$install_tod."/20".$toyear."</b></td>
		
		<td  id = \"ptad\">Pre-EMI Paid (Rs): </td>
		<td  id = \"ptad\">0</td>
	</tr>
	
	<tr>
	<td  id = \"ptad\">Repayment Mode</td>
		<td  id = \"ptad\"><b>".$rowe['0']['repayment_mode']."<b/></td>
		<td  id = \"ptad\">Status</td>
		<td  id = \"ptad\"><b>". $status."</b></td>
		
		
		
	</tr>
	<tr><td  id = \"ptad\">Installment Plan</td>
		<td  id = \"ptad\"><b>".$rowe['0']['installment_plan']."</b></td>
		<td  id = \"ptad\"> </td>
		<td  id = \"ptad\"></td>
		
		
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
				
					$per_month = date('m');
					//echo $per_month;
					$per_year = date('y');
					$per_d = date('d');
					$peri_date = date('m/d/y');
				
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
						
				if($per_d>$installment_day)
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
	<table border=\"1\" style = \"border-collapse: collapse;width:100%;\">
	
		<tr>
		
			<th  id = \"ptad\" width = \"16.66%\">Date</th><th  id = \"ptad\" width = \"16.66%\">Particular's</th><th  id = \"ptad\"width = \"16.66%\">Increased By(Rs):</th><th  id = \"ptad\" width = \"16.66%\">Decreased By(Rs):</th><th  id = \"ptad\" width = \"16.66%\">Penalty(Rs):</th><th  id = \"ptad\" width = \"16.66%\">Paid(Rs):</th>
	
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
				for($i = $installment_month;$i<=date('m');$i++)
					{
					
				$counter++;
				
				$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none; width:100%;border-top-width:0;border-style:none;\"><tr>
					<td id = \"ptad\" width = \"16.66%\">
					 ".$installment_day."/".$i."/20".$installment_year."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					Due for installment
					</td>
					<td id = \"ptad\" width = \"16.66%\">
						 ".$emic."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					0	
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					0
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					0
					</td>
				</tr></table>";
						
					
						foreach($rowf as $rowd)
						{
							if(date('y',strtotime($rowd['finance_date'])) == $installment_year)
							{
								if(date('m',strtotime($rowd['finance_date'])) == $i)
								{
								 $ddss = date('d/m/Y',strtotime($rowd['finance_date']));
								
					$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;width:100%;border-top-style:none;border-top-width:0;border-style:none;\"><tr>
					<td id = \"ptad\" width = \"16.66%\">
					".$ddss."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					Amt Recieved
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					".$rowd['amt_finance']."	
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					".$rowd['pen_amount']."
					</td>
				
					<td id = \"ptad\" width = \"16.66%\">
					0
					</td>
				</tr></table>";
								
								   
								   if($i==12)
								   {
								   		$installment_year++;
										$totalmonth-$counter;
										$i=0;
										$counter=0;
								   
								   }
								}
							}	
						
						
						}
						$a++;
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
					
				
					$pdf4 = $pdf4."<table  border=\"1\"  style = \"border-collapse: collapse;border-top-style:none; width:100%;border-top-width:0;border-style:none;\"><tr>
					<td id = \"ptad\" width = \"16.66%\">
					 ".$installment_day."/".$i."/20".$installment_year."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					Due for installment
					</td>
					<td id = \"ptad\" width = \"16.66%\">
						 ".$emic."
					</td>
					<td id = \"ptad\">
					0	
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					0
					</td>
					<td id = \"ptad\" width = \"16.66%\">
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
									
					$pdf4 = $pdf4."<table  border=\"1\" style = \"border-collapse: collapse;border-top-style:none;width:100%;border-top-width:0;border-style:none;\"><tr>
					<td id = \"ptad\" width = \"16.66%\">
					".$ddss."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					Amt Recieved
					</td>
					<td id = \"ptad\" width = \"16.66%\">
						
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					".$rowd['amt_finance']."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
					".$rowd['pen_amount']."
					</td>
					<td id = \"ptad\" width = \"16.66%\">
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
				//echo "<pre>";
				//print_r($arrstore);
				//die();
				
	 			ob_clean();
				$pdfp =  $pdf1.$pdf2.$pdf3.$pdf4;	
				require_once("dompdf/dompdf_config.inc.php");
				$dompdf = new DOMPDF();
				$dompdf->load_html($pdfp);
				$dompdf->render();
				$dompdf->stream($rowe['0']['agreement_no']."pdf",array("Attachment" => 0));
				?>
			
                  
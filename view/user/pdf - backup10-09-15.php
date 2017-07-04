<head>				  
<style>
#ptad{

width: 420px;
height: 25px;
padding:10px;

}
</style>
</head>


<div class="">
	<div class="page-title">
		<div class="title_left">
			PDF Page
		</div>

		<div class="title_right">
			
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
				
					<h2>Pdf Page</h2>
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
		if($mont['day']<$mont['dayf'])
		{											  
		 $penaltyt["20".$year]+=$penalty;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']>2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					 $install++;
		}
		if(floor($mont['interest']+$mont['rpr'])-$mont['amountr']<2 &&  $mont['day']<date('d') && $year<=date('y')&& date('m')>=date('m',strtotime($mont['mone']))) { $penaltyt["20".$year]+=$penalty;
					 $installp++;
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
		 
		 $toyear = floor($rowe['0']['tenure']/12);
		 $tomonth = $rowe['0']['tenure']%12;
		 $tomonth+=$install_tom;
		 $toyear+=$install_toy;
		 //echo  $_GET['pent'];
		 //echo $pen_fin;
		 //die();
		$installmentans =  $_GET['pent']+$tinstallmentdue; 
		  ?>
					
	<table>
 	<tr>
		<td>
 	<tr>
		<td colspan="2"><?php echo $rowe['0']['f_name']." ".$rowe['0']['m_name']." ".$rowe['0']['l_name'];?></td>
	</tr>
	<tr>
		<td><?php echo $rowe['0']['address'];?></td>
	</tr>
	<tr>
		<td><?php echo $rowe['0']['city']."-".$rowe['0']['pincode']." - Ph:".$rowe['0']['landline1']."<br />
Mobile:".$rowe['0']['mobile1'];?></td>
	</tr>
	<tr>
		<td> <h4>Agreement No:</h4></td>
		
		<td><?php echo $rowe['0']['agreement_no'];?></td>
		
		</td>
	</tr>
	<tr>
	</table>
	<hr/>
	
	<table border="1">
	
		
		
			
	</tr>
	<tr>
		<td  id = "ptad"><b>Branch:</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['branch'];?></td>
		<td  id = "ptad">
		<b>Amt Financed (Rs):</b>
		</td>
		<td  id = "ptad"><?php  echo $rowe['0']['amt_financed'];?></td>
	</tr>
	<tr>
		<td  id = "ptad"><b>Product:</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['product'];?></td>
		<td  id = "ptad"><b>Installment Overdue (Rs):</b> </td>
		<td  id = "ptad"><?php echo $tinstallmentdue; ?></td>
		
	</tr>
	<tr>
		
		<td id = "ptad"><b>Asset Desc:</b></td>
		<td id = "ptad"><?php echo $rowe['0']['asset_desc'];?></td>
		<td  id = "ptad"><b>Other Overdues (Rs): </b></td>
		<td  id = "ptad"><?php  echo $_GET['pent'];?></td>
	</tr>
	<tr>
		<td id = "ptad"><b>Regn.No.:</b></td>
		<td id = "ptad"><?php echo $rowe['0']['reg_no'];?></td>
		<td  id = "ptad"><b>Unadjusted Amt (Rs):</b> </td>
		<td  id = "ptad">0</td>
	</tr>
	<tr>
		<td id = "ptad"><b>Disbursal Date:</b></td>
		<td id = "ptad"><?php echo $rowe['0']['disbursal_date'];?></td>
		<td  id = "ptad"><b>Net Receivable (Rs):</b> </td>
		<td  id = "ptad"><?php echo $_GET['pent']+$tinstallmentdue ?></td>
	</tr>
	
	<tr>
	
		<td  id = "ptad"><b>Interest Rate Type:</b></td>
		<td  id = "ptad">Fixed</td>
		<td  id = "ptad"><b>Future installments (Rs):</b> </td>
		<td  id = "ptad"><?php echo $finstallmentpaid; ?></td>
	</tr>
	
	<tr>
	<td  id = "ptad"><b>Tenure:</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['tenure'];?></td>
		
		<td  id = "ptad"><b>Installment Paid (Rs):</b> </td>
		<td  id = "ptad"><?php echo $tinstallmentpaid; ?></td>
	</tr>
	<tr>

		<td  id = "ptad"><b>Frequency</b></td>
		<td  id = "ptad">Monthly EMIs</td>
		<td  id = "ptad"><b>Principal Paid (Rs):</b> </td>
		<td  id = "ptad"><?php  echo floor($calculatepytp);?></td>
	</tr>
	<tr>
	
		<td  id = "ptad"><b>Customer IRR: </b></td>
		<td  id = "ptad"><?php echo $rowe['0']['emi'];?></td>
		<td  id = "ptad"><b>Insterest Paid (Rs): </b></td>
		<td  id = "ptad"><?php  echo floor($calculatepyt);?></td>
	</tr>
	<tr>
	<td  id = "ptad"><b>Instl Pariod</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['install_from']." to 0".$tomonth."/".$install_tod."/20".$toyear;?></td>
		
		<td  id = "ptad"><b>Pre-EMI Paid (Rs):</b> </td>
		<td  id = "ptad">0</td>
	</tr>
	
	<tr>
	<td  id = "ptad"><b>Repayment Mode</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['repayment_mode'];?></td>
		<td  id = "ptad"><b>Status</b></td>
		<td  id = "ptad"><?php if($finstallmentpaid == 0 && $tinstallmentdue == 0 && $_GET['pen'] == 0){ echo "Close";}else{echo "Active";} ?></td>
		
		
		
	</tr>
	<tr><td  id = "ptad"><b>Installment Plan</b></td>
		<td  id = "ptad"><?php echo $rowe['0']['installment_plan'];?></td>
		<td  id = "ptad"> </td>
		<td  id = "ptad"></td>
		
		
	</tr>
	</table>
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
					
	?>
							
	<hr/>
	<hr/>
	<hr/>
	<hr/>	
	<hr/>
	<table border="1">
	
		<tr>
		
			<th  id = "ptad">Date</th><th  id = "ptad">Particular's</th><th  id = "ptad">Increased By(Rs):</th><th  id = "ptad">Decreased By(Rs):</th><th  id = "ptad">Penalty(Rs):</th><th  id = "ptad">Paid(Rs):</th>
	
		</tr>
			
		<?php
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
				?>
					<tr>
					<td id = "ptad">
					<?php echo $installment_day."/".$i."/20".$installment_year; ?>
					</td>
					<td id = "ptad">
					Due for installment
					</td>
					<td id = "ptad">
						<?php echo $emic;  ?>
					</td>
					<td id = "ptad">
					0	
					</td>
					<td id = "ptad">
					0
					</td>
					<td id = "ptad">
					0
					</td>
				</tr>	
						
					<?php
						foreach($rowf as $rowd)
						{
							if(date('y',strtotime($rowd['finance_date'])) == $installment_year)
							{
								if(date('m',strtotime($rowd['finance_date'])) == $i)
								{
								?>
					<tr>
					<td id = "ptad">
					<?php echo date('d/m/Y',strtotime($rowd['finance_date'])); ?>
					</td>
					<td id = "ptad">
					Amt Recieved
					</td>
					<td id = "ptad">
					0	
					</td>
					<td id = "ptad">
					<?php if($rowd['amt_finance'] != "" ){ echo $rowd['amt_finance']; }else{ echo "0";} ?>
					</td>
					<td id = "ptad">
					<?php if($rowd['pen_amount'] != "" ){ echo $rowd['pen_amount']; } else{ echo "0";}?>
					</td>
					<td id = "ptad">
					0
					</td>
				</tr>
								 <?php  
								   
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
					
				?>
					<tr>
					<td id = "ptad">
					<?php echo $installment_day."/".$i."/20".$installment_year; ?>
					</td>
					<td id = "ptad">
					Due for installment
					</td>
					<td id = "ptad">
						<?php echo $emic;  ?>
					</td>
					<td id = "ptad">
					0	
					</td>
					<td id = "ptad">
					0
					</td>
					<td id = "ptad">
					0
					</td>
				</tr>	
				<?php
						foreach($rowf as $rowd)
						{
							
							if(date('y',strtotime($rowd['finance_date'])) == $installment_year)
							{
								if(date('m',strtotime($rowd['finance_date'])) == $i)
								{
								 //echo "assddff";
								 //die();
									//$arrstore[$i.$installment_year][] = $rowd;
							?>
									
					<tr>
					<td id = "ptad">
					<?php echo date('d/m/Y',strtotime($rowd['finance_date'])); ?>
					</td>
					<td id = "ptad">
					Amt Recieved
					</td>
					<td id = "ptad">
					0	
					</td>
					<td id = "ptad">
					<?php if($rowd['amt_finance'] != "" ){ echo $rowd['amt_finance']; }else{ echo "0";} ?>
					</td>
					<td id = "ptad">
					<?php if($rowd['pen_amount'] != "" ){ echo $rowd['pen_amount']; } else{ echo "0";}?>
					</td>
					<td id = "ptad">
					0
					</td>
				</tr>
								<?php	
								
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
				
				?>
                    </div>
	           </div>
	       </div>
		</div>
	</div>
</div>
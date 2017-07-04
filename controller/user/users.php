<?php
//echo "<pre>";
//print_r($_POST);
//die('kyuyuuy');
function block() 
{
	if( isset( $_GET['bid'] )) {
			   $whe = "WHERE user_id = ".$_GET['ubid']."";
		       if( $_GET['bid'] == 0) {
			   	$sva = array("status"=>"1");
			   	runquery('UPDATE','','users',$sva,$whe);
			   } 
			   else {
			   		$sva = array("status"=>"0");
			   		runquery('UPDATE','','users',$sva,$whe);
				}    
		 
		}
      } 
	 function delete() {

	  $whes = "WHERE agreement_no = '".$_GET['agreement_no']."'";
	  runquery('DELETE','','financeuser','',$whes);
	  //die('trrtrttrrt');
	  runquery('DELETE','','financestatement','',$whes);
	  runquery('DELETE','','vehicle','',$whes);
	 } 
	 
	 function edit() {
	// echo "<pre>";
	// print_r($_POST);
	//die('kyuyuuy');
						 if( isset( $_POST['agreement_no']) && $_POST['agreement_no'] != "" && isset( $_POST['f_name']) && $_POST['f_name'] != ""&& isset( $_POST['l_name']) && $_POST['l_name'] != ""&& isset( $_POST['father_name'] ) && $_POST['father_name'] != ""&& isset( $_POST['c_address']) && $_POST['c_address'] != ""&& isset( $_POST['c_city']) && $_POST['c_city'] != ""&& isset( $_POST['c_state']) && $_POST['c_state'] != ""&& isset( $_POST['c_pincode']) && $_POST['c_pincode'] != "") 
		 {
						 $queryuser = "UPDATE financeuser SET f_name = '".$_POST['f_name']."',m_name = '".$_POST['m_name']."',l_name = '".$_POST['l_name']."',dob = '".$_POST['dob']."',father_name = '".$_POST['father_name']."',c_address = '".$_POST['c_address']."',c_city = '".$_POST['c_city']."',c_state = '".$_POST['c_state']."',c_pincode = '".$_POST['c_pincode']."',p_address = '".$_POST['p_address']."',p_city = '".$_POST['p_city']."',p_state = '".$_POST['p_state']."',p_pincode = '".$_POST['p_pincode']."',o_address = '".$_POST['o_address']."',o_city = '".$_POST['o_city']."',o_state = '".$_POST['o_state']."',o_pincode = '".$_POST['o_pincode']."',r1_name = '".$_POST['r1_name']."',r1_mobile = '".$_POST['r1_mobile']."',r1_address = '".$_POST['p_address']."',r2_name= '".$_POST['r2_name']."',r2_mobile = '".$_POST['r2_mobile']."',r2_address = '".$_POST['r2_address']."',mobile1 = '".$_POST['mobile1']."',mobile2 ='".$_POST['mobile2']."',landline1 = '".$_POST['landline1']."',landline2 = '".$_POST['landline2']." where id = ".$_REQUEST['uid']."";
	 					
	  
	
		
   $total = runquery("SELECT","*","financeuser","","where agreement_no = '".$_POST['agreement_no']."' and id <> ".$_REQUEST['uid']." ","num_rows");
	 }
	 if(isset( $_POST['branch']) && $_POST['branch'] != ""&& isset( $_POST['product']) && $_POST['product'] != ""&& isset( $_POST['asset_desc'] ) && $_POST['asset_desc'] != ""&& isset( $_POST['reg_no']) && $_POST['reg_no'] != ""&& isset( $_POST['disbursal_date']) && $_POST['disbursal_date'] != ""&& isset( $_POST['tenure']) && $_POST['tenure'] != ""&& isset( $_POST['frequency']) && $_POST['frequency'] != ""&& isset( $_POST['install_from']) && $_POST['install_from'] != ""&& isset( $_POST['repayment_mode']) && $_POST['repayment_mode'] != ""&& isset( $_POST['installment_plan']) && $_POST['installment_plan'] != ""&& isset( $_POST['amt_financed']) && $_POST['amt_financed'] != ""&& $_POST['amt_financed'] != ""&& isset( $_POST['emi']) && $_POST['emi'] != "") 
	{  
	 
	   $queryuser = "UPDATE financestatement SET branch = '".$_POST['branch']."',product = '".$_POST['product']."',asset_desc = '".$_POST['asset_desc']."',reg_no= '".$_POST['reg_no']."',disbursal_date = '".$_POST['disbursal_date']."',tenure = '".$_POST['tenure']."',frequency = '".$_POST['frequency']."',install_from ='".$_POST['install_from']."',repayment_mode = '".$_POST['repayment_mode']."',installment_plan = '".$_POST['installment_plan']."',amt_financed = '".$_POST['amt_financed']."',emi = '".$_POST['emi']."', penalty = '".$_POST['penalty']."' , overdue_charges = '".$_POST['overdue_charges']."' where id = ".$_REQUEST['uid']."";
	   
	    $total = runquery("SELECT","*","financestatement","","where agreement_no = '".$_POST['agreement_no']."' and id <> ".$_REQUEST['uid']." ","num_rows");
	}	
	
	 if(isset( $_POST['v_d_name']) && $_POST['v_d_name'] != ""&& isset( $_POST['v_make']) && $_POST['v_make'] != ""&& isset( $_POST['v_model'] ) && $_POST['v_model'] != ""&& isset( $_POST['v_chachis']) && $_POST['v_chachis'] != ""&& isset( $_POST['v_engine']) && $_POST['v_engine'] != ""&& isset( $_POST['v_reg_no']) && $_POST['v_reg_no'] != ""&& isset( $_POST['v_reference']) && $_POST['v_reference'] != "") 
	{  
	 
	   $queryuser = "UPDATE vehicle SET v_d_name = '".$_POST['v_d_name']."',v_make = '".$_POST['v_make']."',v_model = '".$_POST['v_model']."',v_chachis= '".$_POST['v_chachis']."',v_engine = '".$_POST['v_engine']."',v_reg_no = '".$_POST['v_reg_no']."',v_reference = '".$_POST['v_reference']."' where id = ".$_REQUEST['uid']."";
	   //echo  $queryuser;
	  // die();
	   
	    $total = runquery("SELECT","*","vehicle","","where agreement_no = '".$_POST['agreement_no']."' and id <> ".$_REQUEST['uid']." ","num_rows");
	}	
	
	
	 					
	 if( $total > 0) {
	 
	 	$_SESSION['emsg'] = 'This agreement_no is already exist';
	 }
	 else {
	 		//echo $queryuser;
			//die();
			mysql_query($queryuser);
	 }
	}

	function add() {
	//echo "rttttrrt";
	//die('ffgftgf');
	//echo "<pre>";
	//print_r($_POST);
	//die();
		 if( isset( $_POST['agreement_no']) && $_POST['agreement_no'] != "" && isset( $_POST['f_name']) && $_POST['f_name'] != ""&& isset( $_POST['l_name']) && $_POST['l_name'] != ""&& isset( $_POST['father_name'] ) && $_POST['father_name'] != ""&& isset( $_POST['c_address']) && $_POST['c_address'] != ""&& isset( $_POST['c_city']) && $_POST['c_city'] != ""&& isset( $_POST['c_state']) && $_POST['c_state'] != ""&& isset( $_POST['c_pincode']) && $_POST['c_pincode'] != "") 
		 {
		 	 $querys = "INSERT INTO financeuser(f_name,m_name,l_name,dob,father_name,c_address,c_city,c_state,c_pincode,p_address,p_city,p_state,p_pincode,o_address,o_city,o_state,o_pincode,r1_name,r1_mobile,r1_address,r2_name,r2_mobile,r2_address,mobile1,mobile2,landline1,landline2,agreement_no)
	 		   VALUES('".$_POST['f_name']."','".$_POST['m_name']."','".$_POST['l_name']."','".$_POST['dob']."','".$_POST['father_name']."','".$_POST['c_address']."','".$_POST['c_city']."','".$_POST['c_state']."','".$_POST['c_pincode']."','".$_POST['p_address']."','".$_POST['p_city']."','".$_POST['p_state']."','".$_POST['p_pincode']."','".$_POST['o_address']."','".$_POST['o_city']."','".$_POST['o_state']."','".$_POST['o_pincode']."','".$_POST['r1_name']."','".$_POST['r1_mobile']."','".$_POST['r1_address']."','".$_POST['r2_name']."','".$_POST['r2_mobile']."','".$_POST['r2_address']."','".$_POST['mobile1']."','".$_POST['mobile2']."','".$_POST['landline1']."','".$_POST['landline2']."','".$_POST['agreement_no']."')";
			  // echo  $querys;
			   //die("dsds");
			   $queryst = "INSERT INTO financestatement(agreement_no)VALUES('".$_POST['agreement_no']."')";
			   $querysv = "INSERT INTO vehicle(agreement_no)VALUES('".$_POST['agreement_no']."')";
			   
		$total = runquery("SELECT","*","financeuser","","where agreement_no = '".$_POST['agreement_no']."'");
		
		
	 if( $total > 0) {
	 	$_SESSION['emsg'] = 'This agreement_no is already exist';
	 }
	 else
	 {
	// echo  $querysv;
	 //die();
		mysql_query($querys);
		mysql_query($queryst);
		mysql_query($querysv);
	}
			   
		
	 }
	
	
	
	if(isset( $_POST['branch']) && $_POST['branch'] != ""&& isset( $_POST['product']) && $_POST['product'] != ""&& isset( $_POST['asset_desc'] ) && $_POST['asset_desc'] != ""&& isset( $_POST['reg_no']) && $_POST['reg_no'] != ""&& isset( $_POST['disbursal_date']) && $_POST['disbursal_date'] != ""&& isset( $_POST['tenure']) && $_POST['tenure'] != ""&& isset( $_POST['frequency']) && $_POST['frequency'] != ""&& isset( $_POST['install_from']) && $_POST['install_from'] != ""&& isset( $_POST['repayment_mode']) && $_POST['repayment_mode'] != ""&& isset( $_POST['installment_plan']) && $_POST['installment_plan'] != ""&& isset( $_POST['amt_financed']) && $_POST['amt_financed'] != ""&& isset( $_POST['emi']) && $_POST['emi'] != "") 
	{  

	 /* $sva = array("agreement_no" =>"'".$_POST['agreement_no']."'", "branch" => "'".$_POST['branch']."'","product" => "'". $_POST['product']."'","asset_desc" => "'".$_POST['asset_desc']."'","reg_no" => "'".$_POST['reg_no']."'","disbursal_date" =>"'".$_POST['disbursal_date']."'","interest_rate_type" =>"'".$_POST['interest_rate_type']."'","tenure" =>"'".$_POST['tenure']."'","frequency" =>"'".$_POST['frequency']."'","customer_irr" =>"'".$_POST['customer_irr']."'","install_from" =>"'".$_POST['install_from']."'","install_to" =>"'".$_POST['install_to']."'","repayment_mode" =>"'".$_POST['repayment_mode']."'","installment_plan" =>"'".$_POST['installment_plan']."'","amt_financed" =>"'".$_POST['tenure']."'","tenure" =>"'".$_POST['tenure']."'","tenure" =>"'".$_POST['tenure']."'");*/
	 
	  $queryuser = "UPDATE financestatement SET branch = '".$_POST['branch']."',product = '".$_POST['product']."',asset_desc = '".$_POST['asset_desc']."',reg_no= '".$_POST['reg_no']."',disbursal_date = '".$_POST['disbursal_date']."',tenure = '".$_POST['tenure']."',frequency = '".$_POST['frequency']."',install_from ='".$_POST['install_from']."',repayment_mode = '".$_POST['repayment_mode']."',installment_plan = '".$_POST['installment_plan']."',amt_financed = '".$_POST['amt_financed']."',emi = '".$_POST['emi']."' where agreement_no = ".$_REQUEST['agreement_no']."";
	  
	  /* $total = runquery("SELECT","*","financestatement","","where agreement_no = '".$_POST['agreement_no']."'");
	 if( $total > 1) {
	 	$_SESSION['emsg'] = 'This agreement_no is already exist';
	 }
	 else {
	 */
	  		mysql_query($queryuser);
	 
		//runquery("INSERT","","financestatement",$sva);
		 //echo "hhgghhghg";
	 	//die('rrttrtt');
	//}
	}
}	
if( isset( $_GET['bid'] )) {
	block();
	header('location:index.php?f=user&t=users');
}
if( isset( $_GET['uid'] ) && isset( $_GET['del'] )  ) {
	delete();
	$_SESSION['smsg'] = "User Deleted Successfully!";
	header('location:index.php?f=user&t=users');
}
if( isset( $_POST['uid'] ) ) { 
	if( isset( $_GET['edi'] ) &&  isset($_POST['uid'] ) &&  $_POST['uid']!=""  ){
	edit();
	
	
	if( isset( $_SESSION['emsg'] ) && $_SESSION['emsg'] != "" ) { }
		
	else {
	      $_SESSION['smsg'] = "User Record Updated Successfully!";
	}
	if(isset($_POST['edit']) && $_POST['edit']=="edit")
	{	
		header('location:index.php?f=user&t=users');
	}
	else
	{  
	if( isset( $_POST['taid']))
	{
			$agp = $_REQUEST['agreement_no'];
   			header('location:index.php?f=user&t=useraddedit&uid='.$_POST['uid'].'&edi=edi&agreement_no='.$agp.'');
	}
	else
	{
		header('location:index.php?f=user&t=users');
	}
	}
	}
	else {
 	add();
	
	 if( isset( $_SESSION['emsg'] ) && $_SESSION['emsg'] != "" ) { }
	 else {
		$_SESSION['smsg'] = "User Added Successfully!<br/>Add Statement Now";
	}	
		if( isset($_POST['tid'])) 
		{
			$idl = mysql_insert_id();
			$agp = $_REQUEST['agreement_no'];
			//echo $idl;
			//die();
			header('location:index.php?f=user&t=useraddedit&uid='.$idl.'&edi=edi&agreement_no='.$agp.'');
		}
		else
		{
			//echo "<pre>";
	       // print_r($_POST);
	       	//die();
			header('location:index.php?f=user&t=users');
		}	
	}
}	
?>
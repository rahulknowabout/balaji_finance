<?php
//die('ssss');
		//echo "<pre>";
		//print_r($_POST);
		//die();
function add() {
if( isset( $_POST['edit']) &&  $_POST['edit'] > 0 ) 
{
		//echo "<pre>";
		//print_r($_POST);
		//die();
			/*$queryu = "UPDATE financedetail SET finance_type = '".$_POST['finance_type']."',amt_finance = '".$_POST['amt_finance']."',pen_amount = '".$_POST['pen_amount']."',finance_date = '".$_POST['finance_date']."' where id = '".$_REQUEST['edit']."'";*/
			$curdate = date('m/d/Y');
			$queryu = "UPDATE financedetail SET  receipt_no = '".$_POST['receipt_no']."',amt_finance='".$_POST['amt_finance']."',payment_by = '".$_POST['payment_by']."',bank_name = '".$_POST['bank_name']."',branch_name = '".$_POST['branch_name']."',cheque_no = '".$_POST['cheque_no']."',pen_amount = '".$_POST['pen_amount']."',od_recieve = '".$_POST['od_recieve']."',finance_date = '".$curdate."',finance_date_f = '".$_POST['finance_date_f']."'  where id = '".$_REQUEST['edit']."'";
			//echo $queryu;
			//die();
			mysql_query($queryu);
			
		
	
		
		}else
		{
	 		/*$query = "INSERT INTO financedetail(finance_type,agreement_no,amt_finance,pen_amount,finance_date)VALUES('".$_POST['finance_type']."','".$_POST['agreement_no']."','".$_POST['amt_finance']."','".$_POST['pen_amount']."','".$_POST['finance_date']."')";*/
				$curdate = date('m/d/Y');
			$query = "INSERT INTO financedetail(agreement_no,receipt_no,payment_by,bank_name,branch_name,cheque_no,amt_finance,pen_amount,od_recieve,finance_date,finance_date_f)VALUES('".$_POST['agreement_no']."','".$_POST['receipt_no']."','".$_POST['payment_by']."','".$_POST['bank_name']."','".$_POST['branch_name']."','".$_POST['cheque_no']."','".$_POST['amt_finance']."','".$_POST['pen_amount']."','".$_POST['od_recieve']."','".$curdate."','".$_POST['finance_date_f']."')";
			//echo $query;
			//die();
			mysql_query($query);
			header('location:index.php?f=menu&t=menu');
	    }








    

}




function delete() {
	  $whe = "WHERE id = ".$_GET['id']."";
	  runquery('DELETE','','financedetail','',$whe);
	 } 



		if( isset( $_GET['id'] ) && isset( $_GET['del'] )  ) {
			delete();
			//echo "ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssddddeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
			//die("hhhhhhh");
			header('location:index.php?f=menu&t=menu');
   		  }
		 else { 	
 				add();
				header('location:index.php?f=menu&t=menu');
			}	

	
	

 ?>

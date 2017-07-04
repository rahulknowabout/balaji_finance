<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<script>
	function fillvalue()
	{
		//alert("hello");
	     if( document.getElementById("same_c").checked == true)
		 { 
		   //alert("hello");
		 	//alert(document.getElementById("c_address").value);
			document.getElementById("p_address").value = document.getElementById("c_address").value;
			document.getElementById("p_city").value = document.getElementById("c_city").value;
			document.getElementById("p_state").value = document.getElementById("c_state").value;
			document.getElementById("p_pincode").value = document.getElementById("c_pincode").value;
			
	    }
		else
		{
			document.getElementById("p_address").value = "";
			document.getElementById("p_city").value = "";
			document.getElementById("p_state").value = "";
			document.getElementById("p_pincode").value = "";
			
			
		}
		
		
	}

</script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<?php
if( isset( $_GET['uid'] ) && isset($_GET['edi']) ) 
{ 
		  $whe = "WHERE agreement_no = '".$_GET['agreement_no']."'";
		 $row = runquery('SELECT','*','financeuser','',$whe);  
}
		 
if( isset( $_GET['agreement_no'] ) ) 
{ 
		  $whe = "WHERE agreement_no = '".$_GET['agreement_no']."'";
		 $rows = runquery('SELECT','*','financestatement','',$whe);   
		 $rowv = runquery('SELECT','*','vehicle','',$whe);  
}        
?>
<div class="">

 <?php
                   if( isset( $_GET['uid'] ) && isset($_GET['edi']) ) { ?> <span style="float:right"><a href="index.php?f=menu&t=menu&search=<?php echo $_REQUEST['agreement_no'];?>"class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i>>Finance Detail Listing</a></span> <?php }
			  ?>
			  <span style="float:right"><a href="index.php?f=user&t=users" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> >User Listing</a></span>
	<div class="page-title">
		<div class="title_left">
			<h3>User Form</h3>
		
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
			  <?php
                   if( isset( $_GET['uid'] ) && isset($_GET['edi']) ) {
			  ?>
					<h2>Edit<small>User</small></h2>	 
				<?php		  
                    }else {  
				?>
				<h2>Add<small>User</small></h2>
				<?php	
					
					}
               ?>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br /> 
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">User</a>
                                            </li>
                                              <?php if( isset($_GET['uid']) && $_GET['uid'] != "") { ?>  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Statement</a> <?php } ?>
                                            </li>
											 <?php if( isset($_GET['uid']) && $_GET['uid'] != "") { ?> 
                                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Vehicle</a>
                                            </li>
											<?php } ?>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                              <form method="post" id="demo-form2" name = "username" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=user&t=users&edi=edi&act=act" enctype="multipart/form-data">
                         
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Agreement No.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Agreement No." name="agreement_no" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['agreement_no'];} ?>"  required/>
							</div>
						</div>
	                <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Name*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="First Name" name="f_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['f_name'];} ?>"  required/>
					    <input type="text" class="form-control" placeholder="Middle Name" name="m_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['m_name'];} ?>"  />
						  <input type="text" class="form-control" placeholder="Last Name" name="l_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['l_name'];} ?>"  required/>
							</div>
						</div>
						
						
						
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Father's Name" name="father_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['father_name'];} ?>"  required/>
							</div>
						</div> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">DOB*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							
							
                                               
                                                            <input type="text" class="form-control" placeholder = "DD/MM/YY  Example - 18/09/94" name="dob" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['dob'];} ?>" required>
                                                         
								   
                      
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Current Address*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder=" Current Address" name="c_address" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['c_address'];} ?>"  id ="c_address"  required/>
					    <input type="text" class="form-control" placeholder="city" name="c_city" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['c_city'];} ?>" required  id = "c_city" />
					     <input type="text" class="form-control" placeholder="state" name="c_state" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['c_state'];} ?>" required/ id ="c_state">
						 <input type="text" class="form-control" placeholder="pincode" name="c_pincode" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['c_pincode'];} ?>"  required/ id = "c_pincode">
							</div>
						</div>
						
					
					 
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  Same As Current Address  <input type="checkbox" class="form-control"  name = "same_c" id = "same_c" style="display:inline;width:auto;height:auto" onclick="fillvalue()" value = "same_c"/>
								   
                       <input type="text" class="form-control" placeholder="Permanent Address " name="p_address" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['p_address'];} ?>"  id = "p_address" required/>
					   <input type="text" class="form-control" placeholder="city" name="p_city" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['p_city'];} ?>" required  id = "p_city" />
					     <input type="text" class="form-control" placeholder="state" name="p_state" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['p_state'];} ?>" required/ id = "p_state" >
						 <input type="text" class="form-control" placeholder="pincode" name="p_pincode" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['p_pincode'];} ?>"  required id ="p_pincode" />
							</div>
						</div>
						
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Office Address*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							 
								   
                       <input type="text" class="form-control" placeholder="Office Address " name="o_address" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['o_address'];} ?>"  id = "o_address" required/>
					   <input type="text" class="form-control" placeholder="city" name="o_city" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['o_city'];} ?>" required  id = "o_city" />
					     <input type="text" class="form-control" placeholder="state" name="o_state" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['o_state'];} ?>" required/ id = "o_state" >
						 <input type="text" class="form-control" placeholder="pincode" name="o_pincode" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['o_pincode'];} ?>"  required id ="o_pincode" />
							</div>
						</div>
						

						
						
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Reference1*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Name" name="r1_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r1_name'];} ?>"  required/>
					    <input type="text" class="form-control" placeholder="Mobile" name="r1_mobile" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r1_mobile'];} ?>"  required/>
						 <input type="text" class="form-control" placeholder="Address" name="r1_address" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r1_address'];} ?>"  required/>
						
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Reference2*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Name" name="r2_name" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r2_name'];} ?>"  required/>
					    <input type="text" class="form-control" placeholder="Mobile" name="r2_mobile" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r2_mobile'];} ?>"  required/>
						 <input type="text" class="form-control" placeholder="Address" name="r2_address" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['r2_address'];} ?>"  required/>
						
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Mobile1" name="mobile1" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['mobile1'];} ?>" required/>
					      <input type="text" class="form-control" placeholder="Mobile2" name="mobile2" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['mobile2'];} ?>"  />
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Landline</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Landline1" name="landline1" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['landline1'];} ?>"  />
					     <input type="text" class="form-control" placeholder="Landline2" name="landline2" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['landline2'];} ?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
						<input type = "hidden" name = "uid" id = "uid" value="<?php if(isset($_GET['edi']) ) { echo $row['0']['id'];} ?>"/>
        <input type = "hidden" name="aid" id = "aid" value="add"/>
		<input type = "hidden" name="tid" id = "tid" value="tdd"/>
		 
                                 </form>
                                            </div>
											 <?php if( isset($_GET['uid']) && $_GET['uid'] != "") { ?> 
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <form method="post" id="demo-form2"  name = "statementname" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=user&t=users&edi=edi&act=act" enctype="multipart/form-data">
                         
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Agreement No.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="agreement_no" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['agreement_no'];} ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Location*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="branch" value="<?php if(isset($_GET['agreement_no'])) { echo $rows['0']['branch'];} ?>"  required/>
							</div>
						</div>
	                <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Product*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Product" name="product" value="<?php if(isset($_GET['agreement_no'])) { echo $rows['0']['product'];} ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Desc.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Asset Desc" name="asset_desc" value="<?php if(isset($_GET['agreement_no'])) { echo $rows['0']['asset_desc'];} ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Registration No.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Registration No." name="reg_no" value="<?php if(isset($_GET['agreement_no'])) { echo $rows['0']['reg_no'];} ?>"  required/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Disbursal Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                    						<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Disbursal Date" aria-describedby="inputSuccess2Status2" name="disbursal_date" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['disbursal_date'];} ?>" required>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div> 
						
						<!--<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate Type*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Interest Rate Type" name="interest_rate_type" value="<?php //if(isset($_GET['agreement_no']) ) { echo $rows['0']['interest_rate_type'];} ?>"  required/>
							</div>
						</div>-->
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Tenure*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Tenure" name="tenure" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['tenure'];} ?>"  required/>
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Frequency*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Frequency" name="frequency" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['frequency'];} ?>"  required/>
							</div>
						</div>
						
						
						<!--<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Customer IRR*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Customer IRR" name="customer_irr" value="<?php //if(isset($_GET['agreement_no']) ) { echo $rows['0']['customer_irr'];} ?>"  requ/>
							</div>
						</div> -->
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Instal From*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Instal From  M/D/Y" aria-describedby="inputSuccess2Status2" name="install_from" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['install_from'];} ?>" required>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div> 
						
						<!-- <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Install To*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                     <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status2" name="install_to" value="<?php //if(isset($_GET['agreement_no']) ) { echo $rows['0']['install_to'];} ?>">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div> -->
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Repayment Mode*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Repayment Mode" name="repayment_mode" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['repayment_mode'];} ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Instalment Plan*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="installment_plan" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['installment_plan'];} ?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Amt Financed*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="amt_financed" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['amt_financed'];} ?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Rate of Interest*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="emi" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['emi'];} ?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Penalty*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="penalty" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['penalty'];} ?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Overdue Charges(%)*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="overdue_charges" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['overdue_charges'];} ?>" required/>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
				<input type = "hidden" name = "uid" id = "uid" value="<?php if(isset($_GET['agreement_no']) ) { echo $rows['0']['id'];} ?>"/>
                <input type = "hidden" name="aid" id = "aid" value="add"/> 
			    <input type = "hidden" name="taid" id = "taid" value="taid"/>
				  <input type = "hidden" name="edit" id = "edit" value="<?php if(isset($_GET['edit']) ) { echo $_GET['edit'];} ?>"/>
                
					</form>
                            <?php } ?>                </div>
								 <?php if( isset($_GET['uid']) && $_GET['uid'] != "") { ?> 
                                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                               
											 <form method="post" id="demo-form2"  name = "vehicle" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=user&t=users&edi=edi&act=act" enctype="multipart/form-data">
                         <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Dealer Name*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Dealer Name" name="v_d_name" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_d_name'];} ?>"  required/>
					   
							</div>
							
						</div>
						   
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Make*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Make" name="v_make" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_make'];} ?>"  required/>
					   
							</div>
							
						</div>  
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Model*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Model" name="v_model" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_model'];} ?>"  required/>
					   
							</div>
							
						</div>    
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Chachis*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Chachis" name="v_chachis" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_chachis'];} ?>"  required/>
					   
							</div>
							
						</div>   
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Engine*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Engine" name="v_engine" value="<?php if(isset($_GET['agreement_no']) ) {echo $rowv['0']['v_engine'];} ?>"  required/>
					   
							</div>
							
						</div>  
						     
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Reg No*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Reg No" name="v_reg_no" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_reg_no'];} ?>"  required/>
					   
							</div>
							
						</div>  
						 <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Reference*</label>
							
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Refrence" name="v_reference" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['v_reference'];} ?>"  required/>
					   
							</div>
						</div>
							<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
							
						<input type = "hidden" name = "uid" id = "uid" value="<?php if(isset($_GET['agreement_no']) ) { echo $rowv['0']['id'];} ?>"/>
                        <input type = "hidden" name="aid" id = "aid" value="add"/> 
			  
						</form>
						<?php } ?>         
                                            </div>
                                        </div>
                                    </div>
                                    
                                              


					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$buildurl = buildurl("admin/browse.php");
?>
<script>
CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor( editor, '/images/' );
</script>
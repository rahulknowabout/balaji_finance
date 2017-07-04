<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<script type="text/javascript" src="js/dhtmlgoodies_calendar.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<link type="text/css" rel="stylesheet" href="css/dhtmlgoodies_calendar.css" ></link>


<?php $rows = admin_setting(); 
       //echo "<pre>";
	   //print_r( $rows );
	   //die();
?>


<div class="clearfix"></div>

                    <div class="">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Basic Setting</a>
                                                </li>
                                                <li><a href="#">Mail Setting</a>
                                                </li>
												<li><a href="#">Payment Setting</a>
                                                </li>
												<li><a href="#">Message Setting</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">User</a>
                                            </li>
											
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Statement</a>
                                            </li>
                                           
											
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=setting&t=basicsetting&act=act" enctype="multipart/form-data">
                         
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Agreement No.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="agreement_no" value="<?php  echo $rows['0']['agreement_no']; ?>"  required/>
							</div>
						</div>
	                <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">First Name*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="First Name" name="f_name" value="<?php echo $rows['0']['f_name']; ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Middle Name" name="m_name" value="<?php  echo $rows['0']['m_name']; ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Last Name" name="l_name" value="<?php  echo $rows['0']['l_name']; ?>"  required/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Father's Name" name="father_name" value="<?php  echo $rows['0']['father_name']; ?>"  />
							</div>
						</div> 
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Address*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Address " name="address" value="<?php echo $rows['0']['address']; ?>"  re/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">City*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="city" name="city" value="<?php  echo $rows['0']['city']; ?>"  />
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">State*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="state" name="state" value="<?php  echo $rows['0']['state']; ?>"  requ/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="pincode" name="pincode" value="<?php  echo $rows['0']['pincode']; ?>"  requ/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile1*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="mobile1" value="<?php  echo $rows['0']['mobile1']; ?>"  requ/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile2</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="mobile2" value="<?php  echo $rows['0']['mobile2']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Landline1*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="landline1" value="<?php  echo $rows['0']['landline1']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Landline2</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="landline2" value="<?php  echo $rows['0']['landline2']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
                                 </form>           
				</div>
				
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                   
												    <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=setting&t=basicsetting&act=act" enctype="multipart/form-data">
                         
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Branch*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="branch" value="<?php  echo $rows['0']['branch']; ?>"  required/>
							</div>
						</div>
	                <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Product*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Product" name="product" value="<?php echo $rows['0']['product']; ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Desc.</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Asset Desc" name="asset_desc" value="<?php  echo $rows['0']['asset_desc']; ?>"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Registration No.*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Registration No." name="reg_no" value="<?php  echo $rows['0']['reg_no']; ?>"  required/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Disbursal Date</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                    						<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status2">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div> 
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate Type*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Interest Rate Type" name="interest_rate_type" value="<?php echo $rows['0']['interest_rate_type']; ?>"  re/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Tenure*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Tenure" name="tenure" value="<?php  echo $rows['0']['tenure']; ?>"  />
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Frequency*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Frequency" name="frequency" value="<?php  echo $rows['0']['frequency']; ?>"  requ/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Customer IRR*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Customer IRR" name="customer_irr" value="<?php  echo $rows['0']['customer_irr']; ?>"  requ/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Install From*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                      					<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status2">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Install To*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                     <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status2">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Repayment Mode*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Repayment Mode" name="repayment_mode" value="<?php  echo $rows['0']['repayment_mode']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Plan*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="installment_plan" value="<?php  echo $rows['0']['installment_plan']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Amt Financed*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="amt_financed" value="<?php  echo $rows['0']['amt_financed']; ?>"  />
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
                                 </form>	
                                            </div>
                                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                              


					
					</div>
					            
								 
				
<?php
	$buildurl = buildurl("admin/browse.php");
?>
<script>
CKEDITOR.replace( 'payment_mail', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor( editor, '/images/' );
</script>
 					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
CKEDITOR.replace( 'r_newsletter', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'r_contact' );
var editor = CKEDITOR.replace( 'r_registration' );
var editor = CKEDITOR.replace( 'r_registrationa' );

CKFinder.setupCKEditor( editor, '/images/' );
</script>
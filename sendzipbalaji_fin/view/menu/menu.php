<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<script> 


function ConfirmDelete(sid)
{
	//alert(sid);
  var x = confirm("Are you sure you want to delete?");
  if(x)
  {
  	//alert('xcx');
  /* location.href="index.php?f=menu&t=menuac&act=act&id=sid&del=del";*/
  return x;
	   
 }	   
  else
  {
  		/*location.href="index.php?f=menu&t=menu;*/
		return x;
  }	 
}


/*<input type="button" Onclick="ConfirmDelete()">*/



</script>
<script>
	function displaynone(str)
	{
	     if( str == 'dd')
		 { 
			document.getElementById("ddbank").style.display = "block";
			
	    }
		if( str == 'ca')
		 {
		 	document.getElementById("ddbank").style.display = "none";
		 }
		
	}

</script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">


<?php 
       if( isset( $_GET['edit'] ) ) {
	    //"select * from #__financedetail where agreement_no = '".$_GET['agreement_no']."'";
       $rowf = runquery("SELECT","*","financedetail","","where id = ".$_GET['edit'].""); 
	   } 
	  
	   
	   ?>
<div class="">
<span style="float:right"><a href="index.php?f=user&t=users" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i> >User Listing</a></span>
	<div class="page-title">
		<div class="title_left">
			<h3> Finance Detail</h3>
		</div>
	</div>
	<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<form action="index.php?f=menu&t=menu" method="post">
						<input type="text" class="form-control" value="<?php if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ){echo                         $_REQUEST['search']; } ?>" name="search" id="search" placeholder="Search for...">
					
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Go!</button>
						 </span>
			  		</form>
					
				</div>
			</div>
		</div>
	
				<div class="x_content">
				
			  </form>
				<?php if( isset($_GET['agreement_no'])) { ?>
					<br />
					
					
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=menu&t=menuac&act=act" enctype="multipart/form-data" name="financedetail">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Agreement No</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  
                   <input type = "hidden" name = "agreement_no" id = "agreement_no" value = "<?php if( isset( $_GET['agreement_no'])){ echo $_GET['agreement_no'];}?>"/>
                    
                       <input type="text" class="form-control" placeholder="Enter ..." name = "agreement_nod" id = "agreement_nod" value="<?php  if( isset( $_GET['agreement_no'] ) ) {echo $_GET['agreement_no']; }?>"  required disabled="disabled"/>
							</div>
						</div>
						<!-- <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Finance Type</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="finance_type" id="finance_type">
									<option value="0">Choice</option>
										<option value="Installment Paid" <?php  if( isset($_GET['edit']) ) { echo ($rowf['0']['finance_type'] == 'Installment Paid'?"selected =selected":"");} ?>>Installment Paid</option>
					<!--<option value="Principal Paid"<?php  if( isset($_GET['edit']) ) { echo ($rowf['0']['finance_type'] == 'Principal Paid'?"selected =selected":""); }?>>Principal Paid</option>
					<option value="Interest Paid"<?php  if( isset($_GET['edit']) ) { echo ($rowf['0']['finance_type'] == 'Interest Paid'?"selected=selected":""); }?>>Interest Paid</option>
					<option value="Pre-EMI Paid"<?php   if( isset($_GET['edit']) ) {echo ($rowf['0']['finance_type'] == 'Pre-EMI Paid'?"selected =selected":"");}?>>Pre-EMI Paid</option>
				
								</select>
							</div>
						</div> -->
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Receipt No.</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
						
						  <input type="text" class="form-control" placeholder="Enter ..." name = "receipt_no" id = "receipt_no" value="<?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['receipt_no'];}?>"  />
					 
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">EMI</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   <?php if(isset($_GET['edit'])) { ?>
                    <input type="hidden" class="form-control" placeholder="Enter ..." name="id" value="<?php  if( isset( $_GET['edit'] ) ) {echo $rowf['0']['id']; } ?>" required/>
                    <?php } ?>
                       <input type="text" class="form-control" placeholder="Enter ..." name = "amt_finance" id = "amt_finance" value="<?php  if( isset( $_GET['edit'] ) ) {echo $rowf['0']['amt_finance']; }?>"  />
							</div>
						</div>
						
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Payment By</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
						
						By Cash <input type="radio" class="form-control"  name = "payment_by" id = "payment_by2" style="display:inline;width:auto;height:auto"  onclick="displaynone('ca')" value="cash" <?php if( isset( $_GET['edit'] ) ) { if($rowf['0']['payment_by'] == "cash"){echo "checked = 'checked'"; }  else {} } else {echo "checked = 'checked'";}  ?>/>
					  
				
					    By DD/Cheque <input type="radio" class="form-control"  name = "payment_by" id = "payment_by2" style="display:inline;width:auto;height:auto" onclick="displaynone('dd')" value = "DD/Cheque"  <?php if( isset( $_GET['edit'] ) ) { if($rowf['0']['payment_by'] == "DD/Cheque"){echo "checked = 'checked'"; }  else {} } ?>/>
					 
							</div>
						</div>
						
						<span id = "ddbank" <?php if( isset( $_GET['edit'] ) ) { if($rowf['0']['payment_by'] == "DD/Cheque"){ echo 'style="display:block;"'; }else { echo  'style="display:none;"'; }} else { echo  'style="display:none;"'; }?> >
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
						
						  <input type="text" class="form-control" placeholder="Enter ..." name = "bank_name" id = "bank_name" value="<?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['bank_name']; }?>"  />
					 
							</div>
							</div>
							
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
						
						  <input type="text" class="form-control" placeholder="Enter ..." name = "branch_name" id = "branch_name" value="<?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['branch_name']; }?>"  />
					 
							</div>
							</div>
							
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">DD/Cheque No.</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
						
						  <input type="text" class="form-control" placeholder="Enter ..." name = "cheque_no" id = "cheque_no" value="<?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['cheque_no']; }?>" />
					 
							</div>
						</div>
						</span>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Penalty</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name = "pen_amount" id = "pen_amount" value="<?php  if( isset( $_GET['edit'] ) ) {echo $rowf['0']['pen_amount']; }?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Overdue Charges</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name = "od_recieve" id = "od_recieve" value="<?php  if( isset( $_GET['edit'] ) ) {echo $rowf['0']['od_recieve']; }?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Date*</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                    						<fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Date" aria-describedby="inputSuccess2Status2" name="finance_date_f" value="<?php if(isset($_GET['edit']) ) { echo $rowf['0']['finance_date_f'];
															} ?>">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
							</div>
						</div>
						
						
						
								
						<input type = "hidden" name = "edit" id = "edit" value = "<?php if( isset( $_GET['edit'])){ echo $rowf['0']['id'];}?>"/>
							
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
					</form>
				<?php } ?>	
				</div>
			<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Finance Detail Listing</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
							<!--	<li><a href="index.php?f=menu&t=menu">  Add Menu </a>
								</li>
								-->
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<!-- start project list -->
					<table id="example" class="table table-striped responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th style="width: 1%">#</th>
								<th>Agreement No</th>
								<th>Reciept No</th>
								<th>EMI</th>
								<th> Penalty</th>
								<th>OD Charges</th>
								<th>Finance Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php show_financedetail(); ?>
						</tbody>
					</table>
					<!-- end project list -->

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
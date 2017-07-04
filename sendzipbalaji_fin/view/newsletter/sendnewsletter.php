<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

<script>
function checkalln()
{
     //alert("hhhhh");
	 
     var alla = document.getElementById("all");
	// alert(alla.checked);
	 checkboxes = document.getElementsByName('nuser[]');
	 if( alla.checked == true) {
	 	for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = true;
	    }
      }
	  else{
	 	for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = false;
	    }
      }
}		  
</script>

<?php
$rown = runquery("SELECT","*","newsletter");
$rowu = runquery("SELECT","*","newsletter_user");
if( isset( $_GET['aid']) && isset( $_GET['edi'] ) ) 
{ 
	$rowe = runquery("SELECT","*","newsletter","","where id = ".$_GET['aid']."");
}
?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>Send Newsletter Form</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=newsletter&t=newslettersend&act=act" enctype="multipart/form-data">
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Newsletter</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="ntem">
									<option value="">Choose Newsletter Template</option>
									<?php
										foreach( $rown as $row )
										{ 
									?> 
											<option  value="<?php echo $row['id']; ?>" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['cat_id'] == $row['id'] ) { echo "selected='selected'"; } } ?>><?php echo $row['title']; ?></option> 
									<?php
										} 
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Choose user</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							<table>
								<tr>
									<th><input type = "checkbox"  name="all" id="all"  onclick="checkalln()"/></th>
									<th>Select All</th>
								</tr>
								<?php 
								if( count($rowu) > 0 ) {
										foreach( $rowu as $row) { 
		 												 ?>
										<tr>
											<td>
            								<input type = "checkbox"   name="nuser[]" id="check" value="<?php echo $row['id']; ?>" /> 
											</td>
												<td>
													<?php echo "".$row['name']."(".$row['email'].")"; ?>
			                                     </td>
                                          </tr>
							 <?php           }
										 }
							?>
							</table>	
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
			</div>
		</div>
	</div>
</div>
<?php
	$buildurl = buildurl("admin/browse.php");
?>

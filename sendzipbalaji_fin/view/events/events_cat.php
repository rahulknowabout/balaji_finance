<?php
if( isset( $_GET['uid'] ) && isset($_GET['edi']) )
{ 
	$whe = "WHERE id = ".$_GET['uid']."";
	$row = runquery('SELECT','*','artical_cat','',$whe);
}
?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>Category Form</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Category<small>Mangement</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=content&t=artical_cat&act=act">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "atr_cat" value="<?php  if( isset( $_GET['uid'])  && isset($_GET['edi'] )){ echo $row['0']['atr_cat'];  }  ?>"  required="required" placeholder="Category Name" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alias
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "atr_alias" value="<?php  if( isset( $_GET['uid'])  && isset($_GET['edi'] )){ echo $row['0']['atr_alias'];  }  ?>"   placeholder="Alias" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
						<input type = "hidden" class = "form-control" name="atr_cat_alias" value="<?php  if( isset( $_GET['uid'])  && isset($_GET['edi'] )){ echo $row['0']['atr_cat'];  }  ?>" placeholder="Alias" disabled="disabled"/>
						<input type = "hidden" name = "uid" id = "uid" value="<?php if( isset( $_GET['uid']) && isset($_GET['edi']) ){ echo $_REQUEST['uid']; } ?>"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
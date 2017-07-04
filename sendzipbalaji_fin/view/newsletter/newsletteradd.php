<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<?php
if( isset( $_GET['edit'] ) ) {
				
$rowf = select_newsletter($_GET['edit']);
					  }
					?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>Newsletter Form</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				<h2>Newsletter<small>Template</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					
									
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=newsletter&t=newsletter&act=act" enctype="multipart/form-data">
					
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
							</label>
							<div class = "col-md-9 col-sm-9 col-xs-12">
								<input type="text" name = "title" value="<?php  if( isset( $_GET['edit'] ) ) {
 echo $rowf['0']['title']; }else{} ?>"  required="required" placeholder="FAQ Title" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><span class="required">Subject *</span>
								</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name = "sub" value="<?php  if( isset( $_GET['edit'] ) ) {
 echo $rowf['0']['subject']; }else{} ?>"  required="required"placeholder="Type your question here..." class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Body *</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="des" class="ckeditor" placeholder = "Type your Newsletter.." ><?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['des']; }else{} ?></textarea>
							</div>
						</div>
						
						
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
						<?php
						if( isset( $_GET['edit'] ) ) {

						?>
						<input type="hidden" name="fhid" value="<?php  echo  $_GET['edit'];?>" />
						<?php } ?> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
CKEDITOR.replace( 'des', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'des' );
CKFinder.setupCKEditor( editor, '/images/' );
</script>
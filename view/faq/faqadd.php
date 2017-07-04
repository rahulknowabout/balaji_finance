<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<?php
if( isset( $_GET['edit'] ) ) {
				
$rowf = select_faq($_GET['edit']);
					  }
					?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>FAQ Form</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>FAQ<small>Mangement</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
				
					
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=faq&t=faq&act=act" enctype="multipart/form-data">
					
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "title" value="<?php  if( isset( $_GET['edit'] ) ) {
 echo $rowf['0']['title']; }else{} ?>"  required="required" placeholder="FAQ Title" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><span class="required">Question*</span>
								</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "ques" value="<?php  if( isset( $_GET['edit'] ) ) {
 echo $rowf['0']['ques']; }else{} ?>"  required="required"placeholder="Type your question here..." class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Status</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="status">
									<option value="1"<?php if( isset( $_GET['edit'] ) ) { if ( $rowf['0']['status'] == 1) {  echo "selected='selected'"; } }?>>
										publish
									</option>
                     				<option value="0"<?php if( isset( $_GET['edit'] ) ) { if ( $rowf['0']['status'] == 0) {  echo "selected='selected'"; } }?>>
										Unpublish
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Answer</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="answer" class="ckeditor" placeholder = "Type your Answer here..." ><?php  if( isset( $_GET['edit'] ) ) { echo $rowf['0']['ans']; }else{} ?></textarea>
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
CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor( editor, '/images/' );
</script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<?php
$rowa = runquery("SELECT","*","artical_cat");
if( isset( $_GET['aid']) && isset( $_GET['edi'] ) ) 
{ 
	$rowe = runquery("SELECT","*","artical","","where id = '".$_GET['aid']."'");
	
}
?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>Article Form</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Article<small>Mangement</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=content&t=artical&act=act" enctype="multipart/form-data">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Article Category</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="atr">
									<option value="0">Choose Article Category</option>
									<?php
										foreach( $rowa as $row )
										{ 
									?> 
											<option  value="<?php echo $row['id']; ?>" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['cat_id'] == $row['id'] ) { echo "selected='selected'"; } } ?>><?php echo $row['atr_cat']; ?></option> 
									<?php
										} 
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Article Position</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="position">
									<option value="">Choose Article Position</option>
									 <option value="homepage0" <?php if( isset($_GET['aid']) && isset(
                                       $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage0" ) { echo
                                          "selected='selected'"; } } ?>>HomePage0
									</option>
										  
                                     <option value="homepage0_block1"
                                          <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                         $rowe['0']['position'] == "homepage0_block1" ) { echo
                                         "selected='selected'"; } } ?>>homepage0_block1
										</option>
										 
                                    <option value="homepage0_block1"
                                     <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                        $rowe['0']['position'] == "homepage0_block2" ) { echo
                                         "selected='selected'"; } } ?>>homepage0_block2
									</option>
                                     <option value="homepage0_block3"
                                        <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                              $rowe['0']['position'] == "homepage0_block3" ) { echo
                                             "selected='selected'"; } } ?>>homepage0_block3
											  
									</option>
									<option value="homepage0_block4"
                                          <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                         $rowe['0']['position'] == "homepage0_block4" ) { echo
                                         "selected='selected'"; } } ?>>homepage0_block4
									</option>
									<option value="homepage0_block5"
                                          <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                         $rowe['0']['position'] == "homepage0_block5" ) { echo
                                         "selected='selected'"; } } ?>>homepage0_block5
										</option>
										<option value="homepage0_block6"
                                          <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if(
                                         $rowe['0']['position'] == "homepage0_block6" ) { echo
                                         "selected='selected'"; } } ?>>homepage0_block6
										</option>
									<option value="homepage1" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage1" ) { echo "selected='selected'"; } } ?>>HomePage1</option>
									<option value="homepage2" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage2" ) { echo "selected='selected'"; } } ?>>HomePage2</option>
									<option value="homepage3" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage3" ) { echo "selected='selected'"; } } ?>>HomePage3</option>
									<option value="homepage4"<?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage4" ) { echo "selected='selected'"; } } ?>>HomePage4</option>
									<option value="homepage5" <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage5" ) { echo "selected='selected'"; } } ?>>HomePage5</option>
									<option value="homepage6"<?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if( $rowe['0']['position'] == "homepage6" ) { echo "selected='selected'"; } } ?>>HomePage6</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Article Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "title" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['title']; }else{} ?>"  required="required" placeholder="Article Title" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Article Alias 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "alias" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['alias']; }else{} ?>"   placeholder="Article Alias" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Article SubTitle<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "subtitle" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['subtitle']; }else{} ?>"  required="required" placeholder="Article SubTitle" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Article Status</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="status">
									<option value="1"<?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if ( $rowe['0']['status'] == 1) {  echo "selected='selected'"; } }?>>
										publish
									</option>
                     				<option value="0"<?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if ( $rowe['0']['status'] == 0) {  echo "selected='selected'"; } }?>>
										Unpublish
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Article Short Description</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="s_content" class="ckeditor"><?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['s_des']; }else{} ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Article Content</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="content" class="ckeditor"><?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['text_atr']; }else{} ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
							</div>
						</div>
						
						<input type="hidden" name="aid" value="<?php if( isset( $_GET['aid']) && isset($_GET['aid']) ){ echo $_REQUEST['aid']; } ?>" name="edit" />
					</form>
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
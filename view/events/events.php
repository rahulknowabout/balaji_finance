<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
      
<?php
$rowa = runquery("SELECT","*","Artical_cat");
if( isset( $_GET['aid']) && isset( $_GET['edi'] ) ) 
{ 
	$rowe = runquery("SELECT","*","events","","where id = ".$_GET['aid']."");
}
?>
<div class="">

	<div class="page-title">
		<div class="title_left">
			<h3>Events</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Event<small>Mangement</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
                   
                    
					<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=events&t=events&act=act" enctype="multipart/form-data">

						
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "title" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['title']; }else{} ?>"  required="required" placeholder="Event Title" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						
							<div class="form-group">
                            
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Start Date" name="startdate" aria-describedby="inputSuccess2Status4">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                        </div>
							</div>
						</div>
                        <div class="form-group">
                            
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Time
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select  id="starttiming" name="starttiming" class="form-control">
<option value="7.00AM">7.00AM</option>
<option value="7.15AM">7.15AM</option>
<option value="7.30AM">7.30AM</option>
<option value="7.45AM">7.45AM</option>
<option value="8.00AM">8.00AM</option>
<option value="8.15AM">8.15AM</option>
<option value="8.30AM">8.30AM</option>
<option value="8.45AM">8.45AM</option>
<option value="9.00AM">9.00AM</option>
<option value="9.15AM">9.15AM</option>
<option value="9.30AM">9.30AM</option>
<option value="9.45AM">9.45AM</option>
<option value="10.00AM">10.00AM</option>
<option value="10.15AM">10.15AM</option>
<option value="10.30AM">10.30AM</option>
<option value="10.45AM">10.45AM</option>
<option value="11.00AM">11.00AM</option>
<option value="11.15AM">11.15AM</option>
<option value="11.30AM">11.30AM</option>
<option value="11.45AM">11.45AM</option>
<option value="12.00AM">12.00PM</option>
<option value="12.15PM">12.15PM</option>
<option value="12.30PM">12.30PM</option>
<option value="12.45PM">12.45PM</option>
<option value="1.00PM">1.00PM</option>
<option value="1.15PM">1.15PM</option>
<option value="1.30PM">1.30PM</option>
<option value="1.45PM">1.45PM</option>
<option value="2.00PM">2.00PM</option>
<option value="2.15PM">2.15PM</option>
<option value="2.30PM">2.30PM</option>
<option value="2.45PM">2.45PM</option>
<option value="3.00PM">3.00PM</option>
<option value="3.15PM">3.15PM</option>
<option value="3.30PM">3.30PM</option>
<option value="3.45PM">3.45PM</option>
<option value="4.00PM">4.00PM</option>
<option value="4.15PM">4.15PM</option>
<option value="4.30PM">4.30PM</option>
<option value="4.45PM">4.45PM</option>
<option value="5.00PM">5.00PM</option>
<option value="5.15PM">5.15PM</option>
<option value="5.30PM">5.30PM</option>
<option value="5.45PM">5.45PM</option>
<option value="6.00PM">6.00PM</option>
<option value="6.15PM">6.15PM</option>
<option value="6.30PM">6.30PM</option>
<option value="6.45PM">6.45PM</option>
<option value="7.00PM">7.00PM</option>

</select>
							</div>
						</div>
                        <div class="form-group">
                            
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Date
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="End Date" name="enddate"  aria-describedby="inputSuccess2Status3">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                        </div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
                            
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Time
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select  id="starttiming" name="endtiming" class="form-control">
<option value="7.00AM">7.00AM</option>
<option value="7.15AM">7.15AM</option>
<option value="7.30AM">7.30AM</option>
<option value="7.45AM">7.45AM</option>
<option value="8.00AM">8.00AM</option>
<option value="8.15AM">8.15AM</option>
<option value="8.30AM">8.30AM</option>
<option value="8.45AM">8.45AM</option>
<option value="9.00AM">9.00AM</option>
<option value="9.15AM">9.15AM</option>
<option value="9.30AM">9.30AM</option>
<option value="9.45AM">9.45AM</option>
<option value="10.00AM">10.00AM</option>
<option value="10.15AM">10.15AM</option>
<option value="10.30AM">10.30AM</option>
<option value="10.45AM">10.45AM</option>
<option value="11.00AM">11.00AM</option>
<option value="11.15AM">11.15AM</option>
<option value="11.30AM">11.30AM</option>
<option value="11.45AM">11.45AM</option>
<option value="12.00AM">12.00PM</option>
<option value="12.15PM">12.15PM</option>
<option value="12.30PM">12.30PM</option>
<option value="12.45PM">12.45PM</option>
<option value="1.00PM">1.00PM</option>
<option value="1.15PM">1.15PM</option>
<option value="1.30PM">1.30PM</option>
<option value="1.45PM">1.45PM</option>
<option value="2.00PM">2.00PM</option>
<option value="2.15PM">2.15PM</option>
<option value="2.30PM">2.30PM</option>
<option value="2.45PM">2.45PM</option>
<option value="3.00PM">3.00PM</option>
<option value="3.15PM">3.15PM</option>
<option value="3.30PM">3.30PM</option>
<option value="3.45PM">3.45PM</option>
<option value="4.00PM">4.00PM</option>
<option value="4.15PM">4.15PM</option>
<option value="4.30PM">4.30PM</option>
<option value="4.45PM">4.45PM</option>
<option value="5.00PM">5.00PM</option>
<option value="5.15PM">5.15PM</option>
<option value="5.30PM">5.30PM</option>
<option value="5.45PM">5.45PM</option>
<option value="6.00PM">6.00PM</option>
<option value="6.15PM">6.15PM</option>
<option value="6.30PM">6.30PM</option>
<option value="6.45PM">6.45PM</option>
<option value="7.00PM">7.00PM</option>

</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Event Status</label>
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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "address" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['address']; }else{} ?>"  required="required" placeholder="Event Address" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Type <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "eventtype" value="<?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['eventtype']; }else{} ?>"  required="required" placeholder="Event Type" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
                        <div class="form-group">
                            
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Audience Type
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                           <select name="auditype" class="form-control">
                                                           <option <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if ( $rowe['0']['status'] == 1) {  echo "selected='selected'"; } }?> value="General Public">General Public</option>
                                                                                                                      						<option <?php if( isset($_GET['aid']) && isset( $_GET['edi'] )) { if ( $rowe['0']['status'] == 1) {  echo "selected='selected'"; } }?> value="Special Audience">Special Audience</option>
                                                           </select>
                                                            
                                                        </div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Event Short Description</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="s_content" class="ckeditor"><?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['short_dis']; }else{} ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Event Content</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="content" class="ckeditor"><?php  if( isset($_GET['aid']) && isset( $_GET['edi'] )) { echo $rowe['0']['longdis']; }else{} ?></textarea>
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
<script type="text/javascript">
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_3"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
    <!-- /datepicker -->
<script>
CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
CKEDITOR.replace( 's_content', {
    filebrowserBrowseUrl: './browser/browse.php',
    filebrowserUploadUrl: './index.php?onlyupload=y'
});
var editor = CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor( editor, '/images/' );
</script>
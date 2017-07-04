<!-- dropzone -->
    <script src="js/dropzone/dropzone.js"></script>
	<script>
			function s_atag( ) {
				//alert("hello");
			if( document.getElementById("gimage").checked == true) {
				
				 document.getElementById("tags").style.display = "block";
			} else {
					document.getElementById("tags").style.display = "none";
			}
				
			}
	</script>
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Image <small>Upload</small></h3>
		</div>
	</div>
	<div class="x_content">
					<br />
					<?php
						
					
					if( isset( $_GET['edit'] ) ) {
				
						$rowi = select_image($_GET['edit']);
						$taga = explode(",", $rowi['0']['tagid'] );
						//$count = count($taga);
						//echo $count;
						//echo "<pre>";
						//print_r( $taga );
						//die();
					  }
					?>
					<form action="index.php?f=imagegallary&t=imagegallary&act=act" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "text" name = "title" id = "title" value="<?php if( isset( $_GET['edit'] ) ) { echo $rowi['0']['title']; } ?>" class="form-control col-md-7 col-xs-12" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">SubTitle</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "text" name = "subtitle" id = "subtitle" value="<?php if( isset( $_GET['edit'] ) ) { echo $rowi['0']['subtitle']; } ?>" class="form-control col-md-7 col-xs-12"  required/>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "file" name = "imageposition" id = "imageposition" value="<?php if( isset( $_GET['edit'] ) ) { echo $rowb['0']['image_name']; } ?>" class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Images Location</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "checkbox" name = "gimage" id = "gimage" value="gallaryimage" class="icheckbox_flat-green checked" <?php if( isset( $_GET['edit'] ) ) { if( $rowi['0']['gis'] == 1 ) { echo "checked=checked";} } ?> onclick="s_atag()"/> Gallary Image<br />
								   <input type = "checkbox" name = "hpimage1" id = "hpimage1" value="homepageimage1" class="icheckbox_flat-green checked" <?php if( isset( $_GET['edit'] ) ) { if( $rowi['0']['hpis'] == 1 ) { echo "checked=checked";} } ?> />Home Page Image1<br />
								    <input type = "checkbox" name = "hpimage2" id = "hpimage2" value="homepageimage2" class="icheckbox_flat-green checked"<?php if( isset( $_GET['edit'] ) ) { if( $rowi['0']['hpis1'] == 1 ) { echo "checked=checked";} } ?> />Home Page Image2<br />
									 <input type = "checkbox" name = "ftimage" id = "ftimage" value="footerimage" class="icheckbox_flat-green checked" <?php if( isset( $_GET['edit'] ) ) { if( $rowi['0']['fis'] == 1 ) { echo "checked=checked";} } ?>/>Home Page Image3
							</div>
						</div>
						
						<div class="form-group" id = "tags" <?php if(  isset( $_GET['edit'] ) ) {} else { ?> style="display:none" <?php } ?> >
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Tag</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							<?php $rowts = select_tag();
									if( count( $rowts ) > 0 ) {  
							?> 				<select class="form-control" name = "tagid[]"  multiple="multiple">
							<?php		 foreach( $rowts as $row ) { 
							               if(  isset( $_GET['edit'] ) ) {
												if( in_array( $row['tagid'],$taga) ){  ?>
													
												  <option value="<?php echo $row['tagid']; ?>" selected = "selected" ><?php echo $row['tagname']; ?></option>
											<?php	
												}
												  else {
											?>
												  <option value="<?php echo $row['tagid']; ?>"><?php echo $row['tagname']; ?></option>
											<?php	  
												  
												  }
												 }else { 
									
										      ?>
											  	
							
											   <option value="<?php echo $row['tagid']; ?>"><?php echo $row['tagname']; ?></option>
							    <?php 
							             }
							              }
											  
											  
											   
											}
							?>		      </select>
							</div>
					  </div>
							
						
						
						
						
						
						
						 
					   
					  
					  
					   
					  
					  
						
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
						<?php if(isset($_GET['edit'])) {   ?>
							  <input type = "hidden" name="bhid" value="<?php echo $_GET['edit'];?>" />
							 <?php } ?>
					</form>
					<!--<form action="choices/form_upload.php" class="dropzone" style="border: 1px solid #e5e5e5; height: 300px; "></form>-->
				</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Image Listing</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?f=imagegallary&t=imagegallary">Add Image</a>
								</li>
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
								<tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                       
                        <th>Location</th>
                        
                        
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php show_image(); ?>
						</tbody>
					</table>
					<!-- end project list -->

				</div>
			</div>
		</div>
	</div>
</div>
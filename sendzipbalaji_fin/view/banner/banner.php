<!-- dropzone -->
    <script src="js/dropzone/dropzone.js"></script>
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Banner <small>Add</small></h3>
		</div>
	</div>
	<div class="x_content">
					<br />
					<?php 
					$rowm = get_menuad(); 
					if( isset( $_GET['edit'] ) ) {
						$rowb = select_banner($_GET['edit']);
					  }
					?>
					<form action="index.php?f=banner&t=bannerac&act=act" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "text" name = "title" id = "title" value="" class="form-control col-md-7 col-xs-12" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">SubTitle</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type = "text" name = "subtitle" id = "subtitle" value="" class="form-control col-md-7 col-xs-12"  required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Select MenuItem</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select class="form-control" name="menu_id">
									<option value="">Select MenuItem</option>
											<?php 
												foreach( $rowm as $rowi)
												{
											?>
					  
											      <option <?php echo( isset($_GET['edit']) && $rowi['id'] == $rowb['0']['menu_id'] )? 'selected="selected"' : ''  ?> value="<?php echo $rowi['id']; ?>"><?php echo $rowi['title']; ?></option>
											<?php
												} 
											?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banner Order <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name = "ordering" value="<?php if(isset($_GET['edit'])) { echo $rowb['0']['ordering']; } ?>"  required="required" placeholder="Order" class="form-control col-md-7 col-xs-12">
							</div>
								<div class="clearfix"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Banner<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<?php if(isset($_GET['edit'])) { ?>
                    <br/><img src="<?php echo $rowb['0']['banner_path'];   ?>" width="500px" height="300px" ><br/><br/>
                    <?php } ?>
								
								 <input type="file" id="exampleInputFile" name="icon" placeholder="File" class="form-control col-md-7 col-xs-12">
							</div>
								<div class="clearfix"></div>
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
					<h2>Banner Listing</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?f=banner&t=banner">Add Banner</a>
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
								<th style="width: 1%">#</th>
								<th>MenuItem</th>
								<th>Banner</th>
								<th>Order</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php show_bannert(); ?>
						</tbody>
					</table>
					<!-- end project list -->

				</div>
			</div>
		</div>
	</div>
</div>
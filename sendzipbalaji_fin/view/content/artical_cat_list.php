<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Page Category <small>Listing</small></h3>
		</div>

		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<form action="" method="post">
						<input type="text" class="form-control" value="<?php if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ){echo                         $_REQUEST['search']; } ?>" name="search" id="search" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Go!</button>
						 </span>
			  </form>
					
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Categories</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?f=content&t=artical_cat">Add Category</a>
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
								<th>#</th>
								<th>Category Name</th>
								<th>#Action</th>
							</tr>
						</thead>
						<tbody>
							<?php cat_list(); ?>
						</tbody>
					</table>
					<!-- end project list -->

				</div>
			</div>
		</div>
	</div>
</div>
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Newsletter's <small>Listing</small></h3>
		</div>

		
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Newsletter Page</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?f=newsletter&t=newsletteradd">Add newsletter</a>
								</li>
								<li><a href="index.php?f=newsletter&t=sendnewsletter">Send newsletter</a>
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
								<th>Title</th>
								<th>Subject</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php show_newsletter(); ?>
						</tbody>
					</table>
					<!-- end project list -->

				</div>
			</div>
		</div>
	</div>
</div>
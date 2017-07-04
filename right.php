<?php
	$totalcat	=	runquery("SELECT","COUNT(*) as totalcat","artical_cat","","","");
	$totalartical	=	runquery("SELECT","COUNT(*) as totalartical","artical","","","");
	$totalbanner	=	runquery("SELECT","COUNT(*) as totalbanner","banner","","","");
	$totalimagegallary	=	runquery("SELECT","COUNT(*) as totalimagegallary","imagegallary","","","");
	$totalmenu	=	runquery("SELECT","COUNT(*) as totalmenu","menu","","","");
	
?>
<div class="">
	<br />
	<div class="row">
	
	<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Check Report</h2>
					<img src="images/image_f1.jpg"/>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Add Finance Detail</h2>
					<img src="images/image_f2.jpg"/>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Genrate PDF</h2>
					<img src="images/image_f4.jpg"/>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Basic Activity</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
							<li><a href="index.php?f=user&t=users">User Listing</a>
							</li>
							<li><a href="index.php?f=menu&t=menu">Finance Listing</a>
							</li>
							<li><a href="index.php?f=user&t=useraddedit">Add User</a> </li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<table class="tile" style="width:100%">
						
						<tr>
							<td>
								
							</td>
							<td>
								<table class="tile_info">
									<tr>
										<td colspan="2">
											<p><i class="fa fa-square blue"></i><a href="index.php?f=user&t=users">User Listing</a></p>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<p><i class="fa fa-square green"></i><a href="index.php?f=menu&t=menu">Finance Listing</a></p>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<p><i class="fa fa-square purple"></i><a href="index.php?f=user&t=useraddedit">Add User</a></p>
										</td>
									</tr>
									<tr>
										
										<td></td>
									</tr>
									<tr>
										
										<td></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Features</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<!--<li><a href="#">Check Report Reduced</a></li>
								<li><a href="#">Check Report Flat</a></li>
								<li><a href="#">Genrate PDF Reduced</a></li>
								<li><a href="#">Generate PDF Flat</a></li>
								<li><a href="#">ADD Finance Detail</a></li>
								-->
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4></h4>
					<div class="widget_summary">
						<div class="w_left w_25">
							<span><i class="fa fa-file"></i></span>
						</div>
						<div class="w_center w_55">
							<li style="list-style:none"><a href="#">Check Report Reduced</a></li>
						</div>
						<div class="w_right w_20">
							<span><?php //echo $totalcat[0]['totalcat']; ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="widget_summary">
						<div class="w_left w_25">
							<span><i class="fa fa-file-text"></i></span>
						</div>
						<div class="w_center w_55">
							<li style="list-style:none"><a href="#">Check Report Flat</a></li>
						</div>
						<div class="w_right w_20">
							<span><?php // echo $totalartical[0]['totalartical']; ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="widget_summary">
						<div class="w_left w_25">
							<span><i class="fa fa-bars"></i></span>
						</div>
						<div class="w_center w_55">
							<li style="list-style:none"><a href="#">Genrate PDF Reduced</a></li>
						</div>
						<div class="w_right w_20">
							<span><?php echo $totalmenu[0]['totalmenu']; ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="widget_summary">
						<div class="w_left w_25">
							<span><i class="fa fa-image"></i></span>
						</div>
						<div class="w_center w_55">
							<li style="list-style:none"><a href="#">Generate PDF Flat</a></li>
						</div>
						<div class="w_right w_20">
							<span><?php echo $totalbanner[0]['totalbanner']; ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="widget_summary">
						<div class="w_left w_25">
							<span><i class="fa fa-camera"></i></span>
						</div>
						<div class="w_center w_55">
							<li style="list-style:none"><a href="#">ADD Finance Detail</a></li>
						</div>
						<div class="w_right w_20">
							<span><?php echo $totalimagegallary[0]['totalimagegallary']; ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

		


		
<?php $rows = admin_setting(); 
       //echo "<pre>";
	   //print_r( $rows );
	   //die();
?>
 <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="index.php?f=setting&t=basicsetting&act=act&ind=ind" enctype="multipart/form-data">
<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
				<h2>User Setting</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
							<ul role="menu" class="dropdown-menu">
								
							
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="dashboard-widget-content">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_name" value="<?php  echo $rows['0']['name']; ?>"  required/>
							</div>
						</div>
<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_password" value="<?php echo $rows['0']['password']; ?>"  required/>
							</div>
						</div>
						
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_email" value="<?php  echo $rows['0']['email']; ?>"  required/>
							</div>
						</div>
					<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
					</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<!--
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Contact Setting</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
							<ul role="menu" class="dropdown-menu">
								<li><a href="index.php?f=setting&t=setting">Setting</a>
								</li>
								
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="dashboard-widget-content">
						

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_address" value="<?php  echo $rows['0']['address']; ?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_phone" value="<?php echo $rows['0']['phone']; ?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="user_fax" value="<?php  echo $rows['0']['fax']; ?>"  />
							</div>
							
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
					         </div>
					 </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Social Link Setting</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
							<ul role="menu" class="dropdown-menu">
								<li><a href="index.php?f=setting&t=setting">Setting</a>
								</li>
								
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="dashboard-widget-content">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="f_link" value="<?php  echo $rows['0']['flink']; ?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Google+</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="g_link" value="<?php  echo $rows['0']['glink']; ?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="t_link" value="<?php  echo $rows['0']['tlink']; ?>"  />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">LinkedIn</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								   
                       <input type="text" class="form-control" placeholder="Enter ..." name="lin_link" value="<?php  echo $rows['0']['lin_link']; ?>"  />
							</div>
						</div>


                         <div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success xcxc">Submit</button>
					     </div>
					 </div>
						
					</div>
				</div>
			</div>
		</div>
	</form>	-->
		<!--<div class="col-md-4 col-sm-6 col-xs-12 widget_tally_box">
			<div class="x_panel">
				<div class="x_title">
					<h2>User Uptake</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<div id="graph_bar" style="width:100%; height:200px;"></div>

					<div class="col-xs-12 bg-white progress_summary">

						<div class="row">
							<div class="progress_title">
								<span class="left">Escudor Wireless 1.0</span>
								<span class="right">This sis</span>
								<div class="clearfix"></div>
							</div>

							<div class="col-xs-2">
								<span>SSD</span>
							</div>
							<div class="col-xs-8">
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="89"></div>
								</div>
							</div>
							<div class="col-xs-2 more_info">
								<span>89%</span>
							</div>
						</div>
						<div class="row">
							<div class="progress_title">
								<span class="left">Mobile Access</span>
								<span class="right">Smart Phone</span>
								<div class="clearfix"></div>
							</div>

							<div class="col-xs-2">
								<span>App</span>
							</div>
							<div class="col-xs-8">
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="79"></div>
								</div>
							</div>
							<div class="col-xs-2 more_info">
								<span>79%</span>
							</div>
						</div>
						<div class="row">
							<div class="progress_title">
								<span class="left">WAN access users</span>
								<span class="right">Total 69%</span>
								<div class="clearfix"></div>
							</div>

							<div class="col-xs-2">
								<span>Usr</span>
							</div>
							<div class="col-xs-8">
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="69"></div>
								</div>
							</div>
							<div class="col-xs-2 more_info">
								<span>69%</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>-->

		<!-- start of weather widget -->
		<!--<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Daily active users <small>Sessions</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="temperature"><b>Monday</b>, 07:30 AM
								<span>F</span>
								<span><b>C</b>
						</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="weather-icon">
								<span>
							<canvas height="84" width="84" id="partly-cloudy-day"></canvas>
						</span>

							</div>
						</div>
						<div class="col-sm-8">
							<div class="weather-text">
								<h2>Texas
							<br><i>Partly Cloudy Day</i>
						</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="weather-text pull-right">
							<h3 class="degrees">23</h3>
						</div>
					</div>
					<div class="clearfix"></div>


					<div class="row weather-days">
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Mon</h2>
								<h3 class="degrees">25</h3>
								<span>
								<canvas id="clear-day" width="32" height="32">
								</canvas>

						</span>
								<h5>15
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Tue</h2>
								<h3 class="degrees">25</h3>
								<canvas height="32" width="32" id="rain"></canvas>
								<h5>12
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Wed</h2>
								<h3 class="degrees">27</h3>
								<canvas height="32" width="32" id="snow"></canvas>
								<h5>14
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Thu</h2>
								<h3 class="degrees">28</h3>
								<canvas height="32" width="32" id="sleet"></canvas>
								<h5>15
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Fri</h2>
								<h3 class="degrees">28</h3>
								<canvas height="32" width="32" id="wind"></canvas>
								<h5>11
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Sat</h2>
								<h3 class="degrees">26</h3>
								<canvas height="32" width="32" id="cloudy"></canvas>
								<h5>10
							<i>km/h</i>
						</h5>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		</div>-->
		<!-- end of weather widget -->


		<!--<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel fixed_height_320">
				<div class="x_title">
					<h2>Daily active users <small>Sessions</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="dashboard-widget-content">
						<ul class="quick-list">
							<li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
							</li>
							<li><i class="fa fa-bars"></i><a href="#">Subscription</a>
							</li>
							<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
							<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
							</li>
							<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
							<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
							</li>
							<li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
							</li>
						</ul>

						<div class="sidebar-widget">
							<h4>Profile Completion</h4>
							<canvas width="150" height="80" id="foo2" class="" style="width: 160px; height: 100px;"></canvas>
							<div class="goal-wrapper">
								<span class="gauge-value pull-left">$</span>
								<span id="gauge-text2" class="gauge-value pull-left">3,200</span>
								<span id="goal-text2" class="goal-value pull-right">$5,000</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->

	</div>

</div>
<?php // echo "<h4>Login Successfully</h4>"; ?>
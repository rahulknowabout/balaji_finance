<div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">Admin
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                   
                                 <!--   <li>
                                        <a href="index.php?f=setting&t=setting">
										<?php $sep = runquery("SELECT","*","settinga");
										          $per = 0;
										         if( $sep['0']['name'] != "" ) {
												         $per = 10;
												 
												 }
												  if( $sep['0']['password'] != "" ) {
												         $per = $per+10;
												 
												 }
												   if( $sep['0']['email'] != "" ) {
												         $per = $per+10;
												 
												 }
												  if( $sep['0']['phone'] != "" ) {
												         $per = $per+10;
												 
												 }
												  if( $sep['0']['fax'] != "" ) {
												         $per = $per+10;
												 
												 }
												  if( $sep['0']['address'] != "" ) {
												         $per = $per+10;
												 
												 }
												  if( $sep['0']['flink'] != "" ) {
												         $per = $per+10;
												 
												 }
										
										           if( $sep['0']['glink'] != "" ) {
												         $per = $per+10;
												 
												 }
												 
												  if( $sep['0']['tlink'] != "" ) {
												         $per = $per+10;
												 
												 }
												  if( $sep['0']['lin_link'] != "" ) {
												         $per = $per+10;
												 
												 }
										
										 ?>
                                            <span class="badge bg-red pull-right"><?php echo $per."%"; ?></span>
                                            <span>Settings</span>
                                        </a>
                                    </li>-->
                                    <li><a href="login.php?act=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
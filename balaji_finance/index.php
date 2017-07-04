<?php ob_start();
session_start();
error_reporting(0);
//error_reporting(E_ALL);
if( !isset( $_SESSION['secure'] ) )
{
	header( 'location:login.php' );
}
//echo "<pre>"; print_r($_POST); die();
include('./models/con_db.php'); 

include('./models/functiondb.php');

include('./code/functions.php');

include('./code/kfun.php');

include('./controller/functions.php');

//include('./mjs/menujs.js');

if( isset( $_REQUEST['onlyupload'] ) && $_REQUEST['onlyupload'] == "y" )
{
	if(isset($_FILES['upload'])){
		$filen = $_FILES['upload']['tmp_name']; 
	//	echo $filen."<<";
		$con_images = "./images/".$_FILES['upload']['name'];
		
		move_uploaded_file($filen, $con_images );
		$url = "./images/".$_FILES['upload']['name'];
		
		
	   $funcNum = $_GET['CKEditorFuncNum'] ;
	   // Optional: instance name (might be used to load a specific configuration file or anything else).
	   $CKEditor = $_GET['CKEditor'] ;
	   // Optional: might be used to provide localized messages.
	   $langCode = $_GET['langCode'] ;
		
	   // Usually you will only assign something here if the file could not be uploaded.
	   $message = '';
	   echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
	}
}
if( isset( $_GET['f'] ) && isset( $_GET['t'] ) ){

	if( $_GET['f'] == "ajax" && $_GET['t'] == "ajaxmenu" )	{
		include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
		 die();
	}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Balaji Finance </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">
			<!-- Left navigation -->
            <?php
				include("lefti.php");
			?>
            <!-- /Left navigation -->
            

            <!-- Top navigation -->
            <?php
				include("top.php");
			?>
            <!-- /Top navigation -->
			
			 <!-- Right navigation -->
			 
			 <div class="right_col" role="main">
			 <?php
			 	$cls = "";
				$showMsg = "";
				if( isset( $_SESSION['emsg'] ) && $_SESSION['emsg'] != "" )
				{
					$cls = "alert alert-warning alert-dismissible fade in";
					$showMsg	=	$_SESSION['emsg'];
					unset( $_SESSION['emsg'] );
				} else if( isset( $_SESSION['smsg'] ) && $_SESSION['smsg'] != "" )
				{
					$cls = "alert alert-success alert-dismissible fade in";
					$showMsg	=	$_SESSION['smsg'];
					unset( $_SESSION['smsg'] );
				}
				if( $cls != "" && $showMsg != "" )
				{
			?>
					<div class="<?php echo $cls; ?>" role="alert">
						<?php echo $showMsg; ?>
					</div>
			<?php		
				}
			?>
            <?php
				if( isset( $_GET['f'] ) && isset( $_GET['t'] ) )
				{
					if( isset( $_GET['f'] ) && $_GET['f'] == 'user' && isset( $_GET['t'] ) && $_GET['t'] == "usergroup") {
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "user" && $_GET['t'] == "usergroupadd" && !isset(  $_GET['up'] ) ) {   
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "user" && $_GET['t'] == "usergroupadd" && isset( $_GET['up'] ) ) {
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "user" && $_GET['t'] == "users" && !isset( $_GET['del'] )  && !isset( $_GET['bid'] ) && !isset( $_GET['edi'] ) && !isset( $_GET['uid'] ) && !isset( $_GET['a'] ))	{
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
					if( $_GET['f'] == "user" && $_GET['t'] == "usersf" && !isset( $_GET['del'] )  && !isset( $_GET['bid'] ) && !isset( $_GET['edi'] ) && !isset( $_GET['uid'] ) && !isset( $_GET['a'] ))	{
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}

					if( $_GET['f'] == "user" && $_GET['t'] == "pdf" && !isset( $_GET['del'] )  && !isset( $_GET['bid'] ) && !isset( $_GET['edi'] ) && !isset( $_GET['uid'] ) && !isset( $_GET['a'] ))	{
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
					if( $_GET['f'] == "user" && $_GET['t'] == "pdff" && !isset( $_GET['del'] )  && !isset( $_GET['bid'] ) && !isset( $_GET['edi'] ) && !isset( $_GET['uid'] ) && !isset( $_GET['a'] ))	{
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "user" && $_GET['t'] == "useraddedit" && isset( $_GET['uid'] )  && isset( $_GET['edi'] ) && !isset( $_GET['a'] ))	{
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "user" && $_GET['t'] == "useraddedit" && !isset( $_GET['uid'] )  && !isset( $_GET['edi'] ))  {
				
					include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "content" && $_GET['t'] == "artical_cat" && !isset ( $_GET['act'] ) )	{
				
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "content" && $_GET['t'] == "artical_cat_list")	{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
				
					if( $_GET['f'] == "content" && $_GET['t'] == "artical_list")	{
				
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
				
					if( $_GET['f'] == "content" && $_GET['t'] == "artical" && !isset ( $_GET['act'] ) )	{
				
						
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "menu" && $_GET['t'] == "menu" && !isset ( $_GET['act'] ) )	{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "banner" && $_GET['t'] == "banner" && !isset ( $_GET['act'] ) )	{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "newsletter" && $_GET['t'] == "newsletter" && !isset ( $_GET['act'] ) )	{
				
						
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
					
					if( $_GET['f'] == "newsletter" && $_GET['t'] == "newsletteradd" && !isset ( $_GET['act'] ) )	{
				
						
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
			
				
					if( $_GET['f'] == "carrer" && $_GET['t'] == "carrer" && !isset ( $_GET['act'] ) )
					{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
				
					}
				
					if( $_GET['f'] == "setting" && $_GET['t'] == "setting" && !isset ( $_GET['act'] ) )
					{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "events" && $_GET['t'] == "events" && !isset ( $_GET['act'] ) )
					{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					if( $_GET['f'] == "events" && $_GET['t'] == "events_list" && !isset ( $_GET['act'] ) )
					{
						include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					if( $_GET['f'] == "imagegallary" && $_GET['t'] == "imagegallary" && !isset ( $_GET['act'] ) )	
					{
		              
					  	include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
				    if( $_GET['f'] == "faq" && $_GET['t'] == "faq" && !isset ( $_GET['act'] ) )	
					{
		              
					  	include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					  if( $_GET['f'] == "faq" && $_GET['t'] == "faqadd" && !isset ( $_GET['act'] ) )	
					{
		              
					  	include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					  if( $_GET['f'] == "newsletter" && $_GET['t'] == "sendnewsletter" && !isset ( $_GET['act'] ) )	
					{
		              
					  	include('./view/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
				}else
				{
					include("right.php");
				}
				if( isset ( $_GET['act'] ) )
				{
					if( $_GET['f'] == "user" && $_GET['t'] == "users"  && isset( $_GET['edi'] ) )	{
					
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
						echo './controller/'.$_GET['f'].'/'.$_GET['t'].'.php';
					die();
					}
					
					if( $_GET['f'] == "user" && $_GET['t'] == "users"  && isset( $_GET['bid'] )  )  {
					
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( isset( $_GET['del'] ) && $_GET['del'] != "" && $_GET['f'] == "user" && $_GET['t'] == "ugb") {
					
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					 }
					
					if( $_GET['f'] == "user" && $_GET['t'] == "ugb") {
					
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "user" && $_GET['t'] == "users"  && isset( $_GET['del'] ) )  {
					
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "content" && $_GET['t'] == "artical")	{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "content" && $_GET['t'] == "artical_cat")	{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "menu" && $_GET['t'] == "menuac")	{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "banner" && $_GET['t'] == "bannerac")	{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "newsletter" && $_GET['t'] == "newsletter")
					{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					if( $_GET['f'] == "events" && $_GET['t'] == "events")
					{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					
					if( $_GET['f'] == "carrer" && $_GET['t'] == "carrer")
					{
						include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
					}
					 if( $_GET['f'] == "imagegallary" && $_GET['t'] == "imagegallary" )	
					 {
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                 }
					 if( $_GET['f'] == "faq" && $_GET['t'] == "faq" )	
					{
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					 if( $_GET['f'] == "newsletter" && $_GET['t'] == "newslettersend" )	
					{
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					 if( $_GET['f'] == "setting" && $_GET['t'] == "basicsetting" )	
					{
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					 if( $_GET['f'] == "setting" && $_GET['t'] == "mailsetting" )	
					{
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
					if( $_GET['f'] == "setting" && $_GET['t'] == "paymentsetting" )	
					{
		              
					  	include('./controller/'.$_GET['f'].'/'.$_GET['t'].'.php');
	                }
			
			
				}
			?>
				 <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">&nbsp;
                            <span class="lead"> <i class="fa fa-book"></i> Balaji Finance </span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
			</div>
            <!-- /Right navigation -->
        </div>


    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- gauge js -->
    <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <!-- sparkline -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>

    <script src="js/custom.js"></script>
    <!-- skycons -->
    <script src="js/skycons/skycons.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>

    <!-- flot -->

    
    <!-- /flot -->
    <!--  -->
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'DD/MM/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };

            $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange_right').daterangepicker(optionSet1, cb);

            $('#reportrange_right').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange_right').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });

            $('#options1').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
            });

            $('#options2').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
            });

            $('#destroy').click(function () {
                $('#reportrange_right').data('daterangepicker').remove();
            });

        });
    </script>
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'DD/MM/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker(  {
                singleDatePicker: true,
                calender_style: "picker_1"
            },function (start, end, label) {
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
    <!-- input_mask -->
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
    <!-- /input mask -->
    <!-- ion_range -->
    <script>
        $(function () {
            $("#range_27").ionRangeSlider({
                type: "double",
                min: 1000000,
                max: 2000000,
                grid: true,
                force_edges: true
            });
            $("#range").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 0,
                max: 5000,
                from: 1000,
                to: 4000,
                type: 'double',
                step: 1,
                prefix: "$",
                grid: true
            });
            $("#range_25").ionRangeSlider({
                type: "double",
                min: 1000000,
                max: 2000000,
                grid: true
            });
            $("#range_26").ionRangeSlider({
                type: "double",
                min: 0,
                max: 10000,
                step: 500,
                grid: true,
                grid_snap: true
            });
            $("#range_31").ionRangeSlider({
                type: "double",
                min: 0,
                max: 100,
                from: 30,
                to: 70,
                from_fixed: true
            });
            $(".range_min_max").ionRangeSlider({
                type: "double",
                min: 0,
                max: 100,
                from: 30,
                to: 70,
                max_interval: 50
            });
            $(".range_time24").ionRangeSlider({
                min: +moment().subtract(12, "hours").format("X"),
                max: +moment().format("X"),
                from: +moment().subtract(6, "hours").format("X"),
                grid: true,
                force_edges: true,
                prettify: function (num) {
                    var m = moment(num, "X");
                    return m.format("Do MMMM, HH:mm");
                }
            });
        });
    </script>
    <!-- /ion_range -->
    <!-- knob -->
    <script>
        $(function ($) {

            $(".knob").knob({
                change: function (value) {
                    //console.log("change : " + value);
                },
                release: function (value) {
                    //console.log(this.$.attr('value'));
                    console.log("release : " + value);
                },
                cancel: function () {
                    console.log("cancel : ", this);
                },
                /*format : function (value) {
                 return value + '%';
                 },*/
                draw: function () {

                    // "tron" case
                    if (this.$.data('skin') == 'tron') {

                        this.cursorExt = 0.3;

                        var a = this.arc(this.cv) // Arc
                            ,
                            pa // Previous arc
                            , r = 1;

                        this.g.lineWidth = this.lineWidth;

                        if (this.o.displayPrevious) {
                            pa = this.arc(this.v);
                            this.g.beginPath();
                            this.g.strokeStyle = this.pColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                            this.g.stroke();
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false;
                    }
                }
            });

            // Example of infinite knob, iPod click wheel
            var v, up = 0,
                down = 0,
                i = 0,
                $idir = $("div.idir"),
                $ival = $("div.ival"),
                incr = function () {
                    i++;
                    $idir.show().html("+").fadeOut();
                    $ival.html(i);
                },
                decr = function () {
                    i--;
                    $idir.show().html("-").fadeOut();
                    $ival.html(i);
                };
            $("input.infinite").knob({
                min: 0,
                max: 20,
                stopper: false,
                change: function () {
                    if (v > this.cv) {
                        if (up) {
                            decr();
                            up = 0;
                        } else {
                            up = 1;
                            down = 0;
                        }
                    } else {
                        if (v < this.cv) {
                            if (down) {
                                incr();
                                down = 0;
                            } else {
                                down = 1;
                                up = 0;
                            }
                        }
                    }
                    v = this.cv;
                }
            });
        });
    </script>
    <!-- /knob -->
    
</body>

</html>
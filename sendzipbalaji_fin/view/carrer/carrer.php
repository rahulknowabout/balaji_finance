<?php //include($_SERVER['DOCUMENT_ROOT'].'/balaji_fin/admin/controller/functions.php'); ?>
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Career Section 
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Career</li>
          </ol>
        </section>
       
        
          <section class="content">      
        
        
    <div class="row">
            <!-- left column -->
     
              <!-- general form elements -->
        
                  
                   <div class="col-md-12">
              <!-- general Table -->
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Applied Candidates</h3>
                </div><!-- /.box-header -->
				<div class="form-group">
			 <form action="" method="post">
						
						<input type="text" name="search" id="search" value="<?php if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ){echo                         $_REQUEST['search']; } ?>" style="line-height:30px; width:160px;"/>                       
						
						<input type="submit" name="subb" id="subb" value="search" style="line-height:30px; width:100px;"/>
				  </form>
				 </div>
                <div class="box-body">
               
                  <table id="example2" width="100%" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Content Id</th>
                        <th>Post for apply</th>
                        <th>Name</th>
                        
                        <th>Email</th>
                        <th>Phone No</th>
                         <th>Address</th>
                        
                        <th>City</th>
                        <th>About</th>
                        <th>resume</th>
                        
                        
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php showjobscand();  ?>
                     
                                 
                    </tbody>
                   
                  </table>
                
                </div><!-- /.box-body -->
              </div>
            </div><!--/.col (right) -->
                  </div>
                  </div>

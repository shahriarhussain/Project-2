<?php

include_once "dbconnect.php";

session_start(); 

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";

?>


    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="findstudent.php" class="btn btn-primary" role="button">Back To Student Info</a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
				  
				  <?php
				  
				  $id = $_GET['id'];
				  
				  $select = $pdo->prepare("select * from student_info where sid=$id");
				  
				  $select->execute();
				  
				  while($row=$select->fetch(PDO::FETCH_OBJ)){
					  
					  echo '
					  
					  <div class="col-md-6">
				   <ul class="list-group">
				   <center><p class="list-group-item list-group-item-success"><b>Student Detail</b></p></center>
				   
				<li class="list-group-item"><b>ID</b><span class="badge">'.$row->sid.'</span></li>
				<li class="list-group-item"><b>Student Name </b><span class="label label-info pull-right">'.$row->st_name.'</span></li>
                <li class="list-group-item"><b>Fathers Name </b><span class="label label-info pull-right">'.$row->st_fname.'</span></li>
                <li class="list-group-item"><b>Mothers Name </b><span class="label label-info pull-right">'.$row->st_mname.'</span></li>
                <li class="list-group-item"><b>Date Of Birth </b><span class="label label-info pull-right">'.$row->st_dob.'</span></li>
                <li class="list-group-item"><b>Gender</b><span class="label label-info pull-right">'.$row->st_gender.'</span></li>
                <li class="list-group-item"><b>Address</b><span class="label label-info pull-right">'.$row->st_address.'</span></li>
                <li class="list-group-item"><b>Contact</b><span class="label label-info pull-right">'.$row->st_contact.'</span></li>
				<li class="list-group-item"><b>Email</b><span class="label label-primary pull-right">'.$row->st_email.'</span></li>
				
				</ul> 
                </div>
								  
					  
					  ';
					  
					  
					  
					  }
				  
				  ?>
				  
				  
				  </div>
				  </div>

    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->


  

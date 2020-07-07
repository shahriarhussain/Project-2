<?php

include_once "dbconnect.php";

session_start(); 

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";

?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="findteacher.php" class="btn btn-primary" role="button">Back To Teacher Info</a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
				  
				  <?php
				  
				  $id = $_GET['id'];
				  
				  $select = $pdo->prepare("select * from tutor_info where id=$id");
				  
				  $select->execute();
				  
				  while($row=$select->fetch(PDO::FETCH_OBJ)){
					  
					  echo '
					  
					  <div class="col-md-6">
				   <ul class="list-group">
				   <center><p class="list-group-item list-group-item-success"><b>Teacher Detail</b></p></center>
				   
				<li class="list-group-item"><b>ID</b><span class="badge">'.$row->id.'</span></li>
				<li class="list-group-item"><b>Teacher Name </b><span class="label label-info pull-right">'.$row->name.'</span></li>
                <li class="list-group-item"><b>Fathers Name </b><span class="label label-info pull-right">'.$row->fname.'</span></li>
                <li class="list-group-item"><b>Mothers Name </b><span class="label label-info pull-right">'.$row->mname.'</span></li>
                <li class="list-group-item"><b>Date Of Birth </b><span class="label label-info pull-right">'.$row->dob.'</span></li>
                <li class="list-group-item"><b>Gender</b><span class="label label-info pull-right">'.$row->gender.'</span></li>
                <li class="list-group-item"><b>Address</b><span class="label label-info pull-right">'.$row->address.'</span></li>
                <li class="list-group-item"><b>Subject</b><span class="label label-info pull-right">'.$row->subject.'</span></li>
                <li class="list-group-item"><b>Contact</b><span class="label label-info pull-right">'.$row->contact.'</span></li>
				<li class="list-group-item"><b>Email</b><span class="label label-primary pull-right">'.$row->email.'</span></li>
				
				</ul> 
                </div>
                
                <div class="col-md-6">
				  <ul class="list-group">
				  <center><p class="list-group-item list-group-item-success"><b>Image</b></p></center>
				  
				  <img src = "images/'.$row->image.'" class = "img-responsive"/>
				
				</ul> 
                </div>		
								  
					  
					  ';
					  
					  
					  
					  }
				  
				  ?>
				  
				  
				  </div>
				  </div>

    </section>
</div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->


  

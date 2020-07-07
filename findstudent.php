<?php

include_once "dbconnect.php";

session_start(); 

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";

?>

 


        
        <div class="box box-warning">
           
              <div class="box-body">
              
              <div style ="overflow-x:auto;">
               <table id = "studenttable" class= "table table-striped">
					  <thead>
						  <tr>
					  <th>ID</th>
					  <th>Student Name</th>
					  <th>Email</th>
					  <th>View</th>
					  </tr>
                      </thead>
					  <tbody>
					  
					  <?php
					  
					  $select = $pdo->prepare("select * from student_info order by sid desc");
					  
					  $select->execute();
					  
					  while($row=$select->fetch(PDO::FETCH_OBJ)){
						  
						  echo '
						  <tr>
						  <td>'.$row->sid.'</td>
						  <td>'.$row->st_name.'</td>
						  <td>'.$row->st_email.'</td>
						  
						 <td> <a href="viewstudentinfo.php?id='.$row->sid.'" class="btn btn-success" role="button"><span class= "glyphicon glyphicon-eye-open" style="color:#ffffff" data-toogle="tooltip" title = "View Student Details"></span></a>
						  </td>
						  
						  					 						  
						  </tr>
						   
						  ';
						  
						  }
					  
					  
					  ?>
					  
					  </tbody>
					  
                  </table></div>
              
              </div>
              </div>

 
  
  <script>
  
	$(document).ready( function () {
    $('#studenttable').DataTable();
    
} );
  
  </script>

<script>
  
	$(document).ready( function () {
    $('[data-toogle="tooltip"]').tooltip();
} );
  
  </script>
  
  




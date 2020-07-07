<?php

include_once "dbconnect.php";

session_start(); 

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";

?>

 

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <div class="box box-warning">
           
              <div class="box-body">
              
              <div style ="overflow-x:auto;">
               <table id = "teacherinfo" class= "table table-striped">
					  <thead>
						  <tr>
					  <th>ID</th>
					  <th>Teacher Name</th>
					  <th>Subject</th>
					  <th>View</th>
					  
					  </tr>
                      </thead>
					  <tbody>
					  
					  <?php
					  
					  $select = $pdo->prepare("select * from tutor_info order by id desc");
					  
					  $select->execute();
					  
					  while($row=$select->fetch(PDO::FETCH_OBJ)){
						  
						  echo '
						  <tr>
						  <td>'.$row->id.'</td>
						  <td>'.$row->name.'</td>
						  <td>'.$row->subject.'</td>
						  
						 <td> <a href="viewteacherinfo.php?id='.$row->id.'" class="btn btn-success" role="button"><span class= "glyphicon glyphicon-eye-open" style="color:#ffffff" data-toogle="tooltip" title = "View"></span></a>
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
    $('#teacherinfo').DataTable();
    
} );
  
  </script>

<script>
  
	$(document).ready( function () {
    $('[data-toogle="tooltip"]').tooltip();
} );
  
  </script>
  
  


  


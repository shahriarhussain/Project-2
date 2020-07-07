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
               <table id = "producttable" class= "table table-striped">
					  <thead>
						  <tr>
					  <th>Name</th>
					  <th>View</th>
					  <th>Edit</th>
					  </tr>
                      </thead>
					  <tbody>
					  
					  <?php
                          
                      $email=$_SESSION['email'];    
					  
					  $select = $pdo->prepare("select * from tutor_info where email='$email'");
					  
					  $select->execute();
					  
					  while($row=$select->fetch(PDO::FETCH_OBJ)){
						  
						  echo '
						  <tr>
						  <td>'.$row->name.'</td>
						  
						 <td> <a href="viewteacherinfo.php?id='.$row->id.'" class="btn btn-success" role="button"><span class= "glyphicon glyphicon-eye-open" style="color:#ffffff" data-toogle="tooltip" title = "View"></span></a>
						  </td>
                           <td>
						  <a href="editteacherinfo.php?id='.$row->id.'" class="btn btn-info" role="button"><span class= "glyphicon glyphicon-edit" style="color:#ffffff" data-toogle="tooltip" title = "Edit"></span></a>
						  </td>
						  
						  					 						  
						  </tr>
						   
						  ';
						  
						  }
					  
					  
					  ?>
					  
					  </tbody>
					  
                  </table></div>
              
              </div>
              </div>

 
  
  
  
  


  


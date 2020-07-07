
    




<?php

include_once "dbconnect.php";

session_start();

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";


?>



   

      
           
              <div class="box-body">
                  
              
              <table id = "teacherinfo" class= "table table-striped">
              
              
				  
				  <?php
				  
				  
				  
				  $select = $pdo->prepare("select * from tutor_info order by id");
				  
				  $select->execute();
				  
				  while($row=$select->fetch(PDO::FETCH_OBJ)){
					  
					  echo '
					  
					 
                     
                     
                     <div class="col-md-4">
                     <ul class="list-group">
                     
                     <img src = "images/'.$row->image.'" class = "img-responsive"/>
				<li class="list-group-item"><b>Teacher Name </b><span class="label label-info pull-right">'.$row->name.'</span></li>
                <li class="list-group-item"><b>Fathers Name </b><span class="label label-info pull-right">'.$row->fname.'</span></li>
                <li class="list-group-item"><b>Mothers Name </b><span class="label label-info pull-right">'.$row->mname.'</span></li>
                <li class="list-group-item"><b>Gender</b><span class="label label-info pull-right">'.$row->gender.'</span></li>
                <li class="list-group-item"><b>Address</b><span class="label label-info pull-right">'.$row->address.'</span></li>
				
				</ul> 
                </div>
                   
    
                   
                		  
					 
					  ';
					  
					  
					  
					  }
				  
				  ?>
				  
			</table>		  
          </div>
        
        <script>
  
	$(document).ready( function () {
    $('#teacherinfo').DataTable();
    
} );
  
  </script>
                

                 
 




<?php
include_once "footer.php";
?>
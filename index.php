
    




<?php

include_once "dbconnect.php";

session_start(); 

if($_SESSION['email']==""){
	
	header('location:login.php');
	
	}

include_once "header.php";

     



?>



    <section class="content container-fluid">

      
           
              <div class="box-body">
                  
              
              
              
              
				  
				  <?php
                  
                  
                  
                  
				  
				  
				  
				  $select = $pdo->prepare("select * from tutor_info");
				  
				  $select->execute();
				  
				  while($row=$select->fetch(PDO::FETCH_OBJ)){
					  
					  echo '
					  
					 
                     
                     <html>
                     <div class="col-md-4">
                   
    <head>
        
        <style>
            
            table {
  
  width: 100%;
  margin:20px;
}
        </style>
        
    </head>
    
                
		<body>	
        
        <table border="1">
            
            <tbody>
                   <tr>
				        <td rowspan="5" style= "width:40%;"><center><img src = "images/'.$row->image.'" class = "img-responsive"/ "img-rounded" width ="100%" height="100%"></center></td>
				    </tr>
                    
				    <tr>
				        <td " ><li class="list-group-item"><b>Name </b><span class="label label-info pull-right">'.$row->name.'</span></li></td>
                    </tr>
                    
                    <tr>
				        <td " ><li class="list-group-item"><b>Father Name </b><span class="label label-info pull-right">'.$row->fname.'</span></li></td>
                    </tr>
                    
                    <tr>
                        <td > <li class="list-group-item"><b>Gender</b><span class="label label-info pull-right">'.$row->gender.'</span></li></td>
                    </tr>
                    
                    <tr> 
                        <td ><li class="list-group-item"><b>Address</b><span class="label label-info pull-right">'.$row->address.'</span></li></td>
                    </tr>
                   
				
				
                </tbody>
                </table>
               
                </body>
                     </div>
                
                </html>	
                		  
					 
					  ';
					  
					  
					  
					  }
                  
    ?>              
                  
        
        </div>
                  
    </section>




<?php
include_once "footer.php";
?>
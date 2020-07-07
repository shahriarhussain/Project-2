<?php

include_once "dbconnect.php";

session_start();

include_once "header.php";


	$id = $_GET['id'];
				  
	$select = $pdo->prepare("select * from tutor_info where id=$id");		  
	$select->execute();
	$row=$select->fetch(PDO::FETCH_ASSOC);
	
	$id_db=$row['id'];
	
	$name_db=$row['name'];
	
	$fname_db=$row['fname'];
	
	$mname_db=$row['mname'];
	
	$dob_db=$row['dob'];
	
	$gender_db=$row['gender'];
	
	$address_db=$row['address'];

    $subject_db=$row['subject'];
	
	$image_db=$row['image'];
	
	
	if(isset($_POST['btnupdate'])){
	
	$name_txt = $_POST['name'];
	
	$fname_txt = $_POST['fname'];
	
	$mname_txt = $_POST['mname'];
	
	$dob_txt = $_POST['dob'];
	
	$gender_txt = $_POST['gender'];
	
	$address_txt = $_POST['address'];
        
    $subject_txt=$row['subject'];
	
	$f_name= $_FILES['myfile']['name'];


	if(!empty($f_name)){
	
	$f_tmp= $_FILES['myfile']['tmp_name'];
	
	$f_size= $_FILES['myfile']['size'];
	
	$f_extension= explode('.',$f_name);
	$f_extension= strtolower(end($f_extension));
	
	$f_newfile = uniqid().'.'.$f_extension;
	
	$store = "images/".$f_newfile;
	
	if($f_extension=='jpg' || $f_extension=='jpeg' || $f_extension=='png' || $f_extension=='gif'){
		
		if($f_size>=1000000){
			
			
			$error = '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Error",
		text: "Max file should be 1MB",
		icon: "warning",
		button: "Ok",
		});
				
		
		});
		
		</script>';		
		
		echo $error;	
			
			}else{
				
				if(move_uploaded_file($f_tmp,$store)){
					
					$f_newfile;
					
					if(!isset($error)){
			
		$update = $pdo->prepare("update tutor_info set name=:name, fname=:fname, mname=:mname, dob=:dob, gender=:gender, address=:address, subject=:subject, image=:image where id=$id");
	
	$update->bindparam(':name',$name_txt);	
	$update->bindparam(':fname',$fname_txt);
	$update->bindparam(':mname',$mname_txt);
	$update->bindparam(':dob',$dob_txt);
	$update->bindparam(':gender',$gender_txt);
	$update->bindparam(':address',$address_txt);
    $update->bindparam(':subject',$subject_txt);
	$update->bindparam(':image',$f_newfile);
	
	
	if($update->execute()){
				
				echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Update Successfull",
		text: "Updated",
		icon: "success",
		button: "Ok",
		});
				
		
		});
		
		</script>';	 
				
				
				
				
				
				}else{
					
				echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Error",
		text: "Update Fail",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';	 	
					
					
					}
			
			
			}
					
					}
				}
						
				}else{
					
							
		$error = '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "warning",
		text: "Only jpg, jpeg, png & gif file can be uploaded",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';		
		
		echo $error;	
					
		}
		
		
	}else{
		
	$update = $pdo->prepare("update tutor_info set name=:name, fname=:fname, mname=:mname, dob=:dob, gender=:gender, address=:address, subject=:subject, image=:image where id=$id");
	
	$update->bindparam(':name',$name_txt);	
	$update->bindparam(':fname',$fname_txt);
	$update->bindparam(':mname',$mname_txt);
	$update->bindparam(':dob',$dob_txt);
	$update->bindparam(':gender',$gender_txt);
	$update->bindparam(':address',$address_txt);
	$update->bindparam(':image',$image_db);
	
	
	if($update->execute()){
		
	$error= '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Update successfull",
		text: "Updated",
		icon: "success",
		button: "Ok",
		});
				
		
		});
		
		</script>';	 
		
		echo $error;	
		
		
	}else{
		
		$error =  '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Error",
		text: "Update Fail",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';	
		
		echo $error; 	
		
		
		}
		
		
		}

	
}

$select = $pdo->prepare("select * from tutor_info where id=$id");		  
	$select->execute();
	$row=$select->fetch(PDO::FETCH_ASSOC);
	
	$id_db=$row['id'];
	
	$name_db=$row['name'];
	
	$fname_db=$row['fname'];
	
	$mname_db=$row['mname'];
	
	$dob_db=$row['dob'];
	
	$gender_db=$row['gender'];
	
	$address_db=$row['address'];

    $subject_db=$row['subject'];
	
	$image_db=$row['image'];


?>

  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Teacher Info
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

            
            <form action = "" method = "post" enctype = "multipart/form-data">
           
              <div class="box-body">
				  
				  <div class="col-md-6">
				  
				   <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value = "<?php echo $name_db;?>" placeholder="Enter Name" required>
                </div>
                
                
				  <div class="form-group">
                  <label >Father Name</label>
                  <input type="text" class="form-control"  name="fname" value = "<?php echo $fname_db;?>" placeholder="Enter Father Name" required>
                </div>
                
                <div class="form-group">
                  <label >Mother Name</label>
                  <input type="text" class="form-control"  name="mname" value = "<?php echo $mname_db;?>" placeholder="Enter Father Name" required>
                </div>
				  
				  </div>
				  
					  <div class="col-md-6">
					  
					  <div class="form-group">
                  <label >Date Of Birth</label>
                  <input type="date"  class="form-control"  name="dob" value = "<?php echo $dob_db;?>" placeholder="Enter....." required>
                </div>
                
                <div class="form-group">
                  <label >Gender</label>
                  <input type="text" class="form-control"  name="gender" value = "<?php echo $gender_db;?>"  required>
                </div>
                
                <div class="form-group">
                  <label >Address</label>
                  <input type="text" class="form-control"  name="address" value = "<?php echo $address_db;?>" required>
                </div>
                          
                <div class="form-group">
                  <label >Subject</label>
                  <input type="text" class="form-control"  name="subject" value = "<?php echo $subject_db;?>" required>
                </div>
					  
					  <div class="form-group">
                  <label >Image</label>
                  
                  <img src = "images/<?php echo $image_db; ?>" class= "img-rounded" width = "40px"height="40px">
                  
                  <input type="file" class="input-group"  name="myfile" >
                  <p>Upload Image</p>
                </div>
					  
					  </div>
					  
				  </div>
				  
				  <div class="box-footer">
					  
		
			<button type="submit" class="btn btn-warning" name = "btnupdate">Update</button>

              </div>
				  
				  </form>
              
				  

    </section>
  



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="bower_components/sweetalert/sweetalert.js"></script>



<?php
include_once "dbconnect.php";

session_start(); 



if(isset($_POST['btnsave'])){
	
	$username = $_POST['txtname'];
    $fname = $_POST['txtfname'];
    $mname = $_POST['txtmname'];
    $dob = $_POST['dob'];
    $gender = $_POST['txtgender'];
    $address = $_POST['txtaddress'];
    $subject = $_POST['txtsubject'];
    $contact = $_POST['contact'];
	$useremail = $_POST['txtemail'];
	$password = $_POST['txtpassword'];
	$confirm_pass=$_POST['txtconfpass'];
    
    $f_name= $_FILES['myfile']['name'];
	
	$f_tmp= $_FILES['myfile']['tmp_name'];
	
	$f_size= $_FILES['myfile']['size'];
	
	$f_extension= explode('.',$f_name);
	$f_extension= strtolower(end($f_extension));
	
	$f_newfile = uniqid().'.'.$f_extension;
	
	$store = "images/".$f_newfile;
    
    if($password==$confirm_pass){
	
	if($f_extension=='jpg' || $f_extension=='jpeg' || $f_extension=='png'){
		
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
					
					$image = $f_newfile;
                    
                    
	if(isset($_POST['txtemail'])){
	
	$select = $pdo->prepare("select * from tutor_info where email = '$useremail'");
	
	$select->execute();
	
	if($select->rowCount() >0){
		
		echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Warning",
		text: "Your Email Already Exist: Please try from different Email",
		icon: "warning",
		button: "Ok",
		});
				
		
		});
		
		</script>';
		
		} else{
        
	
			
			$insert = $pdo->prepare("insert into tutor_info(name, email, password, fname, mname, dob, gender, address, contact, subject, image) values(:name, :email, :pass, :fname, :mname, :dob, :gender, :address, :contact, :subject, :image)");
		 
		 $insert->bindparam(':name',$username);
         $insert->bindparam(':fname',$fname);
         $insert->bindparam(':mname',$mname);
         $insert->bindparam(':dob',$dob);
         $insert->bindparam(':gender',$gender);
         $insert->bindparam(':address',$address);
         $insert->bindparam(':subject',$subject);
         $insert->bindparam(':contact',$contact);
         $insert->bindparam(':image',$image);
		 $insert->bindparam(':email',$useremail);
		 $insert->bindparam(':pass',$password);
        
		
		 
			 
		 if($insert->execute()){
			 echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Congrats!",
		text: "Registration Successfull",
		icon: "success",
		button: "Ok",
		});
				
		
		});
		
		</script>';;
			 }
			 else{
			echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Something went wrong",
		text: "Registration Fail",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';	 
				 }
			
			}
	
	
	
	
	
	
    }
    }
    
    
    
    }
    
    }else{
					
							
		echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "warning",
		text: "Only jpg, jpeg, png & gif file can be uploaded",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';		 	
					
		}
	
	}else{
        
        echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Oops",
		text: "password & confirm password not match",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';	
        
    }
    
}


?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
 <body>
  <div class=form>
	
<form action = "" method = "post" enctype = "multipart/form-data">

<label>Name</label><input type="text" class="form-control" name="txtname" placeholder="Enter Name" required>
 
 <label>Father's Name</label><input type="text" class="form-control" name="txtfname" placeholder="Enter Father's Name" required>
 
 <label>Mother's Name</label><input type="text" class="form-control" name="txtmname" placeholder="Enter Mother's Name" required>
 
 <label>Date Of Birth</label><input type="date" class="form-control" name="dob"  required>
 
 <label>Gender</label><input type="text" class="form-control" name="txtgender" placeholder="Enter Gender" required>
 
 <label>Address</label><input type="text" class="form-control" name="txtaddress" placeholder="Enter Address" required>
 
 <label>Subject</label><input type="text" class="form-control" name="txtsubject" placeholder="Subject want to teach" required>
 
 <label>Contact</label><input type="tel" class="form-control" name="contact" placeholder="01*********" pattern="[0-9]{11}" maxlength="11" required>

 <label >Email address</label><input type="email" class="form-control"  name="txtemail" placeholder="Enter Email" required>
 

<label >Image</label><input type="file" class="input-group"  name="myfile" required>
 
 <label>Password</label><input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
 
 <label>Confirm Password</label><input type="password" class="form-control" name="txtconfpass" placeholder="Confirm Password" required>
 
 <button type="submit" class="btn btn-info" name = "btnsave">Save</button>

</form>
</div>
  <div class="box-header with-border">
              <h3 class="box-title"><a href="login.php" class="btn btn-primary" role="button">Back To Login Page </a></h3>
            </div>
  </body>   
  </html>             
                



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
    $contact = $_POST['contact'];
	$useremail = $_POST['txtemail'];
	$password = $_POST['txtpassword'];
	$confirm_pass=$_POST['txtconfpass'];
    
    
	if($password==$confirm_pass){
	
        
	if(isset($_POST['txtemail'])){
	
	$select = $pdo->prepare("select * from tutor_info where st_email = '$useremail'");
	
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
			
			$insert = $pdo->prepare("insert into student_info(st_name, st_email, st_password, st_fname, st_mname, st_dob, st_gender, st_address, st_contact) values(:name, :email, :pass, :fname, :mname, :dob, :gender, :address, :contact)");
		 
		 $insert->bindparam(':name',$username);
         $insert->bindparam(':fname',$fname);
         $insert->bindparam(':mname',$mname);
         $insert->bindparam(':dob',$dob);
         $insert->bindparam(':gender',$gender);
         $insert->bindparam(':address',$address);
         $insert->bindparam(':contact',$contact);
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
			echo "Registratioin fail";	 
				 }
			
			}
	
	
	
	
	
	
    }
    }
    
    else{
        
        echo "Password & confirm password not match";
    }
	
	}


?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
 <body>
  <div class=form>
	
<form action = "" method = "post">

<label>Name</label><input type="text" class="form-control" name="txtname" placeholder="Enter Name" required>
 
 <label>Father's Name</label><input type="text" class="form-control" name="txtfname" placeholder="Enter Father's Name" required>
 
 <label>Mother's Name</label><input type="text" class="form-control" name="txtmname" placeholder="Enter Mother's Name" required>
 
 <label>Date Of Birth</label><input type="date" class="form-control" name="dob"  required>
 
 <label>Gender</label><input type="text" class="form-control" name="txtgender" placeholder="Enter Gender" required>
 
 <label>Address</label><input type="text" class="form-control" name="txtaddress" placeholder="Enter Address" required>
 
 <label>Contact</label><input type="tel" class="form-control" name="contact" placeholder="01*********" pattern="[0-9]{11}" maxlength="11" required>

 <label >Email address</label><input type="email" class="form-control"  name="txtemail" placeholder="Enter Email" required>
 
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
                



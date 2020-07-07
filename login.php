<script src="bower_components/jquery/dist/jquery.min.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="plugins/iCheck/icheck.min.js"></script>

<script src="bower_components/sweetalert/sweetalert.js"></script>




<?php

include_once "dbconnect.php";
session_start();


if(isset($_POST['btn_login'])){
	
	$useremail = $_POST['txt_email'];
	$password = $_POST['txt_password'];
	
	
	
	$select = $pdo->prepare("select * from tutor_info where email = '$useremail' AND password = '$password'");
	
	$select->execute();
	
	$row = $select->fetch(PDO::FETCH_ASSOC);
	
	if($row['email']==$useremail AND $row['password']==$password){
		
		$_SESSION['id']=$row['id'];
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
	
		
		
		echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "Good job!'.$_SESSION['name'].'",
		text: "Login Successfull",
		icon: "success",
		button: "Loading...",
		});
				
		
		});
		
		</script>';
		
        
		
		header('refresh:3;index.php');
		
		
		}
		
		else{
			
            echo '<script type = "text/javascript">
		jQuery(function validation(){
		
		
		swal({
		title: "EMAIL OR PASSWORD IS WRONG",
		text: "Login Fail",
		icon: "error",
		button: "Ok",
		});
				
		
		});
		
		</script>';
			
			}
	
	
	
	}



?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div class=form>

    <form action="" method="post">
      
        <label >Email</label> <input type="email" placeholder="Email" name = "txt_email" required>
        
     
      <label>Password</label><input type="password" class="form-control" placeholder="Password" name = "txt_password" required>
       
    
          <button type="submit" name = "btn_login">Login</button>
           
      </form>
      
     

	
		<a href='ttregister.php'>Register as a Teacher</a><br/>
		<a href='stregister.php'>Register as a Student</a>
	
      
    </div>

</body>
</html>

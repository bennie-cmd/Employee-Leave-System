<?php
	$mysql = mysqli_connect('localhost','root', '','employee_ls');
		
	if (isset($_POST['register'])){
	 	session_start();
	 	
	 	$email = $_POST['email'];
	 	$firstname = $_POST['firstname'];
	 	$lastname = $_POST['lastname'];
	 	$employee = $_POST['employee_id'];
	 	$department = $_POST['department'];
	 	$period_joined = $_POST['period_joined'];
	 	$password_1 = $_POST['pass1'];
	 	$password_2 = $_POST['pass2'];
			 	
	 		
	 	if ($password_1 === $password_2) {
	 	 
	 		$hashed_password = md5($password_1);

	 		$query = "INSERT INTO register (email, firstname, lastname, employee_id, department, date_hired, password) VALUES ('$email', '$firstname', '$lastname', '$employee', '$department', '$period_joined', '$hashed_password')";
	 			
	 			
	 			
	 		    $re =  mysqli_query($mysql, $query);
	 		    var_dump($re);
	 		    $_SESSION['email'] = $email;
	 		    $_SESSION['message'] = "successfully registered";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: login.php');
	 		
	 	}else{
	 			$_SESSION['email'] = $email;
	 		    $_SESSION['message'] = "registeration failed";
				$_SESSION['msg_type'] = "danger";
	 		 header('location: register.php');
	 		
	 	}
	 	
	 }		


	
?>
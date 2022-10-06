<?php
	$mysql = mysqli_connect('localhost','root', '','employee_ls');
		
	if (isset($_POST['register'])){
	 	session_start();
	 	
	 	$email = $_POST['email'];
	 	$firstname = $_POST['firstname'];
	 	$lastname = $_POST['lastname'];
	 	$admi_number = $_POST['std_id'];
	 	$password_1 = $_POST['pass1'];
	 	$password_2 = $_POST['pass2'];
	 	$deleted = 0;
			 	
	 	if (!empty($email) && !empty($firstname) && !empty($lastname) && !empty($admi_number) && !empty($password_1) && !empty($password_2)) {
	 		
	 	if ($password_1 === $password_2) {
	 	 
	 		$hashed_password = md5($password_1);

	 		$query = "INSERT INTO tblstd_registration (std_email, std_admi_number, std_fname, std_lname, std_password, deleted) VALUES ('$email', '$admi_number', '$firstname', '$lastname', '$hashed_password', '$deleted')";
	 			
	 			
	 		    $re =  mysqli_query($mysql, $query);
	 		    var_dump($re);
	 		    $_SESSION['lname']=$row['std_lname'];
	  			$_SESSION['fname']=$row['std_fname'];
	 		    $_SESSION['std_email'] = $email;
	 		    $_SESSION['message'] = "successfully registered";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: questionnaire.php');
	 	}else{
	 			$_SESSION['std_email'] = $email;
	 		    $_SESSION['message'] = "registeration failed";
				$_SESSION['msg_type'] = "danger";
	 		 header('location: register_std.php');
	 		

	 		}
	 	}else{
	 			$_SESSION['std_email'] = $email;
	 		    $_SESSION['message'] = "registeration failed";
				$_SESSION['msg_type'] = "danger";
	 		 header('location: register_std.php');
	 		
	 	}		
}

	
?>
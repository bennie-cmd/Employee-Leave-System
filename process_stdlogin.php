<?php
	session_start();
if (isset($_SESSION['std_email'])) {
		
	}
	$conn = mysqli_connect('localhost','root', '','employee_ls');
		
	if (isset($_POST['login'])){

			$email = $_POST['email'];
			$password = $_POST['pass'];
			
			$deleted = 0;
			
			
			
	    if (!empty($_POST['email']) && !empty($_POST['pass']))
	  {
	  		$password= md5($password);
	  		$query="SELECT * FROM `tblstd_registration` WHERE `std_email`= '$email' AND `std_password` = '$password' AND `deleted` = '$deleted' limit 1";

	  		$result=mysqli_query($conn, $query);

	  		if (mysqli_num_rows($result) == 1) {
	  			$row = mysqli_fetch_assoc($result);
	  				
	  				$_SESSION['lname']=$row['std_lname'];
	  				$_SESSION['fname']=$row['std_fname'];
	  				$_SESSION['std_email']=$row['std_email'];
	  				$_SESSION['std_id']=$row['std_admi_number'];
	  				header("location:questionnaire.php");
	  			}
	  			else if($row['std_email'] != $email) {
	  			$_SESSION['std_email'] = $email;
	 		    $_SESSION['message'] = "Login failed please try again";
				$_SESSION['msg_type'] = "danger";
	  			header("location:login_student.php");
				}
				else{
				echo "the query does not exists";
				$_SESSION['message'] = "Login credentials are not correct";
				$_SESSION['msg_type'] = "danger";
	  			header("location:login_student.php");
				}
	  		

			
	  } 
	  } 
?>	 	
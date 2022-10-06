<?php
	session_start();
if (isset($_SESSION['email'])) {
		
	}
	$conn = mysqli_connect('localhost','root', '','employee_ls');
		
	if (isset($_POST['login'])){

			$email = $_POST['email'];
			$password = $_POST['pass'];
			$admin ="admin";
			$employee = "employee";
			$deleted = 0;
			
			
			
	    if (!empty($_POST['email']) && !empty($_POST['pass']))
	  {
	  		$password= md5($password);
	  		$query="SELECT * FROM `register` WHERE `email`= '$email' AND `password` = '$password' AND `deleted` = '$deleted' limit 1";

	  		$result=mysqli_query($conn, $query);

	  		if (mysqli_num_rows($result) == 1) {
	  			$row = mysqli_fetch_assoc($result);
	  			if($row['user_type'] == "employee")
	  			{ 
	  				$_SESSION['email']=$row['email'];
	  				$_SESSION['employee_id']=$row['employee_id'];
	  				$_SESSION['available_days']=$row['available_days'];
	  				header("location:leave_policy.php");
	  	
	  	
	  			}
	  			elseif($row['user_type'] == "admin")
	  			{
	  			$_SESSION['admin_email']=$row['email'];
	  			$_SESSION['admin_id']=$row['employee_id'];
	  			header("location:admin_interface.php");
	  	
	  				
				}
	  		} 
	  		else{

				$_SESSION['message'] = "Login failed please try again";
				$_SESSION['msg_type'] = "danger";
				header("location:login.php");
				
				}


	   }
	
	 }  
?>	 	
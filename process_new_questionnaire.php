<?php
	$mysql = mysqli_connect('localhost','root', '','employee_ls');
		
	if (isset($_POST['save'])){
	 	session_start();
	 	
	 	$title = $_POST['title'];
	 	$start_date = $_POST['start_date'];
	 	$end_date = $_POST['end_date'];
	 	$employee = $_POST['employee_id'];
	 	$description = $_POST['description'];
	 	$questionnaire_id = $_GET['id'];
	
			 	
	 	if (!empty($title) && !empty($start_date) && !empty($end_date) && !empty($employee) && !empty($description)){
	 		
	 	if ($end_date >= $start_date) {
	 	 
	 		$query = "INSERT INTO tblquestionnaire (title, start_date, end_date, employee_id, description) VALUES ('$title', '$start_date', '$end_date', '$employee', '$description')";
	 			
	 		    $re =  mysqli_query($mysql, $query);
	 		    var_dump($re);
	 		    
	 		    $_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Questionnaire successfully created";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: list_questionnaires.php');
	 	}else{
	 			$_SESSION['email'] = $email;
	 		    $_SESSION['message'] = "Failed To Add Questionnaire ensure to have correct dates";
				$_SESSION['msg_type'] = "danger";
	 		 header('location: new_questionnaire.php');
	 	}
	 	
	 }else{
	 			$_SESSION['email'] = $email;
	 		    $_SESSION['message'] = "registeration failed";
				$_SESSION['msg_type'] = "danger";
	 			header('location: new_questionnaire.php');
	 	}		
}

	
?>
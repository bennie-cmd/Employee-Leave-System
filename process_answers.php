<?php


$mysql = mysqli_connect('localhost','root', '','employee_ls');

if (isset($_POST['ans'])) {
	
	    session_start();
		extract($_POST);

			foreach($qid as $k => $v){

				$data = "questionnaire_id=$questionnaire_id";
				$data .=", lec_email='$lec'";
				$data .= ", std_admi_number='$std_id'";
				$data .= ", question_id='$qid[$v]' ";
				$data .= ", std_email='{$_SESSION['std_email']}' ";
				
				if($type[$v] == 'check_opt'){
					
					$test =implode(",", $answer[$v]);
					$data .= ", answer='$test'";

				}
				if ($type[$v] == 'radio_opt') {
					$test =implode(",", $answer[$v]);
					$data .= ", answer='$test'";
				}
				if ($type[$v] == 'textfield_s') {
				$data .= ", answer='$inputtext'";	
				}
				elseif (empty($test)) {
					$_SESSION['message'] = "Ensure to answer the questions before submitting";
					$_SESSION['msg_type'] = "danger"; 
	 		     header('location: questionnaire.php');
				}
						
		if(!empty($data)){
			$query="INSERT INTO tblanswer set $data";
			$re =  mysqli_query($mysql, $query);
	 		var_dump($re);

	 			$_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Answer successfully submitted";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: questionnaire.php');

			echo($data); 
	}	
	else{
			$_SESSION['message'] = "Ensure to answer the questions before submitting";
			$_SESSION['msg_type'] = "danger"; 
	 		 header('location: questionnaire.php');
	}
}
}



?>

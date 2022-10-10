<?php


$mysql = mysqli_connect('localhost','root', '','employee_ls');

if (isset($_POST['answer'])) {
	
	    session_start();
		extract($_POST);

			foreach($qid as $k => $v){
				$data = " questionnaire_id=$questionnaire_id ";
				$data .= ", std_admi_number='$std_id'";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", std_email='{$_SESSION['std_email']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='ans_checkbox'";
				}elseif ($type[$k] == 'radio_opt') {
					$data .=", answer='ans_radio'";
				}{
					$data .= ", answer='$answer[$k]' ";
				}
						
		if(!empty($data)){
			$query="INSERT INTO tblanswers set $data";
			$re =  mysqli_query($mysql, $query);
	 		var_dump($re);

	 		// 	$_SESSION['id'] = $questionnaire_id;
	 		//     $_SESSION['message'] = "Answer successfully submitted";
				// $_SESSION['msg_type'] = "success"; 
	 		//      header('location: questionnaire.php');

			echo($data); 
	}	
	else{
			echo"data did not go";
	}
}
}



?>
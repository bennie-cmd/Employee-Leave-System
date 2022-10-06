<?php

$mysql = mysqli_connect('localhost','root', '','employee_ls');

if (isset($_POST['create_two'])){
			session_start();
			extract($_POST);

	 		$type = "check_opt";
			$data = " questionnaire_id=$id ";
			$data .= ", question='$question' ";
			$data .= ", type='$type' ";
			if($type = 'check_opt'){
				$arr = array();
				foreach ($label as $k => $v) {
					$i = 0 ;
					while($i == 0){
						$k = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
						if(!isset($arr[$k]))
							$i = 1;
					}
					$arr[$k] = $v;
				}
			$data .= ", frm_option='".json_encode($arr)."' ";
			}else{
			$data .= ", frm_option='' ";
			}
		if(!empty($data)){
			$query="INSERT INTO tblquestions set $data";
			$re =  mysqli_query($mysql, $query);
	 		var_dump($re);

	 			$_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Question successfully created";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: list_questionnaires.php');

			// echo($data); 
			
		}else{
		
			echo "the data did not go";
				$_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Question was not add try again";
				$_SESSION['msg_type'] = "danger"; 
			header('location: view_questionnaire.php');
			
		}

	}

		if (isset($_POST['create_three'])){
			session_start();
			extract($_POST);

			$frm_opt = " ";
	 		$type = "textfield_s";
			$data = " questionnaire_id=$id ";
			$data .= ", question='$question' ";
			$data .= ", type='$type' ";
			$data .= ", frm_option='$frm_opt' ";
			
		if(!empty($data)){
			$query="INSERT INTO tblquestions set $data";
			$re =  mysqli_query($mysql, $query);
	 		var_dump($re);

	 			$_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Question successfully created";
				$_SESSION['msg_type'] = "success"; 
	 		     header('location: list_questionnaires.php');

			// echo($data); 
			
		}else{
		
			echo "the data did not go";
				$_SESSION['id'] = $questionnaire_id;
	 		    $_SESSION['message'] = "Question was not add try again";
				$_SESSION['msg_type'] = "danger"; 
			header('location: view_questionnaire.php');
			
		}

	}
?>
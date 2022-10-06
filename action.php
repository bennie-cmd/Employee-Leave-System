<?php

$mysql = mysqli_connect('localhost','root', '','employee_ls');

if (isset($_POST['create'])){
			session_start();
			extract($_POST);

	 		$type = "radio_opt";
			$data = " questionnaire_id=$id ";
			$data .= ", question='$question' ";
			$data .= ", type='$type' ";
			if($type = 'radio_opt'){
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

			echo($data); 
			
		}else{
			// $query="UPDATE tblquestions set $data where id = $id";
			// $re =  mysqli_query($mysql, $query);
	 	// 	var_dump($re);
	 	// 		$_SESSION['id'] = $questionnaire_id;
	 	// 	    $_SESSION['message'] = "Question successfully updated";
			// 	$_SESSION['msg_type'] = "success"; 
	 	// 	     header('location: list_questionnaires.php');
			echo "the data did not go";
			
		}

	}
// include 'db_connect.php';
// foreach($_POST[''] as $key => $value){
// 	$query = 'INSERT INTO tblquestions () VALUES ()';
// 	$result = $conn->prepare($query);
// 	$result->execute([
// 		'' => $value,
// 		'' => $_POST[''][$key],
// 		'' => $_POST[''][$key]


// 	]);
// }
// echo "questions added successfully";

?>
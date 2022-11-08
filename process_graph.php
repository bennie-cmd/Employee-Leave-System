<?php
header('Content-Type: application/json');

	include 'db_connect.php';
	$query = "SELECT std_admi_number, answer, questionnaire_id FROM tblanswers ORDER BY std_admi_number";
	$result = mysqli_query($conn, $query);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	mysqli_close($conn);
	echo json_encode($data);

?>
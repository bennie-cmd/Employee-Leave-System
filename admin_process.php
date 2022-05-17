
<?php


$conn = new mysqli('localhost', 'root','','employee_ls');

$id =0;
$update = false;
$employee_id = '';
$firstname = '';
$lastname = '';
$department='';
$email='';
?>
//////////////////////deleted BUTTON//////////////////////
<?php
$dell = 1;
$conn = new mysqli('localhost', 'root','','employee_ls');
if (isset($_GET['deleted'])){
	$newest=$_GET['deleted'];
	
	$asql = "UPDATE register SET `deleted` = '$dell' WHERE  `employee_id`='$newest'";
	mysqli_query($conn, $asql);
	
	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";
	header("location: employee_details.php");
}
?>
<?php
$dell = 1;
$conn = new mysqli('localhost', 'root','','employee_ls');
if (isset($_GET['removed'])){
	$newest=$_GET['removed'];
	
	$asql = "UPDATE leave_details SET `deleted` = '$dell' WHERE  `id`='$newest'";
	mysqli_query($conn, $asql);
	
	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";
	header("location: admin_interface.php");
}
?>
////////////////EDIT BUTTON///////////////////////////////
<?php
if (isset($_GET['edit'])) {
	
	$employee_id = $_GET['edit'];
	$update = true;
	$bsql= "SELECT * FROM register WHERE employee_id='$employee_id'" or die(mysqli_error($conn));
	$result = mysqli_query($conn, $bsql);
	if (!empty($result)) {
		$row = $result->fetch_array();
		
		$employee_id= $row['employee_id'];
		$department= $row['department'];
		$firstname= $row['firstname'];
		$lastname= $row['lastname'];
		$email= $row['email'];		
	}
	

/////////////UPDATE BUTTON//////////////////////


}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$employee_id = $_POST['employee_id'];
	$department = $_POST['department'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	$conn = new mysqli('localhost', 'root','','employee_ls');

		$csql = "UPDATE register SET `employee_id`='$employee_id', `department`='$department', `firstname`='$firstname', `lastname`='$lastname', `email`='$email' WHERE `employee_id`='$id'" or die(mysqli_error($conn));
		 mysqli_query($conn, $csql);
		

		$_SESSION['message']= "Recored has been successfully updated!";
		$_SESSION['msg_type']="warning";

		header("location:employee_details.php");
	}

		 
	 	
?>


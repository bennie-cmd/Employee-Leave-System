<?php

	$mysqli = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($mysqli));

   if (isset($_POST['request'])) 
{  	
	session_start();
	
	$avlbl_employees= date("d-m-y");
	$available_days=$_SESSION['available_days'];
	$employee_id = $_SESSION['employee_id']; 
	$leave_type = $_POST['leave_type'];
	$fromdate = date('d-m-Y', strtotime($_POST['begin']));
	$todate = date('d-m-Y', strtotime($_POST['end']));
	$description = $_POST['description'];  
	$status = 0;
	$isread = 0;
	$leave_days = $_POST['leave_days'];
   ////////////// line break///////////////////
		$begin = date_create($fromdate);
		$end = date_create($todate);

		$diff = date_diff($begin, $end);
		// $num_days = ($begin-$end);
		$num_days = ($diff->format("%a"));
	

	if($fromdate > $todate)
	{
	    echo "<script>alert('END Date should be greater than START Date');</script>";
	    echo "<script type='text/javascript'> document.location = 'leave_page.php'; </script>";
	  }
	elseif($num_days <= 0)
	  {
	  	echo "<script>alert('The Enddate has to be after Beginning Date')</script>";
	  	echo "<script type='text/javascript'> document.location = 'leave_page.php';</script>";
	  }
	elseif($leave_days <= 0)
	{
		echo "<script>alert('YOU HAVE REACHED THE LEAVE LIMIT. LEAVE APPLICATION FAILED');</script>";
		echo "<script type='text/javascript'> document.location = 'leave_page.php'; </script>";
	  }

	  elseif ($num_days > $available_days) {

	  	echo "<script>alert('YOU HAVE EXCEEDED YOUR LEAVE LIMIT.');</script>";
	  	echo "<script type='text/javascript'> document.location = 'leave_page.php'; </script>";
	  }
	  elseif( $fromdate < $avlbl_employees ){
	  	echo "<script>alert('THE SELECETED BEGINNING OR ENDING DATE, HAS ALREADY PASSED..');</script>";
	  	echo "<script type='text/javascript'> document.location = 'leave_page.php'; </script>";
	  }

	elseif ($leave_days >= 0)
	{
		
		
		$begin = date_create($fromdate);
		$end = date_create($todate);

		$diff = date_diff($begin, $end);
		// $num_days = ($begin-$end);
		$num_days = ($diff->format("%a"));
		$newremaining= $num_days-$stdays;	

$query = "INSERT INTO leave_details (type, startdate, enddate, employee_id, reasons, status, isread, remaining_days) VALUES ('$leave_type', '$fromdate', '$todate', '$employee_id', '$description', '$status', '$isread', '$num_days')";

		$result = mysqli_query($mysqli, $query);
		var_dump($result);
		
		$first = 'your';
		$last = 'Leave was successful';
		$msg = $first." ".$leave_type." ".$last;
		 $_SESSION['message'] = $msg;
		 $_SESSION['msg_type'] = "success"; 
		header("location:leave_history.php");

	}
	else{

		echo "<script>alert('Something went wrong. Please try again');</script>";
	}
	
}
	
?>
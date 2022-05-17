 <?php 
    include 'process_login.php';

    if (!isset($_SESSION['admin_id'])) {
    	header('location:login.php');
    }

?>
<?php
    $conn = new mysqli('localhost', 'root','','employee_ls');
    $isread=1;
    // $bid=intval($_GET['leaveid']);
    if (isset($_POST['back'])) {
    	 $bid=$_GET['leaveid'];
    		$query ="UPDATE leave_details SET `isread`=$isread WHERE `id`=$bid";

    		$result = mysqli_query($conn, $query);
				var_dump($result);
    		header("location:read_leave.php");

    }

    $approved=1;
    $theid=intval($_GET['leaveid']);
    if (isset($_POST['approve'])) {
        $query= "UPDATE leave_details SET `status`=$approved WHERE `id`=$theid";

        $res = mysqli_query($conn, $query);
        var_dump($res);
        header("location:admin_interface.php"); 
    }

    
    $rejected=2;
    if (isset($_POST['reject'])) {
    	$rejid=$_GET['leaveid'];
    	$query= "UPDATE leave_details SET `status`='$rejected' WHERE `id`=$rejid";

    	$re = mysqli_query($conn, $query);
    	var_dump($re);
    	header("location:read_leave.php");
    }
    

  ?> 
   
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
</head>
<body>

<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
	<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle navigation</span>
			</button>
			<a href="index.html" class="navbar-brand brand"> Read Employee Leave </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
								<li class="propClone"><a href="admin_interface.php">Employee Leave Request</a></li>
                <li class="propClone"><a href="update_policy.php">Leave Policy</a></li>
                <li class="propClone"><a href="logout.php" name="logout">Logout</a></li>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Administrator
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">READ AND APPROVE OR DISSAPROVE</h1>
		
			<?php if (isset($_SESSION['message'])):?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
           <?php
             echo $_SESSION['message'];
             unset($_SESSION['message']);
           ?>
          </div>
          <?php endif ?>
        
          <?php 
              if (isset($_POST['logout'])) {
                $_SESSION['message'] = "Logout successful";
                $_SESSION['msg_type'] = "danger"; 
                header("location: index.php");

              }
          ?>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>

<div class="d-flex flex-wrap">
	<a href="admin_interface.php" class="btn btn-warning">GO REVIEW</a>
</div>
	<div class="productbox">
	
					<?php 
						if(!isset($_GET['leaveid']) && empty($_GET['leaveid'])){
							header('Location: pending.php');
						}
						else{

						$lid=intval($_GET['leaveid']);
						$conn = new mysqli('localhost','root','','employee_ls');

						$sql = "SELECT leave_details.id as lid,register.firstname,register.lastname,register.employee_id,register.department,register.department,register.email,register.available_days,leave_details.type,leave_details.startdate,leave_details.enddate,leave_details.reasons,leave_details.posting_date,leave_details.status,leave_details.isread,leave_details.remaining_days FROM leave_details join register on leave_details.employee_id=register.employee_id where leave_details.id=$lid";
						

						$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						$cnt=1;
						while ($row=mysqli_fetch_array($query)) {

						$days=$row['remaining_days'];
						$avlbd=$row['available_days'];
						$remain=$avlbd-$days;

						 if (isset($_POST['change'])) {
    				$newid= $row['employee_id'];
    				$remain_days= "UPDATE register SET `available_days`='$remain' WHERE `employee_id`='$newid'";
    				$result = mysqli_query($conn, $remain_days);
						// var_dump($result);
    				// header("location:pending.php");
    				// echo "its is not working";
    				}
											?>              

											<input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Email </label>
											<input name="email" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['email']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>First Name </label>
											<input type="hidden" name="user_id" value="<?php echo $_GET['leaveid']; ?>">
											<input name="firstname" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['firstname']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Lastname</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['lastname']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Available Leave Days </label>
											<input name="leave_days" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['available_days']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Type Of Leave</label>
											<input type="text" name="leave" class="custom-select form-control" required="true" autocomplete="off" value="<?php echo $row['type'];?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Begining Date</label>
											<input type="text" name="begin" class="custom-select form-control" required="true" autocomplete="off" value="<?php echo $row['startdate']; ?>">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Ending Date</label>
											<input type="text" name="end" class="custom-select form-control" required="true" autocomplete="off" value="<?php echo $row['enddate']; ?>">
										</div>
									</div>
								</div>

								<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label style="color: black;">Reason For Leave</label>
										<textarea type="textarea" name="description" class="custom-select form-control" required="true" autocomplete="off"><?php echo $row['reasons'];?></textarea>	 
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label style="color: black;">Employee ID</label>
										<input name="leave_days" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['employee_id']; ?>">
									</div>
								</div>
							</div>
							<form method="post" action="">
							<div class="row">
								<div class="col-md-6 col-sm-12">
										<label style="font-size:16px;"></label>
										<div class="modal-footer justify-content-center">
<button  name="back" type="submit" class="btn btn-primary" data-toggle="modal"style="color: white;">MARK AS&nbsp;READ</button>

<button name="approve" type="submit" class="btn btn-success">APPROVE</button>

<button name="reject" type="submit" class="btn btn-danger">REJECT</button>

<button name="change" type="submit" class="btn btn-warning">UPDATE DAYS</button>
										</div>
									</div>
								</form>
								<div class="col-md-6 col-sm-12">
									<label style="color:red;">Remaining Days</label>
									<input type="text" name="remains" class="form-control" required="true" autocomplete="off" readonly value="<?php echo "$remain"; ?>">
								</div>
							</div>
								
							
						<?php $cnt++;} }?>
							
						<br></br>
					</div>

<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
				<h1 class="callactiontitle">exclusive rights to employee details<span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
				</h1>
			</div>
		</div>
	</div>
</div>
</section>

<!-- FOOTER =============================-->
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 
			</p>
			<ul class="social-iconsfooter">
				<li><a href="#"><i class="fa fa-phone"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<p>
				 &copy; 2021 bennetkambona<br/>
				 <a href=""></a>
			</p>
		</div>
	</div>
</div>

<!-- Load JS here for greater good =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>




</body>
</html>
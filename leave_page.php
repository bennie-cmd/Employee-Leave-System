 <?php 
    include 'process_login.php';

    if (!isset($_SESSION['email'])) {
    	header('location:login.php');
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
			<a href="index.html" class="navbar-brand brand"> Leave Request </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="leave_page.php">Leave Request</a></li>
				<li class="propClone"><a href="leave_policy.php">Leave Policy</a></li>
				<li class="propClone"><a href="employee_check.php">Unavailable employees</a></li>
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
						 Request Leave
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
			<h1 class="text-center latestitems">Enter Your Leave Specification Details</h1>
		
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
	
		<div class="col-md-8">
			<div class="productbox">
				 <!-- Here is the main leave application area -->
				 <form method="post" action="apply_process.php">
				 	<section>
				 			<?php
								$user=$_SESSION['email'];
								$conn = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($conn));
								$ret=mysqli_query($conn,"SELECT * FROM register WHERE email='$user'");
								$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
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
									 <?php 
						$cnt=$cnt+1;
										}?>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Leave Type</label>
											<select name="leave_type" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select leave type...</option>
         								<option value="Maternity/Paternity">Maternity/Paternity leave</option>
         								<option value="Sick">Sick leave</option>
         								<option value="Study">Study leave</option>
         								<option value="Absence">Absence leave</option>
         							</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Beginning Date</label>
											<input type="date" id="date" name="begin" class="custom-select form-control" required="true" autocomplete="off">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label style="color: black;">Ending Date</label>
											<input type="date" name="end" class="custom-select form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								
								<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label style="color: black;">Reason For Leave</label>
										<textarea type="textarea" name="description" class="custom-select form-control" required="true" autocomplete="off"></textarea>	 
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label style="font-size:16px;"><br></br></label>
										<div class="modal-footer justify-content-center">
							<button name="request" class="btn btn-primary" data-toggle="modal">Apply&nbsp;Leave</button>
										</div>
									</div>
								</div>
							</div></section></form>

				 			

						</br>
					
			</div>
		</div>
		<div class="col-md-4">
			<a class="btn btn-buynow" name="history" href="leave_history.php">Check - History</a>
			<div class="properties-box">
				<ul class="unstyle">
					<li><b class="propertyname">Default Available days:</b> 30</li>
					<li><b class="propertyname">The available days reduce accordingly.</b> </li>
					<li><b class="propertyname">Fill your leave form, by selecting the type of leave, beginning and ending date.</b> </li>
				</ul>
			</div>
		</div>
	</div>
</div>
								



<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
				<h1 class="callactiontitle"> Be patient in waiting for your leave application <span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
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
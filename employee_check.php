 <?php 
    include 'process_login.php';

    if (!isset($_SESSION['email'])) {
    	$_SESSION['message'] = "you must login first";
      $_SESSION['msg_type'] = "danger"; 
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
			<a href="index.html" class="navbar-brand brand"> Leave Policy</a>
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
						 Unavailable Employees
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
<h1 class="text-center latestitems">Below are the Employees who are not available</h1>
		
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
	
		
			<div class="card-box mb-30">
					<table class="data-table table stripe hover nowrap" style="color: black;">
						<thead>
							<tr>
								<th class="table-plus">FIRST NAME</th>
								<th>LAST NAME</th>
								<th>EMAIL</th>
								<th>LEAVE TYPE</th>
								<th>DEPARTMENT</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								
								 <?php
					$avlbl_employees= date("d-m-y");
					// $fromdate = date('d-m-Y', strtotime($avlbl_employees));	
					echo "$avlbl_employees"; 
								$mysqli = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($mysqli));

															
					$result=mysqli_query($mysqli,"SELECT register.firstname,register.lastname,register.employee_id,register.department,register.department,register.email,register.available_days,leave_details.type,leave_details.startdate,leave_details.enddate,leave_details.reasons,leave_details.posting_date,leave_details.status,leave_details.isread,leave_details.remaining_days FROM leave_details INNER JOIN register ON leave_details.employee_id=register.employee_id WHERE enddate >= '$avlbl_employees' AND status = 1");

                                    $cnt=1;
             while ($row=mysqli_fetch_array($result)) {
?> 
									
								  <td><?php echo $row['firstname'];?></td>
                  <td><?php echo $row['lastname'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['type'];?></td>
                  <td><?php echo $row['department'];?></td>
							</tr>
							<?php 
						$cnt=$cnt+1;
										}?>

									</tbody></table>
		</div>

						</br>
					
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
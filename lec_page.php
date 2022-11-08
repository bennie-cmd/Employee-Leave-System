 <?php 
    include 'process_login.php';

    if (!isset($_SESSION['email'])) {
    	$_SESSION['firstname'];
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
			<a href="index.html" class="navbar-brand brand"> Student Response</a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="lec_page.php">Student Responses</a></li>
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
						 		Student Responses
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
			<h1 class="text-center latestitems">Below are the results</h1>
		
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
	
	<!-- ///Charts/// -->
	
		<div class="col-lg-8">
	<canvas id="chart"></canvas>
		</div>
	
	
		<div class="col-md-4">
			<a class="btn btn-buynow" href="bonus_KPI.php">Check Bonuses</a>
			<div class="properties-box">
				<ul class="unstyle">
					<li><b class="propertyname">Responces will appear</b>-once questionnaire is submitted </li>
					<li style="font-size: 20px;"><b class="propertyname">Number of answered questionnaires:</b>
						<?php
	include 'db_connect.php';
	$point=10;
	$word= "awesome";
	$mail = $_SESSION['email'];
	$qu= "SELECT COUNT(DISTINCT `questionnaire_id`) FROM `tblanswer` WHERE `lec_email` = '$mail'";
	$res = mysqli_query($conn, $qu);
	$row = mysqli_fetch_assoc($res);
	$decode = implode(" ",$row);
	
	?>
<?php print_r($decode);?></li>
					<li><b class="propertyname"></b> </li>
					
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
<?php
	include 'db_connect.php';
	$mail = $_SESSION['email'];
	$query = "SELECT * FROM `tblanswer` WHERE `lec_email` = '$mail' GROUP BY `id`";
	$result = mysqli_query($conn, $query);
	
	foreach ($result as $data) 
	{
		$ans[] =$data['answer'];
		$que[] =$data['questionnaire_id'];
	}

?>
<?php
	include 'db_connect.php';
	$mail = $_SESSION['email'];
	$query = "SELECT * FROM `tblanswer` WHERE `lec_email` = '$mail' GROUP BY `id`";
	$result = mysqli_query($conn, $query);
	
	foreach ($result as $data) 
	{
		$a[] =$data['answer'];
		$q[] =$data['questionnaire_id'];
	}

?>

<!-- //original query// -->
<!--  "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'awesome' AND `answer`='good' AND `answer`='great' AND `lec_email` = '$mail'"; -->
<!-- Load JS here for greater good =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
	  const labels = <?php echo json_encode($ans) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Student Responses',
      data: <?php echo json_encode($que) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('chart'),
    config
  );
		
</script>

</body>
</html>
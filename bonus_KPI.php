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
<style type="text/css">
	    header .navbar-white {
            background:#222;
            color:#999;
        }
        header .navbar-white a {
            color: ghostwhite;
        }
        .thing {
  padding: 1rem;
  width: 420px;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
    0 5px 15px 0 rgba(0,0,0,0.08);
  background-color: #ffffff;
  border-radius: 0.5rem;
  
  border-left: 0 solid #00ff99;
  transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;
}

.thing:hover {
  padding-left: 0.5rem;
  border-left: 0.5rem solid #00ff99;
}

.thing > :first-child {
  margin-top: 0;
}

.thing > :last-child {
  margin-bottom: 0;
}

.heading {
  color: #fff;
}

/*body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100vw;
  height: 100vh;
  background-color: #0099ff;
}*/


.border {
   font-size: 1.6rem;
   display: grid;
   place-items: center;
   min-height: 200px;
   border: 8px solid;
   padding: 1rem;
}

.full {
   border-image: linear-gradient(45deg, turquoise, greenyellow) 1;
}

.sides {
   border-image: linear-gradient(to left, turquoise, greenyellow) 1 0;
}
.sides-2 {
   border-image: linear-gradient(to bottom, turquoise, greenyellow) 0 1;
}

.linear-repeating {
   border-width: 10px;
   border-image: repeating-linear-gradient(45deg, turquoise, pink 4%) 1;
}

.radial-repeating {
   border-width: 20px;
   border-image: repeating-radial-gradient(
         circle at 10px,
         turquoise,
         pink 2px,
         greenyellow 4px,
         pink 2px
      )
      1;
}

/* border radius example is drawn from this pen: https://codepen.io/shshaw/pen/MqMZGR
I've added a few comments on why we're using certain properties
*/

.full-withradius {
   position: relative;
   background: #fff;

   /*The background extends to the outside edge of the padding. No background is drawn beneath the border.*/
   background-clip: padding-box;

   border: solid 8px transparent;
   border-radius: 0.8rem;

   &:before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: -1;
      margin: -8px; /* same as border width */
      border-radius: inherit; /* inherit container box's radius */
      background: linear-gradient(to left, turquoise, greenyellow);
   }
}
/*///new border styling///*/

.bordering {
	font-size: 1.6rem;
	display: grid;
	place-items: center;
	min-height: 200px;
	border: 8px solid;
	padding: 1rem;
}

.sides-2 {
	border-image: linear-gradient(to bottom, turquoise, greenyellow) 1 1;
}
</style>
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
			<a href="index.html" class="navbar-brand brand"> BONUSES AND KPI</a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="lec_page.php">Student Responses</a></li>
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
						 		Bonuses and Key Performances
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
			<h1 class="text-center latestitems">Bonus Points</h1>
		
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
	

		<br>		
		<div class="col-md-4">
      <div class="border radial-repeating">
      	<h3>HIGHLY ASSESSED</h3>
      <?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'awesome' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					$decode = implode(" ",$row);
					
			?>
			<lable style= "font-size: 30px;"> <?php print_r($decode);?> KSH</label>
      </div>
    </div>
    <div class="col-md-4">
    	<div class="border radial-repeating">
    		<h3>MODERATELY ASSESSED</h3>
    		<?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'good' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					$decode = implode(" ",$row);
					
			?>
			<lable style= "font-size: 30px;"> <?php print_r($decode);?> KSH</label>
    	</div>
    </div>
    <div class="col">
      <div class="border radial-repeating">
      	<h3>WORSTLY ASSESSED</h3>
      	<?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'bad' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					$decode = implode(" ",$row);
					
			?>
			<lable style= "font-size: 30px;">- <?php print_r($decode);?> KSH</label>
      </div>
    </div>
    <br>
    <!-- ///different assessment areas/// -->

    <div class="col-md-4">
      <div class="sides-2 bordering">
      	<h3>AREAS OF IMPROVEMENT</h3>
      <?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT DISTINCT(`questionnaire_id`) FROM `tblanswer` WHERE `answer`= 'bad' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					// next query
					$que = $row['questionnaire_id']; 
					$qu_two = "SELECT title FROM tblquestionnaire WHERE `id` = '$que'";
					$res_two = mysqli_query($conn, $qu_two);
					$row_two = mysqli_fetch_assoc($res_two);

			?>
			<lable style= "font-size: 30px;"> <?php echo $row_two['title'];?> </label>
      </div>
    </div>
    <div class="col-md-4">
    	<div class="sides-2 bordering">
    		<h3>RATING</h3>
    		<?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'awesome' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					$decode = implode(" ",$row);
					$rating = $point % $decode;

					
			?>
			<lable style= "font-size: 30px;"> <?php print_r($rating);?>/10 </label>
    	</div>
    </div>
    <div class="col">
      <div class="sides-2 bordering">
      	<h3>ELIGIBLE FOR BONUSES</h3>
      	<?php
					include 'db_connect.php';
					$point=100;
					$word= "awesome";
					$mail = $_SESSION['email'];
					$qu= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'bad' AND `lec_email` = '$mail'";
					$res = mysqli_query($conn, $qu);
					$row = mysqli_fetch_assoc($res);
					$decode = implode(" ",$row);
				if ($rating >= 4):
								
			?>
		
			<lable style= "font-size: 30px;">YES</label>
			<??>
			<?php else:?>
			<lable style= "font-size: 30px;">NO</label>
			<?php endif; ?>	
      </div>
    </div>

    <!-- ///// -->
    <br>

		<div class="col-md-5">
			<a class="btn btn-buynow" href="lec_page.php">Visualized Responses</a>
			<div class="properties-box">
				<ul class="unstyle">
					<li><b class="propertyname">Bonus Formulation</b>-once questions are answered, The number or positive responses obtained from each questionnaire set is then counted. Together with the negative responses.</li>
					<li><b class="propertyname">Bonus Eligibility</b>-For you to be eligible for a bonus your <b>RATING</b> has to be greater than 4/10.</li>
					<li><b class="propertyname"></b> </li>
					
				</ul>
			</div>
		</div>
		<div class="col-md-5">
		<canvas id="piechart" style="border-style: dotted;"></canvas>
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
	$q= "SELECT COUNT(`answer`) FROM `tblanswer` WHERE `answer`= 'awesome' AND `lec_email` = '$mail'";
	$r = mysqli_query($conn, $q);
	$result = mysqli_query($conn, $query);
	$row_row = mysqli_fetch_assoc($r);
	

	$decode = print_r(implode(" ",$row_row));

	
	foreach ($result as $data) 
	{
		$ans[] =$data['answer'];
		$que[] =$data['questionnaire_id'];
		
	}
	foreach($row_row as $data)
	{
		$a[] =$data;
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
	const labels = <?php echo json_encode($ans)?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Student Responses',
      data: <?php echo json_encode($a, JSON_NUMERIC_CHECK)?>,
      backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 50
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
    },
  };

  var myChart = new Chart(
    document.getElementById('piechart'),
    config
  );
</script>
</body>
</html>
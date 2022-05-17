<?php 
include 'process_register.php';

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

<style>
       /* div.wrapper {
            width: 300px;
            height:300px;
            border:1px solid black;
        }*/

        input[type="text"] {
             display: block;
             margin : 0 auto;
        }
        input[type="password"]{
        			position: relative;
        			display: block;
        			margin: 0 auto;
        }
        input[type="date"]{
        			display: block;
        			margin: 0 auto;
        			color: #0f88a6;
        			font-style: bold;
        }
        .dropdown{
  					color: #fff;
  					background-color: #148f77;
  					border-color: #12846e;
					}
        .align-center{
        			color: #333336;
        }
       .beau-border{
        			background-color: #c4f0ff;
        			position: relative;
        			display: block;
        			margin: 0 auto;
        			display: grid;
  					place-items: center;
  					/*height: 100vh;*/
  					overflow: hidden;
        			/*---------------beyond this line is the border-------------------*/
        			border: 10px solid black;
  					padding: 2rem 1rem;
  					min-height: 3em;
  					width: 60%;
  					resize: both;
  					background: -webkit-linear-gradient(to top, rgba(#cffffe, 0.3), rgba(#f9f7d9, 0.3), rgba(#fce2ce, 0.3), rgba(#ffc1f3, 0.3));
  					border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23cffffe' /%3E%3Cstop offset='25%25' stop-color='%23f9f7d9' /%3E%3Cstop offset='50%25' stop-color='%23fce2ce' /%3E%3Cstop offset='100%25' stop-color='%23ffc1f3' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3'/%3E %3C/svg%3E") 1;
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
			<a href="index.html" class="navbar-brand brand"> leave system </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<!-- <li class="propClone"><a href="leave_page.php">Leave Request</a></li> -->
				<li class="propClone"><a href="leave_policy.php">Leave Policy</a></li>
				<!-- <li class="propClone"><a href="Employee_check">Unavailable employees</a></li> -->
				<li class="propClone"><a href="contact.php">Contact Management</a></li>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
						 SIGN UP TODAY
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
			<h1 class="text-center latestitems">Enter Your Registration Details</h1>
		</div>
		<div class="wow-hr type_short">

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


			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
	<div class="beau-border">	
		<!---------------------------BEYOND THIS POINT IS THE FORM CAUTION--------------------------------->
<form method="post" action="process_register.php">
		<!-- the container holding the login text fields-->	
		<div class="row">
			<div class="col-lg-4 mb-5 mb-lg-0">
			<div id="form-group">
            <header class="align-center" style="font-size: 20px;">Email address:</header> 
         <input class="form-control" type="text" name="email" placeholder="abcd@gmail.com" style="width:250px;">
            </div>
            <br>
         </div>

			<div class="col-lg-4 mb-5 mb-lg-0">
			<div id="form-group">
            <header class="align-center" style="font-size: 20px;">Firstname:</header> 
         <input class="form-control" type="text" name="firstname" placeholder="Type your firstname" style="width:250px;">
            </div>
            <br>
         </div>

         	<div class="col-lg-4 mb-5 mb-lg-0">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Lastname:</header> 
         <input class="form-control" type="text" name="lastname" placeholder="Type your Lastname" style="width:250px;">
            </div>
         	</div>
         </div>
			<div class="row">

         	<div class="col-lg-4 mb-5 mb-lg-0">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Employee ID:</header> 
         <input class="form-control" type="text" name="employee_id" placeholder="Type your ID" style="width:250px;">
            </div>
         	</div>
        	
         	<div class="col-lg-4 mb-5 mb-lg-0">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Department:</header> 
            <div class="form-control">
         <select class="dropdown" name="department">
         	<option>Finance </option>
         	<option>Production </option>
         	<option>Reasearch and Developing</option>
         </select>
            </div>
            </div>
         	</div>

         	<div class="col-lg-4 mb-5 mb-lg-0">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Period Joined:</header> 
         <input class="form-control" type="date" name="period_joined" placeholder="Type your username" style="width:250px;">
            </div>
         	</div>

         </div>

          <div class="row">

         	<div class="col-md-4 mb-lg-0">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Password:</header>
         <input class="form-control" type="Password" name="pass1" placeholder="Type your password" style="width:250px;">
            </div>
         	</div>
        	
         	<div class="col-md-4">
            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Repeat Password:</header>
         <input class="form-control" type="Password" name="pass2" placeholder="Type your password" style="width:250px;">
            </div>
         	</div>
     		 </div>
          <br>

          	<div class="text-center">
              <button type="submit" class="btn btn-primary" name="register" style="display: block; margin : 0 auto;">
                Sign up
              </button>
            </div>
</form>

      <div><h6>Drag on the bottom right to resize</h6></div>
  </div>
		
		<!-- End of login interf -->
	</div>
</div>
</div>
</section>

<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s"> -->
			
				<a href="register.html" class="homebrowseitems"> By Signing up you agree to our Terms of Service and Privacy Policy
				<div class="homebrowseitemsicon">
					<i class="fa fa-star fa-spin"></i>
				</div>
				</a> 
																		<!-- </span> -->
			</h1>
		<!-- </div> -->
	</div>
</div>
</div>
</section>

<!-- FOOTER =============================-->
<div class="footer text-center">
<div class="container">
	<div class="row">
		
		<ul class="social-iconsfooter">
			<li><a href="#"><i class="fa fa-phone"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		</ul>
		<p>
				 &copy; 2020 employeeleave@gmail.com<br/>
				System Developed- by Bennet <a href="">DAMN IT's GOOD</a>
		</p>
	</div>
</div>
</div>

<!-- Load JS here for greater good =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script>
//----HOVER CAPTION---//	  
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>
</body>
</html>
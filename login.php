<?php
		include'process_login.php';
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
        .align-center{
        			color: #333336;
        }
        .beau-border{
      				background-color: #d9f7fa;
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
  					background: linear-gradient(to top, rgba(#cffffe, 0.3), rgba(#f9f7d9, 0.3), rgba(#fce2ce, 0.3), rgba(#ffc1f3, 0.3));
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
			<a href="index.html" class="navbar-brand brand"> Lecturer Performance Management </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="login_student.php">Login As Student</a></li>
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
						 LOGIN AS LECTURER
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
			<h1 class="text-center latestitems">Enter Your Credentials</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
				<?php
           			if (isset($_SESSION['message'])):
           			?>  
           
           			<div class="alert alert-<?=$_SESSION['msg_type']?>">
           		<?php
             		echo $_SESSION['message'];
             		unset($_SESSION['message']);
           			?>
          </div>
       			 <?php endif ?>
       			 
	<div class="beau-border">	
			<form method="POST" action="process_login.php">
		<!-- the container holding the login text fields-->	

			<div id="form-group">
            <header class="align-center" style="font-size: 20px;">Email:</header> 
         <input class="form-control" type="text" name="email" placeholder="Type your email" style="width:250px;" required>
            </div>
          

            <div id="form-group">
            <header class="align-center" style="font-size: 20px;">Password:</header>
         <input class="form-control" type="Password" name="pass" placeholder="Type your password" style="width:250px;" required>
            </div>
         
          <br>
          </br>
              <button type="submit" class="btn btn-primary" name="login" style=" display: block; margin : 0 auto; ">
                Login
              </button>
      </form>
      <h1 style="font-size: 12px;">Ensure to login as the respecsted user. This login is for lectures only.</h1>
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
			<h1 class="callactiontitle"> Do You Have an Account?<!--  <span class="callactionbutton"> -->
				<a href="register.php" class="homebrowseitems"> Signup
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
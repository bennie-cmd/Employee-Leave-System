<?php 
    include 'process_login.php';

    if (!isset($_SESSION['admin_id'])) {
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
            <a href="index.html" class="navbar-brand brand"> Admin Leave Interface </a>
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
            <h1 class="text-center latestitems" style="color:#00bba7">All PENDING LEAVES</h1>
        
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
    <div>
        <?php
                            $status=0;
                            $readsts=0;

            $conn = new mysqli('localhost', 'root','','employee_ls');

            $sql = "SELECT leave_details.id as lid,register.firstname,register.lastname,register.department,register.employee_id,leave_details.type,leave_details.posting_date,leave_details.status,leave_details.isread FROM leave_details JOIN register on leave_details.employee_id=register.employee_id where status= '$status' order by lid ASC";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                 ?> 
        <div class="d-flex flex-wrap">
        </div>

       
       <div class="card-box mb-30">
                <!-- <div class="pd-20">
                        <h2 class="text-blue h4">PENDING LEAVE</h2>
                    </div> -->
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STAFF NAME</th>
                                <th>LEAVE TYPE</th>
                                <th>APPLIED DATE</th>
                                <th>STATUS</th>
                                <th>READ</th>
                                <th class="datatable-nosort">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td><?php echo $row['firstname']." ".$row['lastname'];?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['posting_date']; ?></td>
                                <td><?php $stats=$row['status'];
                                 if($stats==1){
                                  ?>
                                      <span style="color: green">Approved</span>
                                      <?php } if($stats==2)  { ?>
                                     <span style="color: red">Rejected</span>
                                      <?php } if($stats==0)  { ?>
                                 <span style="color: blue">Pending</span>
                                 <?php } ?>
                                </td>
                                <td><?php $stats=$row['isread'];
                                 if($stats==1){
                                  ?>
                                           <span style="color: green">Read</span>
                                            <?php } if($stats==2)  { ?>
                                           <span style="color: red">Not Read</span>
                                            <?php } if($stats==0)  { ?>
                                           <span style="color: blue">Waiting To Be Read</span>
                                           <?php } ?>
                                </td>
                                <form method="POST" action="">
                                    <td>
                                <a href="read_leave.php?leaveid=<?php echo$row['lid'];?>" class="btn btn-info" name="read">READ</a>
                                    </td>
                                </form>
                            </tr>
                            <?php }?>

                                    </tbody></table>
        </div>
    </div>
</div>
                                



<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                <h1 class="callactiontitle">Mark as read then consult the leave committee for action <span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
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
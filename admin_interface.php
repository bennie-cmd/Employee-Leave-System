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
                
                <li class="propClone"><a href="admin_interface.php">Employee Leave Requests</a></li>
                <li class="propClone"><a href="update_policy.php">Leave Policy</a></li>
                <li class="propClone"><a href="employee_details.php">Manage Employee Details</a></li>
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
                         Welcome Administrator
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
            <h1 class="text-center latestitems" style="color:#00bba7">All REQUESTED LEAVES</h1>
        
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
            <?php
                $conn =mysqli_connect('localhost','root','','employee_ls');
                
                $new = "employee";
        if (isset($_POST['change_days'])) {
            $change = $_POST['selectleavedays'];
                $query= "UPDATE register SET `available_days`='$change' WHERE `user_type`= '$new'";
                $result = mysqli_query($conn, $query);
                
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
    <div>
        <?php
            $mysqli = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($mysqli));
    $result=mysqli_query($mysqli,"SELECT COUNT(*) AS totalnumber FROM leave_details;");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
    }

        ?>
        <div class="d-flex flex-wrap">
            
            <div style="font-weight: bolder; color:#00bba7;">
                <?php echo $row['totalnumber'];?>

            </div>

            <div style="font-weight: bolder; color:#00bba7;">TOTAL APPLIED LEAVES</div>
            <form method="POST" action="">
            <a href="pending.php" class="btn btn-warning">Check Pending Leaves</a>
<button name="change_days" type="submit" class="btn btn-primary">CHANGE-LEAVE-DAYS</button> 
            <div class="form-control">
             <select name="selectleavedays" class="dropdown" placeholder="select leave days" required>
                <option>14</option>
                <option>30</option>
                <option>90</option>
                <option>1440</option>
              </select>
          </form>
            </div>  
            
        </div>
    
                
                
            
        
       
        <div class="card-box mb-30">
                    <table class="data-table table stripe hover nowrap" style="color: black;">
                        <thead>
                            <tr>
                                <th class="table-plus">EMPLOYEE ID</th>
                                <th>LEAVE TYPE</th>
                                <th>DATE FROM</th>
                                <th>DATE TO</th>
                                <th>NO. OF DAYS</th>
                                <th>STATUS</th>
                                <th>READ</th>
                                <th>REVIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                 <?php 
                $mysqli = new mysqli('localhost', 'root','','employee_ls');
                    $dell=0;
                    // $readsts=0;                                                    
                    $result="SELECT * FROM leave_details WHERE deleted = '$dell'";
                          $query = mysqli_query($mysqli, $result) or die(mysqli_error($mysqli));                   
                                    $cnt=1;
             while ($row=mysqli_fetch_array($query)) {
?>                  
                  <td> <?php echo $row['employee_id']; ?></td>  
                  <td><?php echo $row['type'];?></td>
                  <td><?php echo $row['startdate'];?></td>
                  <td><?php echo $row['enddate'];?></td>
                  <td><?php echo $row['remaining_days'];?></td>
                  <td><?php $stats=$row['status'];
                                       if($stats==1){
                                        ?>
                                           <span style="color: green">Approved</span>
                                            <?php } if($stats==2)  { ?>
                                           <span style="color: red">Not Approved</span>
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
                                    <td>
                                <a href="pending.php" class="btn btn-info" name="">CHECK
                                    
<a href="admin_process.php?removed=<?php echo $row['id'];?>" class="btn btn-danger">DELETE</a>
                            </tr>



                            <?php 
                        $cnt=$cnt+1;
                                        }?>

                                    </tbody></table>
        </div>
    </div>
</div>
<?php
    $gone=1;    
if (isset($_POST['remove'])) {
    $remid=$_GET['removed'];
    
    $query= "UPDATE leave_details SET `deleted` ='$gone' WHERE `employee_id`='$remid'";
    $result=mysqli_query($conn, $query);
    var_dump($result);
    echo"it works";
    
}                                
?>


<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                <h1 class="callactiontitle">Mark as read then consult the leave committee for action<span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
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
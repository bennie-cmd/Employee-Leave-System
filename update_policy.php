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
                         Update Policy
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
            <h1 class="text-center latestitems" style="color:#00bba7">Organization Policies</h1>
        
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
    <div>
        <?php
            $mysqli = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($mysqli));
    $result=mysqli_query($mysqli,"SELECT COUNT(*) AS totalnumber FROM leave_types;");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
    }

        ?>
        <div class="d-flex flex-wrap">
            <div style="font-weight: bolder; color:#00bba7;">
                <?php echo $row['totalnumber'];?>
            </div>
            <div style="font-weight: bolder; color:#00bba7;">ORGANIZATION POLICIES</div>
            
        </div>
        
       
        <div class="card-box mb-30">
                    <table class="data-table table stripe hover nowrap" style="color: black;">
                        <thead>
                            <tr>
                                <th class="table-plus">POLICY ID</th>
                                <th>NAME</th>
                                <th>TOTAL DAYS</th>
                                <th>POLICY GOVERNANCE</th>
                                <th>ACTION</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                 <?php 
                $mysqli = new mysqli('localhost', 'root','','employee_ls');
                    $dell=0;
                    $user ="employee";
                    // $readsts=0;                                                    
            $result="SELECT * FROM leave_types ";
                          $query = mysqli_query($mysqli, $result) or die(mysqli_error($mysqli));                   
                                    $cnt=1;
             while ($row=mysqli_fetch_array($query)) {
?>                  
                  <td> <?php echo $row['id']; ?></td>  
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['total_days'];?></td>
                  <td><?php echo $row['policy'];?></td>
                  
                  <td>


<a href="admin_process.php?gone=<?php echo $row['id']; ?>" class="btn btn-danger" name="nomore">DELETE</a>
                                        </td>
                            </tr>
                            <?php 
                        $cnt=$cnt+1;
                                        }?>

                                    </tbody></table>
        </div>
    </div>
<?php
    function pre_r( $array ){
      echo '<pre>';
      print_r($array);
      echo '</pre>';

    } 
    
  ?>
  

  <div class="row justify-content-center">
    <form action="admin_process.php" method="POST">
    
    <div id="form-group">
    <label >Name:</label>
    <input type="text" autocomplete="off" name="name" class="form-control" value="<?php?>" placeholder="enter new policy name">
    </div>
    <div id="form-group">
    <label>Total Days:</label>
    <input type="text" autocomplete="off" name="total" class="form-control" value="<?php ?>" placeholder="enter new days limit">
    </div>
    <div id="form-group">
    <label>Policy:</label>
    <input type="text" autocomplete="off" name="policy" class="form-control" value="<?php ?>" placeholder="policy description">
    </div>
    
    <br>
    <div id="form-group" class="text-center">
      
        <button  class="btn btn-info" name="updated"> Update </button>
      
      

    </div>
  
  </form>
  </div>
                                



<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                <h1 class="callactiontitle"> <span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
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
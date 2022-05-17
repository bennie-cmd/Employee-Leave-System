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
                         Employee Records
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
            <h1 class="text-center latestitems" style="color:#00bba7">All REGISTERED EMPLOYEES</h1>


        
            <?php if (isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
           <?php
             echo $_SESSION['message'];
             unset($_SESSION['message']);
           ?>
          </div>
          <?php endif ?>
        
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
    $result=mysqli_query($mysqli,"SELECT COUNT(*) AS totalnumber FROM register WHERE deleted = 0;");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
    }

        ?>
        <div class="d-flex flex-wrap">
            <div style="font-weight: bolder; color:#00bba7;">
                <?php echo $row['totalnumber'];?>
            </div>
            <div style="font-weight: bolder; color:#00bba7;">REGISTERED EMPLOYEES</div>
            <a href="print.php" class="btn btn-warning">PRINT REPORT</a>
        </div>
        
       
        <div class="card-box mb-30">
                    <table class="data-table table stripe hover nowrap" style="color: black;">
                        <thead>
                            <tr>
                                <th class="table-plus">EMPLOYEE ID</th>
                                <th>DEPARTMENT</th>
                                <th>FIRSTNAME</th>
                                <th>LASTNAME</th>
                                <th>EMAIL</th>
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
            $result="SELECT * FROM register WHERE deleted = '$dell' AND user_type='$user'";
                          $query = mysqli_query($mysqli, $result) or die(mysqli_error($mysqli));                   
                                    $cnt=1;
             while ($row=mysqli_fetch_array($query)) {
?>                  
                  <td> <?php echo $row['employee_id']; ?></td>  
                  <td><?php echo $row['department'];?></td>
                  <td><?php echo $row['firstname'];?></td>
                  <td><?php echo $row['lastname'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td>
<a href="employee_details.php?edit=<?php echo $row['employee_id']; ?>" class="btn btn-info" name="">EDIT</a>

<a href="admin_process.php?deleted=<?php echo $row['employee_id']; ?>" class="btn btn-danger" name="removed">DELETE</a>
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
  <!-- <div>
       <?php require_once 'admin_process.php';?>
  </div> -->

  <div class="row justify-content-center">
    <form action="admin_process.php" method="POST">
    
    <div id="form-group">
        <input type="hidden" name="id" value="<?php echo($employee_id)?>">
    <label >Employee ID:</label>
    <input type="text" autocomplete="off" name="employee_id" class="form-control" value="<?php echo ($employee_id)?>" placeholder="enter new id">
    </div>
    <div id="form-group">
    <label>Department:</label>
    <input type="text" autocomplete="off" name="department" class="form-control" value="<?php echo ($department)?>" placeholder="enter new department">
    </div>
    <div id="form-group">
    <label>Firstname:</label>
    <input type="text" autocomplete="off" name="firstname" class="form-control" value="<?php echo ($firstname)?>" placeholder="enter Firstname">
    </div>
    <div id="form-group">
    <label>Lastname:</label>
    <input type="text" autocomplete="off" name="lastname" class="form-control" value="<?php echo ($lastname)?>" placeholder="enter lastname">
    </div>
    <div id="form-group">
    <label>Email:</label>
    <input type="text" autocomplete="off" name="email" class="form-control" value="<?php echo ($email)?>" placeholder="enter new email address">
    </div>

    
    <br>
    <div id="form-group" class="text-center">
      <?php
      if ($update ==true):
      ?>
      
        <button  class="btn btn-info" name="update"> Update </button>
      
      <?php else: ?>
        <button type="submit"  class="btn btn-primary" name="save"> Save </button>
      <?php endif; ?>

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
<?php 
    include 'process_stdlogin.php';
       if (!isset($_SESSION['std_email'])) {
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
            <a href="index.html" class="navbar-brand brand"> Questionnaire </a>
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
                         
                        Welcome Student 
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
            <h1 class="text-center latestitems" style="color:#00bba7">Answer The Questionnaire Below </h1>
        
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
            <form method="POST" action="">
       <?php include 'db_connect.php' ?>
<?php
             $user=$_SESSION['std_email'];
        $conn = new mysqli('localhost', 'root','','employee_ls') or die(mysqli_error($conn));
         $ret=mysqli_query($conn,"SELECT * FROM tblstd_registration WHERE email='$user'");
                          $cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
    <?php echo $row['frstname'];?>
<?php 
                        $cnt=$cnt+1;
                                        }?>
<div class="col-lg-12">
    <div class="d-flex w-100 justify-content-center align-items-center mb-2">
        <label for="" class="control-label">Find Survey</label>
        <div class="input-group input-group-sm col-sm-5">
          <input type="text" class="form-control" id="filter" placeholder="Enter keyword...">
          <span class="input-group-append">
            <button type="button" class="btn btn-primary btn-flat" id="search">Searh</button>
          </span>
        </div>
    </div>
    <div class=" w-100" id='ns' style="display: none"><center><b>No Result.</b></center></div>
    <div class="row">
        <?php 
        $survey = $conn->query("SELECT * FROM tblquestionnaire");
        //--original ("SELECT * FROM survey_set where '".date('Y-m-d')."' between date(start_date) and date(end_date) order by rand() ")
        while($row=$survey->fetch_assoc()):
        ?>
        <div class="col-md-3 py-1 px-1 survey-item">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo ucwords($row['title']) ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
               <?php echo $row['description'] ?>
               <div class="row">
                <hr class="border-primary">
                <div class="d-flex justify-content-center w-100 text-center">
                    <?php if(!isset($ans[$row['id']])): ?>
                        <a href="index.php?page=answer_survey&id=<?php echo $row['id'] ?>" class="btn btn-sm bg-gradient-primary"><i class="fa fa-pen-square"></i> Take Survey</a>
                    <?php else: ?>
                        <p class="text-primary border-top border-primary">Done</p>
                    <?php endif; ?>
                </div>
               </div>
              </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<script>
    function find_survey(){
        start_load()
        var filter = $('#filter').val()
            filter = filter.toLowerCase()
            console.log(filter)
        $('.survey-item').each(function(){
            var txt = $(this).text()
            if((txt.toLowerCase()).includes(filter) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
            if($('.survey-item:visible').length <= 0){
                $('#ns').show()
            }else{
                $('#ns').hide()
            }
        })
        end_load()
    }
    $('#search').click(function(){
        find_survey()
    })
    $('#filter').keypress(function(e){
        if(e.which == 13){
        find_survey()
        return false;
        }
    })
</script>
            </form>
    </div>        


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
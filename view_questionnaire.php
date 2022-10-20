<?php
include 'db_connect.php';
include 'process_login.php';


    if (!isset($_SESSION['admin_id'])) {
        header('location:login.php');
    } 

$qry = $conn->query("SELECT * FROM tblquestionnaire where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    if($k == 'title')
        $k = 'stitle';
    $$k = $v;
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
<!-- <link rel="stylesheet" type="text/css" href="css/adminlte.css"> -->
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
      /*  //////////////////////////////*/
        .card.card-tabs .card-tools {
                margin: .3rem .5rem;
            }
        .card.card-outline-tabs .card-tools {
            margin: .5rem .5rem .3rem;
            }
        .card-header > .card-tools {
             float: right;
              margin-right: -0.625rem;
            }

        .card-header > .card-tools .input-group,
        .card-header > .card-tools .nav,
        .card-header > .card-tools .pagination {
          margin-bottom: -0.3rem;
          margin-top: -0.3rem;
        }

        .card-header > .card-tools [data-toggle="tooltip"] {
          position: relative;
        }
        .card-body {
         max-height: 300px;
         overflow: auto;
        }
        .card-body::after{
         display: block;
         clear: both;
         content: "";
        }
        .card-body .full-width-chart {
          margin: -19px;
        }
        .callout.callout-info {
          border-left-color: #117a8b;
        }
        .float-right {
        float: right !important;
         margin-top: 3px;
        margin-top: -7px;
        position: absolute;
        right: 10px;
        top: 50%;

        }
        .card.card-tabs .card-tools {
          margin: .3rem .5rem;
        }
        .card-tools {
        margin: .5rem .5rem .3rem;
        }
        .close{
            position: absolute;
            top: 0;
            color: black;
            right: 14px;
            font-size: 42px;
            transform: rotate(45deg);
            cursor: pointer;

        }
        .close_two{
            position: absolute;
            top: 0;
            color: black;
            right: 14px;
            font-size: 42px;
            transform: rotate(45deg);
            cursor: pointer;

        }
        .close_three{
            position: absolute;
            top: 0;
            color: black;
            right: 14px;
            font-size: 42px;
            transform: rotate(45deg);
            cursor: pointer;

        }
        .bd-modal{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            display: none;
            justify-content: center;
            align-items: center;

        }
        .bd-modal_two{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            display: none;
            justify-content: center;
            align-items: center;

        }
        .bd-modal_three{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            display: none;
            justify-content: center;
            align-items: center;

        }
        .modal-content{
            width: 700px;
            height: 300px;
            border-radius: 4px;
            background-color: #d9f7fa;
            padding: 20px;
            position: relative;

                    display: block;
                    margin: 0 auto;
                    display: grid;
                    place-items: center;
                    overflow: hidden;
                    ---------------beyond this line is the border-------------------
                    border: 10px solid black;
                    padding: 2rem 1rem;
                    min-height: 3em;
                    width: 60%;
                    resize: both;
                    background: linear-gradient(to top, rgba(#cffffe, 0.3), rgba(#f9f7d9, 0.3), rgba(#fce2ce, 0.3), rgba(#ffc1f3, 0.3));
                    border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23cffffe' /%3E%3Cstop offset='25%25' stop-color='%23f9f7d9' /%3E%3Cstop offset='50%25' stop-color='%23fce2ce' /%3E%3Cstop offset='100%25' stop-color='%23ffc1f3' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3'/%3E %3C/svg%3E") 1;
        
        }
        .modal-content_two{
            width: 700px;
            height: 300px;
            border-radius: 4px;
            background-color: #ddf233;
            padding: 20px;
            position: relative;

                    display: block;
                    margin: 0 auto;
                    display: grid;
                    place-items: center;
                    overflow: hidden;
                    ---------------beyond this line is the border-------------------
                    border: 10px solid black;
                    padding: 2rem 1rem;
                    min-height: 3em;
                    width: 60%;
                    resize: both;
                    background: linear-gradient(to top, rgba(#cffffe, 0.3), rgba(#f9f7d9, 0.3), rgba(#fce2ce, 0.3), rgba(#ffc1f3, 0.3));
                    border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23cffffe' /%3E%3Cstop offset='25%25' stop-color='%23f9f7d9' /%3E%3Cstop offset='50%25' stop-color='%23fce2ce' /%3E%3Cstop offset='100%25' stop-color='%23ffc1f3' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3'/%3E %3C/svg%3E") 1;
        
        }
        
        .modal-content_three{
            width: 700px;
            height: 300px;
            border-radius: 4px;
            background-color:#d557f6;
            padding: 20px;
            position: relative;

                    display: block;
                    margin: 0 auto;
                    display: grid;
                    place-items: center;
                    overflow: hidden;
                    ---------------beyond this line is the border-------------------
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- HEADER =============================-->
<header class="item header margin-top-0">
    <div id="show_alert"></div>
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
                
                <li class="propClone"><a href="admin_interface.php">Requested Leaves</a></li>
                <li class="propClone"><a href="list_questionnaires.php">Questionnaire List</a></li>
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
                         View Questionnaire 
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
            <h1 class="text-center latestitems" style="color:#00bba7">Add Questions Below </h1>
        
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

   <!--  ////////////////////////////////// -->
    <div class="col-lg-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Questionnaire Details</h3>
                </div>
                <div class="card-body p-0 py-2">
                    <div class="container-fluid">
                        <p>Title: <b><?php echo $stitle ?></b></p>
                        <p class="mb-0">Description:</p>
                        <small><?php echo $description; ?></small>
                        <p>Start: <b><?php echo date("M d, Y",strtotime($start_date)) ?></b></p>
                        <p>End: <b><?php echo date("M d, Y",strtotime($end_date)) ?></b></p>
                        
                         <?php
                         include 'db_connect.php'; 
        $answers = $conn->query("SELECT distinct(user_id) from tblanswer where questionnaire_id ={$id}");
        

                        ?>
                        <p>Have Taken: <b><?php echo number_format($answers) ?></b></p>

                    </div>
                    <hr class="border-primary">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>KPI Questionnaire</b></h3>
                    <div class="card-tools">
                        <div id="new_question">
                        <button class="btn-sm btn-default btn-flat border-success" type="button"><i class="fa fa-plus"></i> Add Question Type 1</button>
                        </div>
                        <div id="question_type_two">
                        <button class="btn-sm btn-default btn-flat border-success" type="button"><i class="fa fa-plus"></i> Add Question Type 2</button>
                        </div>
                        <div id="question_type_three">
                        <button class="btn-sm btn-default btn-flat border-success" type="button"><i class="fa fa-plus"></i> Add Question Type 3</button>
                        </div>
                    </div>
                </div>
<!--                     ///////////////////////modal section//////////////// -->
                <div class="bg-modal" style="display: none;">
                   <div class="modal-content">
                    <div class="close">+</div>
                    <?php include 'db_connect.php' ?>
                    <?php include 'manage_question.php' ?>

                     <!--    /////////////pop up box for adding questions///////////// -->
                
                </div>
                </div>
                    <!-- //////////////Question Type 2 pop up/////////////// -->
                 <div class="bg-modal_two" style="display: none;">
                   <div class="modal-content_two">
                    <div class="close_two">+</div>
                    <?php include 'db_connect.php' ?>
                    <?php include 'manage_question_two.php' ?>
                </div>
                    <!-- ///////////Question Type 3 pop up/////////////// -->
                <div class="bg-modal_three" style="display: none;">
                   <div class="modal-content_three">
                    <div class="close_three">+</div>
                    <?php include 'db_connect.php' ?>
                    <?php include 'manage_question_three.php' ?>
                </div>
                </div>
                </div>
                </div>
                
                <div class="card-body" style="padding: 15px; border: 4px solid black;">
                    <?php 
                    $question = $conn->query("SELECT * FROM tblquestions where questionnaire_id = $id order by abs(order_by) asc,abs(id) asc");
                    while($row=$question->fetch_assoc()):   
                    ?>


                    <!-- for the edit and delete button for changing a question to different forms -->
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-md-12"> 
                                <span class="dropleft float-right">
                                    <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                                     </div>
                                </span> 
                            </div>  
                        </div>

<!--//Here we are displaying the content from the tblquestions database according to the id's// -->
                        <div class="col-md-12">
                            <h5><?php echo $row['question'] ?></h5> 

                        <input type="hidden" name="qid[]" value="<?php echo $row['id'] ?>"> 
                            <?php
                                if($row['type'] == 'radio_opt'):
                                    $arr = json_decode($row['frm_option'], true);
                                    foreach($arr as $k => $v):
                                        
                            ?>
                            <div class="icheck-primary">
                                <input type="radio" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $k ?>" checked="">
                                <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                             </div>
                                <?php endforeach; ?>
                        <?php elseif($row['type'] == 'check_opt'): 
                                    foreach(json_decode($row['frm_option']) as $k => $v):
                            ?>
                            <div class="icheck-primary">
                                <input type="checkbox" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>][]" value="<?php echo $k ?>" >
                                <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                             </div>
                                <?php endforeach; ?>
                        <?php else: ?>
                            <div class="form-group">
                                <textarea name="answer[<?php echo $row['id'] ?>]" id="" cols="30" rows="4" class="form-control" placeholder="Write Something Here..."></textarea>
                            </div>
                        <?php endif; ?>
                        </div>  
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
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
                <h1 class="callactiontitle">Mark as read then consult the leave committee for action<span class="callactionbutton"><i class="fa fa-gift"></i> NICE DAY</span>
                </h1>
            </div>
        </div>
    </div>
</div>
</section>

<!-- FOOTER =============================-->

<!-- Load JS here for greater good =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">

    ////start load/////
    window.start_load = function(){
        $('body').prepend('<div id="preloader2"></div>')
      }
    ////end load//////
    window.end_load = function(){
        $('#preloader2').fadeOut('fast', function() {
            $(this).remove();
          })
      }  
    ////declaring uni_modal function/////  
   window.uni_modal = function($title = '' , $url='',$size=""){
          start_load()
          $.ajax({
              url:$url,
              error:err=>{
                  console.log()
                  alert("An error occured")
              },
              success:function(resp){
                  if(resp){
                      $('#uni_modal .modal-title').html($title)
                      $('#uni_modal .modal-body').html(resp)
                      if($size != ''){
                          $('#uni_modal .modal-dialog').addClass($size)
                      }else{
                          $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                      }
                      $('#uni_modal').modal({
                        show:true,
                        backdrop:'static',
                        keyboard:false,
                        focus:true
                      })
                      end_load()
                  }
              }
          })
      }

    // $('.new_question').click(function(){
    //     uni_modal("New Question","manage_question.php?sid=<?php echo $id ?>","large");
    // })
    $('.edit_question').click(function(){
        uni_modal("New Question","manage_question.php?sid=<?php echo $id ?>&id="+$(this).attr('data-id'),"large")
    })
    
    $('.delete_question').click(function(){
    _conf("Are you sure to delete this question?","delete_question",[$(this).attr('data-id')])
    })
    function delete_question($id){
        start_load()
        $.ajax({
            url:'ajax.php?action=delete_question',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
    //////////trial of modal popup///////////
    document.getElementById('new_question').addEventListener('click',
     function(){
        document.querySelector('.bg-modal').style.display = 'flex';
    });
    document.querySelector('.close').addEventListener('click', 
        function(){
            document.querySelector('.bg-modal').style.display = 'none';
        });
    ///////////Type 2//////////////
    document.getElementById('question_type_two').addEventListener('click',
     function(){
        document.querySelector('.bg-modal_two').style.display = 'flex';
    });
    document.querySelector('.close_two').addEventListener('click', 
        function(){
            document.querySelector('.bg-modal_two').style.display = 'none';
        });
    ///////////Type 3//////////////
     document.getElementById('question_type_three').addEventListener('click',
     function(){
        document.querySelector('.bg-modal_three').style.display = 'flex';
    });
    document.querySelector('.close_three').addEventListener('click', 
        function(){
            document.querySelector('.bg-modal_three').style.display = 'none';
        });
</script>

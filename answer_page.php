<?php 
    include 'process_stdlogin.php';
       if (!isset($_SESSION['std_email'])) {
        header('location:login_student.php');
    }

    include 'db_connect.php';

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100vw;
  height: 100vh;
  background-color: #0099ff;
}


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


</style>
</head>
<body>


<div class="col-lg-12">
   <div class="row">
      <div class="col-md-4">
         <div class="card card-outline card-primary">
            <div class="card-header">
               <h3 class="card-title"><b>Questionnaire Details</b></h3>
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
            </div>
            <div class="card-body p-0 py-2">
               <div class="thing">
            <h2><p>Title: <b><?php echo $stitle ?></b></p></h2>
            <div class="container-fluid">    
                  <p class="mb-0">Description:</p>
                  <p><small><?php echo $description; ?></small></p>
                  <p>Start: <b><?php echo date("M d, Y",strtotime($start_date)) ?></b></p>
                  <p>End: <b><?php echo date("M d, Y",strtotime($end_date)) ?></b></p>
               </div>
            
            </div>

            <h1 class="heading"> ANSWER THE QUESTIONS ON YOUR RIGHT</h1>
               
               <hr class="border-primary">
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card card-outline card-success">
            <div class="card-header">
               <h3 class="card-title"><b>KPI QUESTIONS</b></h3>
            </div>
            <form action="process_answers.php" method="POST" class="border radial-repeating">
               <input type="hidden" name="questionnaire_id" value="<?php echo $id ?>">
            <div class="card-body ui-sortable">
<!--                ////////passing student responces to be stored in the answer database////////
 -->           
               <label>Select you respective lecturer: </label>
        <select name="lec" style="">
        <option value="">select lecturer...</option>
        <option value="manushi@gmail.com">manushi patel</option>
        <option value="bondinc13@gmail.com">bond inc</option>
        <option value="jane@gmail.com">jane alice</option>
        <option value="jamesouko@gmail.com">james ouko</option>
        <option value="newemployee@gmail.com">new employee</option>
        <option value="jemini@gmail.com">jemini moon</option>
        <option value="benjamin@gmail.com">benjamin otieno</option>
        
        </select>
        <br>
               <?php
               $std_email = $_SESSION['std_email'];
                  $sql = "SELECT * FROM tblstd_registration where std_email = '$std_email'";
                  $que =mysqli_query($conn, $sql) or die(mysqli_error($conn));
               while($result=mysqli_fetch_array($que)): 
                   
                   ?>
                   <input type="hidden" name="std_id" value= "<?php echo $result['std_admi_number'];?>">
                   <?php endwhile; ?>
                   <!-- ////getting the students admission number for us to store it into the tblanswer//// -->
                  <?php 
               $question = $conn->query("SELECT * FROM tblquestions where questionnaire_id = $id order by abs(order_by) asc,abs(id) asc");
               while($row=$question->fetch_assoc()):  
               ?>
               <div class="callout callout-info">
                  <h5><?php echo $row['question'] ?></h5>   
                  <div class="col-md-12">
                  <input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">  
                  <input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">  
                     <?php
                        if($row['type'] == 'radio_opt'):
                           foreach(json_decode($row['frm_option']) as $k => $v):
                              
                     ?>
                     <div class="icheck-primary">
                              <input type="radio" name="answer[<?php echo $row['id'] ?>][]" value="<?php echo $v ?>">
                              
                              <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                           </div>
                        <?php endforeach; ?>
                  <?php elseif($row['type'] == 'check_opt'): 
                           foreach(json_decode($row['frm_option']) as $k => $v):
                     ?>
                     <div class="icheck-primary">
                              <input type="checkbox" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>][]" value="<?php echo $v ?>" >
                              <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                           </div>
                        <?php endforeach; ?>
                  <?php elseif($row['type'] == 'textfield_s'): ?>
                     <div class="form-group">
                        <textarea type="text" name="inputtext" cols="30" rows="4" class="form-control" placeholder="Write Something Here..." ></textarea>
                     </div>
                  <?php endif; ?>
                  </div>   
               </div>
               <?php endwhile; ?>

            </div>
            <div class="card-footer border-top border-success">
               <div class="d-flex w-100 justify-content-center">
                  <button class="btn btn-success" type="submit" name="ans">Submit Answer</button>
                  <button class="btn btn-danger" type="button" onclick="location.href = 'questionnaire.php?page=questionnaire.php'">Cancel</button>
               </div>
            </div>
            </form>
            
         </div>
      </div>
   </div>
</div>
</body>
</html>


<?php 
   // include 'process_login.php';

   //  if (!isset($_SESSION['admin_id'])) {
   //      header('location:login.php');
   //  }
?>
<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM tblquestionnaire where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    $$k = $v;
}
}

?>
<!DOCTYPE html>
<head>
    <style type="text/css">
          .callout.callout-info {
          border-left-color: #117a8b;
        }
        .left_three{
         position: absolute;
        left: 0px;
        width: 280px;
        height: 200px;
         border: 3px solid #73AD21;
        padding: 10px;
        }
        .createbtn{
        position: absolute;
        left: 200px;
        bottom: 0px;

        }
    </style>
</head>
<div class="container-fluid">
    <form method="POST" action="process_manage_question.php">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-6 border-right">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                        <input type="hidden" name="sid" value="<?php echo isset($_GET['sid']) ? $_GET['sid'] : '' ?>">
                        <div class="form-group">
                            <label for="" class="control-label">Question</label>
                            <textarea name="question" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Question Answer Type</label>
                            <select name="type" id="type" class="custom-select custom-select-sm">
                                
                                <option value="textfield_s">Text Field/ Text Area</option>
                            </select>
                        </div>
                </div>

        <div class="col-sm-6">
                    <b>Preview</b>
                            <div id="textfield_s_clone" >
                                <div class="callout callout-info">
                                <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control"  placeholder="Write Something here..." style="background-color: floralwhite;"></textarea>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="createbtn">
            <button class="btn btn-primary mr-2" type="submit" name="create_three">
                                CREATE
                            </button>
        </div>
    </form>
</div>


<script>
    function new_check(_this){
        var tbody=_this.closest('.row').siblings('table').find('tbody')
        var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
        console.log(count)
        var opt = '';
            opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="checkbox" id="checkboxPrimary'+count+'"><label for="checkboxPrimary'+count+'"> </label></div></td>';
            opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
            opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
        var tr = $('<tr></tr>')
        tr.append(opt)
        tbody.append(tr)
    }
    function new_radio(_this){
        var tbody=_this.closest('.row').siblings('table').find('tbody')
        var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
        console.log(count)
        var opt = '';
            opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="radio" id="radioPrimary'+count+'" name="radio"><label for="radioPrimary'+count+'"> </label></div></td>';
            opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
            opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
        var tr = $('<tr></tr>')
        tr.append(opt)
        tbody.append(tr)
    }
    function check_opt(){
        var check_opt_clone = $('#check_opt_clone').clone()
        $('.preview').html(check_opt_clone.html())
    }
    function radio_opt(){
        var radio_opt_clone = $('#radio_opt_clone').clone()
        $('.preview').html(radio_opt_clone.html())
    }
    function textfield_s(){
        var textfield_s_clone = $('#textfield_s_clone').clone()
        $('.preview').html(textfield_s_clone.html())
    }
    $('[name="type"]').change(function(){
        window[$(this).val()]()
    })
    $(function () {
    $('#manage-question').submit(function(e){
        e.preventDefault()
        start_load()
        // $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_question',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast('Data successfully saved.',"success");
                    setTimeout(function(){
                        location.reload()
                    },1500)
                }
            }
        })
    })

  })
</script>
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

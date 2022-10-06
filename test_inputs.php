<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">

	<meta charset="utf-8">
	<title>Multiple Test inputs</title>
</head>
<body class="bg-dark">
	<div class="container">
		<div class="row my-4">
			<div class="col-lg-10 mx-auto">
				<div class="card shadow">
					<div class="card-header">
						<h2> Add Questions</h2>
					</div>
					<div class="card-body p-4">
						<div id="show_alert">
							
						</div>
						<form action="#" method="POST" id="add_form">
							<div id="show_item">
								<div class="row">
									<div class="col-md-4 mb-3">
										<input type="number" name="question_number[]" class="form-control" placeholder="enter question number" required>
										
									</div>
									<div class="col-md-4 mb-3">
										<input type="text" name="question_name[]" class="form-control" placeholder="enter question" required>
										
									</div>
									<div class="col-md-4 mb-3" >
										<label>Question Type</label>
										<select name="question_type[]" class="dropdown-item">
										<option value="radio_opt"> Radio</option>
										<option value="check_opt">Check Box</option>	
										</select>
									</div>
									<div class="col-md-2 md-3 d-grid">
										<button class="btn btn-success add_item_btn">Add</button>
									</div>
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary w-25 " id="add_btn">submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".add_item_btn").click(function(e) {
			e.preventDefault();
			$("#show_item").prepend(`<div class="row append_item">
									<div class="col-md-4 mb-3">
										<input type="number" name="question_number[]" class="form-control" placeholder="enter question number" required>
										
									</div>
									<div class="col-md-4 mb-3">
										<input type="text" name="question_name[]" class="form-control" placeholder="enter question" required>
										
									</div>
									<div class="col-md-4 mb-3" >
										<label>Question Type</label>
										<select name="question_type[]" class="dropdown-item">
										<option value="radio_opt"> Radio</option>
										<option value="check_opt">Check Box</option>	
										</select>
									</div>
									<div class="col-md-2 md-3 d-grid">
										<button class="btn btn-danger remove_item_btn">Remove</button>
									</div>
								</div>`);
		});

		$(document).on('click', '.remove_item_btn', function(e) {
			e.preventDefault();
			let row_item = $(this).parent().parent();
			$(row_item).remove(); 
		});
		//ajax for inserting data
		$("#add_form").submit(function(e){
			e.preventDefault();
			$("#add_btn").val('Adding...');
			$.ajax({
				url: 'action.php',
				method: 'POST',
				data: $(this).serialize(),
				success:function(response){
					$("#add_btn").val('Add');
					$("#add_form")[0].reset();
					$(".append_item").remove();
					$("#show_alert").html(`<div class= "alert alert-success" role="alert">${response}</div>`);
				}
			});
		});
	});

</script>
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
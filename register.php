<?php
	session_start();
	include "config.php";
?>
<html>
	<head>
		<title>account register</title>
		<?php include"header.php"; ?>
		<style>
			.re_box{
				border:2px solid #ccc;
				border-radius:5px;	
			}
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4 mx-auto re_box p-3">
					<h3 class='text-center'>REGISTER</h3><hr>
					<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							$name=mysqli_real_escape_string($con,$_POST['name']);
							$mail=mysqli_real_escape_string($con,$_POST['mail']);
							$phone=mysqli_real_escape_string($con,$_POST['phone']);
							$pass=mysqli_real_escape_string($con,$_POST['pass']);
							$sql="insert into register (name,mail,phone,pass) values('{$name}','{$mail}','{$phone}','{$pass}')";
							if($con->query($sql)){
								flash("Register successfully","success");
							}else{
								flash("Register Faild","danger");
							}
						}
					?>
					<form method="post" action="register.php">
						<div class="form-group">
							<label> Name</label>
							<input type='text' name='name' class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type='email' name='mail' class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type='text' name='phone' class="form-control phone" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type='password' name='pass' class="form-control" required>
						</div>
						<input type="submit" value='Submit' name="submit" class=" form-control btn btn-info"><hr>
						<p class='text-center'>Already have an account? <a href='login.php'>Login</a></p>
					</form>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				$(".phone").keypress(function(e)
				{
					var k=e.keyCode;
					if(k>=48 && k<=57){
					
					}else{
							e.preventDefault();
					}
				})
			});
		</script>
	</body>
</html>
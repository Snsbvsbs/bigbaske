<?php
	session_start();
	include "config.php";
	
?>
<html>
	<head>
		<title>account login</title>
		<?php include"header.php"; ?>
		<style>
			.box{
				border:2px solid #ccc;
				border-radius:5px;	
			}
	
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4 mx-auto mt-5 box p-5">
					<h3 class='text-center'>LOGIN</h3><hr>
						<?php
							if($_SERVER["REQUEST_METHOD"]=="POST"){
								$mail=mysqli_real_escape_string($con,$_POST['mail']);
								$pass=mysqli_real_escape_string($con,$_POST["pass"]);
								$sql="select * from register where mail='{$mail}' and pass='{$pass}'";
								$res=$con->query($sql);
								if($res->num_rows>0)
									{
										$_SESSION['is_login']=true;
										$row=$res->fetch_assoc();
										$_SESSION["rid"]=$row["rid"];
										$_SESSION["name"]=$row["name"];
										header("location:account.php");
										flash("Login Successfully");
									}else{
										flash("Invalid Login","danger");
									}
							}	
						?>
					<form method="post">
						<div class="form-group">
							<label><i class="fa fa-envelope"></i> Email</label>
							<input type='mail' name="mail" class="form-control" required>
						</div>
						<div class="form-group">
							<label><i class="fa fa-key"></i> Password</label>
							<input type='Password'  name="pass" class="form-control" required>
						</div>
							<input type="submit" value='Submit' name="submit" class="form-control btn btn-info"><hr>
						<p class='text-center'>Dont have an account? <a href='register.php'>Register</a></p>
					</form>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
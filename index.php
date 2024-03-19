<?php
	session_start();
	include"_config.php";
?>
<html>
	<head>
		<?php include"_header.php";?>
	</head>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">	
		 <a href="#" class="navbar-brand"> <img src="images/logo.png">  Bigbasket</a> 
	</nav>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5 mx-auto mt-5">
					<h4 class="text-center mt-3" style="font-size:30px;">Admin Login</h4>
					<?php
					
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							
							$aname=mysqli_real_escape_string($con,$_POST['aname']);
							$apass=mysqli_real_escape_string($con,$_POST["apass"]);
							$sql="select * from admin where aname='{$aname}' and apass='{$apass}'";
							
							$res=$con->query($sql);
							
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION['is_login']=true;
								$_SESSION["aid"]=$row["aid"];
								$_SESSION["aname"]=$row["aname"];
								header("location:home.php");
								flash("Login Successfully");

								
							}
							else{
								flash("Invalid Login","danger");
							}
						}
					?>
					<?php flash(); ?>
					<form method="post" action="index.php" class="form">
						
						<div class="form-group">
							<label>Name</label>
							<input type="text"  name="aname" required  class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="Password"  name="apass" required  class="form-control">
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-info form-control mt-3"> 
					</form>
				</div>
			</div>
		</div>
		<?php include"_footer.php";?>
	</body>
</html>
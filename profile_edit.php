<?php
	session_start();
	if(!isset($_SESSION["rid"])){
		header("location:login.php");
	}
	include "config.php";
	
?>
<html>
	<head>
		<title>account edit</title>
		
		<?php include"header.php"; ?>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container  mt-3 mb-5">
			<div class="row mt-4">
				<div class="col-md-2"> 
					<?php include "user_sidebar.php"; ?>
			   </div>
			   
			   <div class="col-md-10">
					<h5><i class="fa fa-pencil-square-o"></i> Edit Profile</h5><hr>
						<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							
							$name=mysqli_real_escape_string($con,$_POST["name"]);
							$mail=mysqli_real_escape_string($con,$_POST["mail"]);
							$phone=mysqli_real_escape_string($con,$_POST["phone"]);
							$pass=mysqli_real_escape_string($con,$_POST["pass"]);
							
							$address=mysqli_real_escape_string($con,$_POST["address"]);
							$city=mysqli_real_escape_string($con,$_POST["city"]);
							$state=mysqli_real_escape_string($con,$_POST["state"]);
							$pincode=mysqli_real_escape_string($con,$_POST["pincode"]);
							
							$sql="update register set name='{$name}', mail='{$mail}', phone='{$phone}', pass='{$pass}', addr='{$address}',city='{$city}',state='{$state}',pincode='{$pincode}'  where rid='{$_SESSION["rid"]}' ";
							if($con->query($sql)){
								flash("Profile Edited successfully");
							}else{
								flash("Profile Edited Faild.","danger");
							}
						}
						
							$sql="select * from register where rid='{$_SESSION["rid"]}' ";
							$res=$con->query($sql);
							$row=$res->fetch_assoc();
					
					?>
				<?php flash(); ?>
				<form method="post">	
					<div class="row">
					
						<div class='col-md-5'>
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control"  name="name" value='<?php echo $row["name"];?>' >
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="mail" class="form-control"  name="mail" value='<?php echo $row["mail"];?>' >
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control phone" name="phone" value='<?php echo $row["phone"];?>' >
							</div>	
							<div class="form-group">
								<label>password</label>
								<input type="text" class="form-control" name="pass" value='<?php echo $row["pass"];?>' >
							</div>	
						</div>
				
						<div class="col-md-5">
							<div class="form-group">
								<label>address</label>
								<textarea class="form-control" name="address" ><?php echo $row["addr"];?></textarea>
							</div>	
							<div class="form-group">
								<label>city</label>
								<input type="text" class="form-control" name="city" value='<?php echo $row["city"];?>'>
							</div>	
							<div class="form-group">
								<label>state</label>
								<input type="text" class="form-control" name="state" value='<?php echo $row["state"];?>'>
							</div>	
							<div class="form-group">
								<label>pincode</label>
								<input type="text" class="form-control" name="pincode" value='<?php echo $row["pincode"];?>'>
							</div>	
							<input type="submit" name="submit" class="btn btn-info btn-md">
							
						</div>
						
					</div>
				</form>
			   </div>
			</div>
		</div>
			<?php include"footer.php"; ?>
			
		<script>
			$(document).ready(function(){
			$(".phone").keypress(function(e){
				var k=e.keyCode;
				var n=e.target.value.length;
				if(n>9){
					e.preventDefault();
				}
				if(k>=48 && k<=57){
					
				}else{
					e.preventDefault();
				}
			});			
		});
		
		</script>
	</body>
</html>
			
					
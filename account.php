<?php
	session_start();
	if(!isset($_SESSION["rid"])){
		header("location:login.php");
	}
	include "config.php";
	
?>
<html>
	<head>
		<title>Shopping account</title>
		<?php include"header.php"; ?>
		<style>
			.said a{
				display:block;
				padding:5px;
				color:black;
			}
			a{
				text-decoration:none;
				color:black;
			}
			a:hover{
				text-decoration:none;
				color:black;
			}
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-3 mb-5">
			
			<div class="row mt-4">
				<div class="col-md-2"> 
				<?php
					$sql="select * from register where rid='{$_SESSION["rid"]}'";
					$res=$con->query($sql);
				?>
					<?php include "user_sidebar.php"; ?>
			   </div>
			   
				<div class='col-md-5'>
					<h5><i class="fa fa-address-card-o" ></i> Profile Details</h5><hr>
					<?php flash(); ?>
					<?php
						
						while($row=$res->fetch_assoc())
						{
						echo"
							<ul style='list-style-type:none;' class='p-2'>
								<li>Name : {$row["name"]}</li><hr>
								<li>Email : {$row["mail"]}</li><hr>
								<li>Number : {$row["phone"]}</li><hr>
							</ul>
						  ";
						}
					?>
					
				</div>
			</div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>
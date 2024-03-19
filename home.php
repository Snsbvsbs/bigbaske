<?php 
	session_start();
	if(!isset($_SESSION['is_login'])){
		header("location:index.php");
	}
	include"_config.php";
?>
<html>
	<head>
		<?php include"_header.php";?>
		<style>	
			.card{
				background-color:EEE7DA;
			}		
			.icon{
				font-size:80px;
				padding-left:60px;
				opacity:0.4;
				display:block;
				padding-top:10px;
				color:red;
				position:fixzed;
				
			}
			.card-body a{
				font-size:14px!important;
				float:right;
				color:black;
				text-decoration:none;
			}
			
		</style>
	</head>
	<?php include"navbar_main.php";?>
	<body>
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-md-3 mt-3">
					<?php include"sidebar.php";?>
				</div>
				<div class="col-md-9 mt-3">
					<?php flash(); ?>
					<div class="row ">
						<div class="col-md-3">
							<div class="card mt-2">
								<h5 class="pl-3 mt-2">Category</h5>
								<i class="fa fa-list icon"></i>
								<div class="card-body">
									<a href="Category.php">View Details</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card mt-2">
								<h5 class="pl-3 mt-2">Product</h5>
								<i class="fa fa-folder icon"></i>
								<div class="card-body">
									<a href="product.php">View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include"_footer.php";?>
	</body>
</html>

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
	</head>
	<?php include"navbar_main.php";?>
	<body>
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-md-3 mt-3">
					<?php include"sidebar.php";?>
				</div>
				<div class="col-md-5 mt-3">
				
					<h5><i class="fa fa-list"></i> Category Details</h5><hr>
					
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							$cname=mysqli_real_escape_string($con,$_POST["cname"]);
						    $sql="update category set cname='{$cname}' where cid='{$_GET["id"]}'";
							if($con->query($sql)){
								flash("Category Added successfully");
							}else{
								flash("Category Added Faild","danger");								
							}
						}
							$sql="select * from category where cid='{$_GET["id"]}'";
							$res=$con->query($sql);
							$row=$res->fetch_assoc();
					?>
					<?php flash(); ?>
					<form method="post">
						<div class="form-group"> 
							<label>Add Category</label>
							<input type="text" class="form-control" name="cname" required value='<?php echo $row["cname"];?>'>
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-info btn-sm">
					</form>
				</div>
			</div>
		
		</div>
		<?php include"_footer.php";?>
	</body>
</html>

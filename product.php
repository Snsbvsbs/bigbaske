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
					<h5><i class="fa fa-folder"></i> Product</h5><hr>
			
					<form method="post">	
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							$cid=$_POST["cid"];
							$pname=mysqli_real_escape_string($con,$_POST["pname"]);
							$mrp=mysqli_real_escape_string($con,$_POST["mrp"]);
							$price=mysqli_real_escape_string($con,$_POST["price"]);
							
							$sql="Insert into products (pname,mrp,price,cid) values('{$pname}','{$mrp}','{$price}','{$cid}')";
							if($con->query($sql)){
								flash("Product Added successfully.");
							}else{
								flash("Product Added Faild.","danger");
							}
						}
					?>
					<?php flash(); ?>
					<div class="form-group">
							<label>Category</label>
							<select class="form-control form-control-sm" name="cid">
								<option value=''>Select Category</option>
								<?php
									$sql = "select * from category";
									$res = $con->query($sql);
									while($row = $res->fetch_assoc()){
										echo"<option value='{$row["cid"]}'>{$row["cname"]}</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" name="pname" class="form-control" required value='<?php echo $row["pname"];?>'>
						</div>
						<div class="form-group">
							<label>MRP</label>
							<input type="text" name="mrp" class="form-control" required value='<?php echo $row["mrp"];?>'>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price" class="form-control " required value='<?php echo $row["price"];?>'>
						</div>
						
						<input type="submit" name="submit" value="submit" class="btn btn-info btn-sm">
					</form>
				</div>
			</div>
		</div>
		<?php include"_footer.php";?>
		
	</body>
</html>

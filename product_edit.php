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
				<div class="col-md-9 mt-3">
					<h5><i class="fa fa-folder"></i> Updates Product</h5><hr>
					<?php include "tab.php"; ?>
					<form method="post" action='' class='mt-3'>	
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							$pname=mysqli_real_escape_string($con,$_POST["pname"]);
							$mrp=mysqli_real_escape_string($con,$_POST["mrp"]);
							$price=mysqli_real_escape_string($con,$_POST["price"]);
							$cid=mysqli_real_escape_string($con,$_POST["cid"]);
							$des=mysqli_real_escape_string($con,$_POST["des"]);
							$short=mysqli_real_escape_string($con,$_POST["short"]);
							
						
							$sql="update products set cid='{$cid}',pname='{$pname}',mrp='{$mrp}',price='{$price}',description='{$des}',short='{$short}' where pid='{$_GET["id"]}'";
							if($con->query($sql)){
								flash("Product Edited successfully");
							}else{
								flash("Product Edited Faild.","danger");
							}
						}
						
						
						
						$sql="select * from products where pid='{$_GET["id"]}'";
						$res=$con->query($sql);
						$row=$res->fetch_assoc();
					?>
					<?php flash(); ?>
					<div class="form-group">
							<label>Category</label>
							<select class="form-control form-control-sm" name="cid">
								<option value=''>Select Category</option>
								<?php
									$sql = "select * from Category";
									$res = $con->query($sql);
									while($rw = $res->fetch_assoc()){
										if($rw["cid"] == $row["cid"]){
											echo"<option selected value='{$rw["cid"]}'>{$rw["cname"]}</option>";
										}else{
											echo"<option value='{$rw["cid"]}'>{$rw["cname"]}</option>";
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" name="pname" class="form-control"  value='<?php echo $row["pname"];?>'>
						</div>
						<div class="form-group">
							<label>MRP</label>
							<input type="text" name="mrp" class="form-control mrp"  value='<?php echo $row["mrp"];?>'>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price" class="form-control price"  value='<?php echo $row["price"];?>'>
						</div>
						<div class="form-group">
							<label>Short Description</label>
							<textarea  name="short" class="form-control" ><?php echo $row["short"];?></textarea>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="des" class='form-control richText'  ><?php echo $row["description"]; ?></textarea>
						</div>
					
						<input type="submit" name="submit" value="submit" class="btn btn-info btn-sm">
					</form>
				</div>
			</div>
		</div>
		<?php include"_footer.php";?>
		<script>
			$(document).ready(function(){
				$(".price").keypress(function(e){
					var k=e.keyCode;
					if(k>=48 && k<=57){
						
					}else{
						e.preventDefault();
					}
				})
				$(".mrp").keypress(function(e){
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

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
					<h5><i class="fa fa-picture-o"></i> Image Upload</h5><hr>
					<?php include"tab.php"; ?>
					<?php
						 if(isset($_FILES["image"])){
							$allowedTypes = ["png","jpg","jpeg"];
							$fileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));	
						    if(!in_array($fileType ,$allowedTypes)){
								flash("Image Upload Faild.","danger");
							}
							elseif($_FILES["image"]["size"]>307200){
								flash("Image Upload Failed.Image Size greater than 300KB.","danger");
							}
							
							else{
									$fileName = time().".".$fileType;
									if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$fileName)){
										$pid=$_GET["id"];
										$sql ="insert into product_images (pid,image) values ('{$pid}','{$fileName}')";
										if($con->query($sql)){
											flash("Image Upload Successfully.","Success");
										}else{
											flash("Image Upload Faild.","danger");
										}
									}
							}
						}
						?>
					<form method="post"  enctype='multipart/form-data' class='mt-3'>	
						<?php flash(); ?>
						<div class="form-group">
							<label>Product Image</label>
							<input type="file" name="image" class="form-control" required>
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-info btn-sm">
					</form>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-9 ml-auto">
					<table  class="table table-bordered table-striped mt-4">
						<thead class="text-center">
							<th>SNO</th>
							<th>Image</th>
							<th>Delete</th>
						</thead>
					
						
					<?php
						$sql="select * from product_images where pid='{$_GET["id"]}'";
						$res=$con->query($sql);
						$i=0;
						while($rw=$res->fetch_assoc())
						{
							$i++;
							echo"<tr class='text-center'>
								<td>{$i}</td>
								<td ><img src='images/{$rw["image"]}' style='height:80px!important;'></td>
								<td><a href='product_image_delete.php?pid={$_GET["id"]}&id={$rw['imid']}&img={$rw["image"]}'class='btn btn-danger btn-sm'>Delete</a></td>
							</tr>";
						};
					?>
					</table>
				</div>
			</div>
		</div>
		<?php include"_footer.php";?>
	</body>
</html>

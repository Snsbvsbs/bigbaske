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
					<h5><i class="fa fa-list"></i> Category Details</h5><hr>
					<form method="post">
						<?php
							if($_SERVER['REQUEST_METHOD']=='POST'){
								$cname=mysqli_real_escape_string($con,$_POST["cname"]);
								$sql="insert into  category (cname) values('{$cname}')";
								if($con->query($sql)){
									flash("Category Added successfully");
								}else{
									flash("Category Added Faild","danger");								
								}
							}
							
						?>
							<?php flash(); ?>
						<div class="form-group"> 	
							<label>Add Category</label>
							<input type="text" class="form-control" name="cname" required>
						</div>
						<input type="submit" name="submit"  value="submit" class="btn btn-info btn-sm">
					</form>
				
				
					<table  class="table table-bordered table-striped mt-4">
						<thead>
							<th>SNO</th>
							<th>Category</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>
					
							<?php
								$res=$con->query('select * from category ');
								$i=0;
								
								while($row = $res->fetch_assoc()){
									
									$i++;
									echo"<tr>
										<td>{$i}</td>
										<td>{$row["cname"]}</td>
										<td><a href='category_edit.php?id={$row['cid']}' class='btn btn-sm btn-info'>Edit</a></td>
										<td><a href='category_delete.php?id={$row['cid']}' onclick='return confirm(\"Are you Sure?\")' class='btn btn-sm btn-danger'>Delete</a></td>
									</tr>";
								}
							?>
						
					</table>
			</div>
		</div>
	</div>
	<?php include"_footer.php";?>
	</body>
</html>

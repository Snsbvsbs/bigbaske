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
					<?php flash(); ?>
					<h5><i class="fa fa-eye"></i> View Product </h5><hr>
					<table class="table table-bordered table-striped">
						<thead>
							<th>SNO</th>
							<th>Category</th>
							<th>Product Name</th>
							<th>MRP</th>
							<th>Price</th>
							<th>Edit</th>
							<th>Delete</th>
							
						</thead>
						<?php
							$sql="select * from products p inner join category c on p.cid = c.cid";
							$res = $con->query($sql);
							$i=0;
							while($row = $res->fetch_assoc())
							{
								
								$i++;
								
								echo"<tr>
									<td>{$i}</td>
									<td>{$row["cname"]}</td>
									<td>{$row["pname"]}</td>
									<td>{$row["mrp"]}</td>
									<td>{$row["price"]}</td>
									<td><a href='product_edit.php?id={$row['pid']}' class='btn btn-sm btn-info'>Edit</a></td>
									<td><a href='product_delete.php?id={$row['pid']}' onclick='return confirm(\"Are you Sure?\")' class='btn btn-sm btn-danger'>Delete</a></td>
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

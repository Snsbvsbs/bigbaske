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
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-3 mb-5">
			<div class="row mt-4">
				<div class="col-md-2">
					<?php include "user_sidebar.php"; ?>
			   </div>
				
				<div class="col-md-10">
					<h5><i class="fa fa-first-order"></i> Orders</h5><hr>
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th>Order No</th>
							<th>Date</th>
							<th>Pay Mode</th>
							<th>Total Amount</th>
							<th>Delivery Status</th>
							<th>View</th>
						</thead>
						<tbody>
							<?php
								
								$sql="select * from orders where rid='{$_SESSION["rid"]}'  ";
								$res=$con->query($sql);
								while($row=$res->fetch_assoc())
								{
									echo"
										<tr>
											<td>{$row["order_no"]}</td>
											<td>{$row["odate"]}</td>
											<td>{$row["pay_mode"]}</td>
											<td>{$row["total_amt"]}</td>
											<td>{$row["delivery_status"]}</td>
											<td><a href='order_view.php?oid={$row["oid"]}' class='btn btn-info btn-sm'>View</a></td>
										</tr>
									";
								}
								
							?>
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>
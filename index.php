<?php
	session_start();
	include "config.php";
	
	
	$products=[];
	$pids=[];
	$sql="select * from products p inner join product_images i on p.pid=i.pid group by i.pid  order by p.pid desc limit 8";
	$res=$con->query($sql);
	while($rw=$res->fetch_assoc())
	{
		$products[]=$rw;
		$pids[]=$rw["pid"];
	}
?>
<html>
	<head>
		<title>bigbasket Shopping index</title>
		<?php include"header.php"; ?>
		<style>
			 a{
				text-decoration:none;
				color:black;
			}
			a:hover{
				text-decoration:none;
				color:black;
			}
			.n{
				text-decoration:none;
				color:white;
			}
			
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-3 ">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<a href="">
					<div class="carousel-inner">
						<div class="carousel-item active">
						<img class="d-block" src="image/1.jpg">
						</div>
						<div class="carousel-item">
						<img class="d-block " src="image/2.jpg">
						</div>
						<div class="carousel-item">
						<img class="d-block" src="image/3.jpg">
						</div>
					</div>
				</a>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
			<div class="row mt-5">
				<?php
					foreach($products as $row)
					{
							
						echo"
							<div class='col-md-3'>
								<a href='product_view.php?id={$row['pid']}'' id='pname'>
								<div class='card mb-3'>
									<div class='d-flex justify-content-center align-items-center' style='height:150px;'>
										<img src='bb-admin/images/{$row["image"]}' style='max-height:150px;' >
									</div>
									<div class='card-body'>
										<p class='card-title ' >{$row["pname"]}</p>
										<s style='font-size:12px; color:red;'>MRP &#8377;{$row["mrp"]}</s><br>
										Price &#8377; {$row["price"]}<br>
										<input type='button' class='btn btn-info mt-2 w-100' value='Add'>
									</div>
								</div>
								</a>
							</div>
						";
					}
				?>
			</div>
		</div>
	<?php include"footer.php"; ?>
	</body>
</html>
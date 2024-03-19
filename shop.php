<?php
	session_start();
	include "config.php";
	
	
	
	$cid = 0;
	if(isset($_GET["cid"])){
		$cid = $_GET["cid"];
		$products=[];
		$pids=[];
		$sql="select * from products p inner join product_images i on p.pid=i.pid where p.cid = {$_GET["cid"]} group by i.pid  order by p.pid desc";
		$res=$con->query($sql);
		while($rw=$res->fetch_assoc())
		{
			$products[]=$rw;
			$pids[]=$rw["pid"];
		}
	}else{
		$products=[];
		$pids=[];
		$sql="select * from products p inner join product_images i on p.pid=i.pid group by i.pid  order by p.pid desc";
		$res=$con->query($sql);
		while($rw=$res->fetch_assoc())
		{
			$products[]=$rw;
			$pids[]=$rw["pid"];
		}
	}
		 
	
?>
<html>
	<head>
		<title>bigbasket Shopping</title>
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
			.cate_list li a{
				display:block;
				padding:5px;
			}
			.cate_active{
				color:#28a745!important;
				font-weight:bold;
			}
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
				</ol>
			</nav>
			<div class="row mt-4">
				<div class="col-md-2"> 
				
					<!--Category-->
				
					<h5><i class="fa fa-shopping-cart"></i> Shop Category</h5><hr>
					<ul style='list-style-type:none;padding:0;' class='cate_list'>
						<li><a href='shop.php' >All</a></li>
						<?php
							$sql="select * from category ";
							$res=$con->query($sql);
							while($row=$res->fetch_assoc())
							{
								if($cid == $row["cid"])
								{
									echo" 
										<li><a class='cate_active' href='shop.php?cid={$row["cid"]}'>{$row["cname"]}</a></li>
									";
								}else{
									echo "<li><a  href='shop.php?cid={$row["cid"]}'>{$row["cname"]}</a></li>";
								}
							}
						?>
					</ul>
				</div>
			
				<div class='col-md-10'>
					<div class='row'>
					<?php
						foreach($products as $row)
						{
							echo"
								<div class='col-md-4'>
									<a href='product_view.php?id={$row['pid']}'' id='pname'>
									<div class='card mb-3'>
										<div class='d-flex justify-content-center align-items-center' style='height:150px;'>
											<img src='bb-admin/images/{$row["image"]}' style='max-height:150px;' >
										</div>
										<div class='card-body'>
											<p class='card-title ' >{$row["pname"]}</p>
											<s style='font-size:12px; color:red;'>&#8377;{$row["mrp"]}</s><br>
											<b >&#8377; {$row["price"]}</b><br>
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
				
			</div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>
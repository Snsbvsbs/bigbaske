<?php
	session_start();
	include "config.php";
	 
	$sql="select * from products p inner join category c on p.cid=c.cid where pid='{$_GET["id"]}'";
	$res=$con->query($sql);
	$info=$res->fetch_assoc();
	
	
	$products=[];
	$sql="select *from products p inner join product_images i on p.pid=i.pid where p.cid ='{$info["cid"]}' and p.pid<>{$_GET["id"]} group by i.pid order by rand() limit 4";
	$res=$con->query($sql);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$products[]=$row;
		
	}
	
	$sql="select * from product_images where pid='{$_GET["id"]}' limit 1";
	$res=$con->query($sql);
	$image=$res->fetch_assoc();
	
	if(isset($_POST["submit"])){
		$sum=0;
		$qty = $_POST["qty"];
		$pname = $info["pname"];
		$price = $info["price"];
		$pid = $_GET["id"];
		$total = $qty*$price;
		$image = $image["image"];
		
		$_SESSION["cart"][$pid] = [
			"pid"=>$pid,
			"pname"=>$pname,
			"price"=>$price,
			"qty"=>$qty,
			"total"=>$total,
			"image"=>$image,
			
		];
		flash("Product Added to Card. View Cart <a href='cart.php'>Click</a>","success");
	}
	
?>
<html>
	<head>
		<title>bigbasket Product View</title>
		<?php include"header.php"; ?>
	<style>
		.box{
			border:1px solid #ccc;
			border-radius:5px;
			padding-left:10px;
		}
		.review{
			border:1px solid #ccc;
			border-radius:15px;
			
		}
		.iactive{
			
			opacity:1!important;
			border:1px solid #ccc;
			padding:5px;
		}
		.thumb-img{
			
			opacity:0.5;
		}

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
		.border{
			border:2px solid #ccc;
			border-radius:10px;
		}
		
	</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="shop.php"><?php echo $info["cname"];?></a></li>
					<li class="breadcrumb-item active"><?php echo $info["pname"];?></li>
				</ol>
			</nav>
		<?php flash(); ?>
			<div class="row mt-5">
				<div class="col-md-2 mt-2">
					<?php
						$first_img = "";
						$sql="select * from product_images where pid='{$_GET["id"]}' ";
						$res=$con->query($sql);
						$i=0;
						while($rw=$res->fetch_assoc())
						{	
							$i++;
							$active = "";
							if($i==1){
								$active = "iactive";
								$first_img = $rw["image"];
							}
							echo"
								<a href='product_view.php' >
									<img src='bb-admin/images/{$rw["image"]}' class='thumb-img {$active} mt-2' style='height:80px;' >
								</a>
							";
						}
					?>
				</div>
				
				<div class="col-md-4 box mt-2">
					<img src='bb-admin/images/<?php echo $first_img; ?>' class='img-fluid' id='max-img' >
				</div>
				
				<div class="col-md-6 mt-2">
					<p  style='font-size:20px;'><?php echo $info["pname"]; ?></p>
				
					<s style=' color:red;' >MRP: &#8377;<?php echo $info["mrp"]; ?></s>
					<p  style='font-size:20px;' class='pt-2'>Price: &#8377;<?php echo  $info["price"]; ?></p>
					<p><?php echo $info["short"]; ?></p>
					<form method='post'>
						<div class='d-flex align-items-center'>
							<input type='number' value='1' min='1' class='form-control w-25' required name='qty' >
							&nbsp;&nbsp;
							<input type='submit' class='btn btn-info btn-md ' value='Add to basket' name='submit'>
							&nbsp;&nbsp;
							<input type='button' class='btn btn-danger  btn-md' value='Save for later'>
						</div>
					</form>
				</div>
			</div>
			
			<!--TAB-->
				
				<ul class="nav nav-tabs mt-5">
				<li class="nav-item">
					<a class="nav-link active tab-link" href="#description">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link  tab-link" href="#review">Review</a>
				</li>
				
				</ul>
			
			<!--Description-->
			
				<div class='tab-item mt-5' id='description'>
						<?php echo $info["description"];?>
				</div>
			
			<!--Review-->
			
			<div class='tab-item mt-5' id='review' >
				<div class="row review p-3">
					<div class="col-md-12">
						<div class="row ">
							<div class="col-md-5 mx-auto">	
							<?php
								if(isset($_POST["review"]))
								{
									$pid=$_GET["id"];
									$name=$_POST["name"];
									$review=$_POST["review"];
									$star=$_POST["star"];
									$sql="insert into review (pid,rname,review,star) values('{$pid}','{$name}','{$review}','{$star}')";
									if($con->query($sql));
								}
									$sql="select * from review where pid='{$_GET["id"]}'";
									$res=$con->query($sql);
									
									while($info=$res->fetch_assoc()){
										echo"
											<div class='d-flex'>
												<img src='image/user1.jpg' style='height:50px;'>
												<p class='pl-3 pt-2'>{$info["rname"]}
												";
												for($i=0;$i<$info["star"];$i++){
														echo "<i class='fa fa-star-o text-warning '></i>";
													}
												echo"</p>
											</div>";
										
											echo "<p style='padding-left:65px;'>{$info["review"]}</p><hr>
										";
									}
								?>
							</div>
							<div class="col-md-6 mt-2">
								<div class="row">
									<form method="post">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Your Reviews</label>
											<textarea  name="review"  class="form-control" required></textarea>
										</div>
												
										<div class='d-flex align-items-center '  name="star">
										<p class='mt-3'>Your Rating</p>
											<i class="fa fa-star-o text-secondary star" value='1'></i>
											<i class='fa fa-star-o text-secondary star' value='2'></i>
											<i class='fa fa-star-o text-secondary star' value='3'></i>
											<i class='fa fa-star-o text-secondary star' value='4'></i>
											<i class='fa fa-star-o text-secondary star' value='5'></i>
										</div>
										
										<input type="hidden" id='rating' name="star">
										
										<input type="submit"  name="review" class="form-control btn btn-info mt-2">
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			
			<hr>
			<b>Similar Products</b>
			<div class="row mt-2">
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
										<b >Price &#8377; {$row["price"]}</b><br>
										<input type='button' class='btn btn-info mt-2 w-100' value='Add'>
									</div>
								</div></a>
							</div>
						";
					}
				?>
			</div>
		</div>
	
	<?php include"footer.php"; ?>
		<script>
			$(document).ready(function(){
				$(".tab-item").hide();
				$(".tab-item").first().show();
				$(".tab-link").click(function(e){
					e.preventDefault();
					$(".tab-link").removeClass("active");
					$(this).addClass("active");
					$(".tab-item").hide();
					var id = $(this).attr("href");
					$(id).show();
				});
				$(".thumb-img").click(function(e){
					e.preventDefault();
					var src = $(this).attr("src");
					$("#max-img").attr("src",src);
					$(".thumb-img").removeClass("iactive");
					$(this).addClass("iactive");
				});
				
				$(".star").click(function(){
					$(".star").removeClass("text-warning");
					var r = $(this).attr("value");
					$(this).addClass("text-warning");
					$(this).prevAll(".star").addClass("text-warning");
					$("#rating").val(r);
				});
			});
		</script>
	</body>
</html>
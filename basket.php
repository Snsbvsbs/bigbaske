<?php
	session_start();
	include "config.php";
	$sql="select * from products p inner join category c on p.cid=c.cid where pid='{$_GET["id"]}'";
	$res=$con->query($sql);
	$rw=$res->fetch_assoc();
	
	
	
	
?>
<html>
	<head>
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
		</style>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-2">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><?php echo $rw["cname"];?></li>
				<li class="breadcrumb-item active"><?php echo $rw["pname"];?></li>
			</ol>
		</nav>
			<div class="row">
				
				<?php
					$sql="select * from product_images where pid='{$_GET["id"]}' ";
					$res=$con->query($sql);
					while($row=$res->fetch_assoc())
					{
						echo"							
							<img src='bb-admin/images/{$row["image"]}' style='height:80px;'>
						";
					}
                     echo"
						<p>$rw["cname"]</p>
					 ";
				?>
				
			</div>
		</div>
	</body>
</html>
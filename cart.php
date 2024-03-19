<?php 
	session_start();
	include "config.php";
	
	
?>
<html>
	<head>
		<title>bigbasket Cart</title>
		<?php include"header.php"; ?>
		<style>
		.box{
			border:1px solid #ccc;
			border-radius:5px;
			
		}
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
		<div class="container mt-3 pb-5">
		<nav aria-label='breadcrumb'>
			<ol class='breadcrumb'>
				<li class='breadcrumb-item'><a href='#'>Home</a></li>
				<li class='breadcrumb-item'><a href='Shop.php'>Shop</a></li>
				<li class='breadcrumb-item active'>Cart </li>
			</ol>
		</nav>
		<?php flash(); ?>
		<?php if(count($_SESSION["cart"])>0): ?>
		<table class='table table-bordered table-striped'>
			<thead>
				<tr>
					<th>Image</th>
					<th>Product</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$qty = 0;
					$total = 0;
					foreach($_SESSION["cart"] as $row)
					{
						echo "
							<tr>
								<td><img src='bb-admin/images/{$row["image"]}'   style='height:80px;'></td>
								<td>{$row["pname"]}</td>
								<td>{$row["price"]}</td>
								<td>{$row["qty"]}</td>
								<td>{$row["total"]}</td>
								<td><a href='cart_delete.php?pid={$row["pid"]}' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a></td>
								
							</tr>
						";
						$qty += $row["qty"];
						$total += $row["total"];
						
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td  colspan="3" ></td>
					<td colspan="1" ><?php echo $qty; ?></td>
					<td colspan="1" ><?php echo $total; ?></td>
				</tr>
			</tfoot>
			</table>
			<p align='right'>
				<a href='checkout.php 'class='btn btn-success'>CheckOut</a>
			</p>
			<?php else: ?>
				<h1 align='center' class='mt-5'>Your Cart is Empty</h1>
				<p align='center' class='mb-5'><a href='shop.php' class='btn btn-success'>Continue Shopping</a><p>
			<?php endif; ?>
		</div>
		
		<?php include "footer.php"; ?>
		
	</body>
</html>
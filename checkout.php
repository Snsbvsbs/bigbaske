<?php 
	session_start();
	include "config.php";
	if(!isset($_SESSION["rid"])){
		header("location:login.php");
	}
?>
<html>
	<head>
		<title>Checkout</title>
		<style>
		.te{
			height:125px;
		}
		</style>
		<?php include"header.php"; ?>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
		<div class="container mt-5">
			<h5>Your Orders</h5><hr>
			<form method="post">	
						
			<div class=" row mt-2">
				  <div class="col-md-6">
					<h5>Delivery Address</h5><hr>
						<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							
							$name=mysqli_real_escape_string($con,$_POST["name"]);
							$phone=mysqli_real_escape_string($con,$_POST["phone"]);
							$address=mysqli_real_escape_string($con,$_POST["address"]);
							$city=mysqli_real_escape_string($con,$_POST["city"]);
							$state=mysqli_real_escape_string($con,$_POST["state"]);
							$pincode=mysqli_real_escape_string($con,$_POST["pincode"]);
							
							$sql="update register set name='{$name}', phone='{$phone}', addr='{$address}',city='{$city}',state='{$state}',pincode='{$pincode}'  where rid='{$_SESSION["rid"]}'";
							if($con->query($sql)){
								
								$order_no = "20240001";
								
								$sql = "select order_no from orders order by order_no desc limit 1";
								$res = $con->query($sql);
								if($res->num_rows>0){
									$row = $res->fetch_assoc();
									$order_no = $row["order_no"]+1;
								}
								
								$odate = date("Y-m-d H:i");
								$pay_mod = $_POST["pay_mode"];
								$rid = $_SESSION["rid"];
								$delivery_status = "Order Placed";
								$total_amt = $_POST["total_amt"];
								
								$sql="insert into orders (odate,order_no,rid,total_amt,pay_mode,delivery_status) values('{$odate}','{$order_no}','{$rid}','{$total_amt}','{$pay_mod}','{$delivery_status}')";
								if($con->query($sql)){
									
									$oid = $con->insert_id;
									foreach($_SESSION["cart"] as $row)
									{
										$sql = "insert into orders_products (oid,pid,name,price,qty,total) values ('{$oid}','{$row["pid"]}','{$row["pname"]}','{$row["price"]}','{$row["qty"]}','{$row["total"]}')";
										$con->query($sql);
									}
									
									flash("Order Placed Successfully","info");
									header("location:success.php?id={$oid }");
								}
								
								
							}else{
								flash("Profile Edited Faild.","danger");
							}
						}
						
							$sql="select * from register where rid='{$_SESSION["rid"]}' ";
							$res=$con->query($sql);
							$row=$res->fetch_assoc();
					
					?>
				<?php flash(); ?>
				
					<div class="row">
						<div class='col-md-6'>
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control"  required name="name" value='<?php echo $row["name"];?>' >
							</div>
							
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" required name="phone" value='<?php echo $row["phone"];?>' >
							</div>	
							<div class="form-group">
								<label>Email</label>
								<input type="mail" class="form-control" required name="mail" readonly value='<?php echo $row["mail"];?>' >
							</div>
							<div class="form-group">
								<label>city</label>
								<input type="text" class="form-control" required name="city" value='<?php echo $row["city"];?>'>
							</div>	
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>address</label>
								<textarea class="form-control te" required name="address" ><?php echo $row["addr"];?></textarea>
							</div>
							<div class="form-group">
								<label>state</label>
								<input type="text" class="form-control" required name="state" value='<?php echo $row["state"];?>'>
							</div>	
							<div class="form-group">
								<label>pincode</label>
								<input type="text" class="form-control" required name="pincode" value='<?php echo $row["pincode"];?>'>
							</div>	
							
						</div>
					</div>
				
			   </div>
			   
				<div class="col-md-6 ">
					<h5>Your Cart Item</h5><hr>
					<table class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th>Product</th>
							<th>Qty</th>
							<th>Rate</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$total = 0;
						foreach($_SESSION["cart"] as $row)
						{
							echo "
								<tr>
									<td>{$row["pname"]}</td>
									<td>{$row["qty"]} x {$row["price"]}</td>
									<td class='text-right'>{$row["total"]}</td>
								</tr>
							";
							$total += $row["total"];
						}
					?>
					</tbody>
					<tfoot>
						<tr>
							<th>Total Amount</th>
							<th></th>
							<th class='text-right'><?php echo round($total); ?></th>
							<input type='hidden' value='<?php echo round($total); ?>' name='total_amt'>
						</tr>
					</tfoot>
					</table>
					
					<label class='d-block pl-3 pb-2 mt-4' >
						<input type='radio' checked name='pay_mode' value='cod'> Cash on Delivery
					</label>
					<label class='d-block pl-3 pb-2'>
						<input type='radio'  name='pay_mode' value='online'> Online Payment
					</label>
					<input type="submit" value="PLACE ORDER" class="btn btn-info btn-md ml-3">
				</div>
		  </div>
		  </form>
		</div><hr>
		<?php include"footer.php"; ?>
	</body>
</html>
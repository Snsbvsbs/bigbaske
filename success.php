<?php
	session_start();
	if(!isset($_SESSION["rid"])){
		header("location:login.php");
	}
	include "config.php";
	
	$sql = "select *  from orders where oid={$_GET["id"]}";
	$res=$con->query($sql);
	$row = $res->fetch_assoc();
	flash("Order Palced Successfully. Your order number is {$row["order_no"]}");
	unset($_SESSION["cart"]);
?>
<html>
	<head>
		<title>Success</title>
		<?php include"header.php"; ?>
	</head>
	<body>
	<?php include"_navbar.php"; ?>
	<div class='container pt-5' style='min-height:350px;'>
		<?php flash(); ?>
	</div>
	<?php include"footer.php"; ?>
	</body>
</html>
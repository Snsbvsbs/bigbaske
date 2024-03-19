<?php 
	session_start();
	if(!isset($_SESSION['is_login'])){
		header("location:index.php");
	}
	include"_config.php";
	$sql="delete from products where pid='{$_GET["id"]}'";
	
	if($con->query($sql)){
		flash("Product Deleted Successfully");
	}
	header("Location:product_view.php");
?>
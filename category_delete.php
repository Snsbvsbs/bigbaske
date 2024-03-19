<?php
	session_start();
	if(!isset($_SESSION['is_login'])){
		header("location:index.php");
	}
	include"_config.php";
	$sql="delete from category where cid='{$_GET["id"]}'";
	if($con->query($sql)){
		flash("Category Deleted Successfully.","Success");
	}
	header("location:category.php");
 ?>	
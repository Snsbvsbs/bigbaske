<?php 
	session_start();
	include"_config.php";
	$sql="delete from product_description where did='{$_GET['id']}'";
	if($con->query($sql)){
		flash("Description Deleted Faild","danger");
	}
	header("Location:product_description.php?id={$_GET['pid']}");
?>



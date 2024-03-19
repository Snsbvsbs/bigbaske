<?php
	session_start();
	include"config.php";
	
	$pid=$_GET["pid"];
	$sql="select * from product_images where pid='{$_GET["id"]}'"
	$con->query($sql);
?>
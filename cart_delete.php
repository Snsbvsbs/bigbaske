<?php 
	session_start();
	include "config.php";
	
	unset($_SESSION["cart"][$_GET["pid"]]);
	

		flash("cart Deleted Successfully");
	
	header("Location:cart.php");
?>
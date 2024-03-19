<?php
	session_start();
	include"config.php";
	unset($_SESSION["rid"]);
	flash("Logout Succesfully","success");
	header("Location:login.php");
?>
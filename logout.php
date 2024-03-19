<?php
	session_start();
	include"_config.php";
	unset($_session["is_Login"]);
	flash("Logout Succesfully","success");
	header("Location:index.php");
?>
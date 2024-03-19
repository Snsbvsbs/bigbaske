<?php
	session_start();
	include "config.php";
?>
<html>
	<head>
		<title>bigbasket Shopping Contact</title>
		<?php include"header.php"; ?>
		<style>
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
		<div class="container mt-3 ">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="index.php">Home</a></li>
					<li class="breadcrumb-item">Contact</li>
				</ol>
			</nav>
			<div class="row mt-4">
				<div class='col-md-12'>
					<h5><i class="fa fa-map-marker"></i> Contact Us</h5><hr>
					<p>To reach our customer service team please email us at:customerservice@bigbasket.com</p>
					
					<div class="mt-5">
						<h5 class="mb-4">Office Address :</h5>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2745.180957296674!2d78.13473757172676!3d11.675347351242326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babf1d16eaab085%3A0x6fc10fa183613432!2sHotel%20Cenneys%20Gateway%20-%20Premium%204%20Star%20Hotel!5e0!3m2!1sen!2sin!4v1704358083683!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
					</div>
					<br>
					<br>
					<br>
					<br>
				</div>
			</div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>
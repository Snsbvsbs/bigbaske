<?php 
	session_start();
	if(!isset($_SESSION['is_login'])){
		header("location:index.php");
	}
	include"_config.php";
?>
<html>
	<head>
		<?php include"_header.php";?>
		<link href='assets/richtext/richtext.min.css'>
	</head>
	<?php include"navbar_main.php";?>
	<body>
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-md-3 mt-3">
					<?php include"sidebar.php";?>
				</div>
				<div class="col-md-5 mt-3">
					<h5><i class="fa fa-picture-o"></i> Image Upload</h5><hr>
					<?php include"tab.php"; ?>
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST')
						{

							$pid=$_GET["id"];
							$des=$_POST["des"];
							$sql ="update product_description set pid='{$pid}' , description='{$des}' where pid='{$_GET["id"]}'";
							if($con->query($sql))
							{
								flash("Description Added Successfully.","Success");
							}else{
								flash("Description Added Faild.","danger");
							}
						
						}
						$sql="select * from product_description where did='{$_GET["pid"]}'";
						$res=$con->query($sql);
						$row=$res->fetch_assoc();
					?>
					<form class="mt-2" method="post">
					<?php flash(); ?>
						<label>Description</label>
						<div class="form-group">
							<textarea name="des" class='form-control '  required ><?php echo $row["des"];?></textarea>
						</div>
						<input type='submit' value='Submit' name="submit" class='btn btn-dark'>
					</form>
				
				</div>
			</div>
			
		</div>
		<?php include"_footer.php";?>
		<!--<script src='assets/richtext/jquery.richtext.js'></script>-->
	</body>
</html>

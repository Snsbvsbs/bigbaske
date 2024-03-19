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
				<div class="col-md-9 mt-3">
					<h5><i class="fa fa-envelope-open-o"></i> Description</h5><hr>
					<?php include"tab.php"; ?>
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST')
						{

							$pid=$_GET["id"];
							$des=$_POST["des"];
							$sql ="insert into Product_description (pid,description ) values ('{$pid}','{$des}')";
							if($con->query($sql))
							{
								flash("Description Added Successfully.");
							}else{
								flash("Description Added Faild.","danger");
							}
						
						}
					?>
					<form class="mt-2" method="post">
					<?php flash(); ?>
						<label>Description</label>
						<div class="form-group">
							<textarea name="des" class='form-control richText'  required></textarea>
						</div>
						<input type='submit' value='Submit' name="submit" class='btn btn-dark'>
					</form>
					<table class="table table-bordered table-striped">
						<thead>
							<th>Description</th>
							<th>Delete</th>
						</thead>
						<?php
							$sql="select * from Product_description where pid='{$_GET["id"]}' ";
							$res=$con->query($sql);
							while($row=$res->fetch_assoc())
							{
								echo"<tr>
									<td>{$row["description"]}</td>
									<td><a href='description_delete.php?pid={$_GET['id']}&id={$row["did"]}'class='btn btn-danger btn-sm'>Delete</a></td>
								</tr>";
							};
						?>
					</table>
				</div>
			</div>
			
		</div>
		<?php include"_footer.php";?>
		
	</body>
</html>

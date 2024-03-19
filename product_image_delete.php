<?php 
	session_start();
	include"_config.php";
	$sql="delete from product_images where imid='{$_GET['id']}'";
	if($con->query($sql)){
		if(unlink("images/{$_GET["img"]}")){
			flash("Image Deleted Successfully.");
		}
		
	}else{
		flash("Image Deleted Faild.","danger");

	}
	header("Location:product_img.php?id={$_GET['pid']}");
?>



<?php
	$con=mysqli_connect("localhost","root","","bigbasket"); 
	
		
	function flash($msg="",$cate="success"){
		if(isset($_SESSION["flash_msg"]))
		{
			echo($_SESSION["flash_msg"]);
			unset($_SESSION["flash_msg"]);
		}
		elseif(!empty($msg)){
			$_SESSION["flash_msg"]="
						<div class='alert alert-{$cate} alert-dismissible fade show' role='alert'>
				{$msg}
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
			</div>";
			
		}
		
	}
	
	
?>

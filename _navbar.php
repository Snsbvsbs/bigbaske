<nav class="navbar navbar-expand-md navbar-dark bg-success">
	<div class="container">
		<a class="navbar-brand" href="index.php"> <img src="image/logo_main.png">  Bigbasket</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id='navbarNav'>
		<ul class="navbar-nav ">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="shop.php">Shop</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="contact.php">Contact</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="account.php">My Account</a>
			</li>	
		</ul>
		
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
			<?php 
				if(isset($_SESSION["rid"])){
					echo "<a class='nav-link' href='logout.php'><i class='fa fa-sign-out'></i> Logout</a>";
				}else{
					echo "<a class='nav-link' href='login.php'><i class='fa fa-sign-in'></i> Login</a>";
				}
			?>
			
				
			</li>
			<li class="nav-item active mt-1">
				<a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i></a>
			</li>
			
		</ul>
	</div>
	
  </div>
</nav>

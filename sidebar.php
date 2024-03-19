
<style>
	.sactive{
		background-color:green!important;
	}
	.sactive a{
		color:white!important;
	}
	
	.stext{
		color:white;
		text-decoration:none!important;
	}
	.stext a{
		text-decoration:none;
	}
</style>
<h5><i class="fa fa-tachometer ml-3"></i> Dashboard</h5><hr>
<ul class="list-group stext">
	<li class="list-group-item  <?php if(basename($_SERVER["PHP_SELF"])=="home.php"){ echo "sactive";}?>"><a href="home.php" class="text-dark " ><i class="fa fa-home" ></i> Home</a></li>
	<li class=" list-group-item  <?php if(basename($_SERVER["PHP_SELF"])=="category.php"){ echo "sactive";}?>"><a href="category.php" class="text-dark " ><i class="fa fa-list"></i> Category</a></li>
	<li class=" list-group-item  <?php if(basename($_SERVER["PHP_SELF"])=="product.php"){ echo "sactive";}?>"><a href="product.php" class="text-dark " ><i class="fa fa-folder"></i> Product</a></li>
	<li class=" list-group-item <?php if(basename($_SERVER["PHP_SELF"])=="product_view.php"){ echo "sactive";}?>"><a href="product_view.php" class="text-dark " ><i class="fa fa-eye"></i> View Product</a></li>
	
</ul>
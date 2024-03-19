
<ul class="nav nav-tabs">
<li class="nav-item ">
<a class="nav-link <?php if(basename($_SERVER["PHP_SELF"])=="product_edit.php"){ echo "active";}?>" href="product_edit.php?id=<?php echo $_GET["id"]; ?>">Update Products</a>
</li>
<li class="nav-item">
<a class="nav-link <?php if(basename($_SERVER["PHP_SELF"])=="product_img.php"){ echo "active";}?>" href="product_img.php?id=<?php echo $_GET["id"]; ?>">Images</a>
</li>

</ul>

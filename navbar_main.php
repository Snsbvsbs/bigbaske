<?php include"_header.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
	<a class="navbar-brand" href="#"> <img src="images/logo.png">  Bigbasket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
	 <li class="nav-item active">
        <a class="nav-link" href="#">Welcome : <?php echo $_SESSION["aname"];?></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
	 
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
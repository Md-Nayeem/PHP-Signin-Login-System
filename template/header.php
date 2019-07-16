<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
		<div class="container">
			  <a class="navbar-brand" href="index.php">Navbar</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Link</a>
			      </li>
			      <!-- if logged in  -->
			      <?php if(isset($_SESSION['u_id'])) {?>		      
			      	<li class="nav-item">
			      		<form action="includes/logout.inc.php" method="POST">
			      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"name="submit">Logout</button>
			     		</form>
			      	</li>
			      <?php }else{ ?>
			      	<!-- if not logged in -->
			      	<li class="nav-item">
				        <form class="form-inline my-2 my-lg-0" method="POST" action="includes/login.inc.php">
					      <input class="form-control mr-sm-2" name="EUid" placeholder="Email/Name" aria-label="Email/Name">
					      <input class="form-control mr-sm-2" name="pass" placeholder="Password" aria-label="Password">
					      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Login</button>
					      <a class="btn btn-outline-success my-2 my-sm-0 ml-sm-2" href="signin.php" >Signup</a>
					    </form>
			      	</li>
			      <?php } ?>    	      		    
			  </div>
			</div>
		</nav>
	</header>
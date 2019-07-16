	<?php include_once 'template/header.php'; ?>

	<section>
		<div class="container">
			<div class="text-center my-4"><h3>This is the SignUp page.</h3></div>
			<!-- Form -->
			<form class="w-75 m-auto" method="POST" action="includes/sign.inc.php">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label class="font-weight-bold" for="firstname">First Name</label>
			      <!-- GET first-name if already entered -->
			      <?php 
			      	if(isset($_GET['firstname'])){
			      		$fname = $_GET['firstname'];
			      		echo '<input type="text" class="form-control" id="firstname" value="'.$fname.'" name="firstname" placeholder="Enter First name">';
			      	}
			      	else{
			      		echo '<input type="text" class="form-control" id="firstname"  name="firstname" placeholder="Enter First name">';
			      	}
			      ?>
			    </div>
			    <div class="form-group col-md-6">
			      <label class="font-weight-bold" for="secondname">Second Name</label>
			      <!-- GET second-name if already entered -->
			      <?php 
			      	if(isset($_GET['secondname'])){
			      		$sname = $_GET['secondname'];
			      		echo '<input type="text" class="form-control" id="secondname" name="secondname" value="'.$sname.'" placeholder="Enter Second name">';
			      	}
			      	else{
			      		echo '<input type="text" class="form-control" id="secondname" name="secondname" placeholder="Enter Second name"> ';
			      	}
			      ?>
			    </div>
			    <div class="form-group col-md-12">
			      <label class="font-weight-bold" for="uid">User Name</label>
			      <!-- GET user-name if already entered -->
			      <?php 
			      	if(isset($_GET['uid'])){
			      		$uid = $_GET['uid'];
			      		echo '<input type="text" class="form-control" value="'.$uid.'" id="uid" name="uid" placeholder="Enter User Name">';
			      	}
			      	else{
			      		echo '<input type="text" class="form-control" id="uid" name="uid" placeholder="Enter User Name">';
			      	}
			      ?>
			    </div>
			    <div class="form-group col-md-6">
			      <label class="font-weight-bold" for="email">Email</label>
			      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
			    </div>
			    <div class="form-group col-md-6">
			      <label class="font-weight-bold" for="pass">Password</label>
			      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
			    </div>
			  </div>
			  
			  <button class="btn btn-success justify-content-end" type="submit" name="submit" class="btn btn-primary">Sign in</button>
			</form>
			<!--Error messages -->
			<div class="text-center mt-5">
				<?php 
					//To get the current webpage URL
					$fullurl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

					//Checking URL string for error keywords.
					if(strpos($fullurl,"sign=empty") == true){
						echo '<p class="text-danger font-weight-bold">You did not filled all the filleds.</p>';
						exit();
					}
					elseif(strpos($fullurl,"sign=char") == true){
						echo '<p class="text-danger font-weight-bold">You used invalid Characters.</p>';
						exit();
					}
					elseif(strpos($fullurl,"sign=email") == true){
						echo '<p class="text-danger font-weight-bold">You entered an invalid email.</p>';
						exit();
					}
					elseif(strpos($fullurl,"sign=emailexist") == true){
						echo '<p class="text-danger font-weight-bold">This email already exists.</p>';
						exit();
					}
					elseif(strpos($fullurl,"sign=usertaken") == true){
						echo '<p class="text-danger font-weight-bold">Sorry, This uid is taken.</p>';
						exit();
					}
				?>
			</div>
		</div>
	</section>
<?php include_once 'template/footer.php'; ?>

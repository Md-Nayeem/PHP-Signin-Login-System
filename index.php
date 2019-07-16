
<!-- Header -->
<?php include_once 'template/header.php'; ?>

<!-- Body section -->
	<section>
		<div class="container">
			<div class="text-center mt-4"><h3>This is the Home Page.</h3></div>
			<?php if(isset($_SESSION['u_id'])){
				echo '<div><h4 class="text-success text-center my-4">So you are now logged in.</h4></div>';
			} ?>
		</div>
	</section>

<!-- footer -->
<?php include_once 'template/footer.php'; ?>

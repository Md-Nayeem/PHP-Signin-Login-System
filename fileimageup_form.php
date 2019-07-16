
<?php include_once 'template/header.php'; ?>

<section class="mt-5">
	<div class="container text-center">
		<form method="POST" action="includes/fileUploadcustom.php" enctype="multipart/form-data" >
			<input type="file" name="file">
			<button class="btn btn-lg btn-success" type="submit" name="submit">Upload</button>
			
		</form>
	</div>
</section>






<?php include_once 'template/Footer.php'; ?>







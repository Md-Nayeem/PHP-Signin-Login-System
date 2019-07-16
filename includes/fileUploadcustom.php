<?php 

if(isset($_POST['submit'])){

	$file = $_FILES['file'];//This is a associative array
	// print_r($file);
		// here, asign variable to the associative array fields
	$fileName = $_FILES['file']['name'];
	$fileTempName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	//echo "$fileName,$fileTempName,$fileSize,$fileError";

	$fileExt = explode('.', $fileName);//Here this will a array 
	$fileActualExt = strtolower(end($fileExt));//End function gets the last value form the array

	// echo "$fileActualExt";
	

	// Array to contain the allowed values
	$allowed = array('jpg', 'jpeg', 'png','pdf');
	if (in_array($fileActualExt, $allowed)) {  //  in_array(needle, haystack)
		if($fileError === 0){
			if($fileSize < 1500000){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = '../upload/'.$fileNameNew;
				// echo "$fileNameNew,$fileDestination";
				// exit();

				// Main file moving function
				move_uploaded_file($fileTempName, $fileDestination); //move_uploaded_file(tmp_name, destination)
				header('Location: ../fileimageup_form.php?uplaod=success');
			}else{
				echo "Your file size is too big!";
			}
		}
		else{
			echo "There was an Error uploading your File!";
		}
	}else{
		echo "You can not upload this file type!";
	}

}














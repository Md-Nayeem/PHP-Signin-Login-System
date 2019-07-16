<?php 


//if posted or not
if (isset($_POST['submit'])) {

	include_once 'dbcon.php';
	$fname = mysqli_real_escape_string($conn,$_POST['firstname']);
	$sname = mysqli_real_escape_string($conn,$_POST['secondname']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pass']); //Pass = pwd here,

	// Error Handlers
		//empty value
	if (empty($fname) ||empty($sname) ||empty($uid) ||empty($email) ||empty($pwd)) {
		header('Location: ../signin.php?sign=empty');
		exit();
	}
	else{
		// This will only allow a-z and A-Z characters. (Anti)
		if(!preg_match("/^[a-zA-Z]*$/", $fname)|| !preg_match("/^[a-zA-Z]*$/", $sname)){
			header('Location: ../signin.php?sign=char');
			exit();
		}
		else{
			// Valid email or not
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location: ../signin.php?sign=email&firstname=$fname&secondname=$sname&uid=$uid");
				exit();

			}
			else{
				// existing email or not 
				$sql = "SELECT * FROM users WHERE user_email= '$email'";
				$result = mysqli_query($conn,$sql);
				$resCheck = mysqli_num_rows($result);
				if($resCheck>0){
					header("Location: ../signin.php?sign=emailexist&firstname=$fname&secondname=$sname&uid=$uid");
					exit();
				}
				// User name taken or not
				else{
					$sql = "SELECT * FROM users WHERE user_uid= '$uid'";
					$result = mysqli_query($conn,$sql);
					$resCheck = mysqli_num_rows($result);
					if($resCheck>0){
						header("Location: ../signin.php?sign=usertaken&firstname=$fname&secondname=$sname");
						exit();
					}
					else{
						// hashing the password
						$hashedpass = password_hash($pwd, PASSWORD_DEFAULT);

						// insert into database
						$sql= "INSERT INTO users(user_firstname,user_secondname,user_uid,user_email,user_pwd) VALUES('$fname','$sname','$uid','$email','$hashedpass')";
						$result = mysqli_query($conn,$sql);
						header('Location: ../signin.php?sign=success');
						exit();

					}
				}
			}
		}
	}
}
else{
	header('Location: ../signin.php');
	exit();
}



















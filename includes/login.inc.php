<?php 

session_start();

if(isset($_POST['submit'])){
	// SQL injection protection
	include_once 'dbcon.php';
	$euid = mysqli_real_escape_string($conn,$_POST['EUid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pass']);

	//Error handlers
	if(empty($euid)||empty($pwd)){
		header('Location: ../index.php?login=empty');
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE user_email='$euid'";
		$result = mysqli_query($conn,$sql);
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck < 1){
			header('Location: ../signin.php?login=user not found');
			exit();
		}
		else{
			if($row = mysqli_fetch_assoc($result)){
				//De-hashing the password
				$hashedpwdcheack = password_verify($pwd, $row['user_pwd']);
				if($hashedpwdcheack == false){
					header('Location: ../signin.php?login=pass not matched');
					exit();
				}
				elseif($hashedpwdcheack == true){
					//Log in here
					$_SESSION['u_id']=$row['id'];
					$_SESSION['u_first']=$row['user_firstname'];
					$_SESSION['u_second']=$row['user_secondname'];
					$_SESSION['u_email']=$row['user_email'];
					$_SESSION['u_uid']=$row['user_uid'];
					header('Location: ../index.php?login=success');

				}

			}
		}
	}
}
else{
	header('Location: ../signin.php?login=error');
	exit();
}

















<?php 
define('__CONFIG__', true);

require_once "../inc/config.php";

	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname 		= $_POST['fname'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$gender 	= $_POST['gender'];
		$agree 		= $_POST['cbox'];
		$return 	= [];


		$findUser = $con->prepare("SELECT user_id FROM users WHERE email = :email LIMIT 1");
		$findUser->bindParam(':email', $email);
		$findUser->execute();

		if($findUser->rowCount() > 0) {
			$return['error'] = "your already have an account";
		}else{
			$addUser = $con->prepare("INSERT INTO users (full_name, email, password, gender, agree) 
			VALUES (:full_name, :email, :password, :gender, :agree)");
			$addUser->bindParam(':full_name', $fname);
			$addUser->bindParam(':email', $email);
			$addUser->bindParam(':password', $password);
			$addUser->bindParam(':gender', $gender);
			$addUser->bindParam(':agree', $agree);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			if($user_id){
				$return['success'] = 'Registration success we are redirecting you to login';
				$return['redirect'] = 'login.php';
			}
		}

		echo json_encode($return, JSON_PRETTY_PRINT);
}else{
	echo "Invalid URL";
	exit();
}
?>
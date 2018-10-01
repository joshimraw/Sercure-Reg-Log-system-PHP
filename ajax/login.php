<?php 
define('__CONFIG__', true);

require_once "../inc/config.php";
require_once "session.php";

	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$return = [];


		$findUser = $con->prepare("SELECT user_id, email, password FROM users WHERE email = :email LIMIT 1");
		$findUser->bindParam(':email', $email);
		$findUser->execute();

		if($findUser->rowCount() == 1) {
			$user = $findUser->fetch(PDO::FETCH_ASSOC);
			$user_id = $user['user_id'];
			$user_email = $user['email'];
			$user_pass = $user['password'];

			if($user_id && $user_email && $user_pass){
				$_SESSION['user_id'] = $user_id;
				$return['success'] = 'Welcome! your are logged in';
				$return['redirect'] = '/dashboard.php';
			}else{
				$return['error'] = 'Invalid e-Mail/Password';
			}
		}else{
			$return['error'] = "you dont have account please register first <a href='/register.php'>Register</a>";
		}

		echo json_encode($return, JSON_PRETTY_PRINT);
}else{
	echo "Invalid URL";
	exit();
}
?> 
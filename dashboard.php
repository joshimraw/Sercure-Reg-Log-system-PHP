<?php 
$title = "Dashboard";
require_once "inc/header.php";
define('__CONFIG__', true);
include_once 'inc/config.php';
include_once 'ajax/session.php';

force_to_login();

$user_id = $_SESSION['user_id'];

$getUserInfo = $con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
$getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$getUserInfo->execute();

if($getUserInfo->rowCount() == 1){
	$user = $getUserInfo->fetch(PDO::FETCH_ASSOC);
}else{
	header("location: /logout.php");
}
?>

  	<div class="uk-section uk-container">
  		<?php 
  			echo "Hello world. Today is: ". date("y m d"). "<br>";
  			echo $user['user_id']. " is your user id ";
  			echo "and you was registered on ".$user['reg_time']. " by " .$user['email']. "<br>";

  		?> 


  		<a class="uk-button uk-button-primary" href="logout.php" >Logout</a>
      

  	</div>



  	<?php require_once "inc/footer.php"; ?> 



<?php 
$title = "dashboard";
define('__CONFIG__', true);
require_once "inc/dheader.php";
require_once "inc/config.php";
require_once "ajax/session.php";

force_to_login();
$user_id = $_SESSION['user_id'];

$getUserInfo = $con->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
$getUserInfo->bindParam(':user_id', $user_id);
$getUserInfo->execute();

if($getUserInfo->rowCount() == 1){
	$user = $getUserInfo->fetch(PDO::FETCH_ASSOC);
}

$mr_mrs = '';
if($user['gender'] == 'male'){
	$mr_mrs = 'Mr.';
}else if($user['gender'] == 'female'){
	$mr_mrs = 'Mrs.';
}
?>

<h2>Welcome 
	<?php echo "<span class='t-upper t-white back-pink'>"
	.$mr_mrs. ' ' .$user['full_name']."&nbsp;
	</span>"; ?></h2>
<p><?php echo "Today is : ". date("Y-m-d"); ?></p>




 <?php require_once "inc/footer.php"; ?> 
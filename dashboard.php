<?php 
require_once "inc/header.php";


define('__CONFIG__', true);
include_once 'inc/config.php';


?>

  	<div class="uk-section uk-container">
  		<?php 
  			echo "Hello world. Today is: ". date("y m d"). "<br>";
  			echo $_SESSION['user_id'] . ' is your user id';
  		?> 
      

  	</div>



  	<?php require_once "inc/footer.php"; ?> 


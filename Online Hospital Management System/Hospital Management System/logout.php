<?php
	

	setcookie('name', "", time()-3600);
	setcookie('doctor', "", time()-3600);
	setcookie('nurse', "", time()-3600);
	header("Location: http://localhost/target.php");
	

?>
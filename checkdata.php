<?php

require_once('model/connect.php');

if(isset($_POST["email"])){

	$email = $_POST["email"]; 

	$db = Db::getInstance();

	$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();


	if ($user["id"] >'0' ) {

   		echo "yes";
	}
	else { 
		echo "no";
	}
}

 ?>

<?php 

 if(!isset($_SESSION["id"])){  
	/*echo "<script> alert('Ju nuk jeni loguar');</script>";*/
	Header('location: index.php?controller=user&action=showLogin');
	exit();
} 


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/user/butonsub.css">
     <link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">



</head>
<body>
<div class="hey" >Mireseerdhet Perseri</div>


</body>
</html>
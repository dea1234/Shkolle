<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




class UserController{	


	public function signup(){

		if (isset($_POST["username"]))
		{
			$name = $_POST["username"];
		}




		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];

		} 



		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if( User::exists($email) == true || $name == '' ||  $email == '' || $password == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
			Header('location: index.php?controller=user&action=showNormalUser');
		}
		else {

			$created = User::createNormalUser($name,$email,$password);
			if($created){
				
				$mail = new PHPMailer(true);                              
				try {
			    //Server settings
					$mail->SMTPDebug = 0;                                 
					$mail->isSMTP();                                      
					$mail->Host = 'smtp.gmail.com';  
					$mail->SMTPAuth = true;                               
					$mail->Username = 'projekt.shkolle.fshn@gmail.com';                
					$mail->Password = 'shkollefshn';                           
					$mail->SMTPSecure = 'tls';                            
					$mail->Port = 587;                                    


					$mail->setFrom('projekt.shkolle.fshn@gmail.com', '4 Paw Friends');
					$mail->addAddress($email);    


					$mail->isHTML(true);                                  
					$mail->Subject = 'Confirmation email';
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/shkolle/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
					header('location: view/pages/confirm.php');
					exit();

				}

				catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}

			}
		}

	}


	public function signupM(){


		if (isset($_POST["username"]))
		{
			$username = $_POST["username"];
		}


		if (isset($_POST["bio"]))
		{
			$bio = $_POST["bio"];
		}


		if (isset($_POST["genre"]))
		{
			$genre = $_POST["genre"];
		}


		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];

		} 


		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if( User::exists($email) == true ||  $email == '' || $password == '' || $username == '' || $genre == '' ||$bio == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
			Header('location: index.php?controller=user&action=showMUser');
		}
		else {
			$created = User::createVetUser($fname,$lname,$username,$phone,$location,$email,$password);
			if($created==true){
				$mail = new PHPMailer(true);                              
				try {
				    //Server settings
					$mail->SMTPDebug = 0;                                 
					$mail->isSMTP();                                      
					$mail->Host = 'smtp.gmail.com';  
					$mail->SMTPAuth = true;                               
					$mail->Username = 'petprojecttaleas@gmail.com';                
					$mail->Password = 'shkollefshn';                           
					$mail->SMTPSecure = 'tls';                            
					$mail->Port = 587;                                    


					$mail->setFrom('petprojecttaleas@gmail.com', '4 Paw Friends');
					$mail->addAddress($email);    


					$mail->isHTML(true);                                  
					$mail->Subject = 'Confirmation email';
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/shkolle/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
					header('location: view/pages/confirm.php');
					exit();

				}

				catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
			}
		}

	}





	public function login()
	{

		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];
		} 



		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if ($_POST["password"] == '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $_POST["email"] == '' ){

			Header('location: index.php?controller=user&action=showLogin');
		}

		else{
			$found = User::findUser($email,$password);

			if($found == '1')

			{
				$db = Db::getInstance();

				$result = $db->prepare("SELECT id FROM user WHERE email = ?");
				$result->execute([$email]);
				$user = $result->fetch();

				
				
				if($user != ''){
					$_SESSION["id"]=$user["id"];
					Header('location: index.php?controller=user&action=welcome');
				}

		
				else   header('location: index.php?controller=user&action=confirm');


			}

		}
	}

		public function welcome() {

			require_once('view/user/welcome.php');

		} 
		public function artikuj() {

			require_once('view/pages/artikuj.php');

		} 
		public function kontakte() {

			require_once('view/pages/kontakte.php');


		} 
	   	public function info() {

			require_once('view/pages/info.php');


		} 





		public function confirm(){
			/*echo "<script> alert('Ju lutem konfirmoni te dhenat tuaja! ');</script>"; */
			
			$_SESSION["errors"] = "Wrong password!";
			Header('location: index.php?controller=user&action=showLogin');
		}




		public function logout(){

			session_destroy();
			header('Location: index.php?controller=user&action=showLogin');
		}



		public function showNormalUser(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/signup.php');
		}


		public function showMUser(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/signupM.php');
		}



		public function showLogin(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/login.php');

		}

		public function home(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/home.php');
		}

		



		public function confirmEmail(){

			$email=$_GET["email"];
			$confirm_code=$_GET["confirm_code"];

			$confirmed = User::confirmation($email, $confirm_code);
			if($confirmed == true){

				header('location: index.php?controller=user&action=showLogin');
			} 
			else header('location: index.php?controller=pages&action=error');

		}

		public function profile(){
			 if(!isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=showLogin');
          exit();
        }
			require_once('view/pages/profile.php');
		}




	}


	?>
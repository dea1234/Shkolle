		<?php
		
		class User{

			
			public function __construct(){}

			public static function createNormalUser($name,$email,$password){

				try { $confirm_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
				$confirm_code=str_shuffle($confirm_code);
				$confirm_code = substr($confirm_code,0,12);

				
				$db = Db::getInstance();

				$confirm = 0;

				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);

				$result = $db->prepare("INSERT INTO user(name,email,password,confirm,confirm_code) VALUES (:name, :email,:hashed_pass,:confirm,:confirm_code)");

				
				$result->execute(array('name' => $name, 'email' => $email , 'hashed_pass' => $hashed_pass , 'confirm' =>$confirm ,'confirm_code'=> $confirm_code));
				

				return $confirm_code;
				

				
			}
			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}	
		}

		public function createMUser($username,$bio,$genre,$email,$password){

			try{
				$confirm_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
				$confirm_code=str_shuffle($confirm_code);
				$confirm_code = substr($confirm_code,0,12);

				$db = Db::getInstance();

				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);
				$confirm = 0;
				
				$type = '1';
				
				$result = $db->prepare("INSERT INTO user(name,email,password,confirm,confirm_code,type, bio, genre) VALUES (:name, :email,:hashed_pass,:confirm,:confirm_code,:type, :bio, :genre)");

				
				$result->execute(array('name' => $name, 'email' => $email , 'hashed_pass' => $hashed_pass , 'confirm' =>$confirm ,'confirm_code'=> $confirm_code,'type'=> $type, 'bio'=> $bio, 'genre'=>$genre));

				return $confirm_code;

			}

			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}


		}


		public function findUser($email, $password){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

			if($user != '' ){

				if ($user && password_verify($password, $user['password']))
				{
					return $user['confirm'];
				} else {
					return false;
				}
			}
		}

			

			


		


		public function confirmation($email, $confirm_code){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT confirm_code FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

		


			if($user["confirm_code"] == $confirm_code){

				$result = $db->prepare("UPDATE user SET confirm = 1 WHERE email = ?");
				$result->execute([$email]);

				$result = $db->prepare("UPDATE user SET confirm_code = 0 WHERE email = ?");
				$result->execute([$email]);
				
				return true;
			} 
			
			else return false;

		}

	


		public function createSubscribeUser($name,$email){


			try { 

				

				$db = Db::getInstance();


				

				$result = $db->prepare("INSERT INTO subscribe(name,email) VALUES (:name, :email)");

				
				$result->execute(array('name' => $name, 'email' => $email ));
				

				return true;
				

				
			} 
			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}	


		}


		public function exists($email){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();


			if ($user["id"] >'0' ) {

   		return true;
	}
	else { 
		return false;
	}

		}

	}





	?>
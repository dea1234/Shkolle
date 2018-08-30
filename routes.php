	<?php

	  function call($controller, $action) 

	{
	    
	    require_once('controller/' . $controller . 'controller.php');

	     switch($controller) 
	    {
	      case 'pages':
	        $controller = new PagesController();
	      break;
	      
	       case 'posts':
	        require_once('model/post.php');
	        $controller = new PostsController();
	      break;

	      	case 'user':
	      	require_once('model/user.php');
	      	$controller = new UserController;
	      	
	      	break;
	      case 'forum':
	      require_once('model/forum.php');
	      $controller = new ForumController;


	    
	    }

	     $controller->{ $action }();


	}

			 $controllers = array('posts' => ['index','show', 'addPost', 'showPost'],
			 					  'pages' => ['home', 'error','welcome','profile','subscribeMessage'],
<<<<<<< HEAD
								  'user' => ['signup','signupVet','signupStore','login','subscribe', 'logout', 'showNormalUser', 'welcome','showVet','showStore','showLogin','confirm', 'home', 'confirmEmail','facebook', 'sendMailPassword','resetPassword', 'showResetPassword', 'changePassword', 'showChangePassword', 'subscribe', 'artikuj', 'kontakte'],
								  'forum'=>['index','show', 'addPost', 'showPost']




								);
=======
								  'user' => ['signup','signupVet','signupStore','login','subscribe', 'logout', 'showNormalUser', 'welcome','showVet','showStore','showLogin','confirm', 'home', 'confirmEmail','facebook', 'sendMailPassword','resetPassword', 'showResetPassword', 'changePassword', 'showChangePassword', 'subscribe']);
>>>>>>> 91fd5e281ede724f20b002794f8ce4bbe11ae904


			 if (array_key_exists($controller, $controllers)) 
			 	
			 {

		    if (in_array($action, $controllers[$controller])) {
			      call($controller, $action);
			    } else {
			      call('pages', 'error');
			    }
			  } else {
			    call('pages', 'error');
			  }









	 ?>
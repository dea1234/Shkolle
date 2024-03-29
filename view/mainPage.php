  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Zoom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">
    <style>
    .form-popup {
      display: none;
      position: fixed;
      bottom: 10%;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 200px;
      padding: 10px;
      background-color: #e6e6ff;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=text]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #b3b3ff;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: #6666ff;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
  </style>
  </head>
  <body>

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">




          <?php 
          if( $action == 'welcome'  || $action == 'profile' || $action == 'index' ): ?>

           <li><a href="?controller=user&action=welcome"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>

         <?php endif ?>

         <?php 
         $actions = array(
          'showNormalUser',
          'showVet',
          'subscribeMessage',
          'showNormalUser',
          'showNormalUser',
          'home',
          'showLogin',
          'confirm',
          'confirmEmail'
        );

        ?>

        <?php 

        if( in_array($action, $actions) ): ?>

          <li><a href="?controller=user&action=home"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>

        <?php endif ?> 
        

        <?php 

        if( $action == 'welcome' ): ?>
          <li ><a href="?controller=pages&action=profile"  <span class="glyphicon glyphicon-user "></span> Profili </a></li> 
        <?php endif ?> 
      </ul>

       

      <ul class="nav navbar-nav navbar-right">



        <?php if(($controller=='user' && $action!='welcome') || $action == 'showLogin' ||$action == 'subscribeMessage' ): ?>
          <li class="dropdown">
            <a class="dropdown-toggle"  data-toggle="dropdown" >
              <span class="glyphicon glyphicon-menu-down"></span> Regjistrohu 
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="?controller=user&action=showNormalUser">
                  <span class="glyphicon glyphicon-user">  </span> User Normal
                </a>
              </li>
              <li>
                <a  href="?controller=user&action=showMUser"> 
                  <span class="glyphicon glyphicon-user"> </span> Artist
                </a>
              </li>
            </ul>
          </li> 
        <?php endif ?>
        <?php 
        $actions = array(
          'showNormalUser',
          'showVet',
          'subscribeMessage',
          'showNormalUser',
          'showNormalUser',
          'home',
        );

        ?>
        <?php 
        if(in_array($action, $actions)  ): ?>
          <li><a href="?controller=user&action=showLogin">

            <?php if($controller=='user' && $action=='showNormalUser'): ?> Jeni te regjistruar? <?php endif ?>  <span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
          <?php endif ?>

          <?php 

          if( $action == 'profile'  || $action == 'welcome'):  ?>

            <li>
              <a href="?controller=posts&action=index">  
                <span class="glyphicon glyphicon-folder-open"></span>  Postime
              </a>
            </li>
          <?php  endif ?>

          <?php 

          if( $action == 'profile'  || $action == 'index'):  ?>
            <li>
              <a href="?controller=posts&action=show">  
                <span class="glyphicon glyphicon-folder-open"></span>  Shto nje postim
              </a>
            </li>
          <?php  endif ?>


          <?php 
          if( $action == 'profile' || $action == 'welcome'): ?>
            <li>
              <a href="?controller=user&action=logout">  
                <span class="glyphicon glyphicon-log-out"></span>  Log Out</a>
              </li>
            <?php endif ?>

        


          </ul> 
        </div>




      </nav>
       

      <?php require_once('routes.php'); ?> 

      



  <section>
  <p class="section-lead" style="font-size:20px">Cfare mund te gjeni ne platformen tone?</p>
  <div class="services-grid">
    <div class="service service1">
      <i class="ti-gallery"></i>
      <h4>Evente </h4>
      <p>Bashkohuni cdo eventi dhe lexoni te rejat me te fundit mbi performancat e artisteve tane.</p>
      <a href="index.php?controller=user&action=artikuj" class="cta">Lexo me shume <span class="ti-angle-right"></a>
    </div>

    <div class="service service2">
      <i class="ti-light-bulb"></i>
      <h4>Informacion</h4>
      <p>Mesoni me shume mbi portofolion e muzikanteve tuaj te preferuar.</p>
      <a href="index.php?controller=user&action=info" class="cta">Lexo me shume<span class="ti-angle-right"></a>
    </div>

    <div class="service service3">
      <i class="ti-target"></i>
      <h4>Shihni Postimet</h4>
      <p>Klikoni per te pare postimet e bera</p>
      <a href="index.php?controller=posts&action=indexh" class="cta">Lexo me shume<span class="ti-angle-right"></span></a>
    </div>
  </div>
</section>
    </body>
    </html>













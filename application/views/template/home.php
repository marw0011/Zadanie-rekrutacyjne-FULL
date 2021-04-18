<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Zadanie rekrutacyjne</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo URL::base();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo URL::base();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo URL::base();?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo URL::base();?>css/landing-page.min.css" rel="stylesheet">

</head>
<body>
  
  	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
		  <li class="nav-item dropdown"><a class="nav-item nav-link active" href="#">Strona główna <span class="sr-only">(current)</span></a></li>
		  <?php if (Auth::instance()->logged_in()){ ?>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Wniosek urlopowy
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="<?php echo URL::base();?>form/add">Złóż nowy wniosek</a>
			  <a class="dropdown-item" href="<?php echo URL::base();?>form/index">Lista Twoich wniosków</a>
			</div>
		  </li>
		  <li class="nav-item dropdown"><a class="nav-item nav-link" href="<?php echo URL::base();?>account/logout" >Wyloguj</a></li>
		  <?php }else{ ?>
		  <li class="nav-item dropdown"><a class="nav-item nav-link" href="<?php echo URL::base();?>account/login">Logowanie</a></li>
		  <li class="nav-item dropdown"><a class="nav-item nav-link" href="<?php echo URL::base();?>account/register">Rejestracja</a></li>
		  <?php } ?>
		</div>
	  </div>
	</nav>
	

  
   <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"><?php echo $title;?></h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
			<?php echo Message::render();?>
			<?php echo $content;?>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 h-50 text-center my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; 2021. All Rights Reserved.</p>
        </div>

      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo URL::base();?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URL::base();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Futsal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="http://www.facebook.com" class="p-2"><span class="icon-facebook"></span></a></li>
              <li><a href="http://www.twitter.com" class="p-2"><span class="icon-twitter"></span></a></li>
              <li><a href="http://www.instagram.com" class="p-2"><span class="icon-instagram"></span></a></li>
              <li><a href="http://www.linkedin.com" class="p-2"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div> 
		  
            
			<?php if(isset($_SESSION['email']) && $_SESSION['email']!='') { ?>
			<div class="col-6">
			<p class="mb-0 float-right">
			<small>You are logged in as</small> <span style="color:green"><?php echo $_SESSION['email']; ?> <a href="logout.php">Logout</a></span>
			<p>
			<?php } ?>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="" class="text-black h2 mb-0">Futsal<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                 <li><a href="booking.php" class="nav-link">Booking</a></li>
                <li><a href="index.php#about-section" class="nav-link">About Us</a></li>
                <li><a href="index.php#contact-section" class="nav-link">Contact</a></li>
                <li><a href="login.php" class="nav-link">Account</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
    </header>
	</body>

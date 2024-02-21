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
    <link rel="stylesheet" href="style/style.css" >
    <link rel="stylesheet" type="text/css" href="style/style2.css">  
    <script src="js/jquery.min.js"></script>
  <script>
    function fetch_data()
    {
      
      
      $('#table').empty();
      var t=document.getElementById('date').value;

      $.ajax({
        url:"fetchdata.php",
        type:"POST",
        datatype:"json",
        data:{id:t},
      
      success:function(data)
      {
        $('#table').append(data);
        
      }
    });


    }
  </script> 

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
              <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2"></span><span class="d-none d-lg-inline-block">+977-9802835284</span></a></span>
              <span><a href="mialto:ncitproject@gmail.com"><span class="icon-envelope mr-2"></span><span class="d-none d-lg-inline-block">ncitproject@gmail.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="text-black h2 mb-0">Futsal<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Home</a></li>
                 <li><a href="booking.php" class="nav-link">Booking</a></li>
                <li><a href="index.html" class="nav-link">About Us</a></li>
                <li><a href="index.html" class="nav-link">Contact</a></li>
                <li><a href="login.php" class="nav-link">Account</a></li>
              </ul>
            </nav>
          </div>
          

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>


    <br>



<main>

  <div>
    <br>
    <br>
    <br>
    <br>
    <center>
  <h1>Futsal Balkumari</h1>
</center>
    <span id="option">Booked for :</span>
    <form action="" class="option">
      <select onchange="fetch_data()" id="date">
        <option value="1">today</option>
        <option  value="2">tommorrow</option>
        <option value="3">after tommorrow</option>
      </select>
    </form>
  </div>
  <div class="bookingtable">
    <table>
      <tr>
        <th class="headpoint">Time</th>
		<th class="headpoint">Booked For Date</th>
          <th class="headpoint">Booker mobile No.</th>
          <th class="headpoint">Booker Name</th>
          <th class="headpoint">cancel</th>
      </tr>
    </table>
      <table id="table">
		<?php
                $date=date("Ymd");
                $conn=mysqli_connect("localhost","root","","admins");
				
				$sql="select * from time_slot left join ticket on time_slot.id=ticket.time_slot_id and booked_for = '$date'";
				
                $result=$conn->query($sql);
				
                while($row = $result->fetch_assoc()) {
                ?>
      <tr>
        <th><?php echo $row['time']; ?></th>
		<td><?php echo $row['booked_for']; ?>
		
		<?php
        if(empty($row['time_slot_id']))
        {
          ?>
            <!--<a href="manualbookformtoday.php?time=<?php // echo $row['time']; ?>"><button>Book</button></a>-->
			<b>Not booked</b>
            <?php
          }
          ?> </td>
		<td>
                 
            <?php
            
          echo $row['mobile'];
                ?>
        </td>
        <td>
          <?php         
          echo $row['register'];
                ?>
        </td>
        <td>
            <?php
            if(!empty($row['time_slot_id']))
            {
              ?>
          <a href="admincanceltoday.php?id=<?php echo $row['id']; ?>"><button>cancel</button></a>
          <?php
            }
          ?>
        </td>
      </tr>
    
				<?php } ?>
	</table>
  </div>
</main>





    <br>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>This project is being developed by the students of Nepal College of Information Technology, aiming to provide futsal booking facilities in the Kathmandu valley. We are currently 6th semester students.Pratik Poudel,Satabdi Gautam, Arjun Mahara and Aabish Thapa are still working on the project.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="index.html">About Us</a></li>
                  <li><a href="booking.php">Booking</a></li>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="index.html">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>
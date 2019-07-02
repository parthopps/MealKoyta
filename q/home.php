<?php
session_start();
?>
<html>
<head>
<title>MEAL KOYTA </title>
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
<link rel="stylesheet" 
href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
</head>
<body>
     <!-----Navigationbar------->
	 
	 <section id="nav-bar">
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MEAL কয়টা</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> HOME </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">MARKET && MEAL</a>
      </li>
     
      
	  <li class="nav-item">
        <a class="nav-link disabled" href="#">CONTACT</a>
      </li>
    </ul>
  </div>
</nav>
	 
	 </section>
	 
	 <!-----------slider-------------
	 
	 <div id="slider">
	 <div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="img/pic4.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/pic2222.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/pic1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
---->
	 </div>
	 <section id="market"
	 <div class="container">
	 <h1>GIVE YOUR MARKET && MEAL DETAILS</h1>
	 
	 <div class="row service">
	 <div class="col-md-6 text-center">
	  <div class="icon">
	  <i class="fa fa-desktop"></i>
	  </div>
	  <h3> MARKET </h3>
	  <form action="display1.php"method="post">
	  <p> Give your market details here</p>
	  <button type="submit" class="center "  > Click Here  </button>
	  </form>
	  </div>
	  
	  <div class="col-md-6 text-center">
	  <div class="icon">
	  <i class="fa fa-line-chart"></i>
	  </div>
	  <h3> MEAL </h3>
	  <form action="meal1.php"method="post">
	  <p> Give your daily meal here</</p>
	 </div>
	 <button type="submit" class="center1 "> Click Here </button>
	  </form>
	 </div>
	 </section>
	
	 <section id="team"
	 <div class="container">
	 <h1>........TEAM Member of MEAL কয়টা........</h1>
	 
	 <div class="row service">
	 <div class="col-md-6 text-center">
	  <div class="icon">
	  <i class="fa fa-facebook "></i>
	  <i class="fa fa-twitter "></i>
	  <i class="fa fa-linkedin "></i>
	  </div>
	  <h3> Partho Protim Saha </h3>
	  <p> hi i am  fooddie peaple</p>
	  </div>
	  <div class="col-md-6 text-center">
	  <div class="icon">
	  <i class="fa fa-facebook "></i>
	  <i class="fa fa-twitter "></i>
	  <i class="fa fa-linkedin "></i>
	  </div>
	  <h3> Sharika Nargis Swapnil</h3>
	  <p> hi i am moddie peaple</p>
	 </div>
	 </div>
	 </section>
	 
	 
	 
	 
</body>
</html>
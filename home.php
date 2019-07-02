
<?php
 session_start();
$pdo=new PDO("mysql:host=localhost;dbname=userregistation",'root','');


?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Meal Koyta</title>
		
		
			
		
		
		 <!-- Font Awesome CSS File -->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

		<!-- Bootstrap CSS File -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		
		
		<!-- Theme CSS File -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">

	</head>

	<body>
	
	
	
	
	<header>
	 <div class="container">
	 <div class="row">
	 <div class="col-md-4 logo">
		
				<a href="home.php"><img src="images/mainLogo.png" alt="psd Logo"></a>
		</div>
	 
	 
	 
	 <div class="col-md-8 button"> 
		
		<div class="button">
		
		<a <?php 
     $pps=$_SESSION['own_phn'];
     $pps1=$_SESSION['manager_phn'];
      if($pps == $pps1) :?> href ="cr.php"><button type="submit" class="b1">Setting</button></a>
		
		
<?php endif;?>
		
		
		<a href="meal1.php"><button type="button" class="b1">Meal</button></a >
		
		
		<a href="display1.php"><button type="button" class="b1">Market</button></a >	
         	
        		 
		<a href="mealrate1.php"><button type="button" class="b1">Meal Rate</button></a >
		
		
		<a href="new2.php"><button type="button" class="b1">Record</button></a >
		
		
		<a href="pps.php"><button type="button" class="b1">Logout</button></a >
		
		
		</div>				

		</div>
		</div>
		</div>
	 </header>
	
	  <section > 
	 <div class="container">
	 <div class="row">
	 <div class="col-md-12 map">
	 
	 
	
	 
	 <h1> <span class="text1">WELCOME  To</span>
	 
	 <span class="text2">Mealকয়টা </span></h1>
	 
	  <?php
 
  if(isset($_POST['submit'])){
     $title=$_POST['title'];
	 $q1="insert into posts(title,own_phone,manager_phone) values ('$title','$pps','$pps1')";
     $q2="insert into notifications(title,read_n,manager_phone,own_phone) values ('$title',1,'$pps1','$pps')";
		$pdo->query($q1);
		$pdo->query($q2);
		//echo "posted";
  }
  ?>
  <form action="" method="POST" style="text-align: center;
  text-color:black">
	
	  <form action="" method="POST" style="text-align: center;
  text-color:black">
  <textarea name="title" placeholder=" what's your mind"> </textarea> <br>
 
  <input type="submit" class="b2"  name="submit" value="Say Something about MEALকয়টা">
  <input type="submit" class="b2"  name="submit" value="Click Here To Download The App ">
  </form>
  
     
	 
	 </div>
	 </div>
	 </div>
	 </section>
	 

	
	    <!-- JS/JQ Library File -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap JS File -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- Theme Main JS File -->
		<script type="text/javascript" src="js/main.js"></script> 
	</body>
</html>
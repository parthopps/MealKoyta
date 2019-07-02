<?php 
session_start();
$con=mysqli_connect('localhost','root', '','userregistation');
  
if(!$con)
{
	echo "Database error for demo!";
}
$pps=$_SESSION['own_phn'];;
$pps1=$_SESSION['manager_phn'];
?>
<html>
<head>
<title>MEALKOYTA </title>
<link rel="stylesheet" href="profile.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php"><img src="img/mainLogo.png" title="Home"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display1.php">Market</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meal1.php">Meal </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="display3.php">Show Market</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="meal3.php">Show Meal</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link disabled" href="pps.php">LOGOUt</a>
      </li>
    </ul>
  </div>
</nav>



<!DOCTYPE html>

<html>
<head>
  <title>profile</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="header">
    <h2> My Account </h2>
	</div>
	<table class="table">
	<tr>
	<th>My Name :</th>

  
<th>
<?php
$qa="select name as 'name' from emp where own_phone='$pps' and manager_phone='$pps1'";
$resa=mysqli_query($con,$qa);
$emp=mysqli_fetch_array($resa);
echo "\n".($emp['name'])." \n\r";

?> </th>
</tr>
<th> Sum of all market price :</th><th><?php 
$q="select SUM(amount) as 'total' from data where manager_phone='$pps1'";
$res=mysqli_query($con,$q);
$data=mysqli_fetch_array($res);
echo "\n".($data['total'])." taka\n\r";
?> </th>

<tr>
<th> Sum of my market price :</th><th><?php 
$q2="select SUM(amount) as 'total' from data where own_phone='$pps' and manager_phone='$pps1'  and MONTH(date)=MONTH(CURRENT_TIMESTAMP)";
$re=mysqli_query($con,$q2);
$dat=mysqli_fetch_array($re);
echo "\n".($dat['total'])."\n\r";
?> </th>
</tr>
<tr>
<th> Total meal :</th><th><?php 
$q1="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE manager_phone='$pps1' and MONTH(date)=MONTH(CURRENT_TIMESTAMP)";
$rs=mysqli_query($con,$q1);
$dta=mysqli_fetch_array($rs);
echo "".($dta['me'])."\r\n";
?> </th>
</tr>
<tr>
<th> Total of my meal :</th><th><?php 
$q11="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE own_phone='$pps' and manager_phone='$pps1' and MONTH(date)=MONTH(CURRENT_TIMESTAMP)";
$rs1=mysqli_query($con,$q11);
$dta1=mysqli_fetch_array($rs1);
echo "".($dta1['me'])."\r\n";

echo "<br>";?></th>
</tr>
<tr>
<th> Meal-rate:   </th><th> <?php
	 $q111="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE own_phone='$pps' and manager_phone='$pps1' and MONTH(date)=MONTH(CURRENT_TIMESTAMP)";
$rs11=mysqli_query($con,$q111);
$dta11=mysqli_fetch_array($rs11);
//echo "".($dta11['me'])."\r\n";

   if(empty($data['total']) ||  empty($dta['me'])){
      echo " no data input\r\n";
   }
  else{
	   echo "".(($data['total'])/($dta['me']))."\r\n";
   }
echo "<br>";?></th>
</tr>

<tr>
<th>My total Bill of this Month   </th><th> <?php
	 $q111="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE own_phone='$pps' and manager_phone='$pps1' and MONTH(date)=MONTH(CURRENT_TIMESTAMP)";
$rs11=mysqli_query($con,$q111);
$dta11=mysqli_fetch_array($rs11);
//echo "".($dta11['me'])."\r\n";

   if(empty(($dta1['me'])) || empty($data['total']) ||  empty($dta['me'])){
      echo "  Tui akon o taka des nai\r\n";
   }
else{
	echo "".($dta1['me'])*(($data['total'])/($dta['me']))."\r\n";
}
echo "<br>";?></th>
</tr>





<div class="container">
<form action ="home.php" method="POST">
  <!--button type="submit" class="btn btn-info" name="Home">HOME</button-->
  </form>
<form action ="pps.php" method="POST">
  <!--button type="submit" class="btn btn-danger" name="Home">LOGOUt</button-->
  </form>
  
</body>
</div>
</html>	
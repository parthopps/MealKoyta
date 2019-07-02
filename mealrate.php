<?php 
session_start();
$con=mysqli_connect('localhost','root', '','userregistation');
  
if(!$con)
{
	echo "Database error for demo!";
}
$pps='01676772959';
$pps1='01676772958';


$q="select SUM(amount) as 'total' from data where manager_phone='$pps'";
$res=mysqli_query($con,$q);
$data=mysqli_fetch_array($res);


$q2="select SUM(amount) as 'total' from data where own_phone='$pps1'";
$re=mysqli_query($con,$q2);
$dat=mysqli_fetch_array($re);

$q1="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE manager_phone='01676772959'";
$rs=mysqli_query($con,$q1);
$dta=mysqli_fetch_array($rs);


$q11="SELECT SUM(brk_fast) + SUM(lunch) +SUM(dinner) as me
FROM `meal` 
WHERE own_phone='$pps1'";
$rs1=mysqli_query($con,$q11);
$dta1=mysqli_fetch_array($rs1);

echo "sum of my market price:\n".($dat['total'])."\n\r";

echo "<br>";

echo "sum of all market price:\n".($data['total'])."\n\r";

echo "<br>";
echo "total meal:".($dta['me'])."\r\n";

echo "<br>";
echo "total of my meal:".($dta1['me'])."\r\n";

echo "<br>";
echo "total mealrate:".($data['total'])/($dta['me'])."\r\n";
echo "<br>";
echo "total taka:".($dta1['me'])*(($data['total'])/($dta['me']))."\r\n";
echo "<br>";




?>
		 
<html>
<head>
<title>MEALKOYTA </title>
<link rel="stylesheet" href="style4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body>
<h1> Welcome <?php echo "total of my meal:".($dta1['me'])."\r\n";?> </h1>
<div class="container">
<form action ="pps.php" method="POST">
  <button type="submit" class="btn btn-danger" name="Home">LOGOUt</button>
  </form>
  
</body>
</div>
</html>

		 
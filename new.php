<!DOCTYPE html>
<html>
<head>
<title>bal upor bal</title>
<style type="text/css">

table{
	
	border-collapse:collapse;
	width:100%;
	color:black;
	font-family:kronika;
	font-size:25px;
	text-align:left;
	
	
}
th{
	background-color:none;
	color:#4B0082;
}
tr:nth-child(even){background-color:#f2f2f2}

</style>


<link rel="stylesheet" href="">
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
        <a class="nav-link"  href="home.php" style="color:#191970"> <h3>Home</h3> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meal1.php"><h3>Meal</h3> <span class="sr-only">(current)</span></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="display1.php" style="color:#191970"><h3>Market</h3></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="display3.php"><h3>Market show</h3></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="meal3.php"style="color:#191970"><h3>Meal Show </h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mealrate1.php"><h3>Mealrate</h3></a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link disabled" href="pps.php"style="color:#191970"><h3>LOGOUt</h3></a>
      </li>
    </ul>
  </div>
</nav>








</head>
<body>



<?php

$a=$_GET['date'];
$b=$_GET['year'];
?>



<?php

$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$result= $mysqli->query("select * from data") or die($mysqli->error);

?>

 <?php 
	$qaa="select Month(date) from data ";
	$resaa=mysqli_query($mysqli,$qaa);
	$emp=mysqli_fetch_array($resaa);
	//echo "\n".($emp['Month(date)'])." \n\r";
	
	$q="select Year(date) from data ";
	$r=mysqli_query($mysqli,$q);
	$e=mysqli_fetch_array($r);
	//echo "\n".($e['Year(date)'])." \n\r";
	
	?>


<table>
<tr>
<th>Own PhoneNumber</th>
<th>Manager PhoneNumber</th>
<th>description</th>
<th>Amount</th>
<th>who</th>
<th>Date</th>
</tr>
<?php
session_start();

$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];
$conn=mysqli_connect("localhost","root","","userregistation") or die(mysqli_error($mysqli));

$sql="select * from data where manager_phone=$pps1 and Month(date)=$a and Year(date)=$b";
$result=$conn->query($sql);


if($result->num_rows >0)
	{
		while($row=$result->fetch_assoc()){
		
		echo "<tr> <td>".$row['own_phone']."</td>
		<td>".$row['manager_phone']."</td><td>".$row['des']."</td><td>".$row['amount']."</td><td>".$row['who']."</td><td>".$row['date']."</td></tr>";
		

	}
	}	
	echo "</table>";
	
	
//else{
	
	//echo "no data found";}*/


?>
</table>
</body>


</html>
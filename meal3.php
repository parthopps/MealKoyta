
<!DOCTYPE html>
<html>
<head>
  <title>Meal List input</title>
  
  
  <style type="text/css">


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










<?php require_once 'pro1.php'?>



<div class="container">
<?php

$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
//$result= $mysqli->query("select * from data") or die($mysqli->error);
///$result= $mysqli->query("select * from data") or die($mysqli->error);

$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];
 
$qa="SELECT emp.name as a, man.name as b, meal.brk_fast as c, meal.lunch as d, meal.dinner as e,meal.date as f 
FROM emp,meal, emp as man
WHERE emp.own_phone=meal.own_phone AND meal.manager_phone=man.own_phone 
AND month(meal.date)=month(CURRENT_TIMESTAMP) ";
	       
///$resa=mysqli_query($mysqli,$qa);
$emp=$mysqli->query($qa);

//print_r($emp);
			   ///print_r($emp);
			   ///echo "\n".($emp['name'])." \n\r";
			  
?>

<div class="row justify-content-center">
   <table class="table">
   <thead>
   <tr>
   <th>Own PhoneNumber</th>
   <th>Manager PhoneNumber</th>
   <th>breakfast</th>
   <th>lunch</th>
   <th>dinner</th>
   <th>date</th>
  
   </tr>
   </thead>
    <?php
   
      while($row = $emp->fetch_assoc()){ ?>

<tr>
	  
	
	<td><?php echo "".$row['a']?></td><td><?php echo "".$row['b'] ?></td><td><?php echo "".$row['c'] ?></td><td><?php echo "".$row['d']?></td><td><?php echo "".$row['e']?></td><td><?php echo "".$row['f']?></td>
	  <td>
	  
	  
	  </td>
	  </tr>
	 <?php } ?>
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="pro1.php" method="POST">
  
  <!----input type="hidden" name="id" value="<?php echo $id;?>"
  <div class="form-group">
  <label> Name </label>
  <input type="text" name="name" class="form-control"
value="<?php echo $name;?>" placeholder ="Enter your name" >
  </div>
  <div class="form-group">
   <label> breakfast </label>
  <input type="text" name="brk_fast" class="form-control"
value="<?php echo $brk_fast;?>" placeholder ="Enter your breakfast meal"  >
  </div>
  <div class="form-group">
   <label> lunch </label>
  <input type="text" name="lunch" class="form-control"
value="<?php echo $lunch;?>" placeholder ="Enter your lunch meal"  >
  </div>
  <div class="form-group">
   <label> dinner </label>
  <input type="text" name="dinner" class="form-control"
value="<?php echo $dinner;?>" placeholder ="Enter your dinner meal"  >
  </div>
  <div class="form-group">
  <?php
  if($update == true):
  ?>
  <button type="submit" class="btn btn-info" name="update">update</button>
  <?php else: ?>
  <button type="submit" class="btn btn-info" name="save">save</button>
  <?php endif; ?>
  </div>
  </form>
  <form action ="meal1.php" method="POST">
  <button type="submit" class="btn btn-info" name="show">show</button>
  </form----->
  </div>
  </div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Meal List input</title>
  
    <style type="text/css">
container{
	width:980px;
	background-color:white;
	margin:0px auto;
}
table{
	
	border-collapse:collapse;
	width:40%;
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

@media only screen and (max-width:1250px){
	tr{
		font-size:16px;
	}
	table{
		width:50%;
		margin-left:25%;
		margin-right:25%;
	}
	@media only screen and (max-width:800px){
	tr{
		font-size:12px;
	}
	table{
		width:90%;
		margin-left:5%;
		margin-right:5%;
	}
}

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
<?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
echo $_SESSION['message'];
unset( $_SESSION['message']);

?>

</div>
 <?php endif ?>

<div class="container">

<?php

$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
//$result= $mysqli->query("select * from data") or die($mysqli->error);
///$result= $mysqli->query("select * from data") or die($mysqli->error);

$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];
 
$qa="SELECT emp.name as a, man.name as b, meal.brk_fast as c, meal.lunch as d, meal.dinner as e, meal.id as id
FROM emp,meal, emp as man
WHERE emp.own_phone=meal.own_phone AND meal.manager_phone=man.own_phone 
AND month(meal.date)=month(CURRENT_TIMESTAMP) AND meal.own_phone='$pps'";
	       
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
   
   
   <th colspan="2">Action</th>
   </tr>
   </thead>
    <?php
   
      while($row = $emp->fetch_assoc()){ ?>

<tr>
	  
	
	<td><?php echo "".$row['a']?></td><td><?php echo "".$row['b'] ?></td><td><?php echo "".$row['c'] ?></td><td><?php echo "".$row['d']?></td><td><?php echo "".$row['e']?></td>
	  <td>
	  <a href="meal1.php?edit=<?php $s=$row['id'];
	  $q="select id from meal where id='$s' and DAY(date)=DAY(CURRENT_TIMESTAMP)";
	  $r=mysqli_query($mysqli,$q);
	  $ep=mysqli_fetch_array($r);
	  echo "\n".($ep['id'])." \n\r";?>"
	  class="btn btn-info">Edit</a>
	 
	 
		<a href="pro1.php?delete=<?php echo $row['id'];?>"
		class="btn btn-danger">delete</a>
	  </td>
	  </tr>
	 <?php } ?>
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="pro1.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
   
  <input type="hidden" name="own_phone" class="form-control"
value="<?php echo $own_phone;?>" placeholder ="Enter your own_phone" >
  </div>
   <!--label> Manager PhoneNumber </label---->
  <input type="hidden" name="manager_phone" class="form-control"
value="<?php echo $manager_phone;?>" placeholder ="Enter your Manager PhoneNumber" >
  </div>
  <div class="form-group">
   <label> breakfast </label>
  <input type="Number" step="0.1" min="0" name="brk_fast" class="form-control"
value="<?php echo $brk_fast;?>" placeholder ="Enter your breakfast meal"  >
  </div>
  <div class="form-group">
   <label> lunch </label>
  <input type="Number" step="0.1" min="0" name="lunch" class="form-control"
value="<?php echo $lunch;?>" placeholder ="Enter your lunch meal"  >
  </div>
  <div class="form-group">
   <label> dinner </label>
  <input type="Number" min="0" step="0.1" name="dinner" class="form-control"
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
  <th colspan="2">To See All Member Meal </th>
  <form action ="meal3.php" method="POST">
  <button type="submit" class="btn btn-info" name="show">show</button>
  </form>
  <th colspan="2">Go to home page </th>
  <form action ="home.php" method="POST">
  <button type="submit" class="btn btn-info" name="Home">Home</button>
  </form>
  <th colspan="2">Click here for LOGout </th>
  <form action ="pps.php" method="POST">
  <button type="submit" class="btn btn-danger" name="Home">LOGOUt</button>
  </form>
  </div>
  </div>
   </div>
</body>
</html>

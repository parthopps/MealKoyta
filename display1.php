


<!DOCTYPE html>
<html>
<meta name="veiwport" content="width-device-width,initail-scale-1">
<head>
  <title>Market List input</title>
  
  <style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,700,700i,800,800i" rel="stylesheet');
container{
	width:980px;
	background-color:white;
	margin:0px auto;
}
table{
	
	border-collapse:collapse;
	width:40%;
	color:black;
	font-family:'Montserrat', sans-serif;;
	font-size:25px;
	text-align:center;
	
	
}
th{
	background-color:none;
	color:#4B0082;
}
.p{
	padding-top:50px;
}
.button{
	background:white;
	padding-top:9px;
	padding-bottom:20px;
	padding-left:15px;
	
	
}
.b1{
	padding:10px 10px;
	background:white;
	color:#31353E;
	font-size:18px;
	transition:0.4s ease-in-out;

   
}


.b2{
	padding:10px 10px;
	background:white;
	color:black;
	font-size:18px;
	transition:0.4s ease-in-out;
	
    
}

tr:nth-child(even){background-color:#f2f2f2}

@media (min-width: 320px) and (max-width: 500px){
	
	
	tr{
		font-size:10px;
		margin-left:100px;
	}
	th{
		background-color:transparent;
	    color:black;
		font-family: 'Montserrat', sans-serif;
	    font-size: 10px;
		
	}
	
	.b1{
	padding:3px 5px;
	background:white;
	color:#31353E;
	font-size:8px;
	transition:0.4s ease-in-out;
	border: 0px solid white;
    border-radius: 100px;
}
.b2{
	
	padding-left:20px;
	background:white;
	color:#31353E;
	font-size:8px;
	transition:0.4s ease-in-out;
	border: 0px solid white;
    border-radius: 100px;
	text-transform:lowercase;
	margin-right:30px;

}
	
	table{
		width:100%;
		text-align:center;
		
	}
	.p{
		padding-left:30px;
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
<div class="container">
  

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









<?php require_once 'process.php'?>
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
 
$qa="SELECT emp.name as a, man.name as b, data.des as c, data.amount as d, data.who as e ,data.id as id
FROM emp,data, emp as man
WHERE emp.own_phone=data.own_phone AND data.manager_phone=man.own_phone 
AND month(data.date)=month(CURRENT_TIMESTAMP) AND data.own_phone='$pps'";
	       
///$resa=mysqli_query($mysqli,$qa);
$emp=$mysqli->query($qa);

//print_r($emp);
			   ///print_r($emp);
			   ///echo "\n".($emp['name'])." \n\r";
			  
?>


<div class="row justify-content-center p">
   <table class="table">
   <thead>
   <tr >
   <th>Name</th>
   <th>Manager Name</th>
   <th>description</th>
   <th>Amount</th>
   <th>who</th>
   <th colspan="2">Action</th>
   </tr>
   </thead>
   
   <!--td><?php echo $pps ?></td---->
   
   <?php
   
      while($row = $emp->fetch_assoc()){ ?>

<tr>
	  
	
	<td><?php echo "".$row['a']?></td><td><?php echo "".$row['b'] ?></td><td><?php echo "".$row['c'] ?></td><td><?php echo "".$row['d']?></td><td><?php echo "".$row['e']?></td>
	  <td>
	  <a href="display1.php?edit=<?php $s=$row['id'];
	  $q="select id from data where id='$s' and DAY(date)=DAY(CURRENT_TIMESTAMP)";
	 $r=mysqli_query($mysqli,$q);
	 $ep=mysqli_fetch_array($r);
	 echo "\n".($ep['id'])." \n\r";?>"
	    class="b1">EDIT</a>
		<a href="process.php?delete=<?php echo $row['id'];?>"
		class="b2">DELETE</a>
	  </td>
	  
	  
	  </tr>
	  
   <?php } ?>
	  
   </table>
   
</div>

  <div class="row justify-content-center">
  
  <form action ="process.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
  <div class="form-group">
  <!---label> Own PhoneNumber </label--->
  <input type="hidden" name="own_phone" class="form-control"
value="<?php echo $own_phone;?>" placeholder ="Enter your own_phone" >
  </div>
   <!---label> Manager PhoneNumber </label---->
  <input type="hidden" name="manager_phone" class="form-control"
value="<?php echo $manager_phone;?>" placeholder ="Enter your Manager PhoneNumber" >
  </div>
  <div class="form-group">
   <label> Description </label>
  <input type="text" name="des" class="form-control"
value="<?php echo $des;?>" placeholder ="Enter your description"  >
  </div>
  <div class="form-group">
   <label> amount </label>
  <input type="number"  step="0.1" min="0" name="amount" class="form-control"
value="<?php echo $amount;?>" placeholder ="Enter your amount"  >
  </div>
  
  </tr><td rowspan="2">Who : : </td>
  <input type="radio" name="who" value="self"/>Self
 ||  <input type="radio" name="who" value="manager"/>Manager

  </tr>
  
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
  <form action ="display3.php" method="POST">
  <button type="submit" class="btn btn-danger" name="show">show</button>
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

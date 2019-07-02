
<!DOCTYPE html>
<html>
<head>
  <title>Market List input</title>
  <link rel="stylesheet" href="display.css">
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
        <a class="nav-link" href="meal1.php">Meal <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="display1.php">Market</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="mealrate1.php">Mealrate</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link disabled" href="pps.php">LOGOUt</a>
      </li>
    </ul>
  </div>
</nav>









<?php require_once 'c.php'?>
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
$result= $mysqli->query("select * from emp") or die($mysqli->error);

?>
<div class="row justify-content-center">
   <table class="table">
   <thead>
   <tr>
   <th>Name</th>
   <th>Own PhoneNumber</th>
   <th>Manager PhoneNumber</th>
   <th>Money</th>
  
   <th colspan="2">Action</th>
   </tr>
   </thead>
   <?php
   $pps=$_SESSION['own_phn'];
   $pps1=$_SESSION['manager_phn'];
      while($row = $result->fetch_assoc()):?>
	  <?php if( $pps1 == $row['manager_phone'] ): ?>
		  <tr>
		 <td><?php echo $row['name'];?></td> 
	  <td><?php echo $row['own_phone'];?></td>
	  <td><?php echo $row['manager_phone'];?></td>
	  <td><?php echo $row['taka'];?></td>
	 
	  <td>
	  <a href="cr.php?edit=<?php echo $row['id'];?>"
	    class="btn btn-info">Edit</a>
		<a href="c.php?delete=<?php echo $row['id'];?>"
		class="btn btn-danger">delete</a>
	  </td>
	  </tr>
	  <?php endif;?>
   <?php endwhile;?>
	  
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="c.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
  
  
  <label> Name </label>
  <input type="text" name="name" class="form-control"
value="<?php echo $name;?>" placeholder ="Enter your Name" >
  </div>
  
  <input type="hidden" name="password" value="<?php echo $password;?>"
  <div class="form-group">
  <label> Own PhoneNumber </label>
  <input type="number" min="0"  name="own_phone" class="form-control"
value="<?php echo $own_phone;?>" placeholder ="Enter your own_phone" >
  </div>
  <div class="form-group">
   <label> Manager PhoneNumber </label>
  <input type="number" min="0"  name="manager_phone" class="form-control"
value="<?php echo $manager_phone;?>" placeholder ="Enter your Manager PhoneNumber" >
  </div>
  
  <div class="form-group">
  <label> Money </label>
  <input type="number" min="0"  name="taka" class="form-control"
value="<?php echo $taka;?>" placeholder ="Enter your taka" >
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
</body>
</html>


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
<?php require_once 'w.php'?>
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

$mysqli=new mysqli('localhost','root','','test') or die(mysqli_error($mysqli));
//$result= $mysqli->query("select * from data") or die($mysqli->error);
$result= $mysqli->query("select * from data") or die($mysqli->error);
?>
<div class="row justify-content-center">
   <table class="table">
   <thead>
   <tr>
   <th>Own PhoneNumber</th>
   <th>Manager PhoneNumber</th>
   <th>description</th>
   <th>Amount</th>
   <th>who</th>
   <th colspan="2">Action</th>
   
   </tr>
   </thead>
   <?php
 //  $pps=$_SESSION['own_phn'];
  // $pps1=$_SESSION['manager_phn'];
      while($row = $result->fetch_assoc()):?>
	  
		  <tr>
	
	  <td><?php echo $row['own_phone'];?></td>
	  <td><?php echo $row['manager_phone'];?></td>
	  <td><?php echo $row['des'];?></td>
	  <td><?php echo $row['amount'];?></td>
	 <td><?php echo $row['who'];?></td>
	  <td>
	  <a href="who.php?edit=<?php echo $row['id'];?>"
	    class="btn btn-info">Edit</a>
		<a href="w.php?delete=<?php echo $row['id'];?>"
		class="btn btn-danger">delete</a>
	  </td>
	  
	  </tr>
	 
   <?php endwhile;?>
	  
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="w.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
  <div class="form-group">
  <label> Own PhoneNumber </label>
  <input type="text" name="own_phone" class="form-control"
value="<?php echo $own_phone;?>" placeholder ="Enter your own_phone" >
  </div>
   <label> Manager PhoneNumber </label>
  <input type="text" name="manager_phone" class="form-control"
value="<?php echo $manager_phone;?>" placeholder ="Enter your Manager PhoneNumber" >
  </div>
  <div class="form-group">
   <label> Description </label>
  <input type="text" name="des" class="form-control"
value="<?php echo $des;?>" placeholder ="Enter your description"  >
  </div>
  <div class="form-group">
   <label> amount </label>
  <input type="text" name="amount" class="form-control"
value="<?php echo $amount;?>" placeholder ="Enter your amount"  >
  </tr><td rowspan="2">Gender : : </td>
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
</body>
</html>

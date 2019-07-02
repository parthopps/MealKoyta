
<!DOCTYPE html>
<html>
<head>
  <title>Market List input</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
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
$result= $mysqli->query("select * from data") or die($mysqli->error);

?>
<div class="row justify-content-center">
   <table class="table">
   <thead>
   <tr>
   <th>Name</th>
   <th>description</th>
   <th>Amount</th>
   <th colspan="2">Action</th>
   </tr>
   </thead>
   <?php
      $pps=$_SESSION['username'];
      while($row = $result->fetch_assoc()):?>
	  <?php if($pps == $row['name']): ?>
		  <tr>
	  <td><?php echo $row['name'];?></td>
	  <td><?php echo $row['des'];?></td>
	  <td><?php echo $row['amount'];?></td>
	  
	  <td>
	  <a href="display1.php?edit=<?php echo $row['id'];?>"
	    class="btn btn-info">Edit</a>
		<a href="process.php?delete=<?php echo $row['id'];?>"
		class="btn btn-danger">delete</a>
	  </td>
	  </tr>
	  <?php endif;?>
   <?php endwhile;?>
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="process.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
  <div class="form-group">
  <label> Name </label>
  <input type="text" name="name" class="form-control"
value="<?php echo $name;?>" placeholder ="Enter your name" >
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
  <button type="submit" class="btn btn-info" name="show">show</button>
  </form>
  </div>
  </div>
</body>
</html>

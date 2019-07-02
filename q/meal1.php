
<!DOCTYPE html>
<html>
<head>
  <title>Meal List input</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
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
$result= $mysqli->query("select * from meal") or die($mysqli->error);

?>
<div class="row justify-content-center">
   <table class="table">
   <thead>
   <tr>
   <th>Name</th>
   <th>breakfast</th>
   <th>lunch</th>
   <th>dinner</th>
   
   
   <th colspan="2">Action</th>
   </tr>
   </thead>
   <?php
    $pps=$_SESSION['username'];
      while($row = $result->fetch_assoc()):?>
	  <?php if($pps == $row['name']): ?>
		  <tr>
	  <td><?php echo $row['name'];?></td>
	  <td><?php echo $row['brk_fast'];?></td>
	  <td><?php echo $row['lunch'];?></td>
	  <td><?php echo $row['dinner'];?></td>
	  
	  
	  
	  <td>
	  <a href="meal1.php?edit=<?php echo $row['id'];?>"
	    class="btn btn-info">Edit</a>
		<a href="pro1.php?delete=<?php echo $row['id'];?>"
		class="btn btn-danger">delete</a>
	  </td>
	  </tr>
	  <?php endif;?>
   <?php endwhile;?>
   </table>
   



</div>

  <div class="row justify-content-center">
  
  <form action ="pro1.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $id;?>"
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
  <form action ="meal3.php" method="POST">
  <button type="submit" class="btn btn-info" name="show">show</button>
  </form>
  </div>
  </div>
</body>
</html>

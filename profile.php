
<?php
session_start();
?>


<!DOCTYPE html>

<html>
<head>
  <title>profile</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<table class="header">
    <h2> My Account </h2>
	</div>
	<table class="table">
	<tr>
    <th>Company:</th>
    <th><?php echo $_SESSION['emp'];?></th>
	
    
  </tr>
</body>
</html>
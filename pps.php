<html>
<head>
<title>Meal Koyta </title>
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>


<div class="container">
<div class="login-box">
<div class="row">

<div class="col-md-6 login-left">
<h2> Login here </h2>
<form  action="validation.php"   method="post"  >
 

<div class="form-group">
<label>Own Phone<label>
 <input type="text" name="phone" class="form-control" required>
 
</div>

<div class="form-group">
<label>Manager Phone<label>
 <input type="text" name="phn" class="form-control" required>
</div>

<div class="form-group">
<label>password<label>
 <input type="password" name="password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary"> LOGIN </button>

<h1>M E A L  K O Y T A </h1> 
<p>  তে আপনাদের স্বাগতম  জানাই </p>

</form>
</div>

<div class="col-md-6 login-right">
<h2> Registration here </h2>
<form action="registation1.php"method="post">
<div class="form-group"> 
<input type="hidden" name="id" value="<?php echo $id;?>"




<div class="form-group">
<label>Username<label>
 <input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label>password<label>
 <input type="password" name="password" class="form-control" required>
</div>
<form    onsubmit="return myfun()">
<div class="form-group">
<label>Own Phone<label>
 <input type="text" name="phone" class="form-control" required>
 
</div>

<div class="form-group">
<label>Manager Phone<label>
 <input type="text" name="phn" class="form-control" required>
</div>

<div class="form-group">

 <input type="hidden" name="taka" value="<?php echo $id;?>"
</div>

<button type="submit" class="btn btn-primary"> SINGUP </button>
   </form>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
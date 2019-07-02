<html>
<head>
<title>login design </title>
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="login-box">
<div class="row">

<div class="col-md-6 login-left">
<h2> login here </h2>
<form action="validation.php"method="post"> 
<div class="form-group">
<label>Username<label>
 <input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label>password<label>
 <input type="password" name="password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary"> LOGIN </button>

</form>
</div>

<div class="col-md-6 login-right">
<h2> registration here </h2>
<form action="registation1.php"method="post"> 
<div class="form-group">
<label>Username<label>
 <input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label>password<label>
 <input type="password" name="password" class="form-control" required>
</div>
<div class="form-group">
<label>own phone<label>
 <input type="text" name="phone" class="form-control" required>
</div>

<div class="form-group">
<label>Manager phone<label>
 <input type="text" name="phn" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary"> REG </button>

</form>
</div>
</div>
</div>
</div>
</body>
</html>
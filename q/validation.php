<?php
session_start();


$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistation');

$name=$_POST['user'];
$pass=$_POST['password'];
$s=("select * from emp where name='$name'&& password='$pass'");
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1)
{
	$_SESSION['username']=$name;
	header('location:homepage.php');	
}
else{
	header('location:pps.php');
}
             
             

?>
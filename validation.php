<?php
session_start();


$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistation');

$name=$_POST['user'];
$pass=$_POST['password'];
$own_phn=$_POST["phone"];
$manager_phn=$_POST["phn"];
$s=("select * from emp where own_phone='$own_phn'&& password='$pass' && manager_phone='$manager_phn'");
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1)
	
{
		
	$_SESSION['own_phn']=$own_phn;
	$_SESSION['manager_phn']=$manager_phn;
	header('location:home.php');	
}
else{
	header('location:pps.php');
}
             
             

?>
<?php
session_start();
header("location:pps.php");

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistation');

$name=$_POST["user"];
$pass=$_POST["password"];
$own_phn=$_POST["phone"];
$manager_phn=$_POST["phn"];
$s=("select * from emp where name='$name' && manager_phone='$manager_phn'");
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1)
{
	echo "user allre";	
}
else{
	$reg="insert into emp values ('$name','$pass','$own_phn','$manager_phn')";
	mysqli_query($con,$reg);
	echo "reg succ";
}
             

?>
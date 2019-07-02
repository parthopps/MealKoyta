<?php
session_start();
header("location:pps.php");

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistation');
$id=0;
$name=$_POST["user"];
$pass=$_POST["password"];
$own_phn=$_POST["phone"];
$manager_phn=$_POST["phn"];
$taka='';


$s=("select * from emp where own_phone='$own_phn' && manager_phone='$manager_phn'");
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1)
{
	echo "user allre";	
}
else{
	$reg="insert into emp (name,password,own_phone,manager_phone,taka) values ('$name','$pass','$own_phn','$manager_phn','0')";
	echo $reg;
	mysqli_query($con,$reg);
	echo "reg succ";
}
             

?>
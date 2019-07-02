<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$name='';
$own_phone='';
$manager_phone='';
$taka='';

$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];

if(isset($_POST['save'])){
     $id=$_POST['id'];	
     $name=$_POST['name'];
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];
	$taka=$_POST['taka'];
			
	$mysqli->query("UPDATE emp SET name='$name',own_phone='$own_phone',manager_phone='$manager_phone',taka='$taka'  WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:cr.php");
}
if(isset($_GET['delete'])){
    $own_phone=$_POST['own_phone'];
	 
	$id=$_GET['delete'];
    
	$mysqli->query("DELETE FROM emp WHERE id=$id ")	or die($mysqli->error());
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:cr.php");	
	
}

if(isset($_GET['edit'])){

	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select * FROM emp WHERE id=$id ")	or die($mysqli->error());
	if($result->num_rows >0)
	{
		$row=$result->fetch_array();
		$name=$row['name'];
		$own_phone=$row['own_phone'];
		$manager_phone=$row['manager_phone'];
		$taka=$row['taka'];
		
	}


}

if(isset($_POST['update'])){

	$id=$_POST['id'];	
	$name=$_POST['name'];
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];
	$taka=$_POST['taka'];
			
	$mysqli->query("UPDATE emp SET name='$name',own_phone='$own_phone',manager_phone='$manager_phone',taka='$taka' WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:cr.php");	
	
}
















?>

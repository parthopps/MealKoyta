<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$name='';
$des='';
$amount='';
$pps=$_SESSION['username'];

if(isset($_POST['save'])){
	$name=$_POST['name'];
	$des=$_POST['des'];
	$amount=$_POST['amount'];
	if($pps==$name){
	$mysqli->query("Insert into data (name,des,amount)values('$name','$des','$amount')") or die($mysqli->error);
	
	
	$_SESSION['message']="record has been saved";
	$_SESSION['msg_type']="success";
	header("location:display1.php");
	
	}
	else{
	$_SESSION['message']="check your name";
	header("location:display1.php");
	}
	
}
if(isset($_GET['delete'])){

	$id=$_GET['delete'];	
	$mysqli->query("DELETE FROM data WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:display1.php");	
	
}

if(isset($_GET['edit'])){

	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select * FROM data WHERE id=$id")	or die($mysqli->error());
	if(count($result)==1)
	{
		$row=$result->fetch_array();
		$name=$row['name'];
		$des=$row['des'];
		$amount=$row['amount'];
		
	}


}

if(isset($_POST['update'])){

	$id=$_POST['id'];	
	$name=$_POST['name'];	
	$des=$_POST['des'];
     $amount=$_POST['amount'];		
	$mysqli->query("UPDATE data SET name='$name',des='$des',amount='$amount' WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:display1.php");	
	
}
















?>

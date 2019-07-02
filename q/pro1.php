<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$name='';
$brk_fast='';
$lunch='';
$dinner='';
$pps=$_SESSION['username'];

if(isset($_POST['save'])){
	$name=$_POST['name'];
	$brk_fast=$_POST['brk_fast'];
	$lunch=$_POST['lunch'];
	$dinner=$_POST['dinner'];
	if($pps==$name){
	
	$mysqli->query("Insert into meal (name,brk_fast,lunch,dinner)values('$name','$brk_fast','$lunch','$dinner')") or die($mysqli->error);
	
	
	$_SESSION['message']="record has been saved";
	$_SESSION['msg_type']="success";
	header("location:meal1.php");
	
	}
	else{
	$_SESSION['message']="check your name";
	header("location:display1.php");
	}
	
}
if(isset($_GET['delete'])){

	$id=$_GET['delete'];	
	$mysqli->query("DELETE FROM meal WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:meal1.php");	
	
}

if(isset($_GET['edit'])){

	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select * FROM meal WHERE id=$id")	or die($mysqli->error());
	if(count($result)==1)
	{
		$row=$result->fetch_array();
		$name=$row['name'];
		$brk_fast=$row['brk_fast'];
		$lunch=$row['lunch'];
		$dinner=$row['dinner'];
		
	}


}

if(isset($_POST['update'])){

	$id=$_POST['id'];	
	$name=$_POST['name'];	
	$brk_fast=$_POST['brk_fast'];
    $lunch=$_POST['lunch'];
	$dinner=$_POST['dinner'];
	$mysqli->query("UPDATE meal SET name='$name',brk_fast='$brk_fast',lunch='$lunch',dinner='$dinner' WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:meal1.php");	
	
}
















?>

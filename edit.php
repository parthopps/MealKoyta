<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$own_phone='';
$manager_phone='';
$des='';
$amount='';
$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];

/*if(isset($_POST['save'])){
	$own_phone=$_POST['own_phone'];
	$manager_phone=$_POST['manager_phone'];
	$des=$_POST['des'];
	$amount=$_POST['amount'];
	
	$mysqli->query("Insert into emp (own_phone,manager_phone,des,amount)values('$pps','$pps1')") or die($mysqli->error);
	
	//if($pps==$own_phone && $pps1==$manager_phone ){
	$_SESSION['message']="record has been saved";
	$_SESSION['msg_type']="success";
	header("location:display1.php");
	//}
	/*else{
	$_SESSION['message']="check your own phoneNumber and manager phoneNumber";
	header("location:display1.php");}
}*/
if(isset($_GET['delete'])){
     $own_phone=$_POST['own_phone'];
	 
	$id=$_GET['delete'];
    
	$mysqli->query("DELETE FROM emp WHERE id=$id ")	or die($mysqli->error());
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:reedit.php");	
	
}

if(isset($_POST['update'])){

	$id=$_POST['update'];	
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];		
	$mysqli->query("UPDATE emp SET own_phone='$own_phone',manager_phone='$manager_phone' WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:reedit.php");	
	
}
















?>

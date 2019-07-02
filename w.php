<?php
session_start();
$mysqli=new mysqli('localhost','root','','test') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$own_phone='';
$manager_phone='';
$des='';
$amount='';
$who='';
//$pps=$_SESSION['own_phn'];
//$pps1=$_SESSION['manager_phn'];

if(isset($_POST['save'])){
	$own_phone=$_POST['own_phone'];
	$manager_phone=$_POST['manager_phone'];
	$des=$_POST['des'];
	$amount=$_POST['amount'];
	$who=$_POST['who'];
	
	$mysqli->query("Insert into data (own_phone,manager_phone,des,amount,who)values('$own_phone','$manager_phone','$des','$amount','$who')") or die($mysqli->error);
	
	//if($pps==$own_phone && $pps1==$manager_phone ){
	$_SESSION['message']="record has been saved";
	$_SESSION['msg_type']="success";
	header("location:who.php");
	//}
	/*else{
	$_SESSION['message']="check your own phoneNumber and manager phoneNumber";
	header("location:display1.php");}*/
}
if(isset($_GET['delete'])){
     $own_phone=$_POST['own_phone'];
	 
	$id=$_GET['delete'];
    
	$mysqli->query("DELETE FROM data WHERE id=$id and DAY(date)=DAY(CURRENT_TIMESTAMP)")	or die($mysqli->error());
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:who.php");	
	
}

if(isset($_GET['edit'])){

	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select * FROM data WHERE id=$id and DAY(date)=DAY(CURRENT_TIMESTAMP)")	or die($mysqli->error());
	if(count($result)==1)
	{
		$row=$result->fetch_array();
		$own_phone=$row['own_phone'];
		$manager_phone=$row['manager_phone'];
		$des=$row['des'];
		$amount=$row['amount'];
		$who=$row['who'];
	}


}

if(isset($_POST['update'])){

	$id=$_POST['id'];	
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];
	$des=$_POST['des'];
     $amount=$_POST['amount'];
      $who=$_POST['who'];	 
	$mysqli->query("UPDATE data SET own_phone='$own_phone',manager_phone='$manager_phone' ,des='$des',amount='$amount',who='$who' WHERE id=$id")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:who.php");	
	
}
















?>

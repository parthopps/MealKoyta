<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$own_phone='';
$manager_phone='';
$name='';
$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];


if(isset($_GET['delete'])){

	$pps1=$_GET['delete'];
    	
	$mysqli->query("DELETE FROM emp WHERE manager_phone='$pps1'")	or die($mysqli->error());
	//if(DAY(date)==DAY(CURRENT_TIMESTAMP)){
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:regupdate.php");
	// }	
	/*else{
	$_SESSION['message']="record has been not deleted you delete and edit only todays meal ";
	header("location:meal1.php");
	}*/
}



if(isset($_GET['edit'])){

	$pps1=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("select * FROM emp WHERE manager_phone ='$pps1' ")	or die($mysqli->error());
	if(count($result)==1)
	{
		$row=$result->fetch_array();
		$name=$row['name'];
		$own_phone=$row['own_phone'];
		$manager_phone=$row['manager_phone'];
		
		
	}


}

if(isset($_POST['update'])){

		
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];	
	$name=$_POST['name'];
	$mysqli->query("UPDATE emp SET name='$name',own_phone='$own_phone', manager_phone='$manager_phone' WHERE manager_phn='$pps1'")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:regupdate.php");	
	
}
















?>

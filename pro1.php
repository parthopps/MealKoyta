<?php
session_start();
$mysqli=new mysqli('localhost','root','','userregistation') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$own_phone='';
$manager_phone='';
$brk_fast='';
$lunch='';
$dinner='';
$pps=$_SESSION['own_phn'];
$pps1=$_SESSION['manager_phn'];

if(isset($_POST['save'])){
	$own_phone=$_POST['own_phone'];
	$manager_phone=$_POST['manager_phone'];
	$brk_fast=$_POST['brk_fast'];
	$lunch=$_POST['lunch'];
	$dinner=$_POST['dinner'];
	
	if(empty($brk_fast)|| empty($lunch)||empty($dinner))
	{
		$_SESSION['message']="check your all record and some record is  empty";
	   $_SESSION['msg_type']="success";
	    header("location:meal1.php");
	}else{
	$mysqli->query("Insert into meal (own_phone,manager_phone,brk_fast,lunch,dinner)values('$pps','$pps1','$brk_fast','$lunch','$dinner')") or die($mysqli->error);
	
	
	$_SESSION['message']="record has been saved";
	$_SESSION['msg_type']="success";
	header("location:meal1.php");
	
	}
	
	
}
if(isset($_GET['delete'])){

	$id=$_GET['delete'];
    	
	$mysqli->query("DELETE FROM meal WHERE id=$id and  DAY(date)=DAY(CURRENT_TIMESTAMP)")	or die($mysqli->error());
	//if(DAY(date)==DAY(CURRENT_TIMESTAMP)){
	$_SESSION['message']="record has been deleted";
	$_SESSION['msg_type']="danger";
	header("location:meal1.php");
	// }	
	/*else{
	$_SESSION['message']="record has been not deleted you delete and edit only todays meal ";
	header("location:meal1.php");
	}*/
}


	

if(isset($_GET['edit'])){

if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	if($id>0){
	$update=true;
	$result=$mysqli->query("select * FROM meal WHERE id=$id  and  DAY(date)=DAY(CURRENT_TIMESTAMP) ")	or die($mysqli->error());
	if($result->num_rows >0)
	{
		$row=$result->fetch_array();
		$own_phone=$row['own_phone'];
		$manager_phone=$row['manager_phone'];
		$brk_fast=$row['brk_fast'];
		$lunch=$row['lunch'];
		$dinner=$row['dinner'];
		
	}
	else{
		$update=false;
	}

}
}
}
if(isset($_POST['update'])){

	$id=$_POST['id'];	
	$own_phone=$_POST['own_phone'];	
	$manager_phone=$_POST['manager_phone'];	
	$brk_fast=$_POST['brk_fast'];
    $lunch=$_POST['lunch'];
	$dinner=$_POST['dinner'];
	$mysqli->query("UPDATE meal SET own_phone='$pps', manager_phone='$pps1',brk_fast='$brk_fast',lunch='$lunch',dinner='$dinner' WHERE id=$id and DAY(date)=DAY(CURRENT_TIMESTAMP)")	or die($mysqli->error());
	$_SESSION['message']="record has been updated";
	$_SESSION['msg_type']="warning";
	header("location:meal1.php");	
	
}
















?>

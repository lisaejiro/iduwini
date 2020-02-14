<?php
session_start();
require_once("config.php");
if(isset($_POST['log'])){
	$query=$conn->prepare("SELECT * FROM login WHERE email=? AND password=? AND status=?");
 	$query->bind_param('sss',$email,$password,$status);
    $email=$_POST['email'];
	$password=md5($_POST['password']);
	$status="active";	
	$query->execute();
	$query->bind_result($id,$name,$email,$password,$phone,$address,$status,$privilege,$ability,$created_at);
	$query->store_result();
	if($query->fetch()){
	$_SESSION['detail']=$email;
	header("Location: webcontrol/index");
    }
	else{
		$_SESSION['msg']="!Incorrect Login details.";
		header("Location: admin_main");
	}
}else{
	header("Location: index");
}
 ?>

<?php
function loggedIn(){
	if(isset($_SESSION['detail']) && !empty($_SESSION['detail'])){
		return TRUE;
	}
	else{
		return FALSE;
	}
}
function detail($details){
	 require("config.php");
	$query3=$conn->query("SELECT $details FROM login WHERE email =\"$_SESSION[detail]\"");
	$result=$query3->fetch_object()->$details;
	return $result;
}
?>

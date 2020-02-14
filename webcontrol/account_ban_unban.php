<?php
session_start();
require("../config.php");
$ref=$_GET['id'];
if(isset($_GET['s']) && isset($_GET['id'])){
    $stat=$_GET['s'];
    if($stat=="ban"){
        $status="banned";
    }else{
        $status="active";
    }
    $query=$conn->prepare("update login set status=? where id=?");
    $query->bind_param('ss',$status,$ref);
    $query->execute();
    $_SESSION['msg']="User set to ".$status;
    header("Location: account_view?id=".$ref);
}else{
   header("Location: account_view?id=".$ref);
}
?>
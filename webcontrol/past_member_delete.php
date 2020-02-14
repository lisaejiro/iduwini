<?php
session_start();
require("../config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $query=$conn->prepare("delete from past_staff where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msg']="Member Info was deleted";           
        }else{
            $_SESSION['msg2']="Member Info deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
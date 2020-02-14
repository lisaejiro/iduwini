<?php
session_start();
require("../config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
       
        $query=$conn->prepare("delete from newsletter where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msg']="Contact was deleted";           
        }else{
            $_SESSION['msg2']="Contact deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
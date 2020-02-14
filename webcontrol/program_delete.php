<?php
session_start();
require("../config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $query1=$conn->query("select image from programmes where id='".$id."'");
        $val=$query1->fetch_object()->image;
        $query=$conn->prepare("delete from programmes where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){            
            unlink("../program_images/".$val);
            $_SESSION['msg']="Program was deleted";           
        }else{
            $_SESSION['msg']="Program deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
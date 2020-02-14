<?php
session_start();
require("../config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $query1=$conn->query("select image from photos where id='".$id."'");
    $val=$query1->fetch_object()->image;
        unlink("../photo_gallery/".$val);
        $query=$conn->prepare("delete from photos where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msg']="Photo was deleted";           
        }else{
            $_SESSION['msg']="Photo deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
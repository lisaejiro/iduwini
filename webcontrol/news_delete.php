<?php
session_start();
require("../config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $query1=$conn->query("select image from news where id='".$id."'");
        $val=$query1->fetch_object()->image;
        $query=$conn->prepare("delete from news where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){            
            unlink("../news_images/".$val);
            $_SESSION['msg']="News was deleted";           
        }else{
            $_SESSION['msg']="News deletion failed"; 
        }    
       echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
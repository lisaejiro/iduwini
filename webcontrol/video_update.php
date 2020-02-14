<?php
session_start();
require_once("../config.php");
include("class.upload.php");
include("Slugify.php");
$slug=new Slugify();
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(isset($_POST['log'])){	
    $id=clean_up($_POST['id']);
    $title=clean_up($_POST['title']);
   $slugee=$slug->slugify($title);
    
    if(filter_var($_POST['url'],FILTER_VALIDATE_URL)){
                $url=clean_up($_POST['url']);
                $query=$conn->prepare("update videos set title=?,slug=?,url=? where id=?");
            $query->bind_param('sssi',$title,$slugee,$url,$id);
            
            if($query->execute()){
                $_SESSION['msg']="Video Updated";
            }else{
                $_SESSION['msg']="Failed to update video";
            } 
    }else{
        $_SESSION['msg']="Invalid URL";
    }
       
    echo "<script>history.back();</script>";
}else{
	header("Location: index");
}
 ?>

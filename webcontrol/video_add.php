<?php
session_start();
require("../config.php");
include("class.upload.php");
include("Slugify.php");
$slug=new Slugify();
if(!empty($_POST['title']) && !empty($_POST['url'])){
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id;
    $title=clean_up($_POST['title']);
    $slugee=$slug->slugify($title);
if(filter_var($_POST['url'],FILTER_VALIDATE_URL)){
    $url=clean_up($_POST['url']);
    $created_at;  
        $query=$conn->prepare("insert into videos values(?,?,?,?,?)");
        $query->bind_param('issss',$id,$title,$slugee,$url,$created_at);
        if($query->execute()){
            $_SESSION['msg']="Video was added";        
        }else{
            $_SESSION['msg']="Video insertion failed"; 
        }   
}else{
    $_SESSION['msg']="Invalid URL";
}        
        
        header("Location: videos");
}else{
    header("Location: index");
}
?>
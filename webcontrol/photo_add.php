<?php
session_start();
require("../config.php");
include("class.upload.php");
if(isset($_POST['log']) && !empty($_FILES['image']['name'])){
function clean_up($value){
$value=strip_tags($value);
$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id;
    $title=clean_up($_POST['title']);
    $imagen=$_FILES['image']['name'];
    $timage = rand(0,20).preg_replace('/\s+/', '', $imagen);
    $type=$_FILES['image']['type'];
    $tmp=$_FILES["image"]["tmp_name"];
    if(substr($type,0,5)==="image"){
$foo= new Upload($_FILES['image']);
if ($foo->uploaded) {
$foo->file_new_name_body = pathinfo($timage, PATHINFO_FILENAME);
$foo->image_resize = true;
$foo->image_x = 500;
$foo->image_ratio_y = true;
$foo->Process('../photo_gallery');
if ($foo->processed) {
$foo->Clean();
$query=$conn->prepare("insert into photos values (?,?,?,?)");
            $query->bind_param('isss',$id,$title,$timage,$created_at);
            $query->execute();  
            $_SESSION['msg']="Success!..image uploaded";
} else{
    $_SESSION['msg2']="image could not be uploaded"; 
}
}      
    }else{
        $_SESSION['msg2']="please upload a valid image";
    }
    header("Location: photos");
}else{
    header("Location: index");
}
?>

         
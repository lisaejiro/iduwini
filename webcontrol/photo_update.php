<?php
session_start();
require("../config.php");
include("class.upload.php");
if(isset($_POST['log'])){
function clean_up($value){
$value=strip_tags($value);
$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id=$_POST['id'];
    $title=clean_up($_POST['title']);
    $old_image=$_POST['old_image'];
    if(empty($_FILES['image']['name'])){
        $query=$conn->prepare("update photos set title=?,image=? where id=?");
        $query->bind_param('ssi',$title,$old_image,$id);
        $query->execute();
        $_SESSION['msg']="Success!..Updated";
    }else{
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
if($foo->processed){
    $foo->Clean();
    $query=$conn->prepare("update photos set title=?,image=? where id=?");
    $query->bind_param('ssi',$title,$timage,$id);
    if($query->execute()){
        unlink("../photo_gallery/".$old_image);
    }
    $_SESSION['msg']="Success!..Updated"; 
}else{
    $_SESSION['msg']="image could not be uploaded";
}                
}

            }else{
                $_SESSION['msg']="please upload a valid image";
            }
    }
   
    
    echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>

         
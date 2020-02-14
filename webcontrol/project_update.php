<?php
session_start();
require("../config.php");
include("class.upload.php");
include("Slugify.php");
$slug=new Slugify();
if(isset($_POST['log'])){
function clean_up($value){
// $value=strip_tags($value);
//$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id=$_POST['id'];
    $title=clean_up($_POST['title']);
    $slugee=$slug->slugify($title);
    $details=clean_up($_POST['details']);
    $des1=clean_up($_POST['des1']);
    $des2=clean_up($_POST['des2']);
    $des3=clean_up($_POST['des3']);
                    if(!empty($_FILES['before_img']['name'])){
                        $bimagen=$_FILES['before_img']['name'];
                        $btimage = rand(0,20).preg_replace('/\s+/', '', $bimagen);
                        $btype=$_FILES['before_img']['type'];
                        $btmp=$_FILES["before_img"]["tmp_name"];
                        if(substr($btype,0,5)==="image"){
$foo= new Upload($_FILES['before_img']);
if ($foo->uploaded) {
$foo->file_new_name_body = pathinfo($btimage, PATHINFO_FILENAME);
$foo->image_resize = true;
$foo->image_x = 500;
$foo->image_ratio_y = true;
$foo->Process('../project_images');
if($foo->processed){
$foo->Clean();
if(!empty($_POST['b_img'])){unlink("../project_images/".$_POST['b_img']);}
$b_img=$btimage;
}else{
    $b_img=(!empty($_POST['b_img'])) ? $_POST['b_img'] : "";
}
}
         }
                    }else{
                        $b_img=(!empty($_POST['b_img'])) ? $_POST['b_img'] : "";
                    }


                    if(!empty($_FILES['during_img']['name'])){
                        $dimagen=$_FILES['during_img']['name'];
                        $dtimage = rand(0,20).preg_replace('/\s+/', '', $dimagen);
                        $dtype=$_FILES['during_img']['type'];
                        $dtmp=$_FILES["during_img"]["tmp_name"];
                        if(substr($dtype,0,5)==="image"){
$foo= new Upload($_FILES['during_img']);
if ($foo->uploaded) {
$foo->file_new_name_body = pathinfo($dtimage, PATHINFO_FILENAME);
$foo->image_resize = true;
$foo->image_x = 500;
$foo->image_ratio_y = true;
$foo->Process('../project_images');
if($foo->processed){
$foo->Clean();
if(!empty($_POST['d_img'])){unlink("../project_images/".$_POST['d_img']);}
$d_img=$dtimage;
}else{
    $d_img=(!empty($_POST['d_img'])) ? $_POST['d_img'] : "";
}
}
                        }
                    }else{
                        $d_img=(!empty($_POST['d_img'])) ? $_POST['d_img'] : "";
                    }
                    
                    if(!empty($_FILES['after_img']['name'])){
                        $aimagen=$_FILES['after_img']['name'];
                        $atimage = rand(0,20).preg_replace('/\s+/', '', $aimagen);
                        $atype=$_FILES['after_img']['type'];
                        $atmp=$_FILES["after_img"]["tmp_name"];
                        if(substr($atype,0,5)==="image"){
$foo= new Upload($_FILES['after_img']);
if ($foo->uploaded) {
$foo->file_new_name_body = pathinfo($atimage, PATHINFO_FILENAME);
$foo->image_resize = true;
$foo->image_x = 500;
$foo->image_ratio_y = true;
$foo->Process('../project_images');
if($foo->processed){
$foo->Clean();
if(!empty($_POST['a_img'])){unlink("../project_images/".$_POST['a_img']);}
$a_img=$atimage;
}else{
    $a_img=(!empty($_POST['a_img'])) ? $_POST['a_img'] : "";
}
}
                        }
                    }else{
                        $a_img=(!empty($_POST['a_img'])) ? $_POST['a_img'] : "";
                    }
                    $query=$conn->prepare("update projects set title=?,slug=?,details=?,before_img=?,during_img=?,after_img=?,des1=?,des2=?,des3=? where id=?");
                    $query->bind_param('sssssssssi',$title,$slugee,$details,$b_img,$d_img,$a_img,$des1,$des2,$des3,$id);
                    if($query->execute()){
                        $_SESSION['msg']="Project has been Updated";
                    }else{
                        $_SESSION['msg2']="Project Update Failed";
                    }

 echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>


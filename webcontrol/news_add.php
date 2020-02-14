<?php
session_start();
require("../config.php");
include("class.upload.php");
include("Slugify.php");
$slug=new Slugify();
if(isset($_POST['log']) && !empty($_FILES['image']['name'])){
function clean_up($value){
//$value=strip_tags($value);
//$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id;
    $title=clean_up($_POST['title']);
    $slugee=$slug->slugify($title);
    $details=clean_up($_POST['details']);
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
$foo->Process('../news_images');
if($foo->processed){
    $foo->Clean();
    $query=$conn->prepare("insert into news values (?,?,?,?,?,?)");
    $query->bind_param('isssss',$id,$title,$slugee,$timage,$details,$created_at);
    $query->execute();
    $ncid;
    $nctitle=remove_tags($title);
    $nclink=$website."/news-details?title=".$slugee;
$query3=$conn->query("select name,email from newsletter");
if($query3->num_rows>0){
    while($trad=$query3->fetch_assoc()){
        $ncname=$trad['name'];
        $nemail=$trad['email'];
        $query2=$conn->prepare("insert into news_cron values(?,?,?,?,?)");
        $query2->bind_param('issss',$ncid,$ncname,$ncemail,$title,$nclink);
        $query2->execute();
    }
}
    $_SESSION['msg']="Success!..image uploaded"; 
}else{
    $_SESSION['msg2']="image could not be uploaded";
}
}
}else{
        $_SESSION['msg2']="please upload a valid image";
    }
    header("Location: news");
}else{
    header("Location: index");
}
?>

         
<?php
session_start();
require("../config.php");
if(isset($_POST['log'])){
    function clean_up($value){
        $value=trim($value);
        //$value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $project=(!empty($_POST['project'])) ? $_POST['project']."," : "";
$program=(!empty($_POST['program'])) ? $_POST['program']."," : "";
$news=(!empty($_POST['news'])) ? $_POST['news']."," : "";
$letter=(!empty($_POST['letter'])) ? $_POST['letter']."," : "";
$photo=(!empty($_POST['photo'])) ? $_POST['photo']."," : "";
$site=(!empty($_POST['site'])) ? $_POST['site']."," : "";
$video=(!empty($_POST['video'])) ? $_POST['video']."," : "";
$ability1=$project.$program.$news.$letter.$photo.$site.$video;
if(empty($_POST['project']) && empty($_POST['program']) && empty($_POST['news']) && empty($_POST['letter']) && empty($_POST['photo']) && empty($_POST['site']) && empty($_POST['video'])){
    $ability=(!empty($_POST['abilities'])) ? $_POST['abilities'] : "";
}else{
    $ability=$ability1;
}
    $query=$conn->prepare("update login set name=?,email=?,phone=?,ability=? where id=?");
    $query->bind_param('ssssi',$name,$email,$phone,$ability,$id);
    if($query->execute()){
        $_SESSION['msg']="Success! Account Updated";
        header("Location: account_view?id=".$id);
    }else{
        $_SESSION['msg']="Failed! fill all empty fields";
        header("Location: account_view?id=".$id);
    }
}else{
    header("Location:index");
}
?>
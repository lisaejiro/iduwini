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
$id;
$name=clean_up($_POST['name']);
$email=clean_up($_POST['email']);
$password1=md5(clean_up($_POST['password1']));
$password2=md5(clean_up($_POST['password2']));
$phone=clean_up($_POST['phone']);
$status="active";
$privilege="subadmin";
$project=(!empty($_POST['project'])) ? $_POST['project']."," : "";
$program=(!empty($_POST['program'])) ? $_POST['program']."," : "";
$news=(!empty($_POST['news'])) ? $_POST['news']."," : "";
$letter=(!empty($_POST['letter'])) ? $_POST['letter']."," : "";
$photo=(!empty($_POST['photo'])) ? $_POST['photo']."," : "";
$site=(!empty($_POST['site'])) ? $_POST['site']."," : "";
$video=(!empty($_POST['video'])) ? $_POST['video']."," : "";
$ability=$project.$program.$news.$letter.$photo.$site.$video;
$query=$conn->prepare("insert into login values(?,?,?,?,?,?,?,?,?)");
$query->bind_param('issssssss',$id,$name,$email,$password1,$phone,$status,$privilege,$ability,$created_at);
    if($query->execute()){
        $_SESSION['msg']="Account Creation was successful"; 
    }else{
      $_SESSION['msg']="Failed!..inputs incorrectly filled";
    }
    header("location: accounts");
}else{
    header("Location:index");
}
?>






























































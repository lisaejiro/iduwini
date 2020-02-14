<?php
session_start();
require_once("../config.php");
        function clean_up($value){
            $value=trim($value);
            //$value=htmlspecialchars($value);
            return $value;
        }
 $id=1;
if(isset($_POST['about_log'])){
    $query=$conn->prepare("update site set about=? where id=?");
    $query->bind_param('si',$about,$id);
    $about=clean_up($_POST['about']);
    $query->execute();
$_SESSION['msg']="About Settings Updated";
echo "<script>history.back();</script>";
}elseif(isset($_POST['contact_log'])){
    $query=$conn->prepare("update site set name=?,email=?,phone=?,address=? where id=?");
    $query->bind_param('ssssi',$name,$email,$phone,$address,$id);
    $name=clean_up($_POST['name']);
    $email=clean_up($_POST['email']);
    $phone=clean_up($_POST['phone']);
    $address=clean_up($_POST['address']);
    $query->execute();
$_SESSION['msg']="Contact Settings Updated";
echo "<script>history.back();</script>";
}elseif(isset($_POST['social_log'])){
    $query=$conn->prepare("update site set facebook=?,twitter=?,instagram=?,youtube=? where id=?");
    $query->bind_param('ssssi',$facebook,$twitter,$instagram,$youtube,$id);
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['instagram'];
    $youtube=$_POST['youtube'];
    if(!filter_var($facebook,FILTER_VALIDATE_URL)){
        $_SESSION['msg']="Invalid Facebook URL";
    }elseif(!filter_var($twitter,FILTER_VALIDATE_URL)){
        $_SESSION['msg']="Invalid Twitter URL";
    }elseif(!filter_var($instagram,FILTER_VALIDATE_URL)){
        $_SESSION['msg']="Invalid Instagram URL";
    }elseif(!filter_var($youtube,FILTER_VALIDATE_URL)){
        $_SESSION['msg']="Invalid Youtube URL";
    }else{
        $query->execute();
        $_SESSION['msg']="Media Settings Updated";
    }   
    echo "<script>history.back();</script>";
}elseif(isset($_POST['overview_log'])){
    $query=$conn->prepare("update site set overview=? where id=?");
    $query->bind_param('si',$overview,$id);
    $overview=clean_up($_POST['overview']);
    $query->execute();
$_SESSION['msg']="Overview Updated";
echo "<script>history.back();</script>";
}elseif(isset($_POST['policy_log'])){
    $query=$conn->prepare("update site set policy=? where id=?");
    $query->bind_param('si',$policy,$id);
    $policy=clean_up($_POST['policy']);
    $query->execute();
$_SESSION['msg']="Community Updated";
echo "<script>history.back();</script>";
}
else{
	header("Location: index");
}
 ?>


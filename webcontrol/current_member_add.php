<?php
session_start();
require("../config.php");
if(isset($_POST['log'])){
function clean_up($value){
$value=strip_tags($value);
//$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id;
    $name=clean_up($_POST['name']);
    $position=clean_up($_POST['position']);
    $email=!empty(clean_up($_POST['email'])) ? clean_up($_POST['email']) : "--";
    $phone=!empty(clean_up($_POST['phone'])) ? clean_up($_POST['phone']) : "--";
            $query=$conn->prepare("insert into current_staff values (?,?,?,?,?,?)");
            $query->bind_param('isssss',$id,$name,$position,$email,$phone,$created_at);
            if($query->execute()){
                $_SESSION['msg']="Success!..Member Info Added"; 
            }else{
                $_SESSION['msg2']="Failure!..fill all fields";  
            } 
    header("Location: current_members");
}else{
    header("Location: index");
}
?>

         
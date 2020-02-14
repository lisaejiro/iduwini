<?php
session_start();
require("../config.php");
if(isset($_POST['log'])){
function clean_up($value){
$value=strip_tags($value);
// $value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id=$_POST['id'];
    $name=clean_up($_POST['name']);
    $position=clean_up($_POST['position']);
    $email=!empty(clean_up($_POST['email'])) ? clean_up($_POST['email']) : "--";
    $phone=!empty(clean_up($_POST['phone'])) ? clean_up($_POST['phone']) : "--";
            $query=$conn->prepare("update current_staff set name=?,position=?, phone=?, email=? where id=?");
            $query->bind_param('ssssi',$name,$position,$phone,$email,$id);
            if($query->execute()){
                $_SESSION['msg']="Success!..Member Info Updated"; 
            }else{
                $_SESSION['msg2']="Failure!..fill all fields";  
            } 
   echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>

         
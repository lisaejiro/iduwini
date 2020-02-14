<?php
session_start();
require("../config.php");
if(isset($_POST['log'])){
function clean_up($value){
$value=strip_tags($value);
$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $id=$_POST['id'];
    $name=clean_up($_POST['name']);
    $phone=clean_up($_POST['phone']);
    $email=clean_up($_POST['email']);
            $query=$conn->prepare("update newsletter set name=?, phone=?, email=? where id=?");
            $query->bind_param('sssi',$name,$phone,$email,$id);
            if($query->execute()){
                $_SESSION['msg']="Success!..Contact Updated"; 
            }else{
                $_SESSION['msg']="Failure!..fill all fields";  
            } 
   echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>

         
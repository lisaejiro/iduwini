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
    $phone=clean_up($_POST['phone']);
    $email=clean_up($_POST['email']);
            $query=$conn->prepare("insert into newsletter values (?,?,?,?,?)");
            $query->bind_param('issss',$id,$name,$phone,$email,$created_at);
            if($query->execute()){
                $_SESSION['msg']="Success!..Contact Added"; 
            }else{
                $_SESSION['msg']="Failure!..fill all fields";  
            } 
    header("Location: newsletter");
}else{
    header("Location: index");
}
?>

         
<?php
session_start();
require("./config.php");
if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])){
function clean_up($value){
    global $conn;
$value=strip_tags($value);
//$value=htmlspecialchars($value);
$value=trim($value);
$value=$conn->real_escape_string($value);
return $value;
}
$trap=$conn->query("select * from site");
if($trap->num_rows==1){
    while($row=$trap->fetch_assoc()){
        $cmail=$row['email'];
        $cname=$row['name'];
    }
    $id;
    $name=clean_up($_POST['name']);
    $phone=clean_up($_POST['phone']);
    $email=clean_up($_POST['email']);
    $spam1 = strip_tags($_POST['spam1']);
    $spam2 = strip_tags($_POST['spam2']);
    if($spam1==$spam2){
        $query=$conn->prepare("insert into newsletter values (?,?,?,?,?)");
        $query->bind_param('issss',$id,$name,$phone,$email,$created_at);
        if($query->execute()){
            $subject=$cname." Newsletter Signup";
            $message="<p>Congratulations,you have successfully signed up to ".$cname." newsletter.</p>";
            $header= "From: ".$cname." <".$cmail.">";
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            if(mail($email,$subject,$message,$header)){}
            $_SESSION['tap']="Success!..you have signed up to our newsletter"; 
        }else{
            $_SESSION['tap']="Failure!..fill all fields";  
        } 
    }else{
      $_SESSION["tap"]="Invalid anti-spam code supplied... Try again!";
    }
}
  
  header("Location: newsletter");
}else{
    header("Location: index");
}
?>

         
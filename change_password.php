<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
    require("config.php");
    $query=$conn->query("select * from login where email='".$_POST['email']."'");
    if($query->num_rows==1){
        $query2=$conn->query("select * from site where id=1");
        while($row=$query2->fetch_assoc()){
          $cname=$row['name'];
          $cmail=$row['email'];
        }
        $email=$_POST['email'];
        $password=rand(999,99999);
        $subject=$cname." Account Password Change";
        $message="<p>Please click the link below to change your ".$cname." account password\r\n";
        $message.="<a href='$website.'/password_verify?email={$email}&password={$password}' target='_blank'>Here</a></p>";
        $header= "From: ".$cname." <".$cmail.">";
        if(mail($email,$subject,$message,$header)){
           $_SESSION['msg']="Mail sent!...Please verify password reset from your mailbox";
               header("location: forgot_password");
       }else{
           $_SESSION['msg2']="Please ensure your details were correct";
               header("location: forgot_password");
       }
    }else{
        $_SESSION['msg2']="Failed!..email does not exist";
        header("location: forgot_password");
    }
    
}
?>
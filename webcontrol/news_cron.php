<?php
require("../config.php");
$query1=$conn->query("select * from news_cron limit '$mail_limit'");
if($query1->num_rows>0){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    while($row1=$query1->fetch_assoc()){
        $ncid=$row1['id'];
        $toname=$row1['name'];
        $toemail=$row1['email'];
        $subject=$row1['title'];
        $link=$row1['link'];
        $message="<html><body><h2>Dear ".$toname.",</h2>";
        $message.="<h3>".$subject."</h3>";
        $message.="<p>To view in details visit</p>";
        $message.="<a href=".$link.">".$link."</a>";
        $message.="<p>you have received this mail because you subscribed to our newsletter<p></body></html>";
        if(mail($toemail,$subject,$message,$headers)){
            $query2=$conn->prepare("delete from news_cron where id=?");
            $query2->bind_param('i',$ncid);
            $query2->execute();
        }
    }
}
?>
<?php
$conn=new mysqli("localhost","root","","iduwini");
if($conn->connect_error){
    die($conn->connect_error);
}
date_default_timezone_set("Africa/Lagos");
    $created_at=date("Y-m-d H:i:s");
    $website="http://www.iduwinicluster.org.ng";
    $mail_limit=50;
?>
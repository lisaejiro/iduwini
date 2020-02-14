<?php
session_start();
require_once("../config.php");
if(isset($_POST['pro_name'])){
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
  $pro_name=clean_up($_POST['pro_name']);
  $start=clean_up($_POST['date']);
  $end=clean_up($_POST['date2']);
  if($start>$end){
    $_SESSION['msg2']="Start date exceeds End date";
    echo "<script>history.back();</script>";
  }
  else{
     header("Location: programs?pro_name=$pro_name&start=$start&end=$end");
  }
}
else{
  header("Location: index");
}
?>

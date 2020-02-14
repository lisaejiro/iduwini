<?php
session_start();
require("../config.php");
include("class.upload.php");
if(isset($_POST['log'])){
function clean_up($value){
$value=strip_tags($value);
//$value=htmlspecialchars($value);
$value=trim($value);
return $value;
}
    $lid=$_POST['lid'];
    $lname=clean_up($_POST['lname']);
    $lposition=clean_up($_POST['lposition']);
    $lmage=$_POST['lmage'];
    if(!empty($_FILES['limage']['name'])){
       $plname=rand(0,20).preg_replace('/\s+/', '', $_FILES['limage']['name']);
       @list(, , $imtypel, ) = getimagesize($_FILES['limage']['tmp_name']); 
       if ($imtypel == 3 or $imtypel == 2 or $imtypel == 1) { 
                    $foo= new Upload($_FILES['limage']);
                    if ($foo->uploaded) {
                    $foo->file_new_name_body = pathinfo($plname, PATHINFO_FILENAME);
                    $foo->image_resize = true;
                    //  $foo->image_convert = "default";
                    $foo->image_x = 500;
                    $foo->image_ratio_y = true;
                    $foo->Process('../board_images');
                    if ($foo->processed) {
                        unlink("../board_images/".$lmage);
                    $foo->Clean();
                    }  else{
                        $plname=$lmage;
                    }
                    }
       }
    }else{
        $plname=$lmage;
    }

    $mid=$_POST['mid'];
    $mname=clean_up($_POST['mname']);
    $mposition=clean_up($_POST['mposition']);
    $mmage=$_POST['mmage'];
    if(!empty($_FILES['mimage']['name'])){
        $pmname=rand(0,20).preg_replace('/\s+/', '', $_FILES['mimage']['name']);
        @list(, , $imtypem, ) = getimagesize($_FILES['mimage']['tmp_name']); 
        if ($imtypem == 3 or $imtypem == 2 or $imtypem == 1) { 
                     $foo= new Upload($_FILES['mimage']);
                     if ($foo->uploaded) {
                        $foo->file_new_name_body = pathinfo($pmname, PATHINFO_FILENAME);
                     $foo->image_resize = true;
                    //  $foo->image_convert = "default";
                     $foo->image_x = 500;
                     $foo->image_ratio_y = true;
                     $foo->Process('../board_images');
                     if ($foo->processed) {
                     $foo->Clean();
                     }  else{
                        $pmname=$mmage;
                     }
                     }
        }
     }else{
         $pmname=$mmage;
     }

    $rid=$_POST['rid'];
     $rname=clean_up($_POST['rname']);
     $rposition=clean_up($_POST['rposition']);
    $rmage=$_POST['rmage'];
    if(!empty($_FILES['rimage']['name'])){
        $prname=rand(0,20).preg_replace('/\s+/', '', $_FILES['rimage']['name']);
        @list(, , $imtyper, ) = getimagesize($_FILES['rimage']['tmp_name']); 
        if ($imtyper == 3 or $imtyper == 2 or $imtyper == 1) { 
                     $foo= new Upload($_FILES['rimage']);
                     if ($foo->uploaded) {
                     $foo->file_new_name_body = pathinfo($prname, PATHINFO_FILENAME);
                     $foo->image_resize = true;
                    //   $foo->image_convert = "default";
                     $foo->image_x = 500;
                     $foo->image_ratio_y = true;
                     $foo->Process('../board_images');
                     if ($foo->processed) {
                     $foo->Clean();
                     } else{
                        $prname=$rmage;
                     } 
                     }
        }
     }else{
         $prname=$rmage;
     }
          $queryl=$conn->prepare("update board set name=?,position=?,image=? where id=?");
          $queryl->bind_param('sssi',$lname,$lposition,$plname,$lid);
          if($queryl->execute()){
$_SESSION['lmsg']="Left Box details have been updated";
          }else{
            $_SESSION['lmsg2']="Left Box details update failed";
          }
          $querym=$conn->prepare("update board set name=?,position=?,image=? where id=?");
          $querym->bind_param('sssi',$mname,$mposition,$pmname,$mid);
          if($querym->execute()){
$_SESSION['mmsg']="Middle Box details have been updated";
          }else{
            $_SESSION['mmsg2']="Middle Box details update failed";
          }
          $queryr=$conn->prepare("update board set name=?,position=?,image=? where id=?");
          $queryr->bind_param('sssi',$rname,$rposition,$prname,$rid);
          if($queryr->execute()){
$_SESSION['rmsg']="Right Box details have been updated";
          }else{
            $_SESSION['rmsg2']="Right Box details update failed";
          }

    echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>

         
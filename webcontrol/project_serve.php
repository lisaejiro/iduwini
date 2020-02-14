<?php
require("../config.php");
require("../last_seen.php");
if(isset($_POST['id'])){
    $view=$conn->query("select * from projects where id='".$_POST['id']."'");
    while($row=$view->fetch_assoc()){
        $b_img=$row['before_img'];
        $d_img=$row['during_img'];
        $a_img=$row['after_img'];
      $title=$row['title'];
      $details=$row['details'];
        ?>
<div class="row">
 <div class="col-md-6">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<?php if(!empty($b_img)){ ?>
<li data-target="#carousel-example-generic" data-slide-to="0"></li>
<?php } ?>
<?php if(!empty($d_img)){ ?>
<li data-target="#carousel-example-generic" data-slide-to="1"></li>
<?php } ?>
<?php if(!empty($a_img)){ ?>
<li data-target="#carousel-example-generic" data-slide-to="2"></li>
<?php } ?>
</ol>
<div class="carousel-inner" role="listbox" style="width:600px;height:380px;">
<?php if(!empty($b_img)){ ?>
    <div class="carousel-item active">
<img src="../project_images/<?php echo $b_img; ?>">
</div>
<?php }?>
<?php if(!empty($d_img)){
    if(empty($b_img)) { ?>
    <div class="carousel-item active">
    <img src="../project_images/<?php echo $d_img; ?>">
    </div>
<?php   }else{ ?>
    <div class="carousel-item">
    <img src="../project_images/<?php echo $d_img; ?>">
    </div>
<?php  }
?>
 
<?php } ?>
<?php if(!empty($a_img)){ 
    if(empty($b_img) && empty($d_img)) { ?>
        <div class="carousel-item active">
<img src="../project_images/<?php echo $a_img; ?>">
    </div>
<?php   }else{ ?>
    <div class="carousel-item">
<img src="../project_images/<?php echo $a_img; ?>">
</div>
 
<?php } }?>
</div>
<a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true" style="border:1px solid #0088cc;"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true" style="border:1px solid #0088cc;"></span>
<span class="sr-only">Next</span>
</a>
</div> 
</div>
<div class="col-md-6">
<h3><?php echo $title; ?></h3>
<?php echo $details; ?>
</div>
</div>
  <?php
    }
}
?>


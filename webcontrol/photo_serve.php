<?php
require("../config.php");
require("../last_seen.php");
if(isset($_POST['id'])){
    $view=$conn->query("select * from news where id='".$_POST['id']."'");
    while($row=$view->fetch_assoc()){
        $image=$row['image'];
      $title=$row['title'];
      $details=$row['details'];
        ?>
<div class="row">
 <div class="col-md-6">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox" style="width:600px;height:380px;">
<div class="carousel-item active">
<img src="../news_images/<?php echo $image; ?>">
</div>
</div>
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


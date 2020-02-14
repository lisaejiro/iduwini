<!DOCTYPE html>
<html lang="en">
  
<?php include("head.php"); ?>

  <body>
    
    <!--// Wrapper //-->
    <div class="kode-wrapper">

    <?php  include("header.php"); ?>

    <div class="kode-subheader subheader-height">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1> Our Videos </h1>
              <p></p>
            </div>
            <div class="col-md-6">
              <ul class="kode-breadcrumb">
                <li><a href="index">Home</a></li>
                <!-- <li><a href="#">Blog</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>

        <!--// Main Content //-->
        <div class="kode-content">

<!--// Page Content //-->
<section class="kode-pagesection">
  <div class="container">
    <div class="row">
            
      <div class="col-md-12">
        <div class="kode-gallery kode-gutter-gallery bottom-spacer">
          <div class="row">
          <?php
    $per_page=12;
$count_all=$conn->query("select count(*) from videos");
while($row=$count_all->fetch_array()){
$count_val=$row[0];
}
$pages=ceil($count_val/$per_page);
$start=(($_GET['page'])-1)*$per_page;
$videos=$conn->query("select * from videos order by id DESC LIMIT $per_page OFFSET $start");
if($videos->num_rows>0){
while($row=$videos->fetch_assoc()){ 
  $vurl = $row['url'];
  preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
  $id = $matches[1];
  $width = '400';
  $height = '250px';
  ?>
<div class="col-md-4">
<iframe style="border:10px solid white;" id="ytplayer" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
</div>
<?php }
}else{
    echo "<h1>No Videos Available</h1>";
}
?>
           
</div>
        </div>
        <div class="pagination">
          
        <?php 
         if($count_val>$per_page) {
        for($icount=1;$icount<=$pages;$icount++) { ?>
          <a href="videos?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
          <?php }} ?>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!--// Page Content //-->

</div>
<!--// Main Content //-->

<?php
require('footer.php');
?>
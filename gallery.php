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
              <h1> Gallery Images </h1>
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
          <ul class="row">
          <?php
    $per_page=12;
$count_all=$conn->query("select count(*) from photos");
while($row=$count_all->fetch_array()){
$count_val=$row[0];
}
$pages=ceil($count_val/$per_page);
$start=(($_GET['page'])-1)*$per_page;
$image=$conn->query("select * from photos order by id DESC LIMIT $per_page OFFSET $start");
if($image->num_rows>0){
while($row=$image->fetch_assoc()){ ?>
            <li class="col-md-3">
              <figure>
                <a href="view_gallery?title=<?php echo $row['title'];?>" class="gallery-thumb"><img src="photo_gallery/<?php echo $row['image']; ?>" alt="" style="width:100%; height:234px;"></a>
                <figcaption>
                  <div class="gallery-link">
                    <a href="view_gallery?title=<?php echo $row['title'];?>"><i class="fa fa-photo"></i></a>
                  </div>
                  <div class="gallery-info">
                    <h3><a href="view_gallery?title=<?php echo $row['title'];?>"><?php echo $row['title']; ?></a></h3>
                    <!-- <span>Fundraising</span> -->
                  </div>
                </figcaption>
              </figure>
            </li>
            <?php }
}else{
    echo "<h1>No Images in Gallery</h1>";
}
?>
           
          </ul>
        </div>
        <div class="pagination">
        <?php  
        if($count_val>$per_page) {
        for($icount=1;$icount<=$pages;$icount++) { ?>
          <a href="gallery?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
          <?php }
          }
           ?>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!--// Page Content //-->
<?php 
require('sponsor.php');
?>
</div>
<!--// Main Content //-->

<?php
require('footer.php');
?>
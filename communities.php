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
              <h1>Cluster Communities</h1>
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

              <div class="col-md-6">
                <figure class="detail-thumb"><img src="photos/cluster.jpg" alt="" style="width:100%; height:500px;"></figure>
                 
                  
                <div class="kode-attachment">
                  <ul>
                    <li><a href="#"><img src="photos/slider1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="photos/cluster2.jpg" alt=""></a></li>
                    <li><a href="#"><img src="photos/cluster3.jpg" alt="" style="h"></a></li>
                    <!-- <li><a href="#"><img src="photos/over_img3.jpg" alt=""></a></li> -->
                  </ul>
                </div>

                             </div>
                             <div class="col-md-6">
                             <?php echo  $communities; ?>
                            </div>
              
              
            </div>
          </div>
        </section>
        <!--// Page Content //-->

      </div>
      <!--// Main Content //-->
      <?php
require('sponsor.php');
?>


<?php
require('footer.php');
?>
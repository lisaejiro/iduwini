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
              <h1>About us <br><span style="font-size:15px;">Overview of SPDC-GMoU Framework and the Iduwini Cluster</span> </h1>
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
                <figure class="detail-thumb"><img src="photos/over.jpg" alt="" ></figure>
                 
                  
                  <!-- -->
                <div class="kode-attachment">
                <figure class="detail-thumb"><img src="photos/over_img.jpg" alt="" ></figure>
                  <ul>
                    <li><a href="#"><img src="photos/over_img.jpg" alt=""></a></li>
                    <li><a href="#"><img src="photos/over_img1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="photos/s4.png" alt=""></a></li>
                    <li><a href="#"><img src="photos/over_img3.jpg" alt=""></a></li>
                  </ul>
                </div>
                             </div>

                             <div class="col-md-6">
                             <?php echo $overview; ?>

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
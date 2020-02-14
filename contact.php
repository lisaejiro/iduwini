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
              <h1>Contact Us </h1>
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
<!-- <section class="kode-pagesection" style=" margin-top: -35px; ">
  <div class="kode-map">
    <div style="width:100%;height:350px;float:left;" class="map-canvas">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d508639.434725389!2d6.548968190812909!3d5.144603218573093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041f98cd0c65d41%3A0x8099ad92a0d43dcc!2sBayelsa%20National%20Forest!5e0!3m2!1sen!2sng!4v1570460169445!5m2!1sen!2sng" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</div>
  </div>
</section> -->
<!--// Page Content //-->

<section style=" padding-top: 10px; padding-bottom: 10px; " class="kode-pagesection">
  <div class="container">
    <div class="row">
       <div class="col-md-12 kode-services services-three">
        <ul class="row">
          <li class="col-md-4">
            <i class="fa fa-phone"></i>
            <div class="kode-spacer">
              <h3><?php echo $phone; ?></h3>
              <!-- <p>cALL uS FOR dONATION</p> -->
            </div>
          </li>
          <li class="col-md-4">
            <i class="fa fa-envelope"></i>
            <div class="kode-spacer">
              <h3><?php echo $email; ?></h3>
              <!-- <p>WE Reply You With in a 24 Hours</p> -->
            </div>
          </li>
          <li class="col-md-4">
            <i class="fa fa-map-marker"></i>
            <div class="kode-spacer">
              <h3><?php echo $address; ?></h3>
              <!-- <p>Mon-Sat 8 Am to 6 Pm</p> -->
            </div>
          </li>
        </ul>
      </div>
      <div class="col-md-12">
        <div class="kode-maintitle">
          <!-- <h2>Irreplaceable experience now</h2> -->
          <h3>Contact <span class="thcolor">With US</span></h3>
          <div class="kode-maindivider"><span></span></div>
        </div>

        <div id="koderespond">
                  <form action="postmail" method="POST" class="comments-form" >
                   <input type="hidden" id="email" required name="mailer" value="<?php echo $email; ?>">

                    <p><i class="fa fa-users"></i> <input required type="text" id="name" name="name"  placeholder="Name *"></p>
                    <p><i class="fa fa-envelope"></i> <input required type="text" id="email" name="email" placeholder="Email *"></p>
                    <p><i class="fa fa-phone"></i> <input required type="text" id="phone" name="phone" placeholder="Phone Number *"></p>

                    <p class="kd-textarea"><i class="fa fa-comments-o"></i> <textarea required name="message" id="message" placeholder="Message:"></textarea></p>
					
				
                    <p>Verify that you're a human being <i style="font-weight:600; color:#f00"><?php echo $rand; ?></i></p>
                    <input type="hidden" required name="spam1" value="<?php echo $rand; ?>">
					<p><i class="fa fa-lock"></i><input required class="verify" type="text" id="verify" name="spam2" /></p>
                    <p class="kd-button"> <input type="submit" value="Submit Now"></p>
                  </form>
                </div>
      </div>
    </div>
  </div>
</section>

</div>
<!--// Main Content //-->

<?php 
require('footer.php');
?>
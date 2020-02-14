<?php
session_start();
?>
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
              <h1>NEWSLETTER</h1>
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

<!--// Page Content //-->

<section style=" padding-top: 10px; padding-bottom: 10px; " class="kode-pagesection">
  <div class="container">
    <div class="row">
       
      <div class="col-md-12">
        <div class="kode-maintitle">
          <!-- <h2>Irreplaceable experience now</h2> -->
          <h3>Complete Newsletter Subscription</h3>
          <h4><?php
          if(isset($_SESSION['tap'])){
            echo $_SESSION['tap'];
          }
          ?></h4>
          <div class="kode-maindivider"><span></span></div>
        </div>

        <div id="koderespond">
                  <form action="newsletter_signup.php" method="POST" class="comments-form">
                    <p><i class="fa fa-users"></i> <input type="text"  name="name"  placeholder="Name *"></p>
                    <p><i class="fa fa-envelope"></i> <input type="text"  name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION ['email'];}?>" placeholder="Email *"></p>
                    <p><i class="fa fa-phone"></i> <input type="text"  name="phone" placeholder="Phone Number*"></p>
					
                    <!-- <p class="kd-textarea"><i class="fa fa-comments-o"></i> <textarea name="message" id="message" placeholder="Message:"></textarea></p> -->
					
				
                    <p>Verify that you're a human being <i style="font-weight:600; color:#f00"><?php echo $rand; ?></i></p>
                    <input type="hidden" name="spam1" value="<?php echo $rand; ?>">
					<p><i class="fa fa-lock"></i><input class="verify" type="text"  name="spam2" /></p>
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

         
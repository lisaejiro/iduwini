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
              <h1>News/Event</h1>
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


      <div class="kode-content">

      <!-- causes list section -->
<section class="xs-section-padding">
	<div class="container">
		<div class="row">
        <?php
        $titled=$conn->real_escape_string($_GET['title']);

$news=$conn->query("select * from news where slug='".$titled."'");
if($news->num_rows==1){
	while($row=$news->fetch_assoc()){ ?>

			<div class="col-md-12">
				<div class="xs-fature-causes-deatils">
					<h3 class="entry-sub-title"> <?php echo $row['title']; ?> </h3>
					<?php echo $row['details']; ?>
					
					<p align="justify">
					<?php
if(!empty($row['image'])){ ?>
<div class="xs-causes-images">
					<img style="max-height:400px; margin-bottom:30px;" src="news_images/<?php echo $row['image']; ?>" class="d-block" alt="">
				</div><!-- .xs-causes-images END -->
<?php }
	?>
					</p>
				</div>
			</div>
<?php	}
}else{
	echo "<h1>Sorry!...Oops Not Found</h1>";
}
?>
		
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End causes list section -->

<?php include("sponsor.php"); ?>
	
</div>

<?php 
include("footer.php");
?>

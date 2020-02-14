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
              <h1> Gallery </h1>
              <p></p>
            </div>
            <div class="col-md-6">
              <ul class="kode-breadcrumb">
                <li><a href="index">Home</a></li>
                <li><a href="gallery">Back</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

       <!--// Main Content //-->
       <div class="kode-content">

       <section class="kode-pagesection">
	<div class="container">
		<div class="row">
		<?php
$titled=$conn->real_escape_string($_GET['title']);
$program=$conn->query("select * from photos where title='".$titled."'");
if($program->num_rows==1){
	while($row=$program->fetch_assoc()){ ?>

			<div class="col-md-12">
				<div class="kode-team kode-team-grid">
					<h3 class="entry-sub-title" style="font-size:28px;"> <?php echo $row['title']; ?> </h3>
					
					
					<p align="justify">
					<?php
if(!empty($row['image'])){ ?>
<div class="xs-causes-images" style="margin-left:auto; margin-right:auto;">
					<img style="max-height:500px; width:50%;  margin-bottom:30px;" src="photo_gallery/<?php echo $row['image']; ?>" class="d-block" alt="">
				</div><!-- .xs-causes-images END -->
<?php }
	?>
					</p>
				</div>
			</div>
<?php	}
}else{
	echo "<h1>Sorry!...Program Not Found</h1>";
}
?>
		
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End causes list section -->

       </div>
<!--// Main Content //-->

<?php 
require('footer.php');
?>
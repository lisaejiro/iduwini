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
              <h1>Our Programs</h1>
              <p></p>
            </div>
            <div class="col-md-6">
              <ul class="kode-breadcrumb">
                <li><a href="index">Home</a></li>
                <li><a href="allprograms">Back</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="kode-content">
	

<!-- causes list section -->
<section class="kode-pagesection">
	<div class="container">
		<div class="row">
		<?php
$titled=$conn->real_escape_string($_GET['title']);
$program=$conn->query("select * from programmes where slug='".$titled."'");
if($program->num_rows==1){
	while($row=$program->fetch_assoc()){ ?>

			<div class="col-md-12">
				<div class="kode-team kode-team-grid">
					<h3 class="entry-sub-title" style="font-size:28px;"> <?php echo $row['title']; ?> </h3>
					<?php echo $row['details']; ?>
					
					<p align="justify">
					<?php
if(!empty($row['image'])){ ?>
<div class="xs-causes-images">
					<img style="max-height:400px; margin-bottom:30px;" src="program_images/<?php echo $row['image']; ?>" class="d-block" alt="">
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
<?php include("sponsor.php"); ?>

<?php 
include('footer.php');
?>
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
              <h1>Our Projects</h1>
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
$project=$conn->query("select * from projects where slug='".$titled."'");
if($project->num_rows==1){
	while($row=$project->fetch_assoc()){
		if(!empty($row['before_img']) || !empty($row['during_img'])){ ?>
	<div class="col-lg-5">
	<?php
if(!empty($row['before_img'])){ ?>
<div class="xs-causes-images" style="position:relative; margin-bottom:20px">
<span class="bobo"><?php echo $row['des1']; ?></span>
					<img src="project_images/<?php echo $row['before_img']; ?>" class="d-block" alt="">
				</div><!-- .xs-causes-images END -->
<?php }
	?>
				
				<?php
if(!empty($row['during_img'])){ ?>
<div class="xs-causes-images" style="position:relative; margin-bottom:40px">
<span class="bobo"><?php echo $row['des2']; ?></span>
					<img src="project_images/<?php echo $row['during_img']; ?>" class="d-block" alt="">
				</div><!-- .xs-causes-images END -->
<?php }
	?>
				
			</div>
		<?php } ?>
<?php
if(empty($row['before_img']) && empty($row['during_img'])){
	$card=12;
}else{
	$card=7;
}
?>

			<div class="col-lg-<?php echo $card; ?>">
				<div class="xs-fature-causes-deatils">
					<h3 style="font-size:30px;" class="entry-sub-title"> <?php echo $row['title']; ?> </h3>
					<?php echo $row['details']; ?>
					
					<p align="justify">
					<?php
if(!empty($row['after_img'])){ ?>
<div class="xs-causes-images" style="position:relative; margin-bottom:50px;">
<span class="bobo"><?php echo $row['des3']; ?></span>
					<img src="project_images/<?php echo $row['after_img']; ?>" class="d-block" alt="">
				</div><!-- .xs-causes-images END -->
<?php }
	?>
					</p>
				</div>
			</div>
<?php	}
}else{ 
	echo "<h1>Sorry!...Project Not Found</h1>";
}
?>
		
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End causes list section -->

<?php include("sponsor.php"); ?>
	
</div>

<?php
include('footer.php');
?>
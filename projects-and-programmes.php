<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="en">
<?php include("head.php"); ?>
	<body>
	<!--[if lt IE 10]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->


<!-- header section -->
<?php include("header.php"); ?>
<!-- End header section -->

<!-- welcome section -->
<!--breadcumb start here-->
<div class="kode-subheader subheader-height">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1>Projects and Programmes <br><span style="font-size:15px;">Some of our Projects and Programmes in Iduwini Cluster Development</span> </h1>
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
<!--breadcumb end here--><!-- End welcome section -->

<div class="kode-content">

<!--// Page Content //-->
<section class="kode-pagesection">
<div class="container">
		<div class="xs-heading row xs-mb-60">
			<div class="col-md-9 col-xl-9">
				<h2 class="xs-title">Projects</h2>
				<span class="xs-separetor dashed"></span>
				<p>Below are a few of our projects in the Cluster Community.Accordingly, successive Boards of the cluster particularly the immediate past Board made economic empowerment and rural infrastructure the thrust of its administration</p>
			</div><!-- .xs-heading-title END -->
			<div class="col-xl-3 col-md-3 xs-btn-wraper">
				<a href="allprojects" class="btn btn-primary bg-light-green">all projects</a>
			</div><!-- .xs-btn-wraper END -->
		</div><!-- .row end -->
		<div class="row xs-mb-50">
		<?php
$project=$conn->query("select * from projects order by id desc LIMIT 3");
if($project->num_rows>0){
	while($row=$project->fetch_assoc()){ ?>
<div class="col-lg-4 col-md-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
					<?php
if(!empty($row['after_img'])){ ?>
	<img src="project_images/<?php echo $row['after_img']; ?>" style="height:240px; width:100%" alt="">
<?php }elseif(!empty($row['during_img'])){ ?>
	<img src="project_images/<?php echo $row['during_img']; ?>" style="height:240px; width:100%" alt="">
<?php }elseif(!empty($row['before_img'])){ ?>
	<img src="project_images/<?php echo $row['before_img']; ?>" style="height:240px; width:100%" alt="">
<?php }else{ ?>
	<img src="" style="height:240px; width:100%" alt="Missing Image">
<?php }
					?>
					
					</div><!-- .xs-item-header END -->
					<div class="entry-header">
						<div class="entry-meta">
							<span class="date">
								<a href="project-details"  rel="bookmark" class="entry-date">
									<?php echo date("F j, Y",strtotime($row['created_at'])); ?>
								</a>
							</span>
						</div>
						
						<h4 class="entry-title">
							<a href="project-details?title=<?php echo $row['slug']; ?>"><?php echo substr(htmlspecialchars($row['title']),0,56)."..."; ?> </a>
						</h4>
					</div><!-- .xs-entry-header END -->
				</div><!-- .xs-from-journal END -->
			</div>
	<?php }
}
		?>
			
			
		</div><!-- .row end -->
	</div><!-- .container end -->

</section>
<!--// Page Content //-->













</div>
<!--// Main Content //-->
<section  class="kode-pagesection parallex-bg" style=" padding-top: 50px; padding-bottom: 10px; background: url(images/bg.png); background-size: cover; ">
	<div class="container">
		<div class="row">
			<div class="col-lg-6" style="color:white;">
				<div class="xs-service-slider-content">
					<h2 style="color:white;">Meeting Cluster communities Needs</h2>
					<div class="xs-service-grow row">
						<div class="col-md-12">
							<h3 style="color:white;">120,504 Poor Peoples Impacted in 2018 </h3>
						</div>
						<!-- <div class="col-md-5" >
							<h4 style="color:white;"></h4>
						</div> -->
					</div><!-- .xs-service-grow END -->
					<div class="row">
						<div class="col-md-6">
							<ul class="xs-unorder-list check" style="font-size:20px">
								<li>Pure Water Supply</li>
								<li>Educational Program</li>
							</ul><!-- .xs-unorder-list .check END -->
						</div>
						<div class="col-md-6">
							<ul class="xs-unorder-list check" style="font-size:20px">
								<li>Shelter</li>
								<li>Fund Collect</li>
							</ul><!-- .xs-unorder-list .check END -->
						</div>
					</div>
				</div><!-- .xs-service-slider-content END -->
			</div>
			<div class="col-lg-6">
			<div class="xs-single-item-slider owl-carousel">
			<?php
		$pics=$conn->query("select * from photos order by id desc limit 5");
		if($pics->num_rows>=1){
			while($row=$pics->fetch_assoc()){ ?>

<div class="xs-single-slider-item">
<img src="photo_gallery/<?php echo $row['image']; ?>" style='width:100%; height:200px;'>
</div>

			<?php }
		}
			?>
				</div>		
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- end service slider section -->

<section class="kode-pagesection" style="margin-top:40px;">
	<div class="container">
		<div class="xs-heading row xs-mb-60">
			<div class="col-md-9 col-xl-9">
				<h2 class="xs-title">Programmes</h2>
				<span class="xs-separetor dashed"></span>
				<p>Below are a few of our projects in the Cluster Community.Accordingly, successive Boards of the cluster particularly the immediate past Board made economic empowerment and rural infrastructure the thrust of its administration.</p>
			</div><!-- .xs-heading-title END -->
			<div class="col-xl-3 col-md-3 xs-btn-wraper">
				<a href="allprograms" class="btn btn-primary bg-light-green">all programs</a>
			</div><!-- .xs-btn-wraper END -->
		</div><!-- .row end -->
		<div class="row xs-mb-50">
		
		<?php
$program=$conn->query("select * from programmes order by id desc LIMIT 3");
if($program->num_rows>0){
	while($row=$program->fetch_assoc()){ ?>
<div class="col-lg-4 col-md-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
	<img src="program_images/<?php echo $row['image']; ?>" style="height:240px; width:100%" alt="">
					
					</div><!-- .xs-item-header END -->
					<div class="entry-header">
						<div class="entry-meta">
							<span class="date">
								<a href="program-details"  rel="bookmark" class="entry-date">
									<?php echo date("F j, Y",strtotime($row['created_at'])); ?>
								</a>
							</span>
						</div>
						
						<h4 class="entry-title">
							<a href="program-details?title=<?php echo $row['slug']; ?>"><?php echo substr(htmlspecialchars($row['title']),0,56)."..."; ?> </a>
						</h4>
					</div><!-- .xs-entry-header END -->
				</div><!-- .xs-from-journal END -->
			</div>
	<?php }
}
		?>	
			
		</div><!-- .row end -->
	</div><!-- .container end -->
</section><!-- End journal section -->	
	

<!-- footer section start -->
<?php include("footer.php"); ?>
<!--end footer -->	

	</body>

</html>
<!-- footer section end -->
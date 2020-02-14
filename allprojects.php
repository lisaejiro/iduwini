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
              <h1>All Projects <br><span style="font-size:15px;">All of our Projects in the Iduwini Cluster Development</span> </h1>
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
  <div class="row xs-mb-50">
		<?php
$per_page=9;
$count_all=$conn->query("select count(*) from projects");
while($row=$count_all->fetch_array()){
$count_val=$row[0];
}
$pages=ceil($count_val/$per_page);
$start=(($_GET['page'])-1)*$per_page;
$project=$conn->query("select * from projects order by id DESC LIMIT $per_page OFFSET $start");
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
        <ul class="pagination justify-content-center xs-pagination">
	  <?php 
	  if($count_val>$per_page) {
	  for($icount=1;$icount<=$pages;$icount++) { ?>
	<li class="page-item"><a class="page-link" href="allprojects?page=<?php echo $icount; ?>"><?php echo $icount; ?></a></li>
      <?php } } ?>
</ul>	
	</div>
  </div>
</section>
<!--// Page Content //-->

</div>
<!--// Main Content //-->

<?php
require('footer.php');
?>
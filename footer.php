<footer id="footer-widget">
        <div class="container-fluid">
          <div class="row">
            <!--// TextWidget //-->
            <div class="col-md-3 widget widget-text">
              <div class="inner-element">
              <a href="index" class="footer-logo"><img src="images/Idu_logo.png" alt=""></a>
                <!-- <a href="#" class="footer-logo"><img src="images/footer-logo.png" alt=""></a> -->
                <p><?php echo substr(remove_tags($about),0,203); ?> .</p>
                <ul>
                  <li><i class="fa fa-phone"></i> <span><?php echo $phone; ?></span></li>
                  <!-- <li><i class="fa fa-fax"></i> <span>0050.550.332.125.534</span></li> -->
                  <li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                  <li><i class="fa fa-home"></i> <span><?php echo $address; ?></span></li>
                </ul>
              </div>
            </div>
            <!--// TextWidget //-->

            <div class="col-md-9">
              
              <div class="widget-section">
                <!--// Widget RecentPost //-->
                <div class="col-md-4 widget widget-recentpost">
                  <div class="kode-widget-title"> <h2>Recent News/Event</h2> </div>
                  <ul>
                  <?php
$queryn=$conn->query("select * from news order by id desc LIMIT 2");
if($queryn->num_rows>0){
	while($row=$queryn->fetch_assoc()){
		?>
	<li>
								<div class="posts-thumb float-left"> 
									<a href="allnews">
										<img style="height:70px;width:80px;" alt="News" class="img-responsive" src="news_images/<?php echo $row['image']; ?>">
										<div class="xs-entry-date">
											<span class="entry-date d-block"><?php echo read_able2($row['created_at']); ?></span>
										</div>
										<div class="xs-black-overlay bg-red"></div>
									</a>
								</div><!-- .posts-thumb END -->
								<div class="post-info">
									<h4 class="entry-title">
										<a style="font-size:12px;" title="<?php echo htmlspecialchars($row['title']); ?>" href="news-details?title=<?php echo $row['slug']; ?>"><?php echo substr(htmlspecialchars($row['title']),0,20)."..."; ?></a>
									</h4>
									<div class="post-meta">
										<span class="comments-link">
										</span><!-- .comments-link -->
									</div>
								</div><!-- .post-info END -->
								<div class="clearfix"></div>
							</li><!-- 1st post end-->
	<?php }

}else{
	echo "<p>Unvailable yet</p>";
}

	?>
                  </ul>
                </div>
                <!--// Widget RecentPost //-->

                <!--// Widget Gallery //-->
                <div class="col-md-4 widget widget-gallery">
                  <div class="kode-widget-title"> <h2>Gallery Post</h2> </div>
                  <ul>
                  <?php
    $per_page=12;
$count_all=$conn->query("select count(*) from photos");
while($row=$count_all->fetch_array()){
$count_val=$row[0];
}
$pages=ceil($count_val/$per_page);
$start=(($_GET['page'])-1)*$per_page;
$image=$conn->query("select * from photos order by id DESC LIMIT $per_page OFFSET $start");
if($image->num_rows>0){
while($row=$image->fetch_assoc()){ ?>
                    <li><a href="gallery"><img src="photo_gallery/<?php echo $row['image']; ?>" alt="" style="height:80px;"></a></li>
                    <?php }
}else{
    echo "<h1>No Images in Gallery</h1>";
}
?>
                  </ul>
                </div>
                <!--// Widget Gallery //-->

                <!--// Widget Gallery //-->
                <div class="col-md-4 widget widget_categories">
                  <div class="kode-widget-title"> <h2>Link</h2> </div>
                  <ul>
                  <li><a href="overview">Overview</a></li>
						<li><a href="management">Management</a></li>
						<li><a href="communities">Communities</a></li>
						<li><a href="projects-and-programmes">Projects &amp; Programmes</a></li>
						<li><a href="gallery">Gallery</a></li>
						<li><a href="allnews">News</a></li>
						<li><a href="contact">Contact</a></li>
                  </ul>
                </div>
                <!--// Widget Gallery //-->
                
                

              </div>

            </div>
          </div>
        </div>
        
      </footer>

      <div class="bottom-footer thbg-color">
        <div class="container">
          <div class="row">
            <div class="col-md-12 kode-copyright"><p>Designed by <a href="https://www.luzoma.com">Luzoma Microsystems.</a> - &copy; <?php echo date('Y'); ?> <?php echo $name; ?></p></div>
            
          </div>
        </div>
      </div>

    </div>
    <!--// Wrapper //-->

    <!-- jQuery (necessary for JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/bootstrap-progressbar.js"></script>
    <script src="js/waypoints-min.js"></script>
    <script src="js/functions.js"></script>
    <script src="assets/js/main.js"></script>
		<?php
if(isset($_SESSION['msg'])){ ?>
  <script> toastr.info("<?php echo $_SESSION['msg']; ?>"); </script>
  <?php
  unset($_SESSION['msg']);
   }
if(isset($_SESSION['tap'])){
  unset($_SESSION['tap']);
}
  ?>
  <?php
if(isset($_SESSION['msg2'])){ ?>
  <script> toastr.error("<?php echo $_SESSION['msg2']; ?>"); </script>
  <?php
unset($_SESSION['msg2']);  
}

  ?>

  </body>

<!-- Mirrored from kodeforest.com/html/umeed/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2019 13:38:40 GMT -->
</html>
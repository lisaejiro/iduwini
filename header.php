
<?php
require("config.php");
require("last_seen.php");
$querys=$conn->query("select * from site where id=1");
while($row=$querys->fetch_assoc()){
	$email=remove_tags($row['email']);
	$facebook=remove_tags($row['facebook']);
	$twitter=remove_tags($row['twitter']);
	$instagram=remove_tags($row['instagram']);
	$youtube=remove_tags($row['youtube']);
	$address=remove_tags($row['address']);
	$name=remove_tags($row['name']);
	$phone=remove_tags($row['phone']);
	$about=remove_tags($row['about']);
	$mainabout=$row['about'];
	$overview=$row['overview'];
	$communities=$row['policy'];
}
$_GET['page']=(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$rand=date('his');
include("class.upload.php");
include("Slugify.php");
$slug=new Slugify();
?>




<header id="mainheader" class="kode-header-absolute">

        <!--// Kode TopBaar //-->
        <div class="kode-topbar">
          <div class="container">
            <div class="row">
              <div class="col-md-5"><span class="kode-barinfo"><i class="fa fa-phone"></i> <?php echo $phone; ?></span></div>
              <div class="col-md-7">
                <a href="mailto:<?php echo $email; ?>" class="kode-email"><i class="fa fa-envelope"></i> <?php echo $email; ?></a>
                <ul class="kode-team-network">
                  <li><a href="<?php echo $facebook; ?>" class="thbg-colorhover fa fa-facebook"></a></li>
                  <li><a href="<?php echo $twitter; ?>" class="thbg-colorhover fa fa-twitter"></a></li>
                  <li><a href="<?php echo $youtube; ?>" class="thbg-colorhover fa fa-youtube"></a></li>
                  <li><a href="<?php echo $instagram; ?>" class="thbg-colorhover fa fa-instagram"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--// Kode TopBaar //-->
        <div class="clearfix"></div>

        <!--// Kode HeaderBaar //-->
        <div class="container">
          <div class="kode-headbar">
            <div class="row">
              <div class="col-md-3"><a href="index" class="logo"><img src="images/Idu_logo.png" alt=""></a></div>
              <div class="col-md-9">

                <div class="kode-rightsection">
                  <nav class="navbar navbar-default">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="index">Home</a></li>
<!-- 
                        <li><a href="#">Pages</a>
                          <ul class="children">
                            <li><a href="about-us.html">about us</a></li>
                            <li><a href="#">Gallery</a>
                              <ul class="children">
                                <li><a href="gallery-two.html">Gallery 2Column</a></li>
                                <li><a href="gallery-three.html">Gallery 3Column</a></li>
                                <li><a href="gallery-four.html">Gallery 4Column</a></li>
                              </ul>
                            </li>
                            <li><a href="404.html">404 PAge</a></li>
                            <li><a href="underconstruction.html">Under construction</a></li>
                            <li><a href="donations.html">donation Page</a></li>
                          </ul>
                        </li> -->
                        <li><a href="#">About Us</a>
                          <ul class="children">
                          <ul class="nav-dropdown">
								<li><a href="overview">Overview</a></li>
								<li><a href="management">Management</a></li>
								<li><a href="communities">Communities</a></li>
							</ul>
                          </ul>
                        </li>
                        <li><a href="#">Projects &amp; Programmes</a>
                          <ul class="children">
                          <li><a href="allprojects">Projects</a></li>
                <li><a href="allprograms">Programmes</a></li>
                <li><a href="process">Implementation</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Gallery</a>
                          <ul class="children">
                          <li><a href="gallery"> Photo Gallery</a></li>
								<li><a href="videos">Video Gallery</a></li>
                          </ul>
                        </li>
                        
                       
                        <li><a href="allnews">News</a></li>
                        <li><a href="contact">Contact</a></li>
                      </ul>
                    </div>
                  </nav>
                  <!-- <a href="#" class="kode-donate-btn thbg-color">Donate</a> -->
                </div>

              </div>
            </div>
          </div>
        </div>
        <!--// Kode HeaderBaar //-->

      </header>
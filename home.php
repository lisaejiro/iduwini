
<?php
session_start();
 if (isset($_GET["submit"]) && !empty(isset($_GET["submit"]))){
  $email=$_GET['email'];
  $_SESSION ['email']=$email;
  header( "location:newsletter.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  
<?php
include("head.php"); ?>

  <body>
    
    <!--// Wrapper //-->
    <div class="kode-wrapper">

    <?php 
   include("header.php"); ?>


      <!--// Main Banner //-->
      <div id="mainbanner">
        <div class="flexslider">
          <ul class="slides">

          <li>
              <img src="photos/slidebanner1.png" alt="" style="height:565px; width:100%;"  />
              <div class="container">
                <div class="kode-caption">
                  <h2>Rural Communities Empowerment</h2>
                  <h1>Infrastructure <strong class="thcolor">Development</strong></h1>
                  <span class="thbg-color"><a href="overview"  >
							Learn More
						</a></span>
                </div>
              </div>
            </li>
         
            <li>
              <img src="photos/slide11.png" alt="" style="height:565px; width:100%;" />
              <div class="container">
                <div class="kode-caption">
                  <h2>Women and youth empowerment</h2>
                  <h1>Skills Acquisition <strong class="thcolor"> Programmes</strong></h1>
                  <span class="thbg-color"><a href="overview"  >
							Learn More
						</a></span>
                </div>
              </div>
            </li>
            <li>
              <img src="photos/banner3.png" alt="" style="height:565px; width:100%;"  />
              <div class="container">
                <div class="kode-caption">
                  <h2>social investment projects and programs</h2>
                  <h1>Rural Projects <strong class="thcolor">&amp; Programmes</strong></h1>
                  <span class="thbg-color"><a href="overview" >
							Learn More
						</a></span>
                </div>
              </div>
            </li>
			      <!-- <li>
              <img src="extra-images/banner-4.jpg" alt="" />
              <div class="container">
                <div class="kode-caption">
                  <h2>Irreplaceable experience now</h2>
                  <h1>HomeLess <strong class="thcolor">Child</strong></h1>
                  <span class="thbg-color">Helping Children to bring back to home</span>
                </div>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
      <!--// Main Banner //-->

      <!--// Main Content //-->
      <div class="kode-content">

        <!--// Page Content //-->
        <section class="kode-pagesection" style=" padding-top: 50px; padding-bottom: 50px; margin-top: -35px; background: url(extra-images/action-bg.png); background-color: #f37936; ">
          <div class="container">
            <div class="row">
              
              <div class="kode-main-action">
                <span>Meeting Cluster communities Needs <strong>120,504</strong> Poor Peoples <strong>Impacted </strong> in 2018</span>
                <!-- <a href="#"><i class="fa fa-sign-in"></i> Jonr Our Campaign</a> -->
              </div>
              
            </div>
          </div>
        </section>
        <!--// Page Content //-->
        <section class="kode-pagesection parallex-bg" style=" background: url(photos/banner.png); padding-top: 50px; padding-bottom: 50px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="kode-maintitle kode-white-title">
                  <h3>Who We Are</h3>
                  <div class="kode-maindivider"><span></span></div>
                </div>
              </div>

              <div class="col-md-6">
              <?php
$clip=$conn->query("select * from videos order by id desc limit 1");
if($clip->num_rows!=0){

    while($row=$clip->fetch_assoc()){ 
      $vurl = $row['url'];
preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
$id = $matches[1];
$width = '100%';
$height = '300px';
      ?>
    <iframe id="ytplayer" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    <?php }
}else{?>
     <h3 style="color:white;"> Video will be available shortly.</h3>
     <?php
}
					?>
              
                </div>
              <div class="col-md-6 kode-about-user" style="color:#efefef;">
                <p style="color:#efefef;">
                Welcome to IDUWINI Cluster Development Board.
                Iduwini Cluster as presently constituted, is made up of six Iduwini clan communities, including Amatu-1, Amatu-2, Bisangbene, Aghoro-1, Aghoro-2, and Letugbene. These are all Ijaw communities in Iduwini Kingdom in Ekeremor Local Government Area of Bayelsa State, Nigeria.These communities are accessible only by air and water.It takes within two hours and 3 and half hours to move from any of these communities to the nearest city, Warri or Bomadi, all in Delta State, and another 2 hours to the capital city, Yenagoa.
              </p>
                
              </div>
              
            </div>
          </div>
        </section>

        <section class="kode-pagesection" style=" padding-top: 50px; padding-bottom: 50px; margin-top: -35px; background: url(extra-images/action-bg.png); background-color: #f37936; ">
          <div class="container">
            <div class="row">
              
              <div class="kode-main-action" align="center" style="clear:both;text-align:center;">
                <span style="float:none">We’ve  <strong>funded over 1,000</strong> community projects and programmes</span>
                <!-- <a href="#"><i classa fa-sign-in"></i> Jonr Our Campaign</a> -->
              </div>
              <div class="kode-main-action" style="margin-top:20px;" >
                <span style="font-size:20px;text-align:center; text-transform:capitalize; float:none;">The high level of poverty across the communities and the rising wave of social vices demands urgent action to stem the trend. Accordingly, successive Boards of the cluster particularly the immediate past Board made economic empowerment and rural infrastructure the thrust of its administration. </span>
                <!-- <a href="#"><i class="fa fa-sign-in"></i> Jonr Our Campaign</a> -->
              </div>
              
            </div>
          </div>
        </section>
        <!--// Page Content //-->
  <section class="kode-pagesection parallex-bg" style=" background: url(photos/banner.png); padding-top: 50px; padding-bottom: 50px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="kode-maintitle kode-white-title">
                  <h3>The Environment</h3>
                  <div class="kode-maindivider"><span></span></div>
                </div>
              </div>
              <div class="col-md-12 kode-about-user" style="color:#efefef;">
                <p style="color:#efefef;">
                Iduwini Cluster communities are all located in the far-swamp mangrove area of the Niger Delta of Nigeria, andgenerally swampy whilst siltation in the rivers/creeks mainly from the Atlantic Ocean.The housing patterns in the community, include bamboo/raffia,wood/block with thatched/zinc or asbestos or aluminum roofs. There is also steady depletion of animals and plants species, and occasional oil spillageprincipally attributed to oil exploration activities. The community has bimodal or double maxima rainfall pattern spreading through late march or early November, that is about eight months of annual rainfall with the “August break”. The mean annual rainfall ranges between 2000 and 2500mm. The dry season begins mid-November to early March.</p>             
              </div>              
            </div>
          </div>
        </section>
        <!--// Page Content //-->
        <section class="kode-pagesection" style=" padding-top: 42px; padding-bottom: 0px; background: #efefef; margin-bottom:50px; ">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12" >
                <div class="kode-maintitle">
                  <!-- <h2>Irreplaceable experience now</h2> -->
                  <h3>Our <span class="thcolor">Gallery</span></h3>
                  <div class="kode-maindivider"><span></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="kode-gallery kode-gutter-gallery">
                  <ul class="row">
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

                    <li class="col-md-3">
                      <figure>
                        <a href="gallery" class="gallery-thumb"><img src="photo_gallery/<?php echo $row['image']; ?>" alt="" style="height:220px;"></a>
                        <figcaption>
                          <div class="gallery-link">
                            <a href="gallery"><i class="fa fa-photo"></i></a>
                          </div>
                          <div class="gallery-info">
                            <h3><a href="gallery"><?php echo $row['title']; ?></a></h3>
                            <!-- <span>Fundraising</span> -->
                          </div>
                        </figcaption>
                      </figure>
                    </li>
                    <?php }
}else{
    echo "<h1>No Images in Gallery</h1>";
}
?>
                    
                  </ul>
                </div>
              </div>
              
            </div>
          </div>
        </section>
        <!--// Page Content //-->

        <!--// Page Content //-->
       
        <!--// Page Content //-->
        <?php
require('sponsor.php');
?>
        <!--// Page Content //-->

        <!--// Page Content //-->
        <!-- <section style=" padding-top: 10px; padding-bottom: 10px; " class="kode-pagesection">
          <div class="container">
            <div class="row">
              
              <div class="col-md-12">
                <div class="kode-maintitle">
                
                  <h3>Contact <span class="thcolor"> US</span></h3>
                  <div class="kode-maindivider"><span></span></div>
                </div>

                <div id="koderespond">
                  <form action="postmail" method="POST" class="comments-form" id="contactform">
                    <p><i class="fa fa-users"></i> <input type="text" id="name" name="name"  placeholder="Name *"></p>
                    <p><i class="fa fa-envelope"></i> <input type="text" id="email" name="email" placeholder="Email *"></p>
					
                    <p class="kd-textarea"><i class="fa fa-comments-o"></i> <textarea name="message" id="message" placeholder="Message:"></textarea></p>
					
				
                    <p>Verify that you're a human being <i style="font-weight:600; color:#f00"><?php echo $rand; ?></i></p>
                    <input type="hidden" name="spam1" value="<?php echo $rand; ?>">
					<p><i class="fa fa-lock"></i><input class="verify" type="text" id="verify" name="spam2" /></p>
                    <p class="kd-button"> <input type="submit" value="Submit Now"></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section> -->

      <!-- </div> -->
      <!--// Main Content //-->
       
        <!--// Page Content //-->
        <section class="kode-pagesection parallex-bg" style=" padding-top: 50px; padding-bottom: 10px; background: url(images/bg.png); background-size: cover; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="kode-maintitle kode-white-title">
               
                  <h3>Our <span class="thcolor">Projects</span></h3>
                  <div class="kode-maindivider"><span></span></div>
                </div>
              </div>

              <div class="col-md-12" >
                <div class="kode-shop-list">
                <div class="row">
<?php
$querynm=$conn->query("select * from projects order by id desc limit 4");
if($querynm->num_rows>0){
	while($row=$querynm->fetch_assoc()){ ?>
	<div class="col-lg-6 row xs-single-event event-green" style="margin-bottom:20px;">
				<div class="col-md-6">
					<div class="xs-event-image">
					<?php
if(!empty($row['after_img'])){ ?>
	<a title="<?php echo htmlspecialchars($row['title']); ?>" href="project-details?title=<?php echo $row['slug']; ?>"><img src="project_images/<?php echo $row['after_img']; ?>" style="height:200px; width:100%" class="img-thumbnail" alt=""> </a>
<?php }elseif(!empty($row['during_img'])){ ?>
	<img src="project_images/<?php echo $row['during_img']; ?>" style="height:200px; width:100%" class="img-thumbnail" alt="">
<?php }elseif(!empty($row['before_img'])){ ?>
	<img src="project_images/<?php echo $row['before_img']; ?>" style="height:200px; width:100%" class="img-thumbnail" alt="">
<?php }else{ ?>
	<img src="" style="height:240px;width:100%" class="img-thumbnail" alt="Missing Image">
<?php }
					?>
					</div><!-- .xs-event-image END -->
				</div>
				<div class="col-md-6">
					<div class="xs-event-content">
					<a title="<?php echo htmlspecialchars($row['title']); ?>" href="project-details?title=<?php echo $row['slug']; ?>" style="color:white;font-size:20px;"><?php echo substr(htmlspecialchars($row['title']),0,56)."..."; ?> </a>
						
					</div><!-- .xs-event-content END -->
				</div>
			</div><!-- .xs-single-event END -->
	<?php }
}else{
	echo "<h3>No Projects Available Yet.</h3>";
}
?>

		
		



		</div>
                 
                </div>
              </div>
              
            </div>
          </div>
        </section>
       <!-- page content  -->
       <section class="kode-pagesection" style=" padding-top: 50px; padding-bottom: 60px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="kode-maintitle">
                  <!-- <h2>Irreplaceable experience now</h2> -->
                  <h3>Latest <span class="thcolor">Programs</span></h3>
                  <div class="kode-maindivider"><span></span></div>
                  <div class="clearfix"></div>
                  <p>Below are a few of our latest programs in the Cluster Community.Accordingly, successive Boards of the cluster particularly the immediate past Board made economic empowerment and rural infrastructure the thrust of its administration.</p>
                </div>
              </div>

                <div class="kode-blog-list kode-box-blog">
                  <ul class="row">
                  <?php
$program=$conn->query("select * from programmes order by id desc LIMIT 3");
if($program->num_rows>0){
	while($row=$program->fetch_assoc()){ ?>
                    <li class="col-md-4">
                      <figure><a href="program-details?title=<?php echo $row['slug']; ?>"><img src="program_images/<?php echo $row['image']; ?>" alt="" style="height:250px;"></a></figure>
                      <div class="box-info">
                        <a href="program-details?title=<?php echo $row['slug']; ?>" class="fa fa-film box-icon"></a>
                        <div class="clearfix"></div>
                        <h5><a href="program-details?title=<?php echo $row['slug']; ?>"><?php echo substr(htmlspecialchars($row['title']),0,56)."..."; ?></a></h5>
                        <div class="kode-blog-post">
                          <ul>
                            <li><i class="fa fa-calendar"></i><?php echo date("F j, Y",strtotime($row['created_at'])); ?></li>
                            <!-- <li><i class="fa fa-comments-o"></i> <a href="#">No Comments</a></li> -->
                          </ul>
                        </div>
                        <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p> -->
                      </div>
                    </li>
                    <?php }
	
}else{
	echo "<h3>No Programmes available yet.</h3>";
}

		?>	
                    
                    
                  </ul>
                </div>
              
            </div>
          </div>
        </section>
        

        <!--// Page Content //-->
       
        <!--// Page Content //-->
        <section class="kode-pagesection parallex-bg" style=" background: url(photos/banner.png); padding-top: 50px; padding-bottom: 50px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="kode-maintitle kode-white-title">
                  <h3>Development Of The Cluster</h3>
                  <div class="kode-maindivider"><span></span></div>
                </div>
              </div>
              <div class="col-md-12 kode-about-user" style="color:#efefef;">
                <p style="color:#efefef;">
                As can be imagined, the location of the communities and general state of development in the Niger Delta region of Nigeria naturally imposed serious development and livelihood challenges; most of which are beyond the capacities of the communities to address.  The inauguration of the Iduwini Cluster in 2007 through the SPDC GMoU framework has brought some respite as immediate and pressing development challenges are attended to through the annual donations by SPDC to the cluster communities. As a board, we have continued to deploy resources in the areas of environment protection, human capital development, provision of micro social amenities as well as women and youths’ empowerment through the opportunity provided by SPDC via the GMoU framework.  This notwithstanding, the cluster communities still require and will welcome intervention supports from relevant government interventionist agencies and donor organizations to tackle the numerous development challenges facing the communities. 
</p>             
              </div>              
            </div>
          </div>
        </section>
        <section class="kode-pagesection" style=" padding-top: 50px; padding-bottom: 50px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12 kode-newslatter">
                
                <div class="newslatter-wrap">
                  <div class="newslatter-info">
                    <h2>Subscribe to our Newsletter</h2>
                    <span>All Our Latest Content Delivered to your inbox</span>
                  </div>
                  <form action="home.php" method="GET">
                    <input type="text" name="email" placeholder="Your Email Address" >
                    <input type="submit"  name="submit" class="thbg-color" value="Subcribe Now">
                  </form>
                </div>

              </div>
              
            </div>
          </div>
        </section>
      </div>
      <!--// Main Content //-->

      <?php include("footer.php"); ?>
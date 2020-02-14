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
              <h1>All News/Events </h1>
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
    <div class="row">

      <div class="col-md-12">
        <div class="kode-blog-list kode-grid-blog">
          <ul class="row">
          <?php
$per_page=9;
$count_all=$conn->query("select count(*) from news");
while($row=$count_all->fetch_array()){
$count_val=$row[0];
}
$pages=ceil($count_val/$per_page);
$start=(($_GET['page'])-1)*$per_page;
$news=$conn->query("select * from news order by id DESC LIMIT $per_page OFFSET $start");
if($news->num_rows>0){
	while($row=$news->fetch_assoc()){ ?>
            <li class="col-md-4">
              <figure><a href="news-details?title=<?php echo $row['slug']; ?>"><img src="news_images/<?php echo $row['image']; ?>" alt="" style="height:240px; width:100%"></a>
                <figcaption>
                  <time datetime="2008-02-14 20:00"> <i class="fa fa-photo"></i> </time>
                </figcaption>
              </figure>
              <div class="kode-blog-info">
                <h3><a href="news-details?title=<?php echo $row['slug']; ?>"><?php echo substr(htmlspecialchars($row['title']),0,56)."..."; ?> </a></h3>
               
               
                <div class="blog-timeinfo">
                  <time ><i class="fa fa-clock-o"></i> <?php echo date("F j, Y",strtotime($row['created_at'])); ?></time>
                  <a href="news-details?title=<?php echo $row['slug']; ?>" class="blogmore-btn thcolor th-bordercolor thbg-colorhover">Read More</a>
                </div>
              </div>
            </li>
            <?php }
}
		?>
           
          </ul>
        </div>
        <div class="pagination">
        <?php 
        if($count_val>$per_page) {
        for($icount=1;$icount<=$pages;$icount++) { ?>
          <a href="allprograms?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
          
          <?php }} ?>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!--// Page Content //-->

</div>
<!--// Main Content //-->

<?php 
require('footer.php');
?>
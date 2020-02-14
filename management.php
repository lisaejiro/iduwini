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
              <h1>Our Management Board </h1>
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
                <div class="kode-team kode-team-grid">
                  <ul class="row">
                  <?php
$mm=$conn->query("select * from board");
while($row=$mm->fetch_assoc()){ ?>
                    <li class="col-md-4">
                      <div class="team-inner" style="min-height:450px;">
                        <figure><a href="#"><img src="board_images/<?php echo $row['image']; ?>" alt="" style="height:300px"></a>
                          
                        </figure>
                        <div class="kode-teaminfo">
                          <h2><a href="#"><?php echo $row['name']; ?></a></h2>
                          <span><?php echo $row['position']; ?></span>
                        </div>
                      </div>
                    </li>
                    <?php }
		?>
                  </ul>
                </div>
                <!-- <?php
    $pm=$conn->query("select * from past_staff limit 5");
    if($pm->num_rows>=1){ ?>
                <div class="row">
                <div class="col-md-12">
                <table class="table table-striped nomargin table-bordered">
                <tr>
                <th width="100%" colspan="4">IMMEDIATE PAST BOARD MEMBERS</th>
                </tr>
                <tr>
                <th width="25%">Name</th>
                <th width="25%">Position</th>
                <th width="25%">Email</th>
                <th width="25%">Phone Number</th>
                </tr>
                <?php 
while($row=$pm->fetch_assoc()){ ?>
 <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                </tr>
<?php }
                ?>
               <tr>
							 <td colspan="4"><h5 class="text-right"><a href="past_members">See More</h5></a></td>
							 </tr>
                </table>
                </div>
                </div>
   <?php }
    ?> -->

<?php
    $cm=$conn->query("select * from current_staff limit 5");
    if($cm->num_rows>=1){ ?>
                <div class="row">
                <div class="col-md-12">
                <table class="table table-striped nomargin table-bordered">
                <tr>
                <th width="100%" colspan="4"> BOARD MEMBERS</th>
                </tr>
                <tr>
                <th width="25%">Name</th>
                <th width="25%">Position</th>
                <th width="25%">Email</th>
                <th width="25%">Phone Number</th>
                </tr>
                <?php 
while($row=$cm->fetch_assoc()){ ?>
 <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                </tr>
<?php }
                ?>
               <tr>
							 <td colspan="4"><h5 class="text-right"><a href="current_members">See More</h5></a></td>
							 </tr>
                </table>
                </div>
                </div>
   <?php }
    ?>
            </div>
          </div>
        </section>
        <!--// Page Content //-->
      
	
      </div>
      <!--// Main Content //-->

      <?php
include('footer.php')
      ?>
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
              <h1>Management  </h1>
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
                    <?php
    $pm=$conn->query("select * from current_staff");
    if($pm->num_rows>=1){ ?>
                <div class="row">
                <div class="col-md-12">
                <table class="table table-striped nomargin table-bordered">
                <tr>
                <th width="100%" colspan="4">CURRENT BOARD MEMBERS</th>
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
                </table>
                </div>
                </div>
   <?php }
    ?>
                    
				</div>
			</div>
		</div>
	</div>
</section>
<div style="margin-top:40px;"></div>
<div style="margin-top:40px;"> >
    <?php include("sponsor.php"); ?>
    </div>
</section>
</div>
<?php include("footer.php"); ?>
</body>
</html>

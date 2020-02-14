   <!-- Sidebar -->
    <ul class="sidebar navbar-nav" style="min-height:695px;">
    <div style="margin-top:70px;">
      <li class="nav-item">
        <a class="nav-link" href="index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li> 
      <?php
if(detail('privilege')=="admin" || in_array('site',explode(',',detail('ability')))){ ?>
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="sitesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class="fas fa-cog"></i> <span>Site Settings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="sitesDropdown">
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#about">about-us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#contact">contact-us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#social">media-handles</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#policy">communities</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#overview">overview</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" style="cursor:pointer;" data-target="#board">Board Images</a>
        </div>
      </li> 
<?php }
      ?>
        <?php
if(detail('privilege')=="admin" || in_array('site',explode(',',detail('ability')))){ ?>
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="sitesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class="fas fa-users"></i> <span>Board Members</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="sitesDropdown">
          <a class="dropdown-item" href="past_members">Past Members</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="current_members">Current Members</a>
        </div>
      </li> 
<?php }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="projects">Manage Projects</i></a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="programs">Manage Programmes</i></a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="accounts">Manage Accounts <i class="fa fa-address-book"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news">Manage News/Events <i class="fas fa-circle-notch"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsletter">Manage NewsLetter <i class="fa fa-project-diagram"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="photos">Manage Photos  <i class="fa fa-user"></i></a>
      </li>

     

      <li class="nav-item">
        <a class="nav-link" href="videos">Manage Videos <i class="fa fa-tag"></i></a>
      </li>
      <li class="nav-item" style="cursor:pointer;">
        <a class="nav-link" data-toggle="modal" data-target="#password">Change Password <i class="fa fa-key"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" style="cursor:pointer;" data-toggle="modal" data-target="#logout">Logout <i class="fa fa-stopwatch"></i></a>
        </li>
        </div>
    </ul>


    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="password_change" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Change Password</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <div class="form-group required-field">
                                        <label>Enter Old Password </label>
                                        <input type="hidden" name="pid" value="<?php echo  detail('password'); ?>">
                                        <input type="password" name="oldpassword" class="form-control form-control-sm" required>
                                    </div>
                                   <div class="form-group required-field">
                                   <label>Enter New Password </label>
                                       <input type="hidden" name="id" value="<?php echo  detail('id'); ?>" class="form-control form-control-sm" required>
                                        <input type="password" name="password1" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Retype New Password </label>
                                        <input type="password" name="password2" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
<?php
$query_f=$conn->query("select * from site where id=1");
if($query_f->num_rows>0){
  while($row=$query_f->fetch_assoc()){ ?>
  <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:800px;">
            <div class="modal-content">
                <form action="site_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Site Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                       <textarea id="ckeditora" required class="form-control" name="about" cols="30" rows="5"><?php echo $row['about']; ?></textarea>

                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="about_log" class="btn btn-primary btn-sm">Update About</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:700px;">
            <div class="modal-content">
                <form action="site_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Site Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <div class="form-group required-field">
                               <label>Website Name</label>
                                   <input type="text" name="name" value="<?php echo $row['name']; ?>" required class="form-control form-control-sm">
                                    </div>
                             <div class="form-group required-field">
                               <label>Phone Number</label>
                                   <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group required-field">
                               <label>Email Address</label>
                                   <input type="email" name="email" value="<?php echo $row['email']; ?>" required class="form-control form-control-sm">
                                    </div>
                                   <div class="form-group required-field">
                                     <label>Address</label>
                                       <textarea id="ckeditord" class="form-control" required name="address" cols="30" rows="5"><?php echo $row['address']; ?></textarea>
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="contact_log" class="btn btn-primary btn-sm">Update Contact</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="modal fade" id="social" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:450px;">
            <div class="modal-content">
                <form action="site_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Site Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <div class="form-group required-field">
                               <label>Facebook</label>
                                   <input type="text" name="facebook" value="<?php echo $row['facebook']; ?>" required class="form-control form-control-sm">     </div>
                             <div class="form-group required-field">
                               <label>Twitter</label>
                                   <input type="text" name="twitter" value="<?php echo $row['twitter']; ?>" required class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group required-field">
                               <label>Instagram</label>
                                   <input type="text" name="instagram" value="<?php echo $row['instagram']; ?>" required class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group required-field">
                               <label>Youtube</label>
                                   <input type="text" name="youtube" value="<?php echo $row['youtube']; ?>" required class="form-control form-control-sm">
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="social_log" class="btn btn-primary btn-sm">Update Handles</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="modal fade" id="policy" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:700px;">
            <div class="modal-content">
                <form action="site_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Site Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <div class="form-group required-field">
                                     <label>Update Community</label>
                                       <textarea id="ckeditorp" class="form-control" required name="policy" cols="30" rows="5"><?php echo $row['policy']; ?></textarea>
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="policy_log" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="modal fade" id="overview" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:700px;">
            <div class="modal-content">
                <form action="site_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Site Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <div class="form-group required-field">
                                     <label>Update Overview</label>
                                       <textarea id="ckeditoro" class="form-control" required name="overview" cols="30" rows="5"><?php echo $row['overview']; ?></textarea>
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="overview_log" class="btn btn-primary btn-sm">Update Overview</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
  
  <?php }
}
?>
<?php
$bo1=$conn->query("select * from board limit 1");
if($bo1->num_rows==1){
while($row=$bo1->fetch_assoc()){
    $lid=$row['id'];
    $lname=$row['name'];
    $lposition=$row['position'];
    $limage=$row['image'];
}
}
$bo2=$conn->query("select * from board limit 1 offset 1");
if($bo2->num_rows==1){
while($row=$bo2->fetch_assoc()){
    $mid=$row['id'];
    $mname=$row['name'];
    $mposition=$row['position'];
    $mimage=$row['image'];
}
}
$bo3=$conn->query("select * from board limit 1 offset 2");
if($bo3->num_rows==1){
while($row=$bo3->fetch_assoc()){
    $rid=$row['id'];
    $rname=$row['name'];
    $rposition=$row['position'];
    $rimage=$row['image'];
}
}
?>
    <div class="modal fade" id="board" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:500px;">
            <div class="modal-content">
            <form action="board_update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Board Images</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                <div class="form-group required-field">
                                <label> <h5 style="display:inline;">Left Box</h5> Name: </label>
                                <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <label>Position: </label>
                                <input type="text" name="lposition" value="<?php echo $lposition; ?>"  class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <input type="file" name="limage">
                                <input type="hidden" name="lid" value="<?php echo $lid; ?>">
                                <input type="hidden" name="lmage" value="<?php echo $limage; ?>">
                                </div>

                                
                                <div class="form-group required-field">
                                <label><h5 style="display:inline;">Middle Box</h5> Name: </label>
                                <input type="text" name="mname" value="<?php echo $mname; ?>"  class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <label>Position: </label>
                                <input type="text" name="mposition" value="<?php echo $mposition; ?>"  class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <input type="file" name="mimage">
                                <input type="hidden" name="mid" value="<?php echo $mid; ?>">
                                <input type="hidden" name="mmage" value="<?php echo $mimage; ?>">
                                </div>

                               
                                <div class="form-group required-field">
                                <label> <h5 style="display:inline;">Right Box</h5> Name: </label>
                                <input type="text" name="rname" value="<?php echo $rname; ?>"  class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <label>Position: </label>
                                <input type="text" name="rposition" value="<?php echo $rposition; ?>"  class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group required-field">
                                <input type="file" name="rimage">
                                <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                <input type="hidden" name="rmage" value="<?php echo $rimage; ?>">
                                </div>


                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

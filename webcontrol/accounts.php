<?php
session_start();
require("../config.php");
require("../function.php");
 if(detail('privilege')!=="admin"){
  $_SESSION['msg2']="Sorry! You lack privilege to visit this page";
  header("Location: index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php"); ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">
<style>
.it{
  height:50px;
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  font-size:17px;
  font-weight:bold;
}
.form-control{
  border-color:0px #d2d6de !important;
}
.sweep,.sweep2{
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  padding-top:10px;
  padding-left:10px;
  width:20%;
  border:1px solid #d2d6de !important;
}
</style>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-9">
      <form method="post" action="account_filter" id="tarp">
               <div class="col-md-3" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
               <div class="col-md-3" style="float:left;">
                 <div class="form-group input-group">
 									<input class="form-control datepicker form-control-email it" placeholder="From" name="date" type="text" value="<?php if(isset($_GET['start'])){echo $_GET['start'];} ?>" required>
 									<span class="input-group-addon sweep"><img class="dater" src="../shared/datepicker/cal.gif" name="date"></span>
 								</div>
               </div>
               <div class="col-md-3" style="float:left;">
                 <div class="form-group input-group">
 									<input class="form-control datepicker2 form-control-email it" placeholder="To" name="date2" type="text" value="<?php if(isset($_GET['end'])){echo $_GET['end'];} ?>" required>
 									<span class="input-group-addon sweep2"><img class="dater2" src="../shared/datepicker/cal.gif" name="date"></span>
 								</div>
               </div>
               <div class="col-md-3 text-right" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Create New Account</button>
      </div>
       </div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Manage Accounts</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                  <th>Account Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Privilege</th>
                    <th>Date Added</th>
                    <th colspan="2">-</th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['name']) && isset($_GET['start']) && isset($_GET['end'])){
  $sname=$_GET['name'];
  $sstart=$_GET['start'];
  $send=$_GET['end'];
  if(detail('privilege')=="admin"){
    $count_all=$conn->query("select count(*) from login where name LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR email LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR phone LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send'");
  }else{
    $count_all=$conn->query("select count(*) from login where privilege!='admin' AND name LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR privilege!='admin' AND email LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR privilege!='admin' AND phone LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send'");
  }

 }else{
   if(detail('privilege')=="admin"){
    $count_all=$conn->query("select count(*) from login");
   }else{
    $count_all=$conn->query("select count(*) from login where privilege!='admin'");
   }
 
 }
    while($row=$count_all->fetch_array()){
        $count_val=$row[0];
    }
    $pages=ceil($count_val/$per_page);

if(isset($_GET['name']) && isset($_GET['start']) && isset($_GET['end'])){
  $sname=$_GET['name'];
  $sstart=$_GET['start'];
  $send=$_GET['end'];
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    if(detail('privilege')=="admin"){
      $site=$conn->query("select * from login where name LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR email LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR phone LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' order by id DESC LIMIT $per_page OFFSET $start");
    }else{
      $site=$conn->query("select * from login where privilege!='admin' AND name LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR privilege!='admin' AND email LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' OR privilege!='admin' AND phone LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' order by id DESC LIMIT $per_page OFFSET $start");
    }
   
  }
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    if(detail('privilege')=="admin"){
      $site=$conn->query("select * from login order by id desc LIMIT $per_page OFFSET $start");
    }else{
      $site=$conn->query("select * from login where privilege!='admin' order by id desc LIMIT $per_page OFFSET $start");
    }
    
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['privilege']; ?></td>
    <td><?php echo read_able($row['created_at']); ?></td>
    <td class="nav-item dropdown">
        
        <?php if(detail('privilege')==='admin' || $row['id']===detail('id')){ ?>
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Action</span>
        </a>
 <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
          <a class="dropdown-item" href="account_view?id=<?php echo $row['id']; ?>">View</a>
          <?php if(detail('privilege')=="admin" && $row['id']!=detail('id')){ ?>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item delz" data-toggle="modal" style="cursor:pointer;" data-delete_id="account_delete?id=<?php echo $row['id']; ?>" data-target="#delete">Delete</a>
<?php }     ?>
          
        </div>
<?php }else{ ?>
  <a class="nav-link" style="cursor:pointer;color:#0099cc;" data-toggle="modal" data-target="#access">
          <span>More</span>
        </a>
<?php } ?>       
      </td>
    </tr> 
  <?php }
}else{
  echo "<tr><td colspan=8>No results Found</td></tr>";
}
?>                               
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="card-footer small text-muted">
          <!-- Updated Last at :  -->

<ul class="pagination pagination-md justify-content-center">
<?php
if(isset($_GET['name']) && isset($_GET['start']) && isset($_GET['end'])){
  for($icount=1;$icount<=$pages;$icount++) { ?>
    <li class="page-item">
    <a class="page-link" style="color:#0088cc;" href="accounts?page=<?php echo $icount; ?>&name=<?php echo $_GET['name']; ?>&start=<?php echo $_GET['start']; ?>&end=<?php echo $_GET['end']; ?>"><?php echo $icount; ?></a>
    </li>
    <?php }  
}else{
      for($icount=1;$icount<=$pages;$icount++) { ?>
      <li class="page-item">
      <a class="page-link" style="color:#0088cc;" href="accounts?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
      </li>
      <?php } 
}
?>
</ul>


          </div>
        </div>
      </div>
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <style>
  .form-group{
    margin-bottom:5px;
  }
  </style>
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="account_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Account</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">

                    <div class="form-group required-field">
<label>Account Name</label>
<input type="text" name="name" class="form-control form-control-sm" required>
</div>
<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-group required-field">
<label>Email Address</label>
<input type="email" name="email" class="form-control form-control-sm" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group required-field" style="margin-bottom:0;">
<label>Phone Number</label>
<input type="phone" name="phone" class="form-control form-control-sm" required>
</div>
</div>
</div>
</div>



              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
              <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" name="password1" class="form-control" required="required">
              
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label for="confirmPassword">Confirm password</label>
              <input type="password" name="password2" class="form-control" required="required">
              </div>
              </div>
              </div>
              </div>
<div class="form-group">
  <div class="form-row">
  <div class="col-md-12" style="padding-top:15px;padding-bottom:15px;"><h5>Privileges</h5></div>
    <div class="col-md-6">
    <label><input type="checkbox" name="project" value="project"> Ability To Manage Projects</label> <br> 
 <label><input type="checkbox"  name="program" value="program"> Ability To Manage Programs</label>  <br>
 <label><input type="checkbox"  name="news" value="news"> Ability To Manage News/Events</label>  <br>
 <label><input type="checkbox"  name="letter" value="letter"> Ability To Manage NewsLetters</label> 
</div>
    <div class="col-md-6">
 <label><input type="checkbox"  name="photo" value="photo"> Ability To Manage Photo Gallery</label>  <br> 
 <label><input type="checkbox"  name="site" value="site"> Ability To Manage Site Settings</label>   <br>
 <label><input type="checkbox"  name="video" value="video"> Ability To Manage Videos</label> 
</div>
  </div>
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
                   
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php include("scripts.php"); ?>
<script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});

</script>
</body>
</html>



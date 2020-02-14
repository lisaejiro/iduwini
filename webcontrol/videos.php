<?php
@session_start();
require("../config.php");
require("../function.php");
 if(!in_array('video',explode(',',detail('ability')))  && detail('privilege')!="admin"){
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
      <form method="post" action="video_filter" id="tarp">
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
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Video</button>
      </div>
              
             </div>
      
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Videos</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                    font-family:arial;
                      font-size:13px;
                      /* font-weight:bold; */
                  }
                  </style>
                <thead>
                  <tr>
                    <th>Video Title</th>
                    <th>Video Url</th>
                    <th>Date Created</th>
                    <th colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['name']) && isset($_GET['start']) && isset($_GET['end'])){
  $sname=$_GET['name'];
  $sstart=$_GET['start'];
  $send=$_GET['end'];
  $count_all=$conn->query("select count(*) from videos where title LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send'");
 }else{
  $count_all=$conn->query("select count(*) from videos");
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
    $site=$conn->query("select * from videos where title LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' order by id DESC LIMIT $per_page OFFSET $start");
  }
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from videos order by id desc LIMIT $per_page OFFSET $start");
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['url']; ?></td>
<td><?php echo read_able($row['created_at']); ?></td>
<td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs fillz" data-toggle="modal" data-target="#edit"
data-id="<?php echo $row['id']; ?>"
data-title="<?php echo $row['title']; ?>"
data-url="<?php echo $row['url']; ?>"
> Edit</a></td>
<td><a data-delete_id="video_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a></td>
</tr> 
<?php }
}else{
  echo "<tr><td colspan=4>No results Found</td></tr>";
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
    <a class="page-link" style="color:#0088cc;" href="videos?page=<?php echo $icount; ?>&name=<?php echo $_GET['name']; ?>&start=<?php echo $_GET['start']; ?>&end=<?php echo $_GET['end']; ?>"><?php echo $icount; ?></a>
    </li>
    <?php }  
}else{
      for($icount=1;$icount<=$pages;$icount++) { ?>
      <li class="page-item">
      <a class="page-link" style="color:#0088cc;" href="videos?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
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

  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="video_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Video</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Video Title </label>
                                        <input type="text" name="title" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Video URL </label>
                                        <input type="text" name="url" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Video</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="video_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Video</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Video Title </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="title" id="form-title" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Video Url </label>
                                        <input type="text" name="url" id="form-url" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Video</button>
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
document.querySelectorAll(".fillz").forEach(function(g){
g.addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
  document.querySelector("#form-title").value=d.target.dataset.title;
  document.querySelector("#form-url").value=d.target.dataset.url;
});
});
</script>
<script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});
</script>
</body>

</html>

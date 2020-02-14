<?php
@session_start();
require("../config.php");
require("../function.php");
 if(!in_array('news',explode(',',detail('ability')))  && detail('privilege')!="admin"){
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
input[type="file"]{
width:100px;
}
</style>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-9">
      <form method="post" action="news_filter" id="tarp">
               <div class="col-md-3" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="pro_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
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
      <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add News/Events</button>
      </div>
              
             </div>
      
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage News/Events</div>
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
                  <th>Image</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date Created</th>                   
                    <th colspan="3">-</th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['pro_name']) && isset($_GET['start']) && isset($_GET['end'])){
  $sname=$_GET['pro_name'];
  $sstart=$_GET['start'];
  $send=$_GET['end'];
  $count_all=$conn->query("select count(*) from news where title LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send'");
 }else{
  $count_all=$conn->query("select count(*) from news");
 }
    while($row=$count_all->fetch_array()){
        $count_val=$row[0];
    }
    $pages=ceil($count_val/$per_page);

if(isset($_GET['pro_name']) && isset($_GET['start']) && isset($_GET['end'])){
  $sname=$_GET['pro_name'];
  $sstart=$_GET['start'];
  $send=$_GET['end'];
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from news where title LIKE '%$sname%' AND created_at>='$sstart' AND created_at<='$send' order by id DESC LIMIT $per_page OFFSET $start");
  }
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from news order by id desc LIMIT $per_page OFFSET $start");
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
    <td><img style="height:100px;width:150px;" src="../news_images/<?php echo $row['image']; ?>"></td>
    <td><?php echo $row['title']; ?></td>
    <td title="<?php echo remove_tags($row['details']); ?>"><?php echo substr(remove_tags($row['details']),0,200); ?>....</td>
    <td><?php echo read_able($row['created_at']); ?></td>   
          <td class="nav-item dropdown" style="padding:0;">
              <a  style="padding:7px;" class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>Action</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
                <a class="dropdown-item btn-xs fillz" style="cursor:pointer;" data-toggle="modal" data-target="#edit"
                data-id="<?php echo $row['id']; ?>"
                data-title="<?php echo htmlspecialchars($row['title']); ?>"
                data-image="<?php echo $row['image']; ?>"
                data-details="<?php echo htmlspecialchars($row['details']); ?>"            
                > Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item btn-xs fillz2" style="cursor:pointer;" data-toggle="modal" data-target="#view"
                data-id="<?php echo $row['id']; ?>"
                > View</a>
             
                <div class="dropdown-divider"></div>
                <a data-delete_id="news_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;" class="dropdown-item delz" data-target="#delete" data-toggle="modal"> Delete</a>
              </div>
            </td>
    </tr> 
<?php }
}else{
  echo "<tr><td colspan=11>No results Found</td></tr>";
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
if(isset($_GET['pro_name']) && isset($_GET['start']) && isset($_GET['end'])){
  for($icount=1;$icount<=$pages;$icount++) { ?>
    <li class="page-item">
    <a class="page-link" style="color:#0088cc;" href="products?page=<?php echo $icount; ?>&pro_name=<?php echo $_GET['pro_name']; ?>&start=<?php echo $_GET['start']; ?>&end=<?php echo $_GET['end']; ?>"><?php echo $icount; ?></a>
    </li>
    <?php }  
}else{
      for($icount=1;$icount<=$pages;$icount++) { ?>
      <li class="page-item">
      <a class="page-link" style="color:#0088cc;" href="products?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
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

  <div class="modal fade" id="view2" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:700px;">
            <div class="modal-content">
                <form action="product_image_update2" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Image</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body updating">

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
  <!-- Modal -->

  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:900px;">
            <div class="modal-content">
                <form action="product_add" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">News/Event Detail</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body viewing">
                   
              

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="news_add" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add News/Event</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>News Title</label>
                                        <input type="text" name="title" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Details</label>
                                        <textarea id="ckeditor" class="form-control" required name="details" cols="30" rows="4"></textarea>
                                    </div> 
                                    <div class="form-group required-field">
                                        <label>Image</label><br>
<div class="file-field input-field" style="margin-top:20px;">
<input type="file" required name="image">
<br><br>
<div class="file-path-wrapper">
<input class="file-path validate form-control" readonly type="text">
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



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="news_update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update News/Event</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>News Title</label>
                                        <input type="hidden" name="id" id="form-id" required>
                                        <input type="text" class="form-control" name="title" id="form-title">
                                    </div>
                                    
                                    <div class="form-group required-field">
                                        <label>Details</label>
                                        <textarea id="ckeditor2" class="form-control" id="form-details" required name="details" cols="30" rows="4"></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Product Image <span style="color:#0088cc;">(Ignore if previous image should be reused)</span></label><br>
                                        <input type="hidden" name="old_image" id="form-old_image">
<div class="file-field input-field" style="margin-top:20px;">
<input type="file" name="image">
<br><br>
<div class="file-path-wrapper">
<input class="file-path validate form-control" readonly type="text">
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
document.querySelectorAll(".fillz").forEach(function(g){
g.addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
  document.querySelector("#form-title").value=d.target.dataset.title;
  document.querySelector("#form-old_image").value=d.target.dataset.image;
 CKEDITOR.instances['ckeditor2'].setData(d.target.dataset.details);
});
});
$(".fillz2").each(function(){
  $(this).on("click",function(h){
$.ajax({
url:"photo_serve.php",
type:"POST",
data:{id:h.target.dataset.id},
success:function(result){
  $('.viewing').html(result);
}
});
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



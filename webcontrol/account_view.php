<?php
@session_start();
require("../config.php");
require("../function.php");
 if(detail('privilege')!=="admin" && detail('id')!==$_GET['id']){
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
<style>
.troop{
  display:inline;
}
.troop2{
  font-weight:bold;
  padding-left:10px;
  width:100px;
  height:30px;
  border-radius:10px;
  border:1px solid #0088cc;
}
.troop2::placeholder{
  font-weight:lighter;
  font-family:cursive;
}
.troop2:focus{
  border:none;
  border-radius:10px;
}
</style>
    <div id="content-wrapper">
      <div class="container-fluid">
      <?php
$del=$conn->query("select * from login where id='".$_GET['id']."'");
if($del->num_rows==1 && detail('privilege')==='admin' || $del->num_rows==1 && detail('id')===$_GET['id']){
  while($row=$del->fetch_assoc()){
    $didi=$row['id'];
    $stats=$row['status'];
  }
      ?>
      <?php
if($didi!==detail('id')){ ?>
<button class="btn btn-primary delz" data-delete_id="account_delete?id=<?php echo $didi; ?>" style="cursor:pointer;" data-toggle="modal" data-target="#delete">Delete Account</button>
<?php }
      ?>
     
      <button class="btn btn-primary" id="cry" data-toggle="modal" data-id="<?php echo $didi; ?>" data-target="#edit">Update Account Information</button>
      <?php
if(detail('privilege')==="admin" && $didi!=detail('id')){
if($stats=="active"){ ?>
 <a class="btn btn-primary" href="account_ban_unban?id=<?php echo $didi; ?>&s=ban">Ban Account </a>
<?php }else{ ?>
  <a class="btn btn-primary" href="account_ban_unban?id=<?php echo $didi; ?>&s=unban">Unban Account</a>
<?php }
     }
    }
 ?>
     <br>
      <br>
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Account Information</div>
          <div class="card-body">
          <div class="row">
           <div class="col-md-1">
          
          </div>
          <div class="col-md-10">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:15px;
                      /* font-weight:bold; */
                  }
                  th{
                    width:200px;
                  }
                  td{
                    color:#0088cc;
                    font-size:15px;
                    font-family:arial;
                  }
                  </style>
                  <tbody>
                  <?php
                $query1=$conn->query("select * from login where id='".$_GET['id']."'");
                if($query1->num_rows==1 && detail('privilege')==='admin' || $query1->num_rows==1 && detail('id')===$_GET['id']){ 
                    while($row=$query1->fetch_assoc()){
                    ?>
                    <tr><th>Account Name</th><td><?php echo ucwords($row['name']); ?></td></tr>
                  <tr><th>Email Address</th><td><?php echo $row['email']; ?></td></tr>
                  <tr><th>Phone Number</th><td><?php echo $row['phone']; ?></td></tr>
                  <tr><th>Status</th><td><?php echo $row['status']; ?></td></tr>
                  <tr><th>Privilege</th><td><?php echo $row['privilege']; ?></td></tr>
                  <tr><th>Date Registered</th><td><?php echo read_able($row['created_at']); ?></td></tr>
                  </tr>
                <?php
                    }
            }else{ ?>
                <tr><td>Account does not exist.</td></tr>
               <?php }
                  ?>
                                              
                </tbody>
              </table>
              
            </div>
          </div>
         
          </div>
            
            
          </div>
          
          <!-- <div class="card-footer small text-muted">
          Updated Last at : 
          </div> -->
          
        </div>
      </div>
      
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="account_update2" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Account Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body viewing">

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
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
<script>
$("#cry").on("click",function(d){
$.ajax({
url:"account_update.php",
type:"POST",
data:{id:d.target.dataset.id},
success:function(result){
$(".viewing").html(result);
}
});
});
</script>
</body>
</html>



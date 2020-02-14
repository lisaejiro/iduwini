<style>
  .form-group{
    margin-bottom:5px;
  }
  </style>
<?php
session_start();
require("../config.php");
require("../function.php");
if(isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])){
$query=$conn->query("select * from login where id='".$_POST['id']."'");
if($query->num_rows==1){
    while($row=$query->fetch_assoc()){ 
      $ability=$row['ability'];    
      ?>
<div class="form-group required-field">
<label>Account Name</label>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" required>
<input type="text" value="<?php echo $row['name']; ?>" name="name" class="form-control form-control-sm" required>
</div>
<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-group required-field">
<label>Email Address</label>
<input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control form-control-sm" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group required-field" style="margin-bottom:0;">
<label>Phone Number</label>
<input type="phone" value="<?php echo $row['phone']; ?>" name="phone" class="form-control form-control-sm" required>
</div>
</div>
</div>
</div>
<?php
 function ability($valve){
   global $ability;
$list=explode(',',$ability);
if(in_array($valve,$list)){
   echo "checked";
   }
  }
?>
 <input type="hidden" name="abilities" value="<?php echo detail('ability'); ?>">
<?php
if(detail('privilege')==="admin" && detail('id')!==$_POST['id']){ ?>
<div class="form-group">
  <div class="form-row">
  <div class="col-md-12" style="padding-top:15px;padding-bottom:15px;"><h5>Privileges</h5></div>
    <div class="col-md-6">
    <label><input type="checkbox" <?php ability('project'); ?> name="project" value="project"> Ability To Manage Projects</label> <br> 
 <label><input type="checkbox" <?php ability('program'); ?>  name="program" value="program"> Ability To Manage Programs</label>  <br>
 <label><input type="checkbox" <?php ability('news'); ?>  name="news" value="news"> Ability To Manage News/Events</label>   <br>
 <label><input type="checkbox" <?php ability('letter'); ?>  name="letter" value="letter"> Ability To Manage NewsLetters</label>
</div>
    <div class="col-md-6">
 <label><input type="checkbox" <?php ability('photo'); ?>  name="photo" value="photo"> Ability To Manage Photo Gallery</label>  <br> 
 <label><input type="checkbox" <?php ability('site'); ?>  name="site" value="site"> Ability To Manage Site Settings</label>   <br>
 <label><input type="checkbox" <?php ability('video'); ?>  name="video" value="video"> Ability To Manage Videos</label> 
</div>
  </div>
</div>

</div>
<?php }
?>

   <?php }
}
}else{
    header("Location: index");
}
?>
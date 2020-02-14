
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="../shared/toastr.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../shared/datepicker/jquery-ui.js"></script>
  <script src="../shared/ckeditor/ckeditor.js"></script>
  <script src="../shared/materialize.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script>
  $(function(){
            $('.datepicker').datepicker({
                dateFormat:'yy-mm-dd',
              });
            $('.sweep').click(function(){
              $('.datepicker').datepicker("show");
            });
            $('.datepicker2').datepicker({
                dateFormat:'yy-mm-dd',
              });
            $('.sweep2').click(function(){
              $('.datepicker2').datepicker("show");
            });
    });
    
         </script>
           
  <?php
if(isset($_SESSION['msg'])){ ?>
  <script> toastr.info("<?php echo $_SESSION['msg']; ?>"); </script>
  <?php }
unset($_SESSION['msg']);
  ?>
  <?php
if(isset($_SESSION['msg2'])){ ?>
  <script> toastr.error("<?php echo $_SESSION['msg2']; ?>"); </script>
  <?php }
unset($_SESSION['msg2']);
  ?>

<?php
if(isset($_SESSION['lmsg'])){ ?>
  <script> toastr.info("<?php echo $_SESSION['lmsg']; ?>"); </script>
  <?php }
unset($_SESSION['lmsg']);
  ?>
  <?php
if(isset($_SESSION['lmsg2'])){ ?>
  <script> toastr.error("<?php echo $_SESSION['lmsg2']; ?>"); </script>
  <?php }
unset($_SESSION['lmsg2']);
  ?>

<?php
if(isset($_SESSION['mmsg'])){ ?>
  <script> toastr.info("<?php echo $_SESSION['mmsg']; ?>"); </script>
  <?php }
unset($_SESSION['mmsg']);
  ?>
  <?php
if(isset($_SESSION['mmsg2'])){ ?>
  <script> toastr.error("<?php echo $_SESSION['mmsg2']; ?>"); </script>
  <?php }
unset($_SESSION['mmsg2']);
  ?>

<?php
if(isset($_SESSION['rmsg'])){ ?>
  <script> toastr.info("<?php echo $_SESSION['rmsg']; ?>"); </script>
  <?php }
unset($_SESSION['rmsg']);
  ?>
  <?php
if(isset($_SESSION['rmsg2'])){ ?>
  <script> toastr.error("<?php echo $_SESSION['rmsg2']; ?>"); </script>
  <?php }
unset($_SESSION['rmsg2']);
  ?>
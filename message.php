<?php
session_start();
if(isset($_SESSION['error'])):
    ?>
    <div class="alert alert-danger" role="alert">
         <!-- <a href="#" class="close" data-dismiss="alert">&times;</a> -->
        <strong>Error!</strong>
        <?php echo $_SESSION['error'];?>
    </div>
    <?php endif; ?>
    <?php
unset($_SESSION['error']);

if(isset($_SESSION['success'])){ ?>
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong>
        <?php echo $_SESSION['success'];?>
    </div>
  <?php  }
  unset($_SESSION['success']);
  
  ?>
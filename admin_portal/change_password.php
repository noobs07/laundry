<?php

 $title='Ubah Password Admin';
   include('header.php');
   include('_secure.php');
   include('include/db.php');
    include('include/function.php');
     if(isset($_POST['Change']))
     {
    $USER_ID=$_SESSION['ID'];
   $Password=$_POST['Password'];
    
    $sql="SELECT * From admin_login Where Adm_Password='".$Password."' and ID='".$USER_ID."' ";
    $sql1=$db->query($sql);    
    if($sql1->num_rows<=0)
     {
       $sel="UPDATE admin_login SET Adm_Password='".$Password."' where ID='".$USER_ID."'";
       $info=$db->query($sel);
         if($info){
         include('SMS/Change_password.php');
         }
      }
};?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol>
      <!-- Icon Cards-->
      <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Change Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Change  your password?</h4>
          
        </div>
        <form action="" method="POST">
          <div class="form-group">
            <input class="form-control"  type="text" name="Password"  placeholder="Enter New Password">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Change Password" name="Change">
         
        </form>
        
      </div>
    </div>
  </div>      
    </div>
     <?php include('footer.php');?>
  </div>
</body>

</html>

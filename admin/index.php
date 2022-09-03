<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
	<link href="assets/img/icon.png" rel="shortcut icon"/>
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  

  <body id="login">
    <div class="container">
	
     <center>
	 <?php if (isset($_SESSION['status'])) { ?>
	 
	 <div class="alert alert-danger fade in melayang">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	     <?php echo  $_SESSION['status']; unset($_SESSION['status'])?>
	</div>
	 <?php } ?>
	 
	 
	 <img src="assets/img/logo.png" class="img responsive" style="width:300px;margin-bottom:20px"/>
	 
	 <h3 class="form-signin-heading">Administrator</h3>
	  <form class="form-signin" name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
        
        <input name="username" type="text" class="input-block-level" placeholder="Username">
        <input name="password" type="password" class="input-block-level" placeholder="Password">
       
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>
	</center>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

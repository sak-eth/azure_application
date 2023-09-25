<?php

include "constants.php";
$va = $_GET["va"];
switch($va){
	case '1':
		$message="End of Session ";
		break;
	case '2':
		$message="Enter Admin ID and Password to sign in";
		break;
	case '3':
		$message="Authentication Failed. Please use the correct details";
		break;
	case '4':
		$message="Password Changed. Please Login With Your new Password";
		break;
	case '5':
		$message="Your Account had been Deactivated.";
		break;
	case '6':
		$message="Password is sent to your Email.";
		break;
	case '7':
		$message="Please Logout From Your Previous Session";
		break;
	default:
		$message="";
		break;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title_label?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <script language=javascript>
    function fnLoginValidate()
    {	
        if(document.loginform.username.value=="")
        {
          alert("Enter User Name")
          document.loginform.username.focus()
          return false
        }
        if(document.loginform.psword.value=="")
        {
          alert("Enter Password")
          document.loginform.psword.focus()
          return false
        }
      
    }
  </script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">              
              <div class="brand-logo">
                <img src="images/logo.png" alt="logo">
              </div>
              <h5>Welcome to Azure Dashboard</h5>
              <h6 class="font-weight-light"><br>Sign in to continue.</h6>
              <?php if(isset($message)){?><div align="center" class="error-text"><?php echo $message;?></div><?php }?>

              <form class="pt-3" name="loginform" method='post' action="authenticate.php" method=post onSubmit="return fnLoginValidate()">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="psword" name="psword" placeholder="Password">
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.html">SIGN IN</a> -->

                  <input type="submit" name="image" value="SIGN IN" id="btn-login" border="0" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btns" style="margin:auto;"/>
                  <input type="hidden" name="page" value="logincheck">

                </div>
                
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

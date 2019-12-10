<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <!-- Libs CSS -->
  <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <!-- Theme CSS -->

  <link rel="stylesheet" href="assets/css/theme.min.css" id="stylesheetLight">

  <!-- Custom -->
  <link rel="stylesheet" href="assets/css/custom.css" id="stylesheetLight2">
  <link rel="stylesheet" href="./assets/css/custom-inner.css">
  <style>
    body {
      display: none;
    }
  </style>


  <title>Gradecity - Dashboard</title>
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

  <!-- CONTENT
    ================================================== -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-5 col-xl-4 my-5">

        <div class="text-center">
          <a href="user-dashboard.php">
            <img class="img-fluid form-logo" src="./assets/img/logo.png" />
          </a>
        </div>
        <!-- Heading -->
        <h3 class="display-4 text-center mb-4">
          Sign in
        </h3>
        <div id="loginUserMsg"></div>
        <!-- Form -->
        <form method="post" action="<?php echo 'admin/includes/functions.php'; ?>" id="loginUserForm">
            <!-- hidden input -->
            <div class="form-group">
                <!-- Input -->
                <input type="hidden" value="loginUserConfirm" name="loginUserConfirm" class="form-control">

            </div>
          <!-- Email address -->
          <div class="form-group">

            <!-- Label -->
            <label>Staff | Matric Number <sub class="text-danger font-weight-bold">*</sub></label>

            <!-- Input -->
            <input type="text" name="user_id" class="form-control" placeholder="YCT/18/3210001 | F/HD/18/3210001">

          </div>

          <!-- Password -->
          <div class="form-group">

            <div class="row">
              <div class="col">

                <!-- Label -->
                <label>Password <sub class="text-danger font-weight-bold">*</sub></label>

              </div>
              <div class="col-auto">

                <!-- Help text -->
                <a href="password-reset.php" class="form-text small text-muted">
                  Forgot password?
                </a>

              </div>
            </div> <!-- / .row -->

            <!-- Input group -->
            <div class="input-group input-group-merge">

              <!-- Input -->
              <input type="password" name="password" class="form-control" placeholder="Lastname is default password">


            </div>
          </div>

          <!-- Submit -->
          <button type="submit" name="login" class="btn btn-lg btn-block btn-primary mb-3">
            Sign in
          </button>

          <!-- Link -->
<!--          <div class="text-center">-->
<!--            <small class="text-muted text-center">-->
<!--              Don't have an account yet? <a href="sign-up.html">Sign up</a>.-->
<!--            </small>-->
<!--          </div>-->

        </form>

      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->

  <!-- JAVASCRIPT
    ================================================== -->
  <!-- Libs JS -->
  <!-- Libs JS -->
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Theme JS -->
  <script src="./assets/js/theme.min.js"></script>
  <script type="text/javascript" src="./assets/js/custom.js"></script>

</body>

</html>
<?php
// Check for tokens
$selector = filter_input(INPUT_GET, 'selector');
if ( false !== ctype_xdigit( $selector ) ) {
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
    <link rel="stylesheet" href="assets/css/custom.css" id="stylesheetLight">
    <link rel="stylesheet" href="./assets/css/custom-inner.css">
    <style>
        body {
            display: none;
        }
    </style>


    <title>Gradecity - Reset Password</title>
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
                <h3 class="display-4 text-center">
                    Password reset
                </h3>

                <p class="text-muted text-center mb-5">
                    Enter your matric number and password to reset password.
                </p>
                <!-- Form -->
                <div id="reset_message"></div>
                <form method="post" action="includes/functions.php" id="reset_process_form">
                    <div class="form-group">
                        <!--input-->
                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    </div>
                    <!-- Matriculation number -->
                    <div class="form-group">

                        <!-- Label -->
                        <label>Email</label>

                        <!-- Input -->
                        <input type="text" id="process_email" class="form-control" name="process_email" placeholder="Enter your email address">

                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Password</label>
                        <!-- Input -->
                        <input placeholder="****" id="process_password" type="password" name="process_password" class="form-control">
                    </div>
                    <!-- Confirm Password-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Confirm Password</label>
                        <!-- Input -->
                        <input placeholder="****" id="process_confirm_password" type="password" name="process_confirm_password" class="form-control">
                    </div>


                    <!-- Submit -->
                    <button type="submit" name="pwd_reset_processbtn" class="btn btn-lg btn-block btn-primary mb-3">
                        Reset Password
                    </button>

                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                            Remember your password? <a href="index.php">Log in</a>.
                        </small>
                    </div>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>

</body>

</html>
<?php
} else {
header('Location: index.php');
}
?>
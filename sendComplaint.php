<?php
include_once 'admin/includes/functions.php';
if(!isLoggedInUser()){
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/custom.css" id="stylesheetLight">
    <link rel="stylesheet" href="assets/css/custom-inner.css">
    <link rel="stylesheet" href="assets/css/theme.min.css" id="stylesheetLight">

    <link rel="stylesheet" href="assets/css/theme-dark.min.css" id="stylesheetDark">

    <style>
        body {
            display: none;
        }
    </style>


    <title>Gradecity - Dashboard</title>
</head>

<body>



    <!-- NAVIGATION
    ================================================== -->

    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light navbar-bg" id="sidebar">
        <div class="container-fluid">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
                aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="user-dashboard.php">
                <img src="./assets/img/logo-dark.png" class="navbar-brand-img 
            mx-auto" alt="...">
            </a>

            <!-- User (xs) -->
            <div class="navbar-user d-md-none">

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="assets/img/uploads/<?php if(isset($_SESSION['profile_image'])) { echo $_SESSION['profile_image'];} else { echo 'business-icon-png-1949.png';} ?>" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                        <a href="profile.php" class="dropdown-item">Profile</a>
                        <a href="settings.php" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="includes/logout.php" class="dropdown-item">Logout</a>
                    </div>

                </div>

            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">

                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- Navigation -->
                <ul class="navbar-nav mb-md-4">
                    <li class="nav-item">
                        <a class="nav-link" href="user-dashboard.php">
                            <i class="fe fe-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" id="results_php_btn">
                            <i class="fe fe-credit-card"></i> Results
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="grade-calculator.php">
                            <i class="fe fe-calendar"></i> Grade Calculator
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="profile.php">
                            <i class="fe fe-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="settings.php">
                            <i class="fe fe-settings"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            <i class="fe fe-info"></i> About Gradecity <span
                                class="badge badge-primary ml-auto">v0.0.1</span>
                        </a>
                    </li>
                </ul>

                <!-- Push content down -->
                <div class="mt-auto"></div>


                <!-- Customize -->
                <a href="sendComplaint.php" class="btn btn-block btn-primary mb-4">
                    Send Complaint
                </a>


            </div> <!-- / .navbar-collapse -->

        </div>
    </nav>




    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">


        <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
            <div class="container-fluid">

                <!-- Form -->
                <div class="mr-4 d-none d-md-flex pt-4">
                    <a href="user-dashboard.php"> <span class="fe fe-arrow-left"></span>Go to Homepage</a>
                </div>

                <!-- User -->
                <div class="navbar-user">
                    <!-- Dropdown -->
                    <div class="dropdown">

                        <!-- Toggle -->
                        <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="assets/img/uploads/<?php if(isset($_SESSION['profile_image'])) { echo $_SESSION['profile_image'];} else { echo 'business-icon-png-1949.png';} ?>" alt="..." class="avatar-img rounded-circle">
                        </a>

                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="settings.php" class="dropdown-item">Settings</a>
                            <hr class="dropdown-divider">
                            <a href="includes/logout.php" class="dropdown-item">Logout</a>
                        </div>

                    </div>
                    <div class="dropdown ml-4 d-none d-md-flex">
                        <a href="#" class="" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="badge badge-danger">Logout</span>
                        </a>
                    </div>





                </div>

            </div>
        </nav>
        <div class="container">
                    <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">


                                <!-- Title -->
                                <h1 class="header-title">
                                    Send Complaint
                                </h1>

                            </div>

                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Content -->
                <div class="row">
                    <div class="col-md-8">
                        <form method="post" action="mail/complaint-mail.php" id="sendComplaintForm">
                            <div class="form-group">
                                <label for="complaintName">Name</label>
                                <input value="<?php if(!empty($_SESSION['firstname'])) { echo $_SESSION['firstname']." ".$_SESSION['lastname']; } ?>" type="text" class="form-control text-muted" id="complaintName"
                                    placeholder="Enter your name"  name="complaintName">
                            </div>
                            <div class="form-group">
                                <label for="complaintEmail">Email address</label>
                                <input type="email" class="form-control" id="conEmail"
                                       placeholder="Enter email" name="conEmail">
                            </div>
                            <div class="form-group">
                                <label for="complaintSubject">Subject</label>
                                <input  type="text" class="form-control" id="complaintSubject"
                                       placeholder="Enter subject" name="complaintSubject">
                            </div>
                            <div class="form-group">
                                <label for="complaintTextarea">Complaint</label>
                                <textarea placeholder="Please enter your complaint" class="form-control" name="complaintTextarea" id="complaintTextarea" rows="5"></textarea>
                            </div>
                            <button type="submit" name="submitComplaint" id="submitComplaint" class="btn btn-primary">Send Complaint</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
    </div>
    <?php include 'includes/checkResultModal.php'; ?> <!-- / .main-content -->
    <!--    Result download message modal-->
    <div class="modal fade" id="complaint_modal">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="show_result"></div>
                <div class="result_message"></div>
            </div>
        </div>
    </div>
    <div id="complaint_trigger"></div>
    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>

</body>

</html>
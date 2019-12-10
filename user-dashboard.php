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
    <meta name="description" content="">

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
                        <a class="nav-link active" href="user-dashboard.php">
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
                    <h3>Hi, <?php echo $_SESSION['firstname']; ?>. Welcome back to Gradecity</h3>
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
                        <a href="includes/logout.php" class="" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="badge badge-danger">Logout</span>
                        </a>
                    </div>





                </div>

            </div>
        </nav>


        <!-- HEADER -->
        <div class="header">
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Dashboard
                            </h1>

                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl">

                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                Academic session
                                            </h6>

                                            <!-- Heading -->
                                            <span class="h2 mb-0">
                                               <?php if(!empty($_SESSION['academic_year'])) { echo ucwords($_SESSION['academic_year']); } ?>
                                            </span>

                                        </div>
                                        <div class="col-auto">
                                            <!-- Icon -->
                                            <span class="h1 fe fe-calendar text-primary mb-0"></span>
                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-6 col-xl">

                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                Current semester
                                            </h6>

                                            <!-- Heading -->
                                            <span class="h2 mb-0">
                                                <?php if(!empty($_SESSION['current_semester'])) { echo ucwords($_SESSION['current_semester']); } ?>
                                            </span>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Icon -->
                                            <span class="h1 fe fe-star text-primary mb-0"></span>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-lg-6 col-xl">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                Current level
                                            </h6>

                                            <!-- Heading -->
                                            <span class="h2 mb-0">
                                                <?php if(!empty($_SESSION['level'])) { echo strtoupper($_SESSION['level']); } ?>
                                            </span>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Icon -->
                                            <span class="h1 fe fe-bar-chart text-primary mb-0"></span>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                            </div>

                        </div>

                    </div> <!-- / .row -->
                    <?php if(!empty($_SESSION['checkResultLevel'])) {?>
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        Recent
                                    </h4>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="results.php" class="btn btn-sm btn-white">
                                        View
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="table-responsive mb-0">
                            <table class="table table-sm table-nowrap card-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="#" class="text-muted sort">
                                                Session
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort">
                                                Semester
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort">
                                                Level
                                            </a>
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])){
                                                echo $_SESSION['academic_year'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['checkResultLevel'])){
                                                echo strtoupper($_SESSION['checkResultLevel']);
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['checkResultSemester'])){
                                                if($_SESSION['checkResultSemester'] === 'ss'){
                                                    echo 'SECOND';
                                                }elseif ($_SESSION['checkResultSemester'] === 'fs'){
                                                    echo 'FIRST';
                                                }
                                            } ?>
                                        </td>
                                        <td class="text-right">
                                            <form action="includes/phpoffice-user.php" method="post">
                                                <input type="submit" name="<?php if(!empty($_SESSION['resultTable'])){ echo $_SESSION['resultTable']; } ?>" class="btn btn-primary text-white btn-sm" value="Download">
<!--                                                <a class="btn btn-warning text-white btn-sm">Print</a>-->
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0">
                                        <a href="#" class="text-primary">
                                            Register Courses
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0">
                                        <a href="#" class="text-primary">
                                            Print Course Registered
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0">
                                        <a href="#" class="text-primary">
                                            Unlock Course Registered
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Check result modal-->
        <?php include 'includes/checkResultModal.php'; ?>
    </div> <!-- / .main-content -->
    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
</body>

</html>

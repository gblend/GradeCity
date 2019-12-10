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
    <link rel="stylesheet" href="./assets/fonts/feather/feather.min.css">

    <link rel="shortcut icon" href="./assets/img/favicon.png">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/custom.css" id="stylesheetLight">
    <link rel="stylesheet" href="./assets/css/custom-inner.css">
    <link rel="stylesheet" href="./assets/css/theme.min.css" id="stylesheetLight">

    <link rel="stylesheet" href="./assets/css/theme-dark.min.css" id="stylesheetDark">

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
            </a>

            <!-- User (xs) -->
            <a class="navbar-brand" href="user-dashboard.php">
                <img src="./assets/img/logo-dark.png" class="navbar-brand-img
            mx-auto" alt="...">
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
                        <a class="nav-link active" href="grade-calculator.php">
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
                    <a href="grade-calculator.php"> <span class="fe fe-arrow-left"></span>Go to Calculator</a>
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
        <div class="container-fluid">
            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
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
                </div>
            </div>

            <!-- Content -->
            <div id="printCalculated">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-header-title text-center font-weight-bold">
                                        ANALYSIS
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <?php
                                    // Grade Calculator
                                    if(!empty($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        $query = $conn->query("SELECT SUM(course_unit), SUM(grade_point_obtained) FROM grade_calculator WHERE user_id = '$user_id'");
                                        $row = $conn->affected_rows;
                                        for ($i = 1; $i <= $row; $i++) {
                                            $queryData = mysqli_fetch_array($query);
                                        ?>
                                        <tr>
                                            <td class="pl-0"><strong class="text-muted">Total Unit(s)</strong>&nbsp;&nbsp;&nbsp;<?php if(!empty($queryData['SUM(course_unit)'])) { echo $queryData['SUM(course_unit)']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0"><strong class="text-muted">Total Point(s)</strong>&nbsp;&nbsp;&nbsp;<?php if(!empty($queryData['SUM(grade_point_obtained)'])) { echo $queryData['SUM(grade_point_obtained)']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0"><strong class="text-muted">GPA</strong> &nbsp;&nbsp;&nbsp;<?php if(!empty($queryData['SUM(grade_point_obtained)'])) { echo ROUND(($queryData['SUM(grade_point_obtained)'] / $queryData['SUM(course_unit)']), 2, 2); } ?></td>
                                        </tr>
                                            <tr>
                                                <td class="pl-0"><?php if(!empty($_SESSION['user_id'])){ echo $_SESSION['user_id']; } ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- / .card-body -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-header-title text-center font-weight-bold">
                                        RESULT GRADE INFORMATION
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>COURSE CODE</th>
                                        <th>COURSE TITLE</th>
                                        <th>COURSE UNIT(S)</th>
                                        <th>GRADE</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    // Grade Calculator
                                    if(!empty($_SESSION['user_id'])){
                                    $user_id = $_SESSION['user_id'];
                                    $query = $conn->query("SELECT * FROM grade_calculator WHERE user_id = '$user_id'");
                                    $row = $conn->affected_rows;
                                    for ($i = 1; $i <= $row; $i++) {
                                    $queryData = mysqli_fetch_array($query);

                                    ?>
                                        <tr>
                                            <td><?php if(!empty($queryData['course_code'])) { echo $queryData['course_code']; } ?></td>
                                            <td><?php if(!empty($queryData['course_title'])) { echo $queryData['course_title']; } ?></td>
                                            <td><?php if(!empty($queryData['course_unit'])) { echo $queryData['course_unit']; } ?></td>
                                            <td><?php if(!empty($queryData['grade_obtained'])) { echo $queryData['grade_obtained']; } ?></td>
                                        </tr>
                                    <?php }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- / .card-body -->
                    </div>
                </div>
            </div>
        </div>
            <div>
                <a href="print-grade-calculator.php" target="_blank" class="btn btn-primary" id="printCal">Print</a>
            </div>
        </div>
        <?php include 'includes/checkResultModal.php'; ?>
    </div><br><!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>
    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>
</body>
</html>
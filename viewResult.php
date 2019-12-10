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
                    <a href="results.php"> <span class="fe fe-arrow-left"></span>View Results</a>
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

                                <!-- Pretitle -->
                                <h6 class="header-pretitle">
                                    Result
                                </h6>

                                <!-- Title -->
                                <h2 class="header-title">
                                    <?php if(!empty($_SESSION['checkResultSemester'])){
                                        if($_SESSION['checkResultSemester'] === 'ss'){
                                            echo 'SECOND SEMESTER, ';
                                        } elseif ($_SESSION['checkResultSemester'] === 'fs'){
                                            echo 'FIRST SEMESTER, ';
                                        }
                                    }
                                    if(!empty($_SESSION['checkResultLevel'])){
                                        echo strtoupper($_SESSION['checkResultLevel']);
                                    }
                                    ?>
                                </h2>

                            </div>
                            <div class="col-auto d-flex">
                                <!-- Buttons -->
                                <form action="includes/phpoffice-user.php" method="post">
                                    <input name="<?php if(!empty($_SESSION['resultTable'])){ echo $_SESSION['resultTable']; } ?>" type="submit" class="btn btn-white lift" value="Download">
                                </form>
                                <a target="_blank" href="print-result.php" class="btn btn-primary ml-2 lift">
                                    Print
                                </a>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Content -->
                <div class="card card-body p-5">
                    <div class="row">
                        <div class="col text-center">

                            <!-- Logo -->
                            <img src="assets/img/logo.png" alt="..." class="img-fluid mb-4" style="max-width: 10.5rem;">

                            <!-- Title -->
                            <h2 class="mb-2">
                                <?php
                                if(!empty($_SESSION['firstname'])) {
                                    echo $_SESSION['firstname']."&nbsp;";
                                }
                                if(!empty($_SESSION['lastname'])) {
                                    echo $_SESSION['lastname'];
                                }
                                ?>
                            </h2>

                            <!-- Text -->
                            <p class="text-muted mb-6">
                                <?php if(!empty($_SESSION['user_id'])){
                                    echo strtoupper($_SESSION['user_id']);
                                } ?>
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table my-1">
                                    <thead>
                                        <tr>
                                            <th class="px-0 border-top-0 bg-dark">
                                                <span class="h6 font-weight-bold text-white pl-2">COURSE CODE</span>
                                            </th>
                                            <th class="px-0 border-top-0 text-right bg-dark">
                                                <span class="h6 font-weight-bold text-white pr-2">GRADE</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($_SESSION['resultData'])) {
                                        $data = $_SESSION['resultData'];
                                        unset($data[0]);
                                        unset($data['matric_no']);
                                        unset($data[1]);
                                        unset($data[2]);
                                        unset($data[3]);
                                        unset($data[4]);
                                        unset($data[5]);
                                        unset($data[6]);
                                        unset($data[7]);
                                        unset($data[8]);
                                        unset($data[9]);
                                        unset($data[10]);
                                        unset($data[11]);
                                        unset($data[12]);
                                        unset($data[13]);
                                        unset($data[14]);
                                        unset($data['WGP']);
                                        unset($data['GPA']);
                                        unset($data['REMARK']);
                                        foreach ($data as $courseCode => $grade){
                                        ?>
                                        <tr>
                                            <td class="px-0">
                                                <?php echo $courseCode; ?>
                                            </td>
                                            <td class="px-0 text-right">
                                                <?php echo $grade; ?>
                                            </td>
                                        </tr>
                                    <?php } }?>
                                        <tr>
                                            <td class="px-0 border-top border-top-2">
                                                <?php if(!empty($_SESSION['resultData']['WGP'])){
                                                        echo 'WEIGHTED GRADE POINT &nbsp;<strong>(WGP)</strong>';
                                                    }elseif (!empty($_SESSION['resultData']['CWGP'])){
                                                        echo 'CUMMULATIVE WEIGHTED GRADE POINT &nbsp;<strong>(CWGP)</strong>';
                                                    } ?>
                                            </td>
                                            <td colspan="2" class="px-0 text-right border-top border-top-2">
                                                <span class="h3">
                                                    <?php if(!empty($_SESSION['resultData']['WGP'])){
                                                        echo $_SESSION['resultData']['WGP'];
                                                    }elseif (!empty($_SESSION['resultData']['CWGP'])){
                                                        echo $_SESSION['resultData']['CWGP'];
                                                    } ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td class="px-0 border-top border-top-2">
                                            <?php if(!empty($_SESSION['resultData']['GPA'])){
                                                echo 'GRADE POINT AVERAGE &nbsp;<strong>(GPA)</strong>';
                                            }elseif (!empty($_SESSION['resultData']['CGPA'])){
                                                echo 'CUMMULATIVE GRADE POINT AVERAGE &nbsp;<strong>(CGPA)</strong>';
                                            } ?>
                                        </td>
                                        <td colspan="2" class="px-0 text-right border-top border-top-2">
                                                <span class="h3">
                                                    <?php if(!empty($_SESSION['resultData']['GPA'])){
                                                        echo $_SESSION['resultData']['GPA'];
                                                    }elseif (!empty($_SESSION['resultData']['CGPA'])){
                                                        echo $_SESSION['resultData']['CGPA'];
                                                    } ?>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 border-top border-top-2">
                                            <?php if(!empty($_SESSION['resultData']['REMARK'])){
                                                echo '<strong>REMARK</strong>';
                                            } ?>
                                        </td>
                                        <td colspan="2" class="px-0 text-right border-top border-top-2">
                                                <span class="h3">
                                                    <?php if(!empty($_SESSION['resultData']['REMARK'])){
                                                        echo $_SESSION['resultData']['REMARK'];
                                                    }?>
                                                </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="my-5">
                            <h6 class="text-uppercase">
                                REMARKS
                            </h6>
                            <p class="text-muted mb-0">
                                We really appreciate your ....
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
<?php include 'includes/checkResultModal.php'; ?>
    </div> <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/user.js" type="text/javascript"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
</body>
</html>
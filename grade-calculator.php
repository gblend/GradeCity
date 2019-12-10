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


                            <!-- Title -->
                            <h1 class="header-title">
                                Grade Calculator
                            </h1>
                            <p class="small text-muted mt-2">This helps you calculate your GPA for a single semester
                            </p>

                        </div>

                    </div> <!-- / .row -->
                </div>
            </div>
            <!-- Content -->
            <div class="row">
                <div class="col-md-9">
<!--                    Form message div -->
                    <div id="msgGradeCalcForm"></div>
                    <form method="post" action="includes/functions.php" id="gradeCalcForm">
                        <div class="row">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php if(!empty($_SESSION['user_id'])){ echo $_SESSION['user_id']; }?>" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="courseTitle">Course Title</label>
                                <input type="text" name="course_title" class="form-control" id="course_title" placeholder="Enter course title">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="courseCode">Course Code</label>
                                <input type="text" name="course_code" class="form-control text-uppercase" id="course_code" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="courseName">Course Unit</label>
                                <select name="course_unit" id="course_unit" class="form-control">
                                    <option value="" selected hidden>Select Unit</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="grade_obtained">Grade Obtained</label>
                                <select name="grade_obtained" id="grade_obtained" class="form-control">
                                    <option value="" selected hidden>Select Grade</option>
                                    <option value="A1" title="75 to 100">A1</option>
                                    <option value="A2" title="70 to 74">A2</option>
                                    <option value="B1" title="65 to 69">B1</option>
                                    <option value="B2" title="60 to 64">B2</option>
                                    <option value="C1" title="55 to 59">C1</option>
                                    <option value="C2" title="50 to 54">C2</option>
                                    <option value="D1" title="45 to 49">D1</option>
                                    <option value="D2" title="40 to 44">D2</option>
                                    <option value="F" title="0 to 39">F</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="grade_pointObtained">Grade Point Obtained</label>
                                <select name="grade_pointObtained" id="grade_pointObtained" class="form-control">
                                    <option label="" selected hidden>Select Grade Point</option>
                                    <option value="4.00" title="A1">4.00</option>
                                    <option value="3.50" title="A2">3.50</option>
                                    <option value="3.25" title="B1">3.25</option>
                                    <option value="3.00" title="B2">3.00</option>
                                    <option value="2.75" title="C1">2.75</option>
                                    <option value="2.50" title="C2">2.50</option>
                                    <option value="2.25" title="D1">2.25</option>
                                    <option value="2.00" title="D2">2.00</option>
                                    <option value="0.00" title="F">0.00</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="add_course" class="btn btn-outline-primary mr-3">Add Course</button>
                        <a href="calcResult.php" class="btn btn-primary">Calculate GPA</a>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header  mt-3">
                            <div class="row align-items-center">
                                <div class="col mb-3">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        COURSES
                                    </h4>

                                </div>
                                <div class="col-auto">

                                    <!-- Link -->
                                    <a href="calcResult.php" class="btn btn-primary btn-sm">
                                        Calculate
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="card-body">
                            <?php
                            if(!empty($_SESSION['user_id'])) {
                                $user_id = $_SESSION['user_id'];
                                $query = $conn->query("SELECT * FROM grade_calculator WHERE user_id = '$user_id'");
                                $row = $conn->affected_rows;
                                for ($i = 1; $i <= $row; $i++) {
                                    $queryData = mysqli_fetch_array($query);
                                    ?>
                                    <div class="row align-items-center">
                                        <div class="col ml-n2 d-flex mb-1">
                                            <h5 class="card-title mb-1">
                                                <?php echo $queryData['course_title'] ?>
                                            </h5>
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                    <input type="hidden" name="course-code" value="<?php if(!empty($queryData['course_code'])) { echo $queryData['course_code']; } ?>">
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this course?');"
                                                   class="card-text small text-danger fe fe-delete ml-3" style="outline: none; border: none; background: none;" name="delete-course">
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-auto justify-content-between d-flex">
                                            <span class="btn btn-rounded-circle btn-sm btn-warning"><?php echo $queryData['grade_obtained']; ?></span>
                                        </div>
                                    </div> <!-- / .row -->

                                           <!-- Divider -->
                                    <hr>
                                <?php }
                            }
                            ?>
                        </div> <!-- / .card-body -->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php include 'includes/checkResultModal.php'; ?>
    </div><!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>
    <script type="text/javascript" src="./assets/js/user.js"></script>

</body>
</html>
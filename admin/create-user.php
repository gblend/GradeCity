<?php
include_once 'includes/functions.php';
if(isset($_GET['member-id'])) {
    $_SESSION['user_type'] = 'admin';
}
if(!isLoggedInAdmin()){
    header('Location: ../index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="../assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="../assets/libs/highlight.js/styles/vs2015.css">
    <link rel="stylesheet" href="../assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="shortcut icon" href="../assets/img/bookings/favicon.png">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css" id="stylesheetLight">
    <link rel="stylesheet" href="../assets/css/custom-inner.css">
    <link rel="stylesheet" href="../assets/css/theme.min.css" id="stylesheetLight">

    <link rel="stylesheet" href="../assets/css/theme-dark.min.css" id="stylesheetDark">

    <style>
        body {
            display: none;
        }

        .bg-vibrant-admin {
            background-image: linear-gradient(to bottom right, #655504de, #c5a53599),
            url(../assets/img/covers/gradd.jpeg) !important;
        }
    </style>


    <title>Gradecity - Create User</title>
</head>

<body>

<!-- NAVIGATION
================================================== -->

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light navbar-bg bg-vibrant-admin"
     id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
                aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="admin-dashboard.php">
            <img src="../assets/img/logo-dark.png" class="navbar-brand-img
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
                        <img src="../assets/img/uploads/<?php if(!empty($_SESSION['profile_image'])) { echo $_SESSION['profile_image']; }else{ echo 'business-icon-png-1949.png';} ?>" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="settings.php" class="dropdown-item">Profile</a>
                    <a href="page-settings.php" class="dropdown-item">Settings</a>
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
                    <a class="nav-link" href="admin-dashboard.php">
                        <i class="fe fe-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="results.php">
                        <i class="fe fe-credit-card"></i> Results
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fe fe-credit-card"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="create-user.php">
                        <i class="fe fe-user"></i> Add User
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fe fe-user"></i> Lecturers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="page-settings.php">
                        <i class="fe fe-settings"></i> Settings
                    </a>
                </li>
            </ul>

            <!-- Push content down -->
            <div class="mt-auto"></div>

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
                <h3>Hi, <?php echo $_SESSION['firstname']; ?>. </h3>
            </div>

            <!-- User -->
            <div class="navbar-user">
                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../assets/img/uploads/<?php if(!empty($_SESSION['profile_image'])) { echo $_SESSION['profile_image']; }else{ echo 'business-icon-png-1949.png';} ?>" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="settings.php" class="dropdown-item">Profile</a>
                        <a href="page-settings.php" class="dropdown-item">Settings</a>
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
    <!-- CONTENT
   ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">
                <!-- Heading -->
                <h3 class="display-4 text-center mb-">
                    Create User
                </h3>
                <!-- Form -->
                <form method="post" action="<?php echo 'includes/functions.php'; ?>" id="createUserForm">
                    <!-- Hidden input -->
                    <div class="form-group">
                        <!-- Input -->
                        <input type="hidden" class="form-control" name="createUserConfirm" value="createUserConfirm">

                    </div>
                    <!-- User Type-->
                    <div class="form-group">
                        <label>User Type (role)</label>
                        <!--input-->
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <!--First Name-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>First Name</label>
                        <!-- Input -->
                        <input placeholder="First name" type="text" name="firstName" class="form-control">
                    </div>

                    <!-- Last Name-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Last Name</label>
                        <!-- Input -->
                        <input placeholder="Last name" type="text" name="lastName" class="form-control">
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Email</label>
                        <!-- Input -->
                        <input placeholder="user@example.com" type="email" name="email" class="form-control">
                    </div>
                    <!-- Matriculation number -->
                    <div class="form-group">

                        <!-- Label -->
                        <label>Staff | Matric Number</label>

                        <!-- Input -->
                        <input type="text" class="form-control" name="user_id" placeholder="YCT14/00129 | F/HD/18/3210001">

                    </div>
                    <!-- level -->
                    <div class="form-group">

                        <!-- Label -->
                        <label>Level</label>

                        <!--Select-->
                        <select name="level_option" id="level_option" class="form-control">
                            <option value="nd1">ND1</option>
                            <option value="nd2">ND2</option>
                            <option value="hnd1">HND1</option>
                            <option value="hnd2">HND2</option>
                            <option value="operator">Staff | Operator</option>
                        </select>
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Password</label>
                        <!-- Input -->
                        <input placeholder="****" type="password" name="password" class="form-control">
                    </div>
                    <!-- Submit -->
                    <button type="submit" name="create_user" class="btn btn-lg btn-block btn-primary mb-3">
                        Create User
                    </button>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
    <!--    Create user message modal-->
    <div class="modal fade" id="create_userModal">
        <div class="modal-dialog">
            <div class="modal-body" id="createUserMsg">
            </div>
        </div>
    </div>
    <div id="create_userTrigger"></div>
</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->
<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="../assets/libs/chart.js/Chart.extension.min.js"></script>
<script src="../assets/libs/highlightjs/highlight.pack.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="../assets/libs/list.js/dist/list.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="../assets/js/custom.js"></script>
<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>

</html>
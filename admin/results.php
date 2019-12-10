<?php
include_once 'includes/functions.php';
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


    <title>Gradecity - Dashboard</title>
</head>

<body>

<!-- MODALS
================================================== -->
<div class="modal fade" id="leftSideSlide" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-body" data-toggle="lists" data-lists-values='["name"]'>

                <!-- List group -->
                <div class="my--3">
                    <div class="list-group list-group-flush list mv-list">
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h2 class="text-body mb-1 name font-weight-bold">
                                        Upload Result
                                    </h2>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <hr class="mb-2">
                        <form id="resultUploadForm" method="post" action="includes/phpoffice.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="small">Level</label>
                                            <select name="level_option" id="level_option" class="form-control">
                                                <option value="nd1">ND 1</option>
                                                <option value="nd2">ND 2</option>
                                                <option value="hnd1">HND 1</option>
                                                <option value="hnd2">HND 2</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="small">Semester</label>
                                            <select name="semester_option" id="semester_option" class="form-control">
                                                <option value="fs">First Semester</option>
                                                <option value="ss">Second Semester</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="ND1_first_semester">
                                            <label class="small">Course</label>
                                            <select name="nd1_first_option" id="nd1_first_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="p_theory">E. Probability Theory</option>
                                                <option value="d_statistics">Descriptive Statistics</option>
                                                <option value="a_geometry">Trig. & Analytical Geo.</option>
                                                <option value="l_algebra">Linear Algebra</option>
                                                <option value="u_english">Use of English</option>
                                                <option value="l_os">Intro. to Linux OS</option>
                                                <option value="p_upgrade">PC Upgrade & Maintenance</option>
                                                <option value="i_programming">Intro. to Programming</option>
                                                <option value="d_electronics">Digital Electronics</option>
                                                <option value="c_education">Citizenship Education</option>
                                                <option value="i_computing">Intro. to Computing</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="ND1_second_semester">
                                            <label class="small">Course</label>
                                            <select name="nd1_second_option" id="nd1_first_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="o_java">O.O Java</option>
                                                <option value="i_internet">Intro. to Internet</option>
                                                <option value="a_packages">Application Packages</option>
                                                <option value="d_structures">Data Structures & Alg.</option>
                                                <option value="s_analysis">System Analysis</option>
                                                <option value="p_c++">C/C++</option>
                                                <option value="d_maths">Discrete Maths</option>
                                                <option value="i_enterpreneurship">Entrepreneurship</option>
                                                <option value="c_english">Comm. in English</option>
                                                <option value="c_education">Citizenship Education</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="ND2_first_semester">
                                            <label class="small">Course</label>
                                            <select name="nd2_first_option" id="nd2_first_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="f_organization">File Org. & Mgt</option>
                                                <option value="p_uml">Prog. in UML</option>
                                                <option value="s_programming">System Programming</option>
                                                <option value="o_basic">Prog. in O.O Basic</option>
                                                <option value="c_packages">Comp. Packages II</option>
                                                <option value="u_english">Use of English II</option>
                                                <option value="p_entrepreneurship">Prac. of Entrepreneurship</option>
                                                <option value="s_troubleshooting">Systems & Troubleshooting</option>
                                                <option value="m_system">Mgt. Info. System</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="ND2_second_semester">
                                            <label class="small">Course</label>
                                            <select name="nd2_second_option" id="nd2_second_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="siwes">Siwes</option>
                                                <option value="fortran">Fortran</option>
                                                <option value="c_society">Comp. & Society</option>
                                                <option value="h_maintenace">Hardware Maintenance</option>
                                                <option value="w_technology">Web Technology</option>
                                                <option value="c_troubleshooting">Comp. System Trob. II</option>
                                                <option value="c_english">Comm. in English II</option>
                                                <option value="calculus">Calculus</option>
                                                <option value="project">Project</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="HND1_first_semester">
                                            <label class="small">Course</label>
                                            <select name="hnd1_first_option" id="hnd1_first_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="p_c++">Prog. using C++</option>
                                                <option value="a_algebra">Advanced Algebra</option>
                                                <option value="o_system">Operating System I</option>
                                                <option value="n_methods">Numerical Methods</option>
                                                <option value="s_theory">Statistics Theory I</option>
                                                <option value="c_architecture">Computer Architecture</option>
                                                <option value="a_calculus">Advanced Calculus</option>
                                                <option value="d_design">Database Design I</option>
                                                <option value="u_english">Use of English</option>
                                                <option value="o_research">Operation Research I</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="HND1_second_semester">
                                            <label class="small">Course</label>
                                            <select name="hnd1_second_option" id="hnd1_second_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="a_language">Assembly Language</option>
                                                <option value="e_development">Entrepreneurship Dev.</option>
                                                <option value="s_engineering">Software Engineering</option>
                                                <option value="c_english">Comm. in English III</option>
                                                <option value="d_design">Database Design II</option>
                                                <option value="i_hci">Intro. to Human Comp. Int.</option>
                                                <option value="s_theory">Statistics II</option>
                                                <option value="o_system">Operating System II</option>
                                                <option value="c_java">Comp. Techn. Java</option>
                                                <option value="r_methodology">Research Methodology</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="HND2_first_semester">
                                            <label class="small">Course</label>
                                            <select name="hnd2_first_option" id="hnd2_first_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="p_management">Project Management</option>
                                                <option value="multimedia">Multimedia</option>
                                                <option value="c_construction">Compiler Construction</option>
                                                <option value="o_research">Operations Research II</option>
                                                <option value="d_communication">Data Comm. & Networks</option>
                                                <option value="c_pascal">Comp. Prog. O.O Pascal</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="HND2_second_semester">
                                            <label class="small">Course</label>
                                            <select name="hnd2_second_option" id="hnd2_second_option" class="form-control">
                                                <option value="" selected hidden>Select Course</option>
                                                <option value="c_graphics">Computer Graphics & Ani.</option>
                                                <option value="i_expertsystems">Intro. to AI & Expert Sys.</option>
                                                <option value="p_practice">Professional Prac. in IT</option>
                                                <option value="project">Project</option>
                                                <option value="s_business">Small Business Start Up</option>
                                                <option value="s_computing">Seminar in Computing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="dropzone dropzone-single mb-3" data-toggle=""
                                         data-dropzone-url="http://">
                                        <div class="dz-preview dz-preview-single"></div>

                                         <input name="fileToUpload" type="file" accept=".csv, .xls, .xlsx" class="dz-default dz-message">
                                    </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button name="resultUploadBtn" type="submit" class="btn btn-primary btn-block">Upload Result</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <a class="nav-link active" href="results.php">
                        <i class="fe fe-credit-card"></i> Results
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fe fe-credit-card"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="create-user.php">
                        <i class="fe fe-user"></i> Add User
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#">
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
                            Results
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="#leftSideSlide" id="leftSideSlide" data-toggle="modal" href="#!" class="btn btn-primary">
                            Upload Result
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-white mr-2 btn-sm active">
                                        <input type="radio" name="options" checked=""><i
                                                class="fe fe-check-circle" id="option1">&nbsp;ND 1</i>
                                    </label>
                                    <label class="btn btn-white mr-2 btn-sm">
                                        <input type="radio" name="options"> <i
                                                class="fe fe-check-circle" id="option2">&nbsp;ND 2</i>
                                    </label>
                                    <label class="btn btn-white mr-2 btn-sm">
                                        <input type="radio" name="options"> <i
                                                class="fe fe-check-circle" id="option3">&nbsp;HND 1</i>
                                    </label>
                                    <label class="btn btn-white mr-2 btn-sm">
                                        <input type="radio" name="options"> <i
                                                class="fe fe-check-circle" id="option4">&nbsp;HND 2</i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="text" placeholder="Search for Result" class="form-control">
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive mb-0">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                            <tr>
                                <th>
                                    <a href="#" class="text-muted sort">
                                        Level
                                    </a>
                                </th>
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
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                    <tr id="nd1fs_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> ND1
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            FIRST
                                        </td>
                                        <td>
                                            <form id="download_nd1fs" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_nd1fs" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="nd1ss_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> ND1
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            SECOND
                                        </td>
                                        <td>
                                            <form id="download_nd1ss" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_nd1ss" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="nd2fs_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> ND2
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            FIRST
                                        </td>
                                        <td>
                                            <form id="download_nd2fs" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_nd2fs" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="nd2ss_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> ND2
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            SECOND
                                        </td>
                                        <td>
                                            <form id="download_nd2ss" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_nd2ss" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="hnd1fs_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> HND1
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            FIRST
                                        </td>
                                        <td>
                                            <form id="download_hnd1fs" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_hnd1fs" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="hnd1ss_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> HND1
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            SECOND
                                        </td>
                                        <td>
                                            <form id="download_hnd1ss" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_hnd1ss" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="hnd2fs_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> HND2
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            FIRST
                                        </td>
                                        <td>
                                            <form id="download_hnd2fs" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_hnd2fs" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="hnd2ss_result">
                                        <td>
                                            <span class="fe fe-calendar pr-1"></span> HND2
                                        </td>
                                        <td>
                                            <?php if(!empty($_SESSION['academic_year'])) { echo $_SESSION['academic_year']; } ?>
                                        </td>
                                        <td>
                                            SECOND
                                        </td>
                                        <td>
                                            <form id="download_hnd2ss" action="includes/phpoffice-import.php" method="post">
                                                <input  type="submit" name="download_hnd2ss" class="btn btn-primary text-white btn-sm" value="Download">
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- / .main-content -->
<!--Upload tips modal-->
<div class="modal fade" id="overlay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <h4 class="modal-title text-center">RESULT UPLOAD TIPS</h4>
            </div>
            <div class="modal-body">
                <p>The result spreadsheet to be uploaded should have four columns, e.g <strong class="text-muted">Matric_number, Continous_assessment,
                    Exam_60, Exam_100</strong></p>
                <p>The database and course table will be created automatically if they do not exist</p>
                <p>The accepted file formats are <strong class="text-muted">(.xls, .xlsx) --> Excel, (.csv) --> CSV
                    </strong></p>
            </div>
        </div>
    </div>
</div>
<!--Upload result message modal-->
<div class="modal fade" id="uploadMsgModal">
    <div class="modal-dialog">
            <div class="modal-body" id="resultUploadMsg">
        </div>
    </div>
</div>
<div id="showUploadMsg"></div>

<!--    Result download message modal-->
    <div class="modal fade" id="recent_resultModal">
        <div class="modal-dialog">
            <div class="modal-body" id="recent_resultMsg">
            </div>
        </div>
    </div>
    <div id="recent_resultTrigger"></div>
<!-- JAVASCRIPT
================================================== -->
<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/user.js"></script>
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
<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
<style type="text/css">
    #ND1_second_semester, #nd2fs_result, #nd2ss_result, #hnd1fs_result, #hnd1ss_result, #hnd2fs_result, #hnd2ss_result, #ND2_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #HND2_first_semester, #HND2_second_semester{
        display: none;
    }
</style>
</body>
</html>
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

<body onload="window.print()">
<!-- MAIN CONTENT
================================================== -->
<div class="main-content mt--3 container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <!-- Header -->
            <div class="header mt-md-2">
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
                                            echo 'WEIGHTED GRADE POINT <strong>(WGP)</strong>';
                                        }elseif (!empty($_SESSION['resultData']['WGP'])){
                                            echo 'CUMMULATIVE WEIGHTED GRADE POINT <strong>CWGP</strong>strong>';
                                        } ?>
                                    </td>
                                    <td colspan="2" class="px-0 text-right border-top border-top-2">
                                                <span class="h3">
                                                    <?php if(!empty($_SESSION['resultData']['WGP'])){
                                                        echo $_SESSION['resultData']['WGP'];
                                                    }elseif (!empty($_SESSION['resultData']['WGP'])){
                                                        echo $_SESSION['resultData']['CWGP'];
                                                    } ?>
                                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0 border-top border-top-2">
                                        <?php if(!empty($_SESSION['resultData']['GPA'])){
                                            echo 'GRADE POINT AVERAGE <strong>(GPA)</strong>';
                                        }elseif (!empty($_SESSION['resultData']['GPA'])){
                                            echo 'CUMMULATIVE GRADE POINT AVERAGE<strong>CGPA</strong>strong>';
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
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/js/user.js" type="text/javascript"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
</body>
</html>
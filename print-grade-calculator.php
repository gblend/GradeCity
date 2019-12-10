<?php
include_once 'admin/includes/functions.php';
if(!isLoggedInUser()){
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
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


    <title>Gradecity - Print Grade Result</title>
</head>

<body onload="onLoad()">
<!-- MAIN CONTENT
================================================== -->
<div class="main-content mt-6">
    <div class="container-fluid">
        <!-- Header -->
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
                                                <td class="pl-0">Total Unit(s)</td>
                                                <td class="pl-0"><td><?php if(!empty($queryData['SUM(course_unit)'])) { echo $queryData['SUM(course_unit)']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">Total Point(s)</td>
                                                <td class="pl-0"><td><?php if(!empty($queryData['SUM(grade_point_obtained)'])) { echo $queryData['SUM(grade_point_obtained)']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 font-weight-bold">GPA</td>
                                                <td class="pl-0"><?php if(!empty($queryData['SUM(grade_point_obtained)'])) { echo ROUND(($queryData['SUM(grade_point_obtained)'] / $queryData['SUM(course_unit)']), 2, 2); } ?></td>
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
    </div>
</div><br>

 <!-- / .main-content -->
<div id="editor"></div>
<div class="ml-6 mb-6">
    <button class="btn btn-primary" id="printCal">Print</button>
<!--    <button class="btn btn-primary" id="genPDF">Save as pdf</button>-->
</div>
<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Theme JS -->
<script src="./assets/js/theme.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js" type="text/javascript"></script>-->
</body>
<script>
    function onLoad() {
        window.print();
    }
    $('#printCal').click(function () {
       window.print();
       return false;
    });
    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor' : function (element, renderer) {
    //         return true;
    //     }
    // };
    // $('#genPDF').click(function () {
    //    doc.fromHTML($('#printCalculated').html(), 15, 15, {
    //        'width': 100%,
    //        'elementHandlers': specialElementHandlers
    //    });
    //
    //     doc.save('grade-result.pdf');
    // });
</script>
</html>
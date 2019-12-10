<?php
// (0) CONFIG
// MUTE NOTICES
error_reporting(E_ALL & ~E_NOTICE);
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 12/2/2019
 * Time: 8:40 AM
 */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['level_option'])){
       $DBtable = $level_option = $semester_option = $nd1_first_option = $nd1_second_option = $nd2_first_option = $nd2_second_option = $hnd1_first_option = $hnd1_second_option = $hnd2_first_option = $hnd2_second_option = "";
        $level_option = checkInput($_POST['level_option']);
        $semester_option = checkInput($_POST['semester_option']);
        $nd1_first_option = checkInput($_POST['nd1_first_option']);
        $nd1_second_option = checkInput($_POST['nd1_second_option']);
        $nd2_first_option = checkInput($_POST['nd2_first_option']);
        $nd2_second_option = checkInput($_POST['nd2_second_option']);
        $hnd1_first_option = checkInput($_POST['hnd1_first_option']);
        $hnd1_second_option = checkInput($_POST['hnd1_second_option']);
        $hnd2_first_option = checkInput($_POST['hnd2_first_option']);
        $hnd2_second_option = checkInput($_POST['hnd2_second_option']);
        if(empty($nd1_first_option) && empty($nd1_second_option) && empty($nd2_first_option) && empty($nd2_second_option) && empty($hnd1_first_option) && empty($hnd1_second_option) && empty($hnd2_first_option) && empty($hnd2_second_option)){
            http_response_code(400);
            echo "Please select a course";
            exit;
        }
        if(empty($_FILES['fileToUpload']['name'])){
            http_response_code(400);
            echo "Please select a file to upload";
            exit;
        }

        if(!empty($nd1_first_option)){
            $DBtable = $level_option.$semester_option.'_'.$nd1_first_option;
        } else if(!empty($nd1_second_option)){
            $DBtable = $level_option.$semester_option.'_'.$nd1_second_option;
        }
        if(!empty($nd2_first_option)){
            $DBtable = $level_option.$semester_option.'_'.$nd2_first_option;
        } else if(!empty($nd2_second_option)){
            $DBtable = $level_option.$semester_option.'_'.$nd2_second_option;
        }
        if(!empty($hnd1_first_option)){
            $DBtable = $level_option.$semester_option.'_'.$hnd1_first_option;
        } else if(!empty($hnd1_second_option)){
            $DBtable = $level_option.$semester_option.'_'.$hnd1_second_option;
        }
        if(!empty($hnd2_first_option)){
            $DBtable = $level_option.$semester_option.'_'.$hnd2_first_option;
        } else if(!empty($hnd2_second_option)){
            $DBtable = $level_option.$semester_option.'_'.$hnd2_second_option;
        }

        $dbhostname = "127.0.0.1";
        $username = "kashicom_root";
        $password = "Mikkynoble@1";
        $DBname = "kashicom_gradecity";
        $conn = new mysqli($dbhostname, $username, $password, $DBname);
        //Report error
        if(mysqli_connect_errno()) {
            echo "Connection failed: %s\n", mysqli_connect_error();
        }

        session_start();
//        Declare session variables
        $_SESSION['DBtable'] = $DBtable;
        $_SESSION['std_id'] = 'user_id';
        $_SESSION['cont_ass'] = 'cont_ass';
        $_SESSION['exam_60'] = 'exam_60';
        $_SESSION['exam_100'] = 'exam_100';
        $_SESSION['total_score'] = 'total_score';
        $_SESSION['uploaded_at'] = 'uploaded_at';
        $s_db_table = $_SESSION['DBtable'];
        $s_user_id = $_SESSION['std_id'];
        $s_cont_ass = $_SESSION['cont_ass'];
        $s_exam_60 = $_SESSION['exam_60'];
        $s_exam_100 = $_SESSION['exam_100'];
        $s_total_score = $_SESSION['total_score'];
        $s_uploaded_at = $_SESSION['uploaded_at'];
/*
 * Create Table If Not Exists: '$DBtable'
 */
$conn->query("DROP TABLE IF EXISTS `$s_db_table`");
$SQL = "CREATE TABLE IF NOT EXISTS `$s_db_table` ( `t_id` int(5) not null primary key auto_increment,`$s_user_id` varchar(40) NOT NULL UNIQUE, 
`$s_cont_ass` double(4,2) DEFAULT NULL, `$s_exam_60` double(5,2) DEFAULT NULL , `$s_exam_100` double(5,2) DEFAULT NULL, 
`$s_total_score` double(5,2) AS (`$s_exam_60` + `$s_cont_ass`) VIRTUAL, `$s_uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP, index(`$s_user_id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = $conn->query($SQL);
if($query !== TRUE){
    http_response_code(400);
    echo "Request failed";
    exit;
}

// (1) FILE CHECK
        if (!isset($_FILES['fileToUpload']['tmp_name']) || !in_array($_FILES['fileToUpload']['type'], [
                'text/x-comma-separated-values',
                'text/comma-separated-values',
                'text/x-csv',
                'text/csv',
                'text/plain',
                'application/octet-stream',
                'application/vnd.ms-excel',
                'application/x-csv',
                'application/csv',
                'application/excel',
                'application/vnd.msexcel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ])) {
    http_response_code(400);
            echo "Invalid file type";
            exit;
        }

// (2) INIT PHP SPREADSHEET
        require '../../vendor/autoload.php';
        if (pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION) == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['fileToUpload']['tmp_name']);

// (3) READ DATA & IMPORT
// ! NOTE ! EXCEL MUST BE IN EXACT FORMAT!
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        for($row = 2; $row <= count($sheetData); $row++){
            $xx = "'" . implode("'" . ","."'", $sheetData[$row]) . "'";
            $sql = "INSERT INTO `$s_db_table` (`user_id`, `cont_ass`, `exam_60`, `exam_100`) VALUES ($xx)";
            try {
                $stmt = $conn->query($sql);

            } catch (Exception $ex) {
                http_response_code(400);
                echo 'Oops! result upload failed';
                exit;
            }
        }
        if($conn->affected_rows > 0){
            http_response_code(200);
            echo 'Result uploaded successfully';
            // (4) CLOSE DATABASE CONNECTION
            $conn->close();
            exit;
        } else {
            http_response_code(400);
            echo "Oops! upload unsuccessful, please check the upload tips";
            exit;
        }
    }
}

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
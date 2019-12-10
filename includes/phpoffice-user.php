<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 12/3/2019
 * Time: 2:34 PM
 */

// CONNECT TO DATABASE
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'kashicom_gradecity');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'kashicom_root');
define('DB_PASSWORD', 'Mikkynoble@1');
$pdo = new PDO(
    "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
    DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
);
session_start();
if(!empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $resultTable = $_SESSION['resultTable'];
}
// CREATE PHPSPREADSHEET OBJECT
require "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//ND1 result to excel fetch
if(isset($_POST['nd1fs_result'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd1fs = new Spreadsheet();
    $sheet_fs = $spreadsheet_nd1fs->getActiveSheet();
    $sheet_fs->setTitle('My GradeCity Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM $resultTable WHERE matric_no = '$user_id'");
        $query = $stmt->execute();
    }catch(Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }

    $i = 2;
//Set Columns for fetched results
    $sheet_fs->setCellValue('A1', 'MATRICULATION NUMBER');
    $sheet_fs->setCellValue('B1', 'TRIG. & ANALYTICAL GEOMETRY  (MTH112)');
    $sheet_fs->setCellValue('C1', 'CITIZENSHIP EDUCATION/HIV1  (GNS111)');
    $sheet_fs->setCellValue('D1', 'INTRODUCTION TO DIGITAL ELECTRONICS  (COM112)');
    $sheet_fs->setCellValue('E1', 'DESCRIPVE STATISTICS 1  (STA112)');
    $sheet_fs->setCellValue('F1', 'INTRODUCTION TO COMPUTING  (COM111)');
    $sheet_fs->setCellValue('G1', 'INTRODUCTION TO PROGRAMMING  (COM113)');
    $sheet_fs->setCellValue('H1', 'LOGIC AND LINEAR ALGEBRA  (MTH111)');
    $sheet_fs->setCellValue('I1', 'LINUX OPERATING SYSTEM  (COM115)');
    $sheet_fs->setCellValue('J1', 'E. PROBABILITY THEORY  (STA117)');
    $sheet_fs->setCellValue('K1', 'USE OF ENGLISH  (GNS101)');
    $sheet_fs->setCellValue('L1', 'PC UPGRADE AND MAINTENANCE  (COM114)');
    $sheet_fs->setCellValue('M1', 'Weighted Grade Point (WGP)');
    $sheet_fs->setCellValue('N1', 'Grade Point Average (GPA)');
    $sheet_fs->setCellValue('O1', 'Remark');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_fs->setCellValue('A'.$i, $row['matric_no']);
        $sheet_fs->setCellValue('B'.$i, $row['MTH112']);
        $sheet_fs->setCellValue('C'.$i, $row['GNS111']);
        $sheet_fs->setCellValue('D'.$i, $row['COM112']);
        $sheet_fs->setCellValue('E'.$i, $row['STA112']);
        $sheet_fs->setCellValue('F'.$i, $row['COM111']);
        $sheet_fs->setCellValue('G'.$i, $row['COM113']);
        $sheet_fs->setCellValue('H'.$i, $row['MTH111']);
        $sheet_fs->setCellValue('I'.$i, $row['COM115']);
        $sheet_fs->setCellValue('J'.$i, $row['STA117']);
        $sheet_fs->setCellValue('K'.$i, $row['GNS101']);
        $sheet_fs->setCellValue('L'.$i, $row['COM114']);
        $sheet_fs->setCellValue('M'.$i, $row['WGP']);
        $sheet_fs->setCellValue('N'.$i, $row['GPA']);
        $sheet_fs->setCellValue('O'.$i, $row['REMARK']);
        $i++;
    }
// OUTPUT
    $writer = new Xlsx($spreadsheet_nd1fs);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="My_GradeCity_Result.xlsx"');
    header('Cache-Control: max-age=0');
    header('Expires: Fri, 11 Nov 2020 11:11:11 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');
    try {
        $writer->save('php://output');
    } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
    }
}

//HND1 first semester result to excel fetch
if(isset($_POST['hnd1fs_result'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd1fs = new Spreadsheet();
    $sheet_fs = $spreadsheet_nd1fs->getActiveSheet();
    $sheet_fs->setTitle('My GradeCity Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM $resultTable WHERE matric_no = '$user_id'");
        $query = $stmt->execute();
    }catch(Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }

    $i = 2;
///Set Columns for fetched results
    $sheet_fs->setCellValue('A1', 'Matriculation Number');
    $sheet_fs->setCellValue('B1', 'Use of English I (GNS301)');
    $sheet_fs->setCellValue('C1', 'Statistics Theory I (STA311)');
    $sheet_fs->setCellValue('D1', 'Database Design I (COM312)');
    $sheet_fs->setCellValue('E1', 'Computer Architecture (COM314)');
    $sheet_fs->setCellValue('F1', 'Advanced Calculus (MTH312)');
    $sheet_fs->setCellValue('G1', 'Operation Research I (STA314)');
    $sheet_fs->setCellValue('H1', 'C++ (COM313)');
    $sheet_fs->setCellValue('I1', 'Operating System I (COM311)');
    $sheet_fs->setCellValue('J1', 'Numerical Methods (COM317)');
    $sheet_fs->setCellValue('K1', 'Advanced Algebra (MTH311)');
    $sheet_fs->setCellValue('L1', 'Weighted Grade Point (WGP)');
    $sheet_fs->setCellValue('M1', 'Grade Point Average (GPA)');
    $sheet_fs->setCellValue('N1', 'Remark');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_fs->setCellValue('A'.$i, $row['matric_no']);
        $sheet_fs->setCellValue('B'.$i, $row['GNS301']);
        $sheet_fs->setCellValue('C'.$i, $row['STA311']);
        $sheet_fs->setCellValue('D'.$i, $row['COM312']);
        $sheet_fs->setCellValue('E'.$i, $row['COM314']);
        $sheet_fs->setCellValue('F'.$i, $row['MTH312']);
        $sheet_fs->setCellValue('G'.$i, $row['STA314']);
        $sheet_fs->setCellValue('H'.$i, $row['COM313']);
        $sheet_fs->setCellValue('I'.$i, $row['COM311']);
        $sheet_fs->setCellValue('J'.$i, $row['COM317']);
        $sheet_fs->setCellValue('K'.$i, $row['MTH311']);
        $sheet_fs->setCellValue('L'.$i, $row['WGP']);
        $sheet_fs->setCellValue('M'.$i, $row['GPA']);
        $sheet_fs->setCellValue('N'.$i, $row['REMARK']);
        $i++;
    }
// OUTPUT
    $writer = new Xlsx($spreadsheet_nd1fs);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="My_GradeCity_Result.xlsx"');
    header('Cache-Control: max-age=0');
    header('Expires: Fri, 11 Nov 2020 11:11:11 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');
    try {
        $writer->save('php://output');
    } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
    }
}


//HND1 second semester result to excel fetch
if(isset($_POST['hnd1ss_result'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_hnd1ss = new Spreadsheet();
    $sheet_hnd1ss = $spreadsheet_hnd1ss->getActiveSheet();
    $sheet_hnd1ss->setTitle('My GradeCity Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM $resultTable WHERE matric_no = '$user_id'");
        $query = $stmt->execute();
    }catch(Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }

    $i = 2;
//Set Columns for fetched results
    $sheet_hnd1ss->setCellValue('A1', 'MATRICULATION NUMBER');
    $sheet_hnd1ss->setCellValue('B1', 'Assembly Language (COM323)');
    $sheet_hnd1ss->setCellValue('C1', 'Comp. Techn. Java (COM325)');
    $sheet_hnd1ss->setCellValue('D1', 'Database Design II (COM322)');
    $sheet_hnd1ss->setCellValue('E1', 'Entrepreneurship Dev. (EDD316)');
    $sheet_hnd1ss->setCellValue('F1', 'Statistics Theory II (STA321)');
    $sheet_hnd1ss->setCellValue('G1', 'Software Engineering (COM324)');
    $sheet_hnd1ss->setCellValue('H1', 'Operating System II (COM321)');
    $sheet_hnd1ss->setCellValue('I1', 'HCI (COM326)');
    $sheet_hnd1ss->setCellValue('J1', 'Comm in English III (GNS302)');
    $sheet_hnd1ss->setCellValue('K1', 'Research Methodology (GNS304)');
    $sheet_hnd1ss->setCellValue('L1', 'Cmmulative Weighted Grade Point (CWGP)');
    $sheet_hnd1ss->setCellValue('M1', 'Cummulative Grade Point Average (CGPA)');
    $sheet_hnd1ss->setCellValue('N1', 'REMARK');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_hnd1ss->setCellValue('A'.$i, $row['matric_no']);
        $sheet_hnd1ss->setCellValue('B'.$i, $row['COM323']);
        $sheet_hnd1ss->setCellValue('C'.$i, $row['COM325']);
        $sheet_hnd1ss->setCellValue('D'.$i, $row['COM322']);
        $sheet_hnd1ss->setCellValue('E'.$i, $row['EDD316']);
        $sheet_hnd1ss->setCellValue('F'.$i, $row['STA321']);
        $sheet_hnd1ss->setCellValue('G'.$i, $row['COM324']);
        $sheet_hnd1ss->setCellValue('H'.$i, $row['COM321']);
        $sheet_hnd1ss->setCellValue('I'.$i, $row['COM326']);
        $sheet_hnd1ss->setCellValue('J'.$i, $row['GNS302']);
        $sheet_hnd1ss->setCellValue('K'.$i, $row['GNS304']);
        $sheet_hnd1ss->setCellValue('L'.$i, $row['CWGP']);
        $sheet_hnd1ss->setCellValue('M'.$i, $row['CGPA']);
        $sheet_hnd1ss->setCellValue('N'.$i, $row['REMARK']);
        $i++;
    }
// OUTPUT
    $writer = new Xlsx($spreadsheet_hnd1ss);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="My_GradeCity_Result.xlsx"');
    header('Cache-Control: max-age=0');
    header('Expires: Fri, 11 Nov 2020 11:11:11 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');
    try {
        $writer->save('php://output');
    } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
    }
}


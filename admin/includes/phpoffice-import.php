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

// CREATE PHPSPREADSHEET OBJECT
require "../../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//ND1 result to excel fetch
if(isset($_POST['download_nd1fs'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd1fs = new Spreadsheet();
    try {
        $sheet_fs = $spreadsheet_nd1fs->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_fs->setTitle('GradeCity ND1 Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM `nd1fs_result`");
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
    header('Content-Disposition: attachment;filename="GradeCity_ND1_Result.xlsx"');
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

if(isset($_POST['download_nd1ss'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd1ss = new Spreadsheet();
    try {
        $sheet_nd1ss = $spreadsheet_nd1ss->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_nd1ss->setTitle('GradeCity ND1 Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM `nd1ss_result`");
        $query = $stmt->execute();
    }catch (Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
    $sheet_nd1ss->setCellValue('A1', 'Matriculation Number');
    $sheet_nd1ss->setCellValue('B1', 'Comm in English III (GNS302)');
    $sheet_nd1ss->setCellValue('C1', 'Statistics Theory II (STA321)');
    $sheet_nd1ss->setCellValue('D1', 'Database Design II (COM322)');
    $sheet_nd1ss->setCellValue('E1', 'Comp. Techn. Java (COM325)');
    $sheet_nd1ss->setCellValue('F1', 'Software Engineering (COM324)');
    $sheet_nd1ss->setCellValue('G1', 'Research Methodology (GNS304)');
    $sheet_nd1ss->setCellValue('H1', 'Entrepreneurship Dev. (EDD316)');
    $sheet_nd1ss->setCellValue('I1', 'Operating System II (COM321)');
    $sheet_nd1ss->setCellValue('J1', 'HCI (COM326)');
    $sheet_nd1ss->setCellValue('K1', 'Assembly Language (COM323)');
    $sheet_nd1ss->setCellValue('L1', 'Weighted Grade Point (WGP)');
    $sheet_nd1ss->setCellValue('M1', 'Grade Point Average (GPA)');
    $sheet_nd1ss->setCellValue('N1', 'Remark');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_nd1ss->setCellValue('A'.$i, $row['matric_no']);
        $sheet_nd1ss->setCellValue('B'.$i, $row['GNS302']);
        $sheet_nd1ss->setCellValue('C'.$i, $row['STA321']);
        $sheet_nd1ss->setCellValue('D'.$i, $row['COM322']);
        $sheet_nd1ss->setCellValue('E'.$i, $row['COM326']);
        $sheet_nd1ss->setCellValue('F'.$i, $row['EDD316']);
        $sheet_nd1ss->setCellValue('G'.$i, $row['COM326']);
        $sheet_nd1ss->setCellValue('H'.$i, $row['COM323']);
        $sheet_nd1ss->setCellValue('I'.$i, $row['COM321']);
        $sheet_nd1ss->setCellValue('J'.$i, $row['COM325']);
        $sheet_nd1ss->setCellValue('K'.$i, $row['GNS304']);
        $sheet_nd1ss->setCellValue('L'.$i, $row['WGP']);
        $sheet_nd1ss->setCellValue('M'.$i, $row['GPA']);
        $sheet_nd1ss->setCellValue('N'.$i, $row['REMARK']);
        $i++;
    }

// OUTPUT
    $writer = new Xlsx($spreadsheet_nd1ss);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_ND1_Result.xlsx"');
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

//ND2 result to excel fetch
if(isset($_POST['download_nd2fs'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd2fs = new Spreadsheet();
    try {
        $sheet_fs = $spreadsheet_nd2fs->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_fs->setTitle('GradeCity ND2 Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM `nd2fs_result`");
        $query = $stmt->execute();
    }catch(Exception $exc){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
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
    $writer = new Xlsx($spreadsheet_nd2fs);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_ND2_Result.xlsx"');
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

if(isset($_POST['download_nd2ss'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_nd2ss = new Spreadsheet();
    try {
        $sheet_nd2ss = $spreadsheet_nd2ss->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_nd2ss->setTitle('GradeCity ND2 Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM `nd2ss_result`");
        $query = $stmt->execute();
    }catch (Exception $exc){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
    $sheet_nd2ss->setCellValue('A1', 'Matriculation Number');
    $sheet_nd2ss->setCellValue('B1', 'Comm in English III (GNS302)');
    $sheet_nd2ss->setCellValue('C1', 'Statistics Theory II (STA321)');
    $sheet_nd2ss->setCellValue('D1', 'Database Design II (COM322)');
    $sheet_nd2ss->setCellValue('E1', 'Comp. Techn. Java (COM325)');
    $sheet_nd2ss->setCellValue('F1', 'Software Engineering (COM324)');
    $sheet_nd2ss->setCellValue('G1', 'Research Methodology (GNS304)');
    $sheet_nd2ss->setCellValue('H1', 'Entrepreneurship Dev. (EDD316)');
    $sheet_nd2ss->setCellValue('I1', 'Operating System II (COM321)');
    $sheet_nd2ss->setCellValue('J1', 'HCI (COM326)');
    $sheet_nd2ss->setCellValue('K1', 'Assembly Language (COM323)');
    $sheet_nd2ss->setCellValue('L1', 'Weighted Grade Point (WGP)');
    $sheet_nd2ss->setCellValue('M1', 'Grade Point Average (GPA)');
    $sheet_nd2ss->setCellValue('N1', 'Remark');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_nd2ss->setCellValue('A'.$i, $row['matric_no']);
        $sheet_nd2ss->setCellValue('B'.$i, $row['GNS302']);
        $sheet_nd2ss->setCellValue('C'.$i, $row['STA321']);
        $sheet_nd2ss->setCellValue('D'.$i, $row['COM322']);
        $sheet_nd2ss->setCellValue('E'.$i, $row['COM326']);
        $sheet_nd2ss->setCellValue('F'.$i, $row['EDD316']);
        $sheet_nd2ss->setCellValue('G'.$i, $row['COM326']);
        $sheet_nd2ss->setCellValue('H'.$i, $row['COM323']);
        $sheet_nd2ss->setCellValue('I'.$i, $row['COM321']);
        $sheet_nd2ss->setCellValue('J'.$i, $row['COM325']);
        $sheet_nd2ss->setCellValue('K'.$i, $row['GNS304']);
        $sheet_nd2ss->setCellValue('L'.$i, $row['WGP']);
        $sheet_nd2ss->setCellValue('M'.$i, $row['GPA']);
        $sheet_nd2ss->setCellValue('N'.$i, $row['REMARK']);
        $i++;
    }

// OUTPUT
    $writer = new Xlsx($spreadsheet_nd2ss);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_ND2_Result.xlsx"');
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

//HND1 result to excel fetch
if(isset($_POST['download_hnd1fs'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_hnd1fs = new Spreadsheet();
    try {
        $sheet_fs = $spreadsheet_hnd1fs->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_fs->setTitle('GradeCity HND1 Result');
    $stmt = $pdo->prepare("SELECT * FROM `hnd1fs_result`");
    $query = $stmt->execute();
    if($query !== TRUE){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
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
    $sheet_fs->setCellValue('L1', 'Weighted Grade Point (CWGP)');
    $sheet_fs->setCellValue('M1', 'Grade Point Average (CGPA)');
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
        $sheet_fs->setCellValue('L'.$i, $row['CWGP']);
        $sheet_fs->setCellValue('M'.$i, $row['CGPA']);
        $sheet_fs->setCellValue('N'.$i, $row['REMARK']);
        $i++;
    }

// OUTPUT
    $writer = new Xlsx($spreadsheet_hnd1fs);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_HND1_Result.xlsx"');
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

if(isset($_POST['download_hnd1ss'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_hnd1ss = new Spreadsheet();
    try {
        $sheet_hnd1ss = $spreadsheet_hnd1ss->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_hnd1ss->setTitle('GradeCity HND1 Result');
    $stmt = $pdo->prepare("SELECT * FROM `hnd1ss_result`");
    $query = $stmt->execute();
    if($query !== TRUE){
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
    header('Content-Disposition: attachment;filename="GradeCity_HND1_Result.xlsx"');
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


// HND2 Result to excel
if(isset($_POST['download_hnd2fs'])){

    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_hnd2fs = new Spreadsheet();
    try {
        $sheet_fs = $spreadsheet_hnd2fs->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_fs->setTitle('GradeCity HND2 Result');
    try {
        $stmt = $pdo->prepare("SELECT * FROM `hnd2fs_result`");
        $query = $stmt->execute();
    }catch(Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
    $sheet_fs->setCellValue('A1', 'Matriculation Number');
    $sheet_fs->setCellValue('B1', 'Use of English I (GNS301)');
    $sheet_fs->setCellValue('C1', 'Statistics Theory I (STA311)');
    $sheet_fs->setCellValue('D1', 'Database Design I (COM312)');
    $sheet_fs->setCellValue('E1', 'Computer Architecture (COM314)');
    $sheet_fs->setCellValue('F1', 'Advanced Calculus (MTH312)');
    $sheet_fs->setCellValue('G1', 'Operation Research I (STA314)');
    $sheet_fs->setCellValue('H1', 'C++ (COM313)');
    $sheet_fs->setCellValue('I1', 'Weighted Grade Point (WGP)');
    $sheet_fs->setCellValue('J1', 'Grade Point Average (GPA)');
    $sheet_fs->setCellValue('K1', 'Remark');
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
        $sheet_fs->setCellValue('I'.$i, $row['WGP']);
        $sheet_fs->setCellValue('J'.$i, $row['GPA']);
        $sheet_fs->setCellValue('K'.$i, $row['REMARK']);
        $i++;
    }

// OUTPUT
    $writer = new Xlsx($spreadsheet_hnd2fs);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_HND2_Result.xlsx"');
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

if(isset($_POST['download_hnd2ss'])){
    // CREATE A NEW SPREADSHEET + POPULATE DATA
    $spreadsheet_hnd2ss = new Spreadsheet();
    try {
        $sheet_hnd2ss = $spreadsheet_hnd2ss->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    }
    $sheet_hnd2ss->setTitle('GradeCity HND2 Result');
    try{
        $stmt = $pdo->prepare("SELECT * FROM `hnd2ss_result`");
        $query = $stmt->execute();
    } catch (Exception $ex){
        http_response_code(400);
        echo "Result not available";
        exit;
    }
    $i = 2;
//Set Columns for fetched results
    $sheet_hnd2ss->setCellValue('A1', 'Matriculation Number');
    $sheet_hnd2ss->setCellValue('B1', 'Comm in English III (GNS302)');
    $sheet_hnd2ss->setCellValue('C1', 'Statistics Theory II (STA321)');
    $sheet_hnd2ss->setCellValue('D1', 'Database Design II (COM322)');
    $sheet_hnd2ss->setCellValue('E1', 'Comp. Techn. Java (COM325)');
    $sheet_hnd2ss->setCellValue('F1', 'Software Engineering (COM324)');
    $sheet_hnd2ss->setCellValue('G1', 'Research Methodology (GNS304)');
    $sheet_hnd2ss->setCellValue('H1', 'Entrepreneurship Dev. (EDD316)');
    $sheet_hnd2ss->setCellValue('I1', 'Operating System II (COM321)');
    $sheet_hnd2ss->setCellValue('J1', 'Weighted Grade Point (WGP)');
    $sheet_hnd2ss->setCellValue('K1', 'Grade Point Average (GPA)');
    $sheet_hnd2ss->setCellValue('L1', 'Remark');
//Database result rows
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
        $sheet_hnd2ss->setCellValue('A'.$i, $row['matric_no']);
        $sheet_hnd2ss->setCellValue('B'.$i, $row['GNS302']);
        $sheet_hnd2ss->setCellValue('C'.$i, $row['STA321']);
        $sheet_hnd2ss->setCellValue('D'.$i, $row['COM322']);
        $sheet_hnd2ss->setCellValue('E'.$i, $row['COM326']);
        $sheet_hnd2ss->setCellValue('F'.$i, $row['EDD316']);
        $sheet_hnd2ss->setCellValue('G'.$i, $row['COM326']);
        $sheet_hnd2ss->setCellValue('H'.$i, $row['COM323']);
        $sheet_hnd2ss->setCellValue('I'.$i, $row['COM321']);
        $sheet_hnd2ss->setCellValue('J'.$i, $row['WGP']);
        $sheet_hnd2ss->setCellValue('K'.$i, $row['GPA']);
        $sheet_hnd2ss->setCellValue('L'.$i, $row['REMARK']);
        $i++;
    }

// OUTPUT
    $writer = new Xlsx($spreadsheet_hnd2ss);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="GradeCity_HND2_Result.xlsx"');
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
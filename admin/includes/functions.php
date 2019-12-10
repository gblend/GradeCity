<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 11/25/2019
 * Time: 10:48 AM
 */
$dbhostname = "127.0.0.1";
$dbname = "kashicom_gradecity";
$username = "kashicom_root";
$password = "Mikkynoble@1";
$conn = new mysqli($dbhostname, $username, $password, $dbname);
//Report error
if(mysqli_connect_errno()) {
    echo "Connection failed: %s\n", mysqli_connect_error();
}
session_start();

// LOGIN SCRIPT
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['loginUserConfirm'])){
        $loginUserConfirm = '';
        $loginUserConfirm = $_POST['loginUserConfirm'];
    }
    if(!empty($loginUserConfirm)){
        $user_id = $password = '';
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        if (empty($user_id)) {
            http_response_code(400);
            $user_idMsg = 'Staff code | Matric number is required';
            echo $user_idMsg;
            exit;
        } else {
            $user_id = checkInput($user_id);
        }
        if (empty($password)) {
            http_response_code(400);
            $passwordMsg = 'Password is required';
            echo $passwordMsg;
            exit;
        } else {
            $password = checkInput($password);
            // ;
            $sql = $conn->query("select * from users where user_id = '$user_id'");
            if ($conn->affected_rows > 0) {
                $data = mysqli_fetch_assoc($sql);
                $passwordCheck = $data['password'];
                $verifyPassword = password_verify($password, $passwordCheck);
                if ($verifyPassword) {
                    $_SESSION['firstname'] = $data['firstname'];
                    $_SESSION['lastname'] = $data['lastname'];
                    $_SESSION['user_id'] = $data['user_id'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['gender'] = $data['gender'];
                    $_SESSION['level'] = $data['level'];
                    $_SESSION['profile_image'] = $data['profile_image'];
                    $_SESSION['user_type'] = $data['user_type'];
                    $sessionUserType = $_SESSION['user_type'];
                    http_response_code(200);
                    $userType = $sessionUserType;
                    echo  $userType;
                    $conn->close();
                    exit;
                } else {
                    http_response_code(400);
                    $msgLogin = "Password entered is wrong.";
                    echo $msgLogin;
                    exit;
                }
            } else {
                http_response_code(400);
                $msgLogin = "Invalid user code or password.";
                echo $msgLogin;
                exit;
            }
        }
    }
}
// PROFILE SCRIPT ENDS
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Check if admin is logged in
function isLoggedInAdmin() {
    if(!empty($_SESSION['user_type'])){
        $userType = $_SESSION['user_type'];
    }
    if($userType === 'admin') {
        return true;
    } else {
        return false;
    }
}
// Check if user is logged in
function isLoggedInUser() {
    if(!empty($_SESSION['user_type'])){
        $userType = $_SESSION['user_type'];
    }
    if($userType === 'user') {
        return true;
    } else {
        return false;
    }
}

/**
 * Create user
 */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['createUserConfirm'])){
        $createUserConfirm = '';
        $createUserConfirm = $_POST['createUserConfirm'];
    }
    if(!empty($createUserConfirm)){
        $firstname = $lastname = $email = $user_id = $password = $user_type = $level = "";
        $firstname = checkInput($_POST['firstName']);
        $lastname = checkInput($_POST['lastName']);
        $email = checkInput(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $user_id = checkInput(strtoupper($_POST['user_id']));
        $password = checkInput($_POST['password']);
        $level = checkInput(strtoupper($_POST['level_option']));
        $user_type = checkInput($_POST['user_type']);
        if(empty($user_id) || empty($user_type) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($level)){
            http_response_code(400);
            echo "Please fill all empty field";
            exit;
        }
        if(strlen($user_id) < 8){
            http_response_code(400);
            echo  "User code must be up to 8 characters";
            exit;
        }
        if(strlen($firstname) < 3 ){
            http_response_code(400);
            echo "First name must be up to 3 characters";
            exit;
        }
        if(strlen($lastname) < 3 ){
            http_response_code(400);
            echo "Last name must be up to 3 characters";
            exit;
        }
        if(strlen($password) < 3) {
            http_response_code(400);
            echo "Password must be up to 3 characters";
            exit;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE user_id = '$user_id' OR email = '$email'";
        $stmt = $conn->query($sql);
        if($conn->affected_rows > 0){
            http_response_code(400);
            echo "Email or Number already exist";
            exit;
        } else {
            $sql = "INSERT INTO users (user_id, firstname, lastname, email, user_type, level, password) VALUES ('$user_id', '$firstname', '$lastname', '$email', '$user_type', '$level', '$password')";
            $stmt = $conn->query($sql);
            if($conn->affected_rows > 0){
                http_response_code(200);
                echo "Record created successfully";
                $conn->close();
                exit;
            } else {
                http_response_code(400);
                echo "Oops! record was not saved";
                exit;
            }
        }
    }
}


// General Page Settings
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['PageSettingConfirm'])) {
        $sessionID = '';
        $sessionID = $_POST['PageSettingConfirm'];

        $academic_week_old = $academic_year_old = $current_semester_old = $current_year_old = '';
        if(!empty($_SESSION['current_year'])) {
            $sessionCurrSemester = $_SESSION['current_semester'];
            $sessionAcadYear = $_SESSION['current_year'];
            $SQL = "select * from page_settings where current_year = '$sessionAcadYear'";
            $queryOld = $conn->query($SQL);
            if($conn->affected_rows > 0) {
                $querydata = mysqli_fetch_assoc($queryOld);
                $academic_week_old = $querydata['academic_week'];
                $academic_year_old = $querydata['academic_year'];
                $current_semester_old = $querydata['current_semester'];
                $current_year_old = $querydata['current_year'];
            }
        }
    }
    if(!empty($sessionID)) {
        $academic_week = $academic_year = $current_semester = $current_year = "";

        if (!empty($_POST['academic_week'])) {

            $academic_week = checkInput(strtoupper($_POST['academic_week']));
        } else {
            $academic_week = strtoupper($academic_week_old);
        }
        if (!empty($_POST['academic_year'])) {
            $academic_year = checkInput(strtoupper($_POST['academic_year']));
        } else {
            $academic_year = strtoupper($academic_year_old);
        }

        if (!empty($_POST['current_semester'])) {
            $current_semester = checkInput(strtoupper($_POST['current_semester']));
        } else {
            $current_semester = strtoupper($current_semester_old);
        }
        if (!empty($_POST['current_year'])) {
            $current_year = checkInput($_POST['current_year']);
        } else {
            $current_year = $current_year_old;
        }

        //Page settings table update
        if(!empty($_SESSION['current_year'])){
            if (mysqli_num_rows($queryOld) > 0) {
                $request = $conn->query("update page_settings set academic_year = '$academic_year', academic_week = '$academic_week', current_year = '$current_year', current_semester = '$current_semester' where current_year = '$sessionAcadYear'");
                if ($request) {
                    http_response_code(200);
                    echo 'Settings updated successfully';
                    exit;
                } else {
                    http_response_code(400);
                    echo 'Settings update failed';
                    exit;
                }

            } else {
                $query = $conn->query("INSERT INTO page_settings(academic_year, academic_week, current_year, current_semester) VALUES('$academic_year', '$academic_week', '$current_year', '$current_semester')");
                if ($query) {
                    http_response_code(200);
                    echo 'Settings saved successfully';
                    exit;
                } else {
                    http_response_code(400);
                    echo 'Settings update failed';
                    exit;
                }
            }
        } else {
            if(empty($academic_year) && empty($academic_week) && empty($current_year) && empty($current_semester)){
                http_response_code(400);
                echo 'Settings update failed';
                exit;
            } else {
                $Query = $conn->query("select * from page_settings where current_year = '$current_year'");
                if($Query){
                    $request = $conn->query("update page_settings set academic_year = '$academic_year', academic_week = '$academic_week', current_year = '$current_year', current_semester = '$current_semester' where current_year = '$current_year' AND current_semester = '$current_semester'");
                    if ($request) {
                        http_response_code(200);
                        echo 'Settings saved successfully';
                        exit;
                    } else {
                        http_response_code(400);
                        echo 'Settings failed to save select';
                        exit;
                    }
                } else{
                    $query = $conn->query("INSERT INTO page_settings(academic_year, academic_week, current_year, current_semester, ) VALUES('$academic_year', '$academic_week', '$current_year', '$current_semester')");
                    if ($query) {
                        http_response_code(200);
                        echo 'Settings saved successfully';
                        $conn->close();
                        exit;
                    } else {
                        http_response_code(400);
                        echo 'Settings failed to save insert';
                        exit;
                    }
                }
            }
        }
    }
}

//General Page Academic Session Details Fetch
$currentYear = date('Y');
$previousYear = $currentYear - 1;
$yearAhead = $currentYear + 1;
$oldAcadYear = $previousYear."/".$currentYear;
$recentAcadYear = $currentYear."/".$yearAhead;
$pageSQL = "select * from page_settings WHERE current_year = '$currentYear' AND academic_year BETWEEN '$oldAcadYear' AND '$recentAcadYear'";
$pageQuery = $conn->query($pageSQL);
if($conn->affected_rows > 0){
    $data = mysqli_fetch_assoc($pageQuery);
    $_SESSION['academic_year'] = $data['academic_year'];
    $_SESSION['academic_week'] = $data['academic_week'];
    $_SESSION['current_year'] = $data['current_year'];
    if($data['academic_week'] < 7 ){
        $_SESSION['current_semester'] = 'FIRST';
    } else {
        $_SESSION['current_semester'] = 'SECOND';
    }
}
// User grade calculator course deletion
if(isset($_POST['delete-course'])){
    if(!empty($_POST['course-code'])){
        $course_code = $_POST['course-code'];
        $query = $conn->query("DELETE FROM grade_calculator WHERE course_code = '$course_code'");
    }
}

//Result check information check
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['checkResultModal'])){
        $levelOption = $semesterOption = '';
        if(empty($_POST['level_option'])){
            http_response_code(400);
            echo 'Please select level';
            exit;
        }else if(empty($_POST['semester_option'])){
            http_response_code(400);
            echo 'Please select semester';
            exit;
        } else{
            $levelOption = checkInput($_POST['level_option']);
            $semesterOption = checkInput($_POST['semester_option']);
            $_SESSION['checkResultSemester'] = $semesterOption;
            $_SESSION['checkResultLevel'] = $levelOption;
            $resultTable = $levelOption.$semesterOption."_result";
            $_SESSION['resultTable'] = $resultTable;
            $user_id = $_SESSION['user_id'];
            $query = $conn->query("SELECT * FROM $resultTable WHERE matric_no = '$user_id'");
            $row = $conn->affected_rows;
            if($row > 0){
                $data = $query->fetch_array();
                $_SESSION['resultData'] = $data;
                http_response_code(200);
                //echo 'Request successful';
                exit;
            } else {
                http_response_code(400);
                echo 'Result is not available';
                exit;
            }
        }
    }
}



<?php /** @noinspection ALL */
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

// User profile settings
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['SettingUserConfirm'])) {
        $sessionID = '';
        $sessionID = $_POST['SettingUserConfirm'];

            $user_id = $sessionID;
            $userSQL = "select * from users where user_id = '$user_id'";
            $queryUser = $conn->query($userSQL);
            if($conn->affected_rows > 0) {
                $userdata = $email_old = $password_old = $profilePicture = $gender_old = '';
                $userdata = mysqli_fetch_assoc($queryUser);
                $email_old = $userdata['email'];
                $password_old = $userdata['password'];
                $profilePicture = $userdata['profile_image'];
                $gender_old = $userdata['gender'];
            } else {
                http_response_code(400);
                echo "Details could not be updated";
                exit;
            }
    }
    if(!empty($sessionID)) {
        $target_dir = $filename_valid = $filename = $target_file = $email = $email_valid = $image = $password = $password_confirmation = $gender = $gender_valid = "";
        $target_dir = "../assets/img/uploads/";
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
        }
        if (!empty($filename) && $filename != "") {
            $filename_valid = $filename;
            $target_file = $target_dir . $filename;
        } else {
            $filename_valid = $profilePicture;
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if (!empty($email)) {
                $email = checkInput($email);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    http_response_code(400);
                    $emailMsg = "Invalid email format";
                    echo $emailMsg;
                    exit;
                } else {
                    $email_valid = $email;
                }
            }
        } else {
            $email_valid = $email_old;
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
            if (!empty($password)) {
                if (strlen($password) < 5) {
                    http_response_code(400);
                    echo "Password too short";
                    exit;
                } else {
                    $password = checkInput($password);
                }
            }
        }

        if (!empty($_POST['password_confirmation'])) {
            $password_confirmation = $_POST['password_confirmation'];
            if (!empty($password_confirmation)) {
                $password_confirmation = checkInput($password_confirmation);
            }
            if ($password != $password_confirmation) {
                http_response_code(400);
                $passwordConfirm = "Password mismatch";
                echo $passwordConfirm;
                exit;
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $password_valid = $password;
            }
        } else {
            $password_valid = $password_old;
        }
        if (!empty($_POST['gender'])) {
            $gender = $_POST['gender'];
            if (!empty($gender)) {
                $gender = checkInput($gender);
                $gender_valid = $gender;
            }
        } else {
            $gender_valid = $gender_old;
        }

        //Users table update
        $sql = $conn->query("select * from users where user_id = '$user_id'");
        if ($conn->affected_rows > 0) {
            $request = $conn->query("update users set email = '$email_valid', profile_image = '$filename_valid', password = '$password_valid', gender = '$gender_valid' where user_id = '$user_id'");
            if ($request){
                if(isset($_FILES['image'])){
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
     http_response_code(200);
                $profileStatus = 'Record updated successfully';
                echo $profileStatus;
                exit;
            } else {
                http_response_code(400);
                echo "Record update failed";
                $conn->close();
                exit;
            }
        } else {
            http_response_code(400);
            $settingStatus = 'Record update failed';
            echo $settingStatus;
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


/**
 * Grade Calculator
 */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['user_id'])){
        $user_id = '';
        $user_id = $_POST['user_id'];
    }
    if(!empty($user_id)){
        $user_id = $course_title = $course_code = $course_unit = $grade_pointObtained = $course_grade = '';
        $user_id = $_POST['user_id'];
        $course_title = $_POST['course_title'];
        $course_title = checkInput(ucwords($course_title));
        $course_code = checkInput(strtoupper($_POST['course_code']));
        $course_unit = checkInput($_POST['course_unit']);
        $grade_obtained= checkInput($_POST['grade_obtained']);
        $grade_pointObtained = checkInput($_POST['grade_pointObtained']);
        if(empty($user_id) || empty($course_title) || empty($course_code) || empty($course_unit) || empty($grade_obtained) || empty($grade_pointObtained)){
            http_response_code(400);
            echo "Please fill all empty field";
            exit;
        }
        if(strlen($course_title) < 4){
            http_response_code(400);
            echo  "Course title is too short";
            exit;
        }
        $sql = "SELECT * FROM grade_calculator WHERE course_code = '$course_code' AND user_id = '$user_id'";
        $stmt = $conn->query($sql);
        if($conn->affected_rows > 0){
            $Query = $conn->query("UPDATE grade_calculator SET user_id = '$user_id', course_title = '$course_title', course_code = '$course_code', course_unit = '$course_unit', grade_obtained = '$grade_obtained', student_grade_point = '$grade_pointObtained' WHERE user_id = '$user_id' AND course_code = '$course_code'");
                if($Query){
                    http_response_code(200);
                    echo "Course updated successfully";
                    exit;
                } else {
                    http_response_code(400);
                    echo "Course update failed";
                    exit;
                }
        } else {
            $sql = "INSERT INTO grade_calculator (user_id, course_title, course_code, course_unit, grade_obtained, student_grade_point) VALUES ('$user_id', '$course_title', '$course_code', '$course_unit', '$grade_obtained', '$grade_pointObtained')";
            $stmt = $conn->query($sql);
            if($conn->affected_rows > 0){
                http_response_code(200);
                echo "Course added successfully";
                $conn->close();
                exit;
            } else {
                http_response_code(400);
                echo "Oops! course was not saved";
                exit;
            }

        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['selector'])) {
        $email = $password = $confirm_password = $selector = "";
        $email = $_POST['process_email'];
        $email = checkInput($email);
        $selector = $_POST['selector'];
        $password = $_POST['process_password'];
        $password = checkInput($password);
        $confirm_password = $_POST['process_confirm_password'];
        $confirm_password = checkInput($confirm_password);
        If(empty($email) || empty($password) || empty($confirm_password)) {
            http_response_code(400);
            echo "Please fill all field";
            exit;
        }
        if($password !== $confirm_password) {
            http_response_code(400);
            echo "Password mismatch";
            exit;
        }
        if(strlen($password) < 6){
            http_response_code(400);
            echo  "Password is too short";
            exit;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $time_now = time();
        // Get tokens
        $result = $conn->query("SELECT * FROM password_reset WHERE reset_key = '$selector' AND expires >= '$time_now'");
        $resultRow = $conn->affected_rows;
        if($resultRow > 0) {
            // Update password
            $user = $conn->query("UPDATE users SET password = '$password' WHERE email = '$email'");
            $userRow = $conn->affected_rows;
            if ($userRow > 0) {
                http_response_code(200);
                echo 'Password updated successfully.';
                // Delete any existing password reset AND remember me tokens for this user
                $conn->query("DELETE FROM password_reset WHERE reset_email = '$email'");
                exit;
            } else {
                http_response_code(400);
                echo  'Password reset failed.';
                exit;
            }
        } else {
            http_response_code(400);
            echo 'Oops! link expired | used';
            exit;
        }
    }
}






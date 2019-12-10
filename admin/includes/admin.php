<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 11/25/2019
 * Time: 8:25 AM
 */

namespace Admin_namespace;


class Admin
{
    private $user_id;
    private $email;
    private $user_type;
    private $firstname;
    private $lastname;
    private $password;

    /**
     * User login
     * @param $user_id
     * @param $password
     */
    public function loginAdmin($user_id, $password){
        if(empty($user_id)){
            http_response_code(400);
            echo "Staff code is required";
            exit(0);
        }
        if(empty($password)){
            http_response_code(400);
            echo "Password is required";
            exit(0);
        }
        $this->$user_id = $this->checkInput(ucwords($user_id));
        $this->password = $this->checkInput($password);
        global $conn;
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultData = $result->fetch_all(MYSQLI_ASSOC);
        if($resultData) {
            $passwordVerify = password_verify($password, $resultData[0]['password']);
            if($passwordVerify){
                $_SESSION['firstname'] = $resultData[0]['firstname'];
                $_SESSION['lastname'] = $resultData[0]['lastname'];
                $_SESSION['user_id'] = $resultData[0]['user_id'];
                $_SESSION['email'] = $resultData[0]['email'];
                $_SESSION['user_type'] = $resultData[0]['user_type'];
//                if($_SESSION['user_type'] == 'admin'){
//                    http_response_code(200);
//                    echo $_SESSION['user_type'];
//                     header('Location: admin/admin-dashboard.php');
//                    exit(0);
//                } else if($_SESSION['user_type'] == 'user'){
//                    echo $_SESSION['user_type'];
//                     header('Location: ../../user-dashboard.php');
//                    exit(0);
//                }
                http_response_code(200);
                    echo $_SESSION['user_type'];
                    exit(0);
            } else {
                http_response_code(400);
                echo "Password entered is wrong";
                exit(0);
            }
        } else {
            http_response_code(400);
            echo 'Staff number does not exist';
            exit(0);
        }
    }

    /**
     * Create user
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $user_id
     * @param $password
     * @param $userType
     */
    public function createUser($firstName, $lastName, $email, $user_id, $password, $userType){
        global $conn;
        $firstname = $this->checkInput($firstName);
        $lastname = $this->checkInput($lastName);
        $email = $this->checkInput(filter_var($email, FILTER_VALIDATE_EMAIL));
        $user_id = $this->checkInput(ucwords($user_id));
        $password = $this->checkInput($password);
        $user_type = $this->checkInput($userType);
        if(empty($user_id) || empty($user_type) || empty($password) || empty($firstname) || empty($lastname) || empty($email)){
            http_response_code(400);
            echo "Please fill all empty field";
            exit(0);
        }
        if(strlen($user_id) < 8){
            http_response_code(400);
            echo  "User code must not be less than 8 characters";
            exit(0);
        }
        if(strlen($firstname) < 3 ){
            http_response_code(400);
            echo "First name must be at least 3 characters";
            exit(0);
        }
        if(strlen($lastname) < 3 ){
            http_response_code(400);
            echo "Last name must be at least 3 characters";
            exit(0);
        }
        if(strlen($password) < 3) {
            http_response_code(400);
            echo "Password must be at least 3 characters";
            exit(0);
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND email = '$email'";
        $stmt = $conn->query($sql);
        if($stmt === TRUE){
            http_response_code(400);
            echo "Record already exist";
            exit(0);
        } else {
            $sql = "INSERT INTO users (user_id, firstname, lastname, email, user_type, password) VALUES ('$user_id', '$firstname', '$lastname', '$email', '$user_type', '$password')";
            $stmt = $conn->query($sql);
            if($stmt === TRUE){
                http_response_code(200);
                echo "Record created successfully";
                header('Location: admin-dashboard.php');
                $conn->close();
                exit(0);
            } else {
                http_response_code(400);
                echo "Oops! record was not saved";
                exit(0);
            }
        }
    }

    /**
     * Reset user password
     * @param $user_id
     * @param $password
     */
    public function resetPassword($user_id, $password){
        global $conn;
        $this->$user_id = $this->checkInput(ucwords($user_id));
        $this->password = $this->checkInput($password);
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultData = $result->fetch_all(MYSQLI_ASSOC);
        if($resultData) {
            $sql = "UPDATE users SET password = '$password' WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $user_id);
            $stmt->execute();
            $result = $conn->affected_rows;
            if($result > 0) {
                http_response_code(200);
                echo "Password changed successfully";
                exit(0);
            } else {
                http_response_code(400);
                echo "Oops! change was not saved";
                exit(0);
            }
        }

    }

    /**
     * Is user loggedIn?
     */
    public function isLoggedInAdmin() {
        if($_SESSION['user_type'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check and strip input
     * @param $data
     * @return string
     */
    public function checkInput($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

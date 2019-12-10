<?php
/**
 * User: gblend
 * Date: 11/24/2019
 * Time: 9:42 PM
 */

namespace User_namespace;

class User
{
    private $user_id;
    private $email;
    private $firstName;
    private $lastName;
    private $password;
    private $data;

    /**
     * User login
     * @param $user_id
     * @param $password
     */
    public function loginUser($user_id, $password){
        $this->$user_id = $this->checkInput(ucwords($user_id));
        $this->password = $this->checkInput($password);
        global $conn;
        if(empty($user_id) || empty($password)) {
            http_response_code(400);
            echo "Please fill all empty field";
            exit(0);
        }
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
                if($_SESSION['user_type'] == 'user'){
                    http_response_code(200);
                    echo "Login successful";
                    header('Location: user-dashboard.php');
                }
            } else {
                http_response_code(400);
                echo "Password entered is wrong";
                exit(0);
            }
        } else {
            http_response_code(400);
            echo 'Matric number does not exist';
            exit(0);
        }
        $stmt->close();
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
        $sql = "SELECT * FROM users WHERE matric_no = ?";
        $stmt = $conn->prepare($sql);
        $sql->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultData = $result->fetch_all(MYSQLI_ASSOC);
        if($resultData) {
            $sql = "UPDATE users SET password = '$password' WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $user_id);
            $stmt->execute();
            $result = $stmt->affected_rows();
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
        $stmt->close();
    }

    /**
     * Is user loggedIn?
     */
    public function isLoggedInUser() {
        if($_SESSION['user_type'] == 'user') {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Strip input
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
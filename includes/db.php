<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 11/25/2019
 * Time: 10:38 AM
 */
$dbhostname = "127.0.0.1";
$dbname = "kashicom_gradecity";
$username = "kashicom_root";
$password = "Mikkynoble@1";

$conn = new mysqli($dbhostname, $username, $password, $dbname);
//Report error
if(mysqli_connect_errno()) {
    echo "Connection to database failed: %s\n", mysqli_connect_error();
}

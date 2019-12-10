<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 11/26/2019
 * Time: 1:56 PM
 */
session_start();
session_unset();
session_destroy();
header("Location: ../../index.php");
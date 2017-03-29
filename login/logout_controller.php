<?php
require("../common/functions.php");

$_SESSION = array();

if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}

session_destroy();

redirect('index.php');

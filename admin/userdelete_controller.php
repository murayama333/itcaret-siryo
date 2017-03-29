<?php
require("../common/functions.php");
require("../common/Users.php");
$Users = new Users();

$adminId = check_admin_session();

$userId = $_GET['userId'];

$Users->user_delete($userId);
redirect('admin/user_management.php');

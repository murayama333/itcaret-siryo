<?php
require("../common/functions.php");
require("../common/Users.php");

$adminId = check_admin_session();

$Users = new Users();

$userId = $_POST['userId'];
$passWord = $_POST['passWord'];
$userName = $_POST['userName'];
$mailAddress = $_POST['mailAddress'];
$tel = $_POST['tel'];
$registerDate = $_POST['registerDate'];


if (is_null($userId) || $userId == '') {
  send_error_page();
}

if (is_null($passWord) || $passWord == '') {
  send_error_page();
}

if (is_null($userName) || $userName == '') {
  send_error_page();
}

if (is_null($mailAddress) || $mailAddress == '') {
  send_error_page();
}
if (is_null($tel) || $tel == '') {
  $tel='';
}


$Users->user_edit($userId,$passWord,$userName,$mailAddress,$tel,$registerDate);
redirect('admin/user_management.php');

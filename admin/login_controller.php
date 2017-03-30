<?php
require("../common/functions.php");
require("../common/Users.php");

session_start();

$adminId = $_POST['userId'];
$password = $_POST['passWord'];

if (is_null($adminId) || $adminId === '') {
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}
if (is_null($password) || $password === '') {
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}

$Users= new Users();
$result = $Users->login_admin($adminId, $password);
if ($result){
  $_SESSION['adminId'] = $adminId;
  redirect('admin/index.php');
} else {
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}

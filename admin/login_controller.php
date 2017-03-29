<?php
require("../common/functions.php");
require("../common/Users.php");

$Users= new Users();

$adminId = $_POST['userId'];
$password = $_POST['passWord'];

if (is_null($adminId) || $adminId === '') {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}
if (is_null($password) || $password === '') {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}

$result = $Users->login_admin($adminId, $password);

if ($result){
  session_start();
  $_SESSION['adminId'] = $adminId;
  redirect('admin/index.php');
  exit();
} else {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('admin/login.php');
}

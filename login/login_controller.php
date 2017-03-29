<?php
require("../common/functions.php");
require("../common/Users.php");
$Users = new Users();

$userId = $_POST['userId'];
$password = $_POST['passWord'];

if (is_null($userId) || $userId === '' ) {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('index.php');
}
if (is_null($password) || $password === '') {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('index.php');
}

$result = $Users->login($userId, $password);

if ($result){
  session_start();
  $_SESSION['userId'] = $userId;
  redirect('login/index.php');
  exit();
} else {
  session_start();
  $_SESSION['loginMsg']="ログインに失敗しました。";
  redirect('index.php');
}

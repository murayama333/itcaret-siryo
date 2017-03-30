<?php
require("../common/functions.php");
require("../common/Users.php");
// $usersの方が良いですね。変数名は頭を小文字で。
$Users = new Users();

$adminId = check_admin_session();

// リクエストパラメータの処理は、Filter http://php.net/manual/ja/book.filter.php を使うようにします。
// 参考 https://github.com/murayama333/itc_exercise/blob/master/day5/training3/login_post.php#L2
// Filterはクセが強い、のでまた勉強会するのも良いですね。
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
  $tel = '';
}


$Users->user_add($userId,$passWord,$userName,$mailAddress,$tel,$registerDate);
redirect('admin/user_management.php');

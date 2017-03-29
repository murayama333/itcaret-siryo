<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION["userId"];
if (is_null($userId)) {
  send_error_page();
}

$lessonId = $_GET["lessonId"];
if (!is_numeric($lessonId)) {
  send_error_page();
}

try {
  $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db','root','');
  $st = $pdo->prepare('delete from reserveMaster where userId=:userId and lessonId=:lessonId');
  $st->bindParam(':userId',$userId);
  $st->bindParam(':lessonId',$lessonId);
  $st->execute();
} catch (PDOException $e) {
  die($e->getMessage());
}finally{
  $st=NULL;
  $pdo=NULL;
  redirect('login/index.php');
}

delete_reserve($userId,$lessonId);

redirect("login/index.php");

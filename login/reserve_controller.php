<?php
require("../common/functions.php");
require("../common/ReserveLessons.php");

$userId = check_user_session();
$ReserveObj = new ReserveLessons();

$lessonId = $_GET['lessonId'];
if (is_null($lessonId) || $lessonId == '') {
  redirect('index.php');
}

$ReserveObj->do_reserve($userId,$lessonId);

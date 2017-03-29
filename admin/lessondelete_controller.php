<?php
require("../common/functions.php");
require("../common/Lessons.php");

$adminId = check_admin_session();
$LessonsObj = new Lessons();

$lessonId = $_GET['lessonId'];
if(!isset($_GET['lessonId']) || $_GET['lessonId']=""){
  send_error_page();
  exit();
}

$LessonsObj->lesson_delete($lessonId);
redirect('admin/lesson_management.php');

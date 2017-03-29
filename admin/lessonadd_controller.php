<?php
require("../common/functions.php");
require("../common/Lessons.php");

$adminId = check_admin_session();
$LessonsObj = new Lessons();

$lessonTitle = $_POST['lessonTitle'];
$lessonDescription = $_POST['lessonDescription'];
$teacher = $_POST['teacher'];
$lessonDate = $_POST['lessonDate'];


if (is_null($lessonTitle) || $lessonTitle == '') {
  send_error_page();
}

if (is_null($lessonDescription) || $lessonDescription == '') {
  send_error_page();
}

if (is_null($teacher) || $teacher == '') {
  send_error_page();
}

$LessonsObj->lesson_add($lessonTitle,$lessonDescription,$teacher,$lessonDate);

redirect('admin/lesson_management.php');

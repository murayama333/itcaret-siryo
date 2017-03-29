<?php
/**
 *
 */
class Lessons
{
  private $pdo="";

  function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db','root','');
  }

  public function get_lessons(){
    try {
      $st = $this->pdo->prepare('select lessonId,lessonDate,lessonTitle,lessonDescription,teacher from lessonMaster');
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($lessons = $st->fetchAll()) {
        $st=NULL;
        $pdo=NULL;
        return $lessons;
      }else{
        $st=NULL;
        $pdo=NULL;
        return false;
      }
    }
  }


  function get_lessonInfo($lessonId){
    try {
      $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
      $st = $pdo->prepare("select lessonId,lessonTitle,lessonDescription,lessonDate,teacher from lessonMaster where lessonId=:lessonId");
      $st->bindParam(':lessonId',$lessonId);
      $st->execute();
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      if ($lessonInfo = $st->fetchAll()) {
        return $lessonInfo;
      }
      $st=NULL;
      $pdo=NULL;
    }
  }

  public function lesson_add($lessonTitle,$lessonDescription,$teacher,$lessonDate){
    try {
      $st = $this->pdo->prepare("insert into lessonMaster(lessonTitle, lessonDescription,teacher,lessonDate) values(:lessonTitle, :lessonDescription,:teacher,:lessonDate)");
      $st->bindParam(':lessonTitle',$lessonTitle);
      $st->bindParam(':lessonDescription',$lessonDescription);
      $st->bindParam(':teacher',$teacher);
      $st->bindParam(':lessonDate',$lessonDate);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }

  public function lesson_delete($lessonId){
    try {
      $st = $this->pdo->prepare("delete from lessonMaster where lessonId=:lessonId");
      $st->bindParam(':lessonId',$lessonId);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }

  public function lesson_edit($lessonId,$lessonTitle,$lessonDescription,$teacher,$lessonDate){
    try {
      $st = $this->pdo->prepare("update lessonMaster set lessonTitle=:lessonTitle, lessonDescription=:lessonDescription, teacher=:teacher, lessonDate=:lessonDate where lessonId=:lessonId");
      $st->bindParam(':lessonId',$lessonId);
      $st->bindParam(':lessonTitle',$lessonTitle);
      $st->bindParam(':lessonDescription',$lessonDescription);
      $st->bindParam(':teacher',$teacher);
      $st->bindParam(':lessonDate',$lessonDate);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }


}

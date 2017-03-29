<?php

/**
 *
 */
class ReserveLessons
{
  private $pdo="";

  function __construct(){
    $this->pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db','root','');
  }

  //レッスン予約状況取得メソッド
  public function get_reserveStatus($userId,$lessonId){
    try {
      $st = $this->pdo->prepare('select reserveId from reserveMaster where userId=:userId and lessonId=:lessonId');
      $st->bindParam(':userId',$userId);
      $st->bindParam(':lessonId',$lessonId);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($reserveStatus = $st->fetchAll()) {
        $st=NULL;
        $pdo=NULL;
        return $reserveStatus;
      }else{
        $st=NULL;
        $pdo=NULL;
        return false;
      }
    }
  }

//レッスン予約メソッド
public function do_reserve($userId,$lessonId){
  try {
    $st = $this->pdo->prepare("insert into reserveMaster(userId,lessonId) values(:userId,:lessonId)");
    $st->bindParam(':lessonId',$lessonId);
    $st->bindParam(':userId',$userId);
    $st->execute();
  } catch (PDOException $e) {
    die($e->getMessage());
  }finally{
    $st=NULL;
    $pdo=NULL;
    redirect('login/index.php');
  }

}

// レッスン予約削除メソッド
  public function delete_reserve($userId,$lessonId){
    try {
      $st = $this->pdo->prepare("delete from reserveMaster where userId=:userId and lessonId=:lessonId");
      $st->bindParam(':userId',$userId);
      $st->bindParam(':lessonId',$lessonId);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      $st=NULL;
      $pdo=NULL;
      return true;
    }
  }

// レッスン予約人数取得メソッド
  public function get_reserveNumbers($lessonId){
    try {
      $st= $this->pdo->prepare("select count(*) from reserveMaster where lessonId=:lessonId");
      $st->bindParam(":lessonId",$lessonId);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($reserveNumbers = $st->fetchAll()) {
        $st=NULL;
        $pdo=NULL;
        return $reserveNumbers;
      }else{
        return false;
      }
    }
  }

  // 予約者情報取得メソッド
  public function get_reserveMembers($lessonId){
    try {
      $st= $this->pdo->prepare("select reserveMaster.userId, userMaster.userName from reserveMaster inner join userMaster on reserveMaster.userId = userMaster.userId where lessonId=:lessonId");
      $st->bindParam(":lessonId",$lessonId);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($reserveMembers = $st->fetchAll()) {
        $st=NULL;
        $pdo=NULL;
        return $reserveMembers;
      }else{
        return false;
      }
    }
  }

}

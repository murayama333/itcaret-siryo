<?php
class Users{

  private $pdo;

  public function __construct(){
    $this->pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
  }

  // 一般ユーザーログインメソッド
  public function login($userId, $passWord) {
    try {
      $st = $this->pdo->prepare('select userId,userName,mailAddress from userMaster where userId=:userId and passWord=:passWord and userType=0');
      $st->bindParam(':userId',$userId);
      $st->bindParam(':passWord',$passWord);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($st->fetchAll()) {
        return true;
      }else{
        return false;
      }
    }
  }

  //  管理者ログインメソッド
  public function login_admin($userId,$passWord){
    try {
      $st = $this->pdo->prepare('select userId,userName from userMaster where userId=:userId and passWord=:passWord and userType=10');
      $st->bindParam(':userId',$userId);
      $st->bindParam(':passWord',$passWord);
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if($st->fetchAll()){
        return true;
      }else{
        return false;
      }
    }

  }

  // ユーザー追加メソッド
  public function user_add($userId,$passWord,$userName,$mailAddress,$tel,$registerDate){
    try {
      $st = $this->pdo->prepare("insert into userMaster(userId,passWord,userName,mailAddress,tel,registerDate) values(:userId,:passWord,:userName,:mailAddress,:tel,:registerDate)");
      $st->bindParam(':userId',$userId);
      $st->bindParam(':passWord',$passWord);
      $st->bindParam(':userName',$userName);
      $st->bindParam(':mailAddress',$mailAddress);
      $st->bindParam(':tel',$tel);
      $st->bindParam(':registerDate',$registerDate);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }

  // ユーザー編集メソッド
  public function user_edit($userId,$passWord,$userName,$mailAddress,$tel){
    try {
      $st = $this->pdo->prepare("update userMaster set passWord=:passWord, userName=:userName, mailAddress=:mailAddress, tel=:tel where userId=:userId"); $st->bindParam(':userId',$userId);
      $st->bindParam(':passWord',$passWord);
      $st->bindParam(':userName',$userName);
      $st->bindParam(':mailAddress',$mailAddress);
      $st->bindParam(':tel',$tel);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }

  // ユーザー削除メソッド
  public function user_delete($userId){
    try {
      $st = $this->pdo->prepare("delete from userMaster where userId=:userId");
      $st->bindParam(':userId',$userId);
      $st->execute();
      return true;
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      $st=NULL;
      $pdo=NULL;
    }
  }

  // ユーザーリストの取得
  public function get_userLists(){
    try {
      $st= $this->pdo->prepare("select userId,userName,mailAddress,tel,userType,registerDate from userMaster");
      $st->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }finally{
      if ($userLists = $st->fetchAll()) {
        $st=NULL;
        $pdo=NULL;
        return $userLists;
      }else{
        return false;
      }
    }
  }

  // ユーザー情報の取得
  function get_userInfo($userId){
    try {
      $st = $this->pdo->prepare("select userId,passWord,userName,mailAddress,tel from userMaster where userId=:userId");
      $st->bindParam(':userId',$userId);
      $st->execute();
    } catch (PDOException $e) {
      $e->getMessage();
    }finally{
      if ($userInfo = $st->fetchAll()) {
        return $userInfo;
      }
      $st=NULL;
      $pdo=NULL;
    }
  }

}

<?php
// TODO
// define('ARTICLE_FILE', 'common/article.json');
// 相対パスだとindex.phpとadmin/index.phpの両方からの参照が上手くできず上手くいかなかった。
define('ARTICLE_FILE', dirname(__FILE__) . '/article.json');
// define('USER_FILE', '../common/user.csv');
// define('USER_FILE', dirname(__FILE__) . '/user.csv');
define('BLOG_TITLE', 'KM^ Web活用スクール');
define('ADMIN_BLOG_TITLE', 'KM^ Web活用スクール 管理者画面');

define('DEFAULT_ENCODE', 'UTF-8');
define('DOMAIN', 'http://localhost:8000/');

/**
* リダイレクトする。
* （処理を終了する）
* @param string $path リダイレクト先のパス
*/
function redirect($path){
  header('location: ' . DOMAIN . $path);
  exit();
}

function h($str){
  return htmlspecialchars($str);
}

/**
* エラーページに転送する。
* （処理を終了する）
* @param string $path リダイレクト先のパス
*/
function send_error_page(){
  header('location: ' . DOMAIN . 'common/error.php');
  exit();
}

function check_admin_session(){
  // 副作用のある関数（session_start関数）は、共通関数の中で呼び出すとわかりにくいので、コントローラ側でやる方がいいかな。
  session_start();
  $adminId = $_SESSION['adminId'];
  if (!is_null($adminId)) {
    return $adminId;
  }else{
    // 2回呼んでも問題ないならいいけど。あまり綺麗じゃないですよね。
    // session_startは各コントローラで適宜呼び出すのが良いかと。
    session_start();
    $_SESSION['loginMsg']="ログアウトされました。";
      redirect('admin/login.php');
  }
}

function check_user_session(){
  session_start();
  $userId = $_SESSION['userId'];
  if (!is_null($userId)) {
    return $userId;
  }else{
    session_start();
    $_SESSION['loginMsg']="ログアウトされました。";
    redirect('index.php');
  }
}

/**
* ログインする。
* @param string $userId ユーザID
* @param string $password パスワード
* @return bool ログイン成功の場合 true
*/
// function login($userId, $passWord) {
//   try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db', 'root', '');
//     $st = $pdo->prepare('select userId,userName,mailAddress from userMaster where userId=:userId and passWord=:passWord and userType=0');
//     $st->bindParam(':userId',$userId);
//     $st->bindParam(':passWord',$passWord);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($st->fetchAll()) {
//       return true;
//     }else{
//       return false;
//     }
//   }
// }

// 管理者ログイン
// function login_admin($userId,$passWord){
//   try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db','root','');
//     $st = $pdo->prepare('select userId,userName from userMaster where userId=:userId and passWord=:passWord and userType=10');
//     $st->bindParam(':userId',$userId);
//     $st->bindParam(':passWord',$passWord);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if($st->fetchAll()){
//       return true;
//     }else{
//       return false;
//     }
//   }
//
// }

/**
* レッスン一覧を取得する。
* @return array 記事の一覧
*/
// function get_lessons(){
//   try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db', 'root', '');
//     $st = $pdo->prepare('select lessonId,lessonDate,lessonTitle,lessonDescription,teacher from lessonMaster');
//     // $st->bindParam(':userId',$userId);
//     // $st->bindParam(':passWord',$passWord);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($lessons = $st->fetchAll()) {
//       $st=NULL;
//       $pdo=NULL;
//       return $lessons;
//     }else{
//       $st=NULL;
//       $pdo=NULL;
//       return false;
//     }
//   }
// }

// function get_reserveStatus($userId,$lessonId){
//   try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db', 'root', '');
//     $st = $pdo->prepare('select reserveId from reserveMaster where userId=:userId and lessonId=:lessonId');
//     $st->bindParam(':userId',$userId);
//     $st->bindParam(':lessonId',$lessonId);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($reserveStatus = $st->fetchAll()) {
//       $st=NULL;
//       $pdo=NULL;
//       return $reserveStatus;
//     }else{
//       $st=NULL;
//       $pdo=NULL;
//       return false;
//     }
//   }
// }
//
// /**
// * 記事を削除する。
// * @param string $id 削除対象の記事ID
// */
// function delete_reserve($userId,$lessonId){
//   try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kmcSchool_db', 'root', '');
//     $st = $pdo->prepare("delete from reserveMaster where userId=:userId and lessonId=:lessonId");
//     $st->bindParam(':userId',$userId);
//     $st->bindParam(':lessonId',$lessonId);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//     return true;
//   }
// }
//
// function get_reserveNumbers($lessonId){
//   try {
//     $pdo = new PDO("mysql:host=localhost;dbname=kmcSchool_db",'root','');
//     $st= $pdo->prepare("select count(*) from reserveMaster where lessonId=:lessonId");
//     $st->bindParam(":lessonId",$lessonId);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($reserveNumbers = $st->fetchAll()) {
//       $st=NULL;
//       $pdo=NULL;
//       return $reserveNumbers;
//     }else{
//       return false;
//     }
//   }
// }
//
// function get_reserveMembers($lessonId){
//   try {
//     $pdo = new PDO("mysql:host=localhost;dbname=kmcSchool_db",'root','');
//     $st= $pdo->prepare("select reserveMaster.userId, userMaster.userName from reserveMaster inner join userMaster on reserveMaster.userId = userMaster.userId where lessonId=:lessonId");
//     $st->bindParam(":lessonId",$lessonId);
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($reserveMembers = $st->fetchAll()) {
//       $st=NULL;
//       $pdo=NULL;
//       return $reserveMembers;
//     }else{
//       return false;
//     }
//   }
// }

// function get_user_lists(){
//   try {
//     $pdo = new PDO("mysql:host=localhost;dbname=kmcSchool_db",'root','');
//     $st= $pdo->prepare("select userId,userName,mailAddress,tel,userType,registerDate from userMaster");
//     $st->execute();
//   } catch (PDOException $e) {
//     die($e->getMessage());
//   }finally{
//     if ($userLists = $st->fetchAll()) {
//       $st=NULL;
//       $pdo=NULL;
//       return $userLists;
//     }else{
//       return false;
//     }
//   }
// }

// function user_add($userId,$passWord,$userName,$mailAddress,$tel,$registerDate){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("insert into userMaster(userId,passWord,userName,mailAddress,tel,registerDate) values(:userId,:passWord,:userName,:mailAddress,:tel,:registerDate)");
//     $st->bindParam(':userId',$userId);
//     $st->bindParam(':passWord',$passWord);
//     $st->bindParam(':userName',$userName);
//     $st->bindParam(':mailAddress',$mailAddress);
//     $st->bindParam(':tel',$tel);
//     $st->bindParam(':registerDate',$registerDate);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }


// function user_edit($userId,$passWord,$userName,$mailAddress,$tel){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("update userMaster set passWord=:passWord, userName=:userName, mailAddress=:mailAddress, tel=:tel where userId=:userId"); $st->bindParam(':userId',$userId);
//     $st->bindParam(':passWord',$passWord);
//     $st->bindParam(':userName',$userName);
//     $st->bindParam(':mailAddress',$mailAddress);
//     $st->bindParam(':tel',$tel);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }
//
// function user_delete($userId){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("delete from userMaster where userId=:userId");
//     $st->bindParam(':userId',$userId);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }
//
// function get_user_info($userId){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("select userId,passWord,userName,mailAddress,tel from userMaster where userId=:userId");
//     $st->bindParam(':userId',$userId);
//     $st->execute();
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     if ($userInfo = $st->fetchAll()) {
//       return $userInfo;
//     }
//     $st=NULL;
//     $pdo=NULL;
//   }
// }

// function lesson_add($lessonTitle,$lessonDescription,$teacher,$lessonDate){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("insert into lessonMaster(lessonTitle, lessonDescription,teacher,lessonDate) values(:lessonTitle, :lessonDescription,:teacher,:lessonDate)");
//     $st->bindParam(':lessonTitle',$lessonTitle);
//     $st->bindParam(':lessonDescription',$lessonDescription);
//     $st->bindParam(':teacher',$teacher);
//     $st->bindParam(':lessonDate',$lessonDate);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }

// function lesson_edit($lessonId,$lessonTitle,$lessonDescription,$teacher,$lessonDate){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("update lessonMaster set lessonTitle=:lessonTitle, lessonDescription=:lessonDescription, teacher=:teacher, lessonDate=:lessonDate where lessonId=:lessonId");
//     $st->bindParam(':lessonId',$lessonId);
//     $st->bindParam(':lessonTitle',$lessonTitle);
//     $st->bindParam(':lessonDescription',$lessonDescription);
//     $st->bindParam(':teacher',$teacher);
//     $st->bindParam(':lessonDate',$lessonDate);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }

// function lesson_delete($lessonId){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("delete from lessonMaster where lessonId=:lessonId");
//     $st->bindParam(':lessonId',$lessonId);
//     $st->execute();
//     return true;
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     $st=NULL;
//     $pdo=NULL;
//   }
// }

// function get_lessonInfo($lessonId){
//   try {
//     $pdo= new PDO("mysql:host=localhost;dbname=kmcSchool_db","root","");
//     $st = $pdo->prepare("select lessonId,lessonTitle,lessonDescription,lessonDate,teacher from lessonMaster where lessonId=:lessonId");
//     $st->bindParam(':lessonId',$lessonId);
//     $st->execute();
//   } catch (PDOException $e) {
//     $e->getMessage();
//   }finally{
//     if ($lessonInfo = $st->fetchAll()) {
//       return $lessonInfo;
//     }
//     $st=NULL;
//     $pdo=NULL;
//   }
// }

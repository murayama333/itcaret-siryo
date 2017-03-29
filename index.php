<?php
require("common/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="css/materialize.min.css" media="screen">
  <link rel="stylesheet" href="css/style.css" media="screen">
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/wow.js"></script>

  <title><?= BLOG_TITLE ?></title>
</head>

<body style="background:url(images/school-main.jpg);background-size:cover;">
  <header>
    <h1 class="pink white-text z-depth-3 section" style="margin:0 auto;"><?= BLOG_TITLE ?></h1>
  </header>
  <div>
    <div id="body-1" class="section container z-depth-3" style="margin-top:50px;background:rgba(255,255,255,0.8);">
      <h4 class="center">ログイン画面</h4>
      <?php
      session_start();
      $loginMsg="";
      if (isset($_SESSION["loginMsg"])) {
        $loginMsg = $_SESSION["loginMsg"];
        echo "<p class='center red-text'>" . $loginMsg . "</p>";
        unset($_SESSION["loginMsg"]);
      }
       ?>
      <div class="row">
        <form action="login/login_controller.php" method="post">
          <div class="col m6 offset-m3 s12 input-field">
            <input type="text" name="userId" value="">
            <label for="userId">ユーザーID</label>
          </div>
          <div class="col m6 offset-m3 s12 input-field">
            <input type="password" name="passWord" value="">
            <label for="passWord">パスワード</label>
          </div>
          <div class="col m6 offset-m3 s12 center">
            <br>
            <input type="submit" name="submit" value="ログイン" class="btn">
          </div>
        </form>
      </div><!-- .row -->
    </div><!-- #body-1 -->
  </div>
</body>
</html>

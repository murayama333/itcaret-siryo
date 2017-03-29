<?php
require("../common/functions.php");
?>

  <?php include("header.php"); ?>
  <div id="body-1" class="section container white z-depth-3" style="margin-top:50px;">
    <h4 class="center">ログイン画面</h4>
    <?php
    session_start();
    $loginMsg="";
    if (isset($_SESSION["loginMsg"])) {
      $loginMsg = $_SESSION["loginMsg"];
      echo "<p class='center red-text'>" . h($loginMsg) . "</p>";
      unset($_SESSION["loginMsg"]);
    }
     ?>
    <div class="row">
      <form action="login_controller.php" method="post">
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

  <footer>
  </footer>

</body>
</html>

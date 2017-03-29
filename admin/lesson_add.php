<?php
require("../common/functions.php");
$adminId = check_admin_session();
?>

  <?php include("header.php"); ?>
  <div style="margin-right:30px;">
    <p class="right-align">ユーザー：<?= h($adminId); ?>&nbsp;&nbsp;&nbsp;<a href="logout_controller.php">ログアウト</a></p>
  </div>
  <div class="row">
    <div class="col push-m3 m9 s12">
      <div class="row">
        <div class="col m11 s12">
          <div class="white z-depth-3">
            <h4 class="section">レッスン追加画面</h4>
            <p class="center">追加するレッスン情報を入力してください。</p>
            <form action="lessonadd_controller.php" method="post">
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="text" name="lessonTitle" required><br>
                  <label for="lessonTitle">レッスン名</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <textarea name="lessonDescription" class="materialize-textarea" required></textarea>
                  <label for="lessonDescription">レッスン詳細</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type=text name="teacher" required><br>
                  <label for="teacher">先生</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <p class="grey-text">レッスン日</p>
                  <input type="date" name="lessonDate" required><br>
                </div>
              </div>
              <div class="row">
                <div class="col m8 offset-m2 s12 center">
                  <input type="submit" name="lessonAdd" value="追加する" class="btn">
                </div>
                <br><br><br>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col pull-m9 m3 s12">
        <?php include("sidebar.php"); ?>
    </div>
  </div>

  <footer>
  </footer>

</body>
</html>

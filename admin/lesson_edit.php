<?php
require("../common/functions.php");
require("../common/Lessons.php");

$adminId = check_admin_session();

$LessonsObj = new Lessons();

$lesson = $LessonsObj->get_lessonInfo($_GET['lessonId']);

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
            <h4 class="section">レッスン編集画面</h4>
            <p class="center">編集するレッスン情報を入力してください。</p>
            <form action="lessonedit_controller.php" method="post">
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="text" name="lessonId" required value="<?= h($lesson[0]['lessonId']); ?>" readonly><br>
                  <label for="lessonId">レッスンID(変更不可)</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2  s12">
                  <input type="text" name="lessonTitle" required value="<?= h($lesson[0]['lessonTitle']); ?>"><br>
                  <label for="lessonTitle">レッスン名</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2  s12">
                  <textarea name="lessonDescription" class="materialize-textarea" required><?= h($lesson[0]['lessonDescription']); ?></textarea>
                  <label for="lessonDescription">レッスン詳細</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type=text name="teacher" required value="<?= h($lesson[0]['teacher']); ?>"><br>
                  <label for="teacher">先生</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <p class="grey-text">レッスン日</p>
                  <input type="date" name="lessonDate" required value="<?= h($lesson[0]['lessonDate']); ?>"><br>
                </div>
              </div>
              <div class="row">
                <div class="col m8 offset-m2 s12 center">
                  <input type="submit" name="lessonEdit" value="編集する" class="btn">
                </div>
              </div>
              <br>
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

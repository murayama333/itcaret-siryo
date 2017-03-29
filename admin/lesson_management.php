<?php
require("../common/functions.php");
require("../common/Lessons.php");
require("../common/ReserveLessons.php");

$adminId = check_admin_session();

$ReserveObj = new ReserveLessons();
$LessonsObj = new Lessons();
$lessons = $LessonsObj->get_lessons();
?>

<?php include("header.php"); ?>
<div style="margin-right:30px;">
  <p class="right-align">ユーザー：<?= $adminId; ?>&nbsp;&nbsp;&nbsp;<a href="logout_controller.php">ログアウト</a></p>
</div>
  <div class="row">
    <div class="col push-m3 m9 s12">
        <div class="row">
          <div class="col m11 s12">
            <div class="white z-depth-3" style="padding:0 20px;">
            <h4 class="section">レッスン管理画面</h4>
            <p>&nbsp;<a href="lesson_add.php" class="btn">新規追加</a>&nbsp;&nbsp;<a href="user_add_csv.php" class="btn">一括登録</a>&nbsp;&nbsp;<a href="user_export.php" class="btn">エクスポート</a></p>
            <table class="borderd  white">
              <thead>
                <tr>
                  <th>レッスンID</th>
                  <th>日付</th>
                  <th>レッスン名</th>
                  <th>講師</th>
                  <th>予約人数</th>
                  <th>編集</th>
                  <th>削除</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($lessons as $lesson){
                  $reserveNumbers = $ReserveObj->get_reserveNumbers($lesson['lessonId']);
                 ?>
                  <tr>
                    <td><?= h($lesson['lessonId']) ?></td>
                    <td><?= h($lesson['lessonDate']) ?></td>
                    <td><?= h($lesson['lessonTitle']) ?></td>
                    <td><?= h($lesson['teacher']) ?></td>
                    <td>
                      <?php
                      foreach ($reserveNumbers as $reserveNumber) {
                        echo h($reserveNumber[0]);
                      }
                       ?>
                    </td>
                    <td>
                      <a href="lesson_edit.php?lessonId=<?= h($lesson['lessonId']); ?>"><i class="material-icons">edit</i></a>
                    </td>
                    <td>
                      <a href="lessondelete_controller.php?lessonId=<?= h($lesson['lessonId']); ?>" onClick="return confirm('本当に削除して良いですか?')"><i class="material-icons">delete</i></a>
                    </td>

                  </tr>
                <?php
                  }
                 ?>
              </tbody>
            </table>
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

  <script>
  (function($){
    $('.slider').slider();
  })(jQuery);

  </script>
</body>
</html>

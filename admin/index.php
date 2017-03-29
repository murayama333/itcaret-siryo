<?php
require("../common/functions.php");
require("../common/Lessons.php");
require("../common/ReserveLessons.php");

$adminId = check_admin_session();
$LessonsObj = new Lessons();
$ReserveObj = new ReserveLessons();
$lessons = $LessonsObj->get_lessons();

?>

  <?php include("header.php"); ?>
  <div style="margin-right:30px;">
    <p class="right-align">ユーザー：<?= h($adminId); ?>&nbsp;&nbsp;&nbsp;<a href="logout_controller.php">ログアウト</a></p>
  </div>
  <div class="row">
    <div class="col push-m3 m9 s12">
      <div class="row">
        <div class="col m11 s12">
          <div class="white z-depth-3" style="padding:0 20px;">
            <h4 class="section" style="margin-bottom:0">予約状況一覧</h4>
            <table class="bordered white highlight">
              <thead>
                <tr>
                  <th>日付</th>
                  <th>タイトル</th>
                  <th>講師</th>
                  <th>予約人数</th>
                  <th>予約者</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($lessons as $lesson){
                  $reserveNumbers = $ReserveObj->get_reserveNumbers($lesson['lessonId']);
                  $reserveMembers = $ReserveObj->get_reserveMembers($lesson['lessonId']);

                   ?>
                  <tr>
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
                      <?php
                      if ($reserveMembers) {
                        foreach ($reserveMembers as $reserveMember) {
                          echo h($reserveMember['userName']) . "(" . h($reserveMember['userId']) . ")" .  " , ";
                        }
                      }
                      ?>
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

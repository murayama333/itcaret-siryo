<?php
require("../common/functions.php");
require("../common/Lessons.php");
require("../common/ReserveLessons.php");
require 'Calendar.php';

$userId = check_user_session();

$cal = new \MyApp\Calendar();
$LessonsObj = new Lessons();
$ReserveObj = new ReserveLessons();
$lessons = $LessonsObj->get_lessons();

?>

  <?php include("header-login.php"); ?>
  <div style="margin-right:30px;">
    <p class="right-align">ユーザー：<?= h($userId); ?>&nbsp;&nbsp;&nbsp;<a href="logout_controller.php">ログアウト</a></p>
  </div>
  <br>
  <div class="row">
    <div class="col push-m3 m9 s12">
      <div class="white z-depth-3" style="padding:0 20px;margin:15px;" >
        <h4 class="section">予約状況</h4>
        <table class="bordered highlight">
          <tr>
            <th>日付</th>
            <th>タイトル</th>
            <th>講師</th>
            <th>予約状況</th>
            <th>予約する</th>
            <th>取り消す</th>
          </tr>
          <?php foreach ($lessons as $lesson) {
            $reserveStatus = $ReserveObj->get_reserveStatus($userId,$lesson['lessonId']);
           ?>
          <tr>
            <td><?= h($lesson['lessonDate']); ?></td>
            <td><?= h($lesson['lessonTitle']); ?></td>
            <td><?= h($lesson['teacher']); ?></td>
            <td>
              <?php
                if($reserveStatus==true){
                  echo "予約済み";
                }
             ?>
            </td>
            <td>
              <?php
              if($reserveStatus==false){
                echo  "<a href=\"reserve_controller.php?lessonId=" . h($lesson['lessonId']) . "\" class=\"btn pink darken-2\">";
                echo "予約する";
                echo "</a>";
              }
              ?>
            </td>
            <td>
                <?php
                if($reserveStatus==true){
                  echo  "<a href=\"del_reserve_controller.php?lessonId=" . h($lesson['lessonId']) . "\" class=\"btn\">";
                  echo "取り消す";
                  echo "</a>";
                }
                ?>
            </td>
            <td></td>
          </tr>
        <?php } ?>
        </table>
        <br><br>

      </div>

    </div>
    <div class="col pull-m9 m3 s12">
      <?php include("sidebar.php") ?>
    </div>
  </div>
</body>
</html>

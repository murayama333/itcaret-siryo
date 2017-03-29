<?php
require("../common/functions.php");
require 'Calendar.php';

$userId = check_user_session();

$cal = new \MyApp\Calendar();

 ?>

 <?php include("header-login.php") ?>
 <div style="margin-right:30px;">
   <p class="right-align">ユーザー：<?= $userId; ?>&nbsp;&nbsp;&nbsp;<a href="logout_controller.php">ログアウト</a></p>
 </div>
  <div class="row">
    <div class="col m9 push-m3 s12">
      <div class="section" style="margin:0 15px;">
        <table class="white  bordered z-depth-3">
          <thead>
            <tr>
              <th><a href="display-calendar.php?t=<?php echo h($cal->prev); ?>">&laquo;</a></th>
              <th colspan="5" class="center"><?php echo h($cal->yearMonth); ?></th>
              <th><a href="display-calendar.php?t=<?php echo h($cal->next); ?>">&raquo;</a></th>
            </tr>
          </thead>
          <tbody>
            <tr class="week-name">
              <td>Sun</td>
              <td>Mon</td>
              <td>Tue</td>
              <td>Wed</td>
              <td>Thu</td>
              <td>Fri</td>
              <td>Sat</td>
            </tr>
            <tr>
              <?php echo $cal->show(); ?>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="7" class="center"><a href="display-calendar.php">Today</a></th>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
    <div class="col m3 pull-m9 s12">
      <?php include("sidebar.php"); ?>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/wow.js"></script>
</body>
</html>

<?php
require("../common/functions.php");
require("../common/Users.php");

$adminId = check_admin_session();

$Users = new Users();
$userInfo = $Users->get_user_info($_GET['userId']);

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
            <h4 class="section">ユーザー編集画面</h4>
            <p class="center">編集するユーザー情報を入力してください。</p>
            <form action="useredit_controller.php" method="post">
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="text" name="userId" required readonly value="<?= h($userInfo[0]['userId']); ?>"><br>
                  <label for="userId">ユーザーID(変更不可)</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="password" name="passWord" required value="<?= h($userInfo[0]['passWord']); ?>"><br>
                  <label for="passWord">パスワード(必須)</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="text" name="userName" required value="<?= h($userInfo[0]['userName']); ?>"><br>
                  <label for="userName">ユーザー名</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type=text name="mailAddress" required value="<?= h($userInfo[0]['mailAddress']); ?>"><br>
                  <label for="mailAddress">メールアドレス(必須)</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m8 offset-m2 s12">
                  <input type="text" name="tel" value="<?= h($userInfo[0]['tel']); ?>"><br>
                  <label for="userId">TEL(任意)</label>
                </div>
              </div>
              <div class="input-field">
                  <input type="hidden" name="registerDate" value="<?php echo date("Y-m-d"); ?>">
              </div>

              <div class="row">
                <div class="col m8 offset-m2 s12 center">
                  <input type="submit" name="userEdit" value="変更する" class="btn">
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="col pull-m9 m3 s12">
      <?php include("sidebar.php"); ?>
    </div>
  </div>

  <a href="/admin/index.php">BACK</a>
</body>
</html>

<?php
require("../common/functions.php");
require("../common/Users.php");
$Users = new Users();

$userLists = $Users->get_user_lists();
$adminId = check_admin_session();

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
            <h4 class="section">ユーザー管理画面</h4>
            <p>&nbsp;<a href="user_add.php" class="btn">新規追加</a>&nbsp;&nbsp;<a href="user_add_csv.php" class="btn">一括登録</a>&nbsp;&nbsp;<a href="user_export.php" class="btn">エクスポート</a></p>
            <table class="borderd">
              <thead>
                <tr>
                  <th>ユーザーID</th>
                  <th>ユーザー名</th>
                  <th>メールアドレス</th>
                  <th>電話番号</th>
                  <th>登録日時</th>
                  <th>種別</th>
                  <th>編集</th>
                  <th>削除</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($userLists as $userList){ ?>
                  <tr>
                    <td><?= h($userList['userId']) ?></td>
                    <td><?= h($userList['userName']) ?></td>
                    <td><?= h($userList['mailAddress']) ?></td>
                    <td><?= h($userList['tel']) ?></td>
                    <td><?= h($userList['registerDate']) ?></td>
                    <td>
                      <?php
                        if($userList['userType']==10){
                          echo "管理者" . PHP_EOL;
                        }else{
                          echo "一般" . PHP_EOL;
                        }
                      ?>
                    </td>
                    <td>
                      <a href="user_edit.php?userId=<?= h($userList['userId']); ?>"><i class="material-icons">edit</i></a>
                    </td>
                    <td>
                      <a href="userdelete_controller.php?userId=<?= h($userList['userId']); ?>" onClick="return confirm('本当に削除して良いですか?')"><i class="material-icons">delete</i></a>
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

</body>
</html>

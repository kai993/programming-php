<?php
ini_set('display_errors', "On");
session_start();
?>
<html>
  <head>
    <title>設定の登録</title>
  </head>
  <body>
  <?php
  $colors = array(
    'black' => "#000000",
    'white' => "#ffffff",
    'red'   => "#ff0000",
  );

  $backgroundName = $_POST['background'];
  $foregroundName = $_POST['foreground'];

  $_SESSION['backgroundName'] = $backgroundName;
  $_SESSION['foregroundName'] = $foregroundName;
  ?>

  <p>
    <a href="prefs_session_demo.php">ここ</a>をクリックすると、設定が有効になります。
  </p>
  </body>
</html>

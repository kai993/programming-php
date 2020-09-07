<html>
  <head>
    <title>設定の登録</title>
  </head>
  <body>
  <?php
  $colors = array(
    'black' => '#000000',
    'white' => '#ffffff',
    'red'   => '#ff0000',
  );

  $backgroundName = $_POST['background'];
  $foregroundName = $_POST['foreground'];

  setcookie('bg', $colors[$backgroundName]);
  setcookie('fg', $colors[$foregroundName]);
  ?>

  <p>
    ありがとうございました設定を以下のように変更しました。<br />
    背景色: <?= $backgroundName; ?><br />
    文字色: <?= $foregroundName; ?><br />
  </p>

  <p><a href="prefs_demo.php">ここ</a>をクリックすると設定が有効になります。</p>
  </body>
</html>

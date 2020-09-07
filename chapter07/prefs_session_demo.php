<?php
error_reporting(0);
session_start();
$backgroundName = $_SESSION['bg'];
$foregroundName = $_SESSION['fg'];
?>

<html>
  <head>
    <title>玄関</title>
  </head>
  <body bgcolor="<?= $backgroundName ?>" text="<?= $foregroundName; ?>">
    <h1>いらっしゃいませ！</h1>
    <p><a href="colors.php">設定を変更</a>しますか？</p>
  </body>
</html>

<?php
require_once "Log.php";
require_once "SampleConst.php";
session_start();
?>

<html>
    <head>
        <title>次のページ</title>
    </head>
    <body>
    <?php
    $logger = new Log(SampleConst::LOG_FILE);
    $now = strftime("%c");
    $logger->write("2ページ目の表示時刻{$now}");

    echo "<p>ログの内容</p>";
    echo nl2br($logger->read());
    ?>
        <a href="front.php">戻る</a>
    </body>
</html>
<?php
include_once "Log.php";
session_start();
?>

<html lang="ja">
    <head>
        <title>フロントページ</title>
    </head>
    <body>
    <?php
    $now = strftime("%c");
    if (!isset($_SESSION['logger'])) {
        $logger = new Log("./persistent_log");
        $_SESSION['logger'] = $logger;
        $logger->write("作成時刻 $now");

        echo("<p>セッションおよびログオブジェクトを作成しました。</p>");
        $logger->write("最初のページの読み込み時刻 {$now}");
    }

    echo "<p>ログの内容</p>";
    echo nl2br($logger->read());
    ?>

    <a href="next.php">次のページ</a>
    </body>
</html>

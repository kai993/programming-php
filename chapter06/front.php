<?php
require_once "Log.php";
require_once "SampleConst.php";
session_start()
?>

<html>
    <head>
        <title>フロントページ</title>
    </head>
    <body>

<?php
$now = strftime("%c");

$logger = new Log(SampleConst::LOG_FILE);
if (!isset($_SESSION['logger'])) {
    $_SESSION['logger'] = $logger;
    $logger->write("作成時刻 {$now}");
    echo "<p>セッション及びオブジェクトを作成しました。</p>";
}

$logger->write("最初のページの読み込み時刻 {$now}");

echo "<p>ログの内容</p>";
echo nl2br($logger->read());
?>

        <a href="next.php">次のページへ</a>
    </body>
</html>
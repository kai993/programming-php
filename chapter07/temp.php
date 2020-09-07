<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>温度の変換</title>
    </head>
    <body>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
            華氏の温度を入力します。
            <input type="text" name="fahrenheit" /><br />
            <input type="submit" value="摂氏に変換！" />
        </form>
    <?php }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fahrenheit = $_POST['fahrenheit'];
        $celsius = ($fahrenheit - 32) * 5 / 9;

        printf("%.2fF は %.2fCです", $fahrenheit, $celsius);
    } else {
        die("このスクリプトはGETとPOST以外のリクエストでは動作しません");
    }?>
    </body>
</html>
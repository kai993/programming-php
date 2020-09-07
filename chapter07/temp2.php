<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>温度の変換</title>
    </head>
    <body>
    <?php
    if (isset($_GET['fahrenheit'])) {
        $fahrenheit = $_GET['fahrenheit'];
    } else {
        $fahrenheit = null;
    }
    if (is_null($fahrenheit)) {
    ?>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get">
            華氏の温度を入力します。
            <input type="text" name="fahrenheit" />
            <input type="submit" value="摂氏に変換" />
        </form>
    <?php
    } else {
        $celsius = ($fahrenheit - 32) * 5 / 9;
        printf("%.2fF is %.2fC", $fahrenheit, $celsius);
    }
    ?>
    </body>
</html>
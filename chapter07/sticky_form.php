<html>
    <head>
        <title>温度の変換</title>
    </head>

    <?php
        error_reporting(0);
        $fahrenheit = $_GET['fahrenheit'];
    ?>

    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get">
            華氏の温度を入力します。
            <input type="text" name="fahrenheit" value="<?php echo $fahrenheit; ?>" /><br />
            <input type="submit" value="摂氏に変換" />
        </form>

    <?php
        if (!is_null($fahrenheit)) {
            $celsius = ($fahrenheit - 32) * 5 / 9;
            printf("%2.fF は %.2fC です", $fahrenheit, $celsius);
        }
    ?>
    </body>
</html>
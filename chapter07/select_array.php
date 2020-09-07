<html lang="ja">
    <head>
        <title>性格診断</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get">
            当てはまる項目を選択してください。
            <select name="attributes[]" multiple>
                <option value="生意気">生意気</option>
                <option value="気難しい">気難しい</option>
                <option value="理性的">理性的</option>
                <option value="感情的">感情的</option>
                <option value="倹約家">倹約家</option>
                <option value="浪費家">浪費家</option>
            </select><br>
            <input type="submit" name="s" value="記録する!">
        </form>

        <?php
        error_reporting(0);
        if (array_key_exists('s', $_GET)) {}
            $description = join(' ', $_GET['attributes']);
            echo "あなたの性格は {$description} です。";
        ?>
    </body>
</html>

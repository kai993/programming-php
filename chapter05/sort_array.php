<?php

function userSort($a, $b)
{
    if ($b == "smarts") {
        return 1;
    } else if ($a == "smarts") {
        return -1;
    }

    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}

$values = array(
    'name'          => "バズ・ライトイヤー",
    'email_address' => "buzz@startcommand.gal",
    'age'           => 32,
    'smarts'        => 'some',
);

if ($_POST['submitted']) {
    $sortType = $_POST['sort_type'];
    if ($sortType == "usort" || $sortType == "uksort" || $sortType == "uasort") {
        $sortType($values, "user_sort");
    } else {
        $sortType($values);
    }
}
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
    <p>
        <input type="radio" name="sort_type" value="sort" checked="checked" />標準のソート<br />
        <input type="radio" name="sort_type" value="rsort">逆順のソート<br />
        <input type="radio" name="sort_type" value="usort">ユーザー定義順でのソート<br />
        <input type="radio" name="sort_type" value="ksort">キーによるソート<br />
        <input type="radio" name="sort_type" value="krsort">キーの逆順によるソート<br />
        <input type="radio" name="sort_type" value="uksort">ユーザー定義順でのキーによるソート<br />
        <input type="radio" name="sort_type" value="asort">値によるソート<br />
        <input type="radio" name="sort_type" value="arsort">値の逆順によるソート<br />
        <input type="radio" name="sort_type" value="uasort">ユーザー定義順での値によるソート<br />
    </p>
    <p align="center"><input type="submit" value="ソート" name="submitted" /></p>
    <p>Values <?= $_POST['submitted'] ? "{$sortType}によるソート結果" : "ソートしない状態" ?>:</p>
    <ul>
        <?php
        foreach ($values as $key => $value) {
            echo "<li><b>{$key}</b>: {$value}</li>";
        }
        ?>
    </ul>
</form>
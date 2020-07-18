<?php
/**
 * 関数の呼び出し
 */

$length = strlen("php");
echo $length . "\n"; // 3

$result = sin(asin(1));
echo $result . "\n"; // 1

// ファイル削除
$result = unlink("functions.txt") or die("処理に失敗しました！");

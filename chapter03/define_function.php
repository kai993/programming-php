<?php
/**
 * 関数の定義
 */
function strcat($left, $right)
{
  $combinedString = $left . $right;
  return $combinedString;
}

echo strcat("Hello, ", "PHP!\n"); // Hello, PHP!

// 性数値を受け取ってそれをビットシフトを用いて倍にした結果を返す
function doubler($value)
{
  return $value << 1;
}

echo doubler(5) . "\n";   // 10
echo doubler(111) . "\n"; // 222
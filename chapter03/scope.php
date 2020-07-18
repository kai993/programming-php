<?php
/**
 * 変数のスコープ
 */

function foo()
{
  $a += 2;
}

foo();
echo $a; // Undefiend variable: a

$a = 3;
function foo2()
{
  global $a;
  $a += 2;
}

echo $a . "\n"; // 3
foo2();
echo $a . "\n"; // 5

function counter()
{
  static $count = 0;
  return $count++;
}

printf("%s\n", "=====");
for ($i = 0; $i < 10; $i++) {
  printf("%d\n", counter());
}
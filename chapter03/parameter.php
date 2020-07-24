<?php
/**
 * 関数のパラメータ
 */
function doubler(&$value)
{
  $value = $value << 1;
}

$a = 3;
doubler($a);

echo $a; // 6

// デフォルト値
function hello($name="anonymous")
{
  printf("Hello, %s!\n", $name);
}
hello();       // Hello, anonymous!
hello("mike"); // Hello, mike!

// 可変パラメータ
function listCount()
{
  if (func_num_args() == 0) {
    return false;
  } else {
    $count = 0;
    for ($i = 0; $i < func_num_args(); $i++) {
      $count += func_get_arg($i);
    }

    return $count;
  }
}

echo listCount(1, 5, 9); // 15

// タイプヒンティング
class Entertainment {}

class Clown extends Entertainment {}

class Job {}

function handleEntertainment(Entertainment $a, callable $callback = NULL)
{
  echo "Handling " . get_class($a) . " fun\n";

  if ($callback !== null) {
    $callback();
  }
}

$callback = function() {
  // do something
};

handleEntertainment(new Clown);          // Handling Clown fun
handleEntertainment(new Job, $callback); // PHP Fatal error:  Uncaught TypeError: Argument 1 passed to handleEntertainment() must be an instance of Entertainment, instance of Job given, called
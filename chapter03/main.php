<?php

// 文字列を連結する
function strcat($left, $right)
{
    return $left . $right;
}

// 整数値を受け取ってビットシフトを用いて倍にした結果を返す
function doubler($value)
{
    return $value << 1;
}

// 関数を入れ子にしてもあまり意味がない
function outer($a)
{
    function inner($b) 
    {
        echo "there $b\n";
    }
    echo "$a, hello\n";
}

$a = 3;

function foo()
{
    global $a;
    $a += 2;
}

// グローバル変数
// echo "$a\n"; // 3
// foo();
// echo "$a\n"; // 5

// スタティック変数
function counter()
{
    static $count = 0;
    return $count++;
}

// 参照渡し
function doubler2(&$value)
{
    $value = $value << 1;
}

function getPreferences($whichPreferences = 'all')
{
    return "Preferences {$whichPreferences}";
}

function countList()
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

function takesTwo($a, $b)
{
    if (isset($a)) {
        echo "aが設定されています\n";
    }

    if (isset($b)) {
        echo "bが設定されています\n";
    }
}

class Entertainment {}

class Clown extends Entertainment {}

class Job {}

function handleEntertainment(Entertainment $a, callable $callback = null)
{
    echo "Handling " . get_class($a) . " fun\n";

    if ($callback !== null) {
        $callback();
    }
}

// 値の参照を返す
$names = array("Fred", "Barney", "Wilma", "Betty");
function &findOn($n) {
    global $names;
    return $names[$n];
}

$person =& findOn(1);
$person = "Barnetta";
echo $person . "\n"; // Barnetta

function main() {
    echo strcat("Hello ", "PHP!") . "\n"; // Hello PHP!
    echo doubler(30) . "\n"; // 60

    outer("well");   // well, hello
    inner("reader"); // there reader 

    // スタティック変数
    for ($i = 1; $i <= 5; $i++) {
        print counter(); // 01234
    }
    echo "\n";

    // 参照渡し
    $a = 3;
    doubler2($a);
    echo "$a\n"; // 6

    // デフォルト値
    echo getPreferences() . "\n";       // Preferences all
    echo getPreferences("user") . "\n"; // Preferences user

    // 可変パラメータ
    echo countList(1, 5, 9) . "\n"; // 15

    // パラメータの省略
    echo "引数を2つ設定します\n";
    takesTwo(1, 2);

    $callback = function() {
        echo "callback!";
    };
    handleEntertainment(new Clown);            // Handle Clown fun
    //handleEntertainment(new Job, $callback); // PHP Fatal error:  Uncaught TypeError: handleEntertainment(): Argument #1 ($a) must be of type Entertainment, Job given,
    handleEntertainment(new Clown, $callback); // callback!

    // 無名関数
    $array = array("really long string here, boy", "this", "middling length", "larger");
    usort($array, function ($a, $b) {
        return strlen($a) - strlen($b);
    });
    print_r($array);
    // Array
    // (
    //     [0] => this
    //     [1] => larger
    //     [2] => middling length
    //     [3] => really long string here, boy
    // )

}

main();


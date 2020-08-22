<?php
// データの格納
//$addresses[0] = "spam@cyberpromo.net";
//echo $addresses; // Array
//echo "\n";

// インデックス配列
$price['gasket'] = 15.29;
$price['wheel']  = 75.25;
$price['tire']   = 50.00;
print_r($price);
// Array
// (
//     [gasket] => 15.29
//     [wheel] => 75.25
//     [tire] => 50
// )

/// シンプルな構文
$days = ['gasket' => 15.29, 'wheel' => 75.25, 'tire' => 50.00];

// 空の配列
$addresses = array();

$days = array(1 => "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
print_r($days);
// Array
// (
//     [1] => Mon
//     [2] => Tue
// [3] => Wed
// [4] => Thu
// [5] => Fri
// [6] => Sat
// [7] => Sun
// )

// 末尾に追加
$family = array("Fred", "Wilma");
$family[] = "Pebbles";
echo $family[2] . "\n"; // Pebbles

// 範囲指定による代入
$numbers = range(2, 5);
$letters = range('a', 'z');
$reversedNumbers = range(5, 2);

print_r($numbers);
// Array
// (
//     [0] => 2
//     [1] => 3
//     [2] => 4
//     [3] => 5
// )

print_r($letters);
// Array
// (
//     [0] => a
//     [1] => b
//     [2] => c
//     [3] => d
//     [4] => e
//     [5] => f
//     [6] => g
//     [7] => h
//     [8] => i
//     [9] => j
//     [10] => k
//     [11] => l
//     [12] => m
//     [13] => n
//     [14] => o
//     [15] => p
//     [16] => q
//     [17] => r
//     [18] => s
//     [19] => t
//     [20] => u
//     [21] => v
//     [22] => w
//     [23] => x
//     [24] => y
//     [25] => z
// )

print_r($reversedNumbers);
// Array
// (
//     [0] => 5
//     [1] => 4
//     [2] => 3
//     [3] => 2
// )

// 配列の大きさ
echo count($family) . "\n";  // 3
echo sizeof($family) . "\n"; // 3

// array_pad() : 初期値に同じ値を設定する
$scores = array(5, 10);
$padded = array_pad($scores, 5, 0);
print_r($padded);
// Array
// (
//     [0] => 5
//     [1] => 10
//     [2] => 0
//     [3] => 0
//     [4] => 0
// )

print_r(array_pad(array(), 10, 9));
// Array
// (
//     [0] => 9
//     [1] => 9
//     [2] => 9
//     [3] => 9
//     [4] => 9
//     [5] => 9
//     [6] => 9
//     [7] => 9
//     [8] => 9
//     [9] => 9
// )

// 多次元配列
$row0 = array(1, 2, 3);
$row1 = array(4, 5, 6);
$row2 = array(7, 8, 9);
$multi = array($row0, $row1, $row2);
var_dump($multi);
// array(3) {
//     [0]=>
//   array(3) {
//         [0]=>
//     int(1)
//     [1]=>
//     int(2)
//     [2]=>
//     int(3)
//   }
//   [1]=>
//   array(3) {
//         [0]=>
//     int(4)
//     [1]=>
//     int(5)
//     [2]=>
//     int(6)
//   }
//   [2]=>
//   array(3) {
//         [0]=>
//     int(7)
//     [1]=>
//     int(8)
//     [2]=>
//     int(9)
//   }
// }

echo $multi[0][2] . "\n"; // 3
echo("3行目, 2列目の値は{$multi[2][1]}です\n"); // 3行目, 2列目の値は8です

// 多次元配列の展開
// list() : 要素の値を変数に取り込む
$person = array("Fred", 35, "Betty");
list($name, $age, $wife) = $person;
printf("%s(%d), wife=%s\n", $name, $age, $wife); // Fred(35), wife=Betty

// array_slice : 配列の一部分を抽出する
$arr = range(1, 20, 2);
var_dump(array_slice($arr, 2, 4));
// array(4) {
//     [0]=>
//   int(5)
//   [1]=>
//   int(7)
//   [2]=>
//   int(9)
//   [3]=>
//   int(11)
// }

// array_slice() + list()
$order = array("Tom", "Dick", "Harriet", "Brenda", "Jo");
list($second, $third) = array_slice($order, 1, 2);
printf("%s + %s\n", $second, $third); // Dick + Harriet

// array_chunk : 配列の分割
$nums = range(1, 7);
$rows = array_chunk($nums, 3);
var_dump($rows);
// array(3) {
//     [0]=>
//   array(3) {
//         [0]=>
//     int(1)
//     [1]=>
//     int(2)
//     [2]=>
//     int(3)
//   }
//   [1]=>
//   array(3) {
//         [0]=>
//     int(4)
//     [1]=>
//     int(5)
//     [2]=>
//     int(6)
//   }
//   [2]=>
//   array(1) {
//         [0]=>
//     int(7)
//   }
// }

// array_keys() : 配列のキーのみを返す
$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
var_dump(array_keys($person));
// array(3) {
//     [0]=>
//   string(4) "name"
//     [1]=>
//   string(3) "age"
//     [2]=>
//   string(4) "wife"
// }

// array_values() : 値のみを返す
var_dump(array_values($person));
// array(3) {
//     [0]=>
//   string(4) "Fred"
//     [1]=>
//   int(35)
//   [2]=>
//   string(5) "Wilma"
// }

// array_key_exists() : 要素が存在するか調べる
$person['age'] = 0; // 産まれていない？
if ($person['age']) {
    echo "true!\n";
}

if (array_key_exists('age', $person)) {
    echo "exists!\n";
}

// isset() : 要素が存在するかどうかを返す。 NULLの場合の挙動が異なる
$a = array(0, NULL, '');

function tf($v)
{
    return $v ? 'T' : 'F';
}

for ($i = 0; $i < 4; $i++) {
   printf("%d: %s %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
}

// foreach
$addresses = array("spam@cyberpromo.net", "abuse@example.com");
foreach ($addresses as $address) {
    echo "{$address}を処理します\n";
}

$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
foreach ($person as $key => $value) {
    printf("%s --> %s\n", $key, $value);
}


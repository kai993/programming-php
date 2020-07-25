<?php
/**
 * 文字列の表示
 */
// echo
echo "Hello PHP!\n";
echo("Hello PHP!\n");

echo "Hello ", "PHP!\n";

// print()
print("Hello PHP!\n");

// printf()
// 浮動小数点数を小数点数以下2桁まで出力
printf("%.2f\n", 27.452); // 27.45

// 10進形式および16進形式で出力
printf("%dを16進形式で表すと\"%x\"です\n", 214, 214); // 214を16進形式で表すと"d6"です

// 整数値を3桁に置換
printf("ジェームズ・ぼんど、%03d\n", 7); // ジェームズ・ぼんど、007

// 日付の書式変換
printf("%04d/%02d/%02d\n", 2020, 7, 7); // 2020/07/07

// パーセンテージ
printf("%.2f%% 終了しました\n", 50.5); // 50.50% 終了しました

// 浮動小数点数の桁揃え
printf("$%5.2fで買い物しました\n", 4.1); // $ 4.10で買い物しました

// print_r()
$a = array("one", "two", "three");
$framework = array("Go" => "Echo", "PHP" => "Laravel", "Ruby" => "Ruby on Rails");
print_r($a);
print_r($framework);

class Person
{
    var $name = "Taro";
    var $age = 38;
}
$p = new Person;
print_r($p);

var_dump($a);
// array(3) {
//     [0]=>
//   string(3) "one"
//     [1]=>
//   string(3) "two"
//     [2]=>
//   string(5) "three"
// }

var_dump($framework);
// array(3) {
//     ["Go"]=>
//   string(4) "Echo"
//     ["PHP"]=>
//   string(7) "Laravel"
//     ["Ruby"]=>
//   string(13) "Ruby on Rails"
// }

var_dump($p);
// object(Person)#1 (2) {
// ["name"]=>
//   string(4) "Taro"
// ["age"]=>
//   int(38)
// }
//
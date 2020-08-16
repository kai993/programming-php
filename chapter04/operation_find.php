<?php
/**
 * 文字列の操作と検索
 */
/* 一部の取り出し */
// substr() : 指定した文字列の一部分のコピーを作成する
$name = "Fred Flintstone";
$fluff = substr($name, 6, 4);
$sound = substr($name, 11);
echo("fluff : {$fluff}\n"); // lint
echo("sound : {$sound}\n"); // tone

// substr_count() : 文字列が何回登場するかを調べる
$sketch = <<< EOFOfSketch
Well, there's egg and bacon; egg sausage and bacon; egg and spam;
egg bacon and spam; egg bacon sausage and spam; spam bacon sausage
and spam; spam egg spam spam bacon and spam; spam sausage spam spam
bacon spam tomato and spam;
EOFOfSketch;

$count = substr_count($sketch, "spam");
printf("spamという単語が%d回登場しました\n", $count); // spamという単語が14回登場しました

// substr_replace() : 指定した文字を置換する
$greeting = "good morning citizen";
$farewell = substr_replace($greeting, "bye", 5, 7);
printf("farewell : {$farewell}\n"); // farewell : good bye citizen
printf("substr_replace : %s\n", substr_replace($greeting, "everyone", 13, 7)); // substr_replace : good morning everyone

// 挿入
printf("insert : %s\n", substr_replace($farewell, "kind ", 9, 7)); // insert : good bye kind

/* その他の文字列関数 */
// strrev() : 文字列をコピーして逆順にする
echo strrev("There is no cabal") . "\n"; // labac on si erehT

// str_repeat() : 指定された文字列を回数だけ繰り返す
echo str_repeat('_.-.', 40) . "\n"; // _.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-._.-.

// str_pad() : ある文字列に別の文字列を継ぎ足す
$string = str_pad('Fred Flintstone', 30);
echo "{$string}:35:Wilma\n"; // Fred Flintstone               :35:Wilma

$string = str_pad('Fred Flintstone', 30, '..');
echo "{$string}:35:Wilma\n"; // Fred Flintstone...............:35:Wilma

echo '[' . str_pad('Fred Flintstone', 30, ' ') . "]\n";                         // [Fred Flintstone               ]
echo '[' . str_pad('Fred Flintstone', 30, ' ', STR_PAD_BOTH) . "]\n"; // [       Fred Flintstone        ]
echo '[' . str_pad('Fred Flintstone', 30, ' ', STR_PAD_LEFT) . "]\n"; // [               Fred Flintstone]

/* 文字列の分解 */
// explode() : 文字列を分解する
$input = 'Fred,25,Wilma';
$fields = explode(',', $input);
var_dump($fields);
// array(3) {
//     [0]=>
//   string(4) "Fred"
//     [1]=>
//   string(2) "25"
//     [2]=>
//   string(5) "Wilma"
// }


$fields = explode(',', $input, 2);
var_dump($fields);
// array(2) {
//     [0]=>
//   string(4) "Fred"
//     [1]=>
//   string(8) "25,Wilma"
// }

// implode() : explode()の逆
$fields = array('Fred', '25', 'Wilma');
$string = implode(',', $fields);
echo("implode : {$string}\n"); // implode : Fred,25,Wilma

// strtok() :
$string = 'Fred,Flintstone,35,Wilma';
$token = strtok($string, ",");
while ($token !== false) {
    echo("{$token}\n");
    $token = strtok(",");
}
// Fred
// Flintstone
// 35
// Wilma

// sscanf() : 指定された文字列をprintf()風のテンプレートに基づいて分解する
$string = "Fred\tFlintstone (35)";
$a = sscanf($string, "%s\t%s (%d)");
print_r($a);
// (
//   [0] => Fred
//   [1] => Flintstone
//   [2] => 35
// )

$n = sscanf($string, "%s\t%s (%d)", $fname, $lname, $age);
echo "{$n}個のフィールドに分解しました, {$fname}, {$lname}, {$age}\n"; // 3個のフィールドに分解しました, Fred, Flintstone, 35

/* 文字列の検索関数 */
// strpos() : 特定の文字列が最初に現れる位置を返す
$record = "Fred,Flintstone,35,Wilma";
$pos = strpos($record, ",");
echo("最後にカンマが現れる位置は、{$pos}です\n"); // 最後にカンマが現れる位置は、4です

// strrpos() : 特定の文字列が最後に現れる位置を返す
$pos = strrpos($record, ",");
echo("最後にカンマが現れる位置は、{$pos}です\n"); // 最後にカンマが現れる位置は、18です

// strstr() : 特定の文字列が最初に現れる場所を探し、それ以降の文字を返す
$record = "Fred,Flintstone,35,Wilma";
$rest = strstr($record, ",");
echo("rest : " . $rest . "\n"); // rest : ,Flintstone,35,Wilma

// strspn() / strcspn() : 先頭から何文字目までが条件を満たしているかを調べる
/**
 * 8進数形式かどうかを調べる
 * @param $str
 */
function isOctal($str)
{
    return strspn($str, "01234567") == strlen($str);
}

function hasBadChars($str)
{
    return strcspn($str, "\n\t\0") != strlen($str);
}

// parse_url() : URLを分解する
$bits = parse_url("http://me:secret@example.com/cgi-bin/board?user=fred");
print_r($bits);
// Array
// (
//     [scheme] => http
//     [host] => example.com
//     [user] => me
//     [pass] => secret
//     [path] => /cgi-bin/board
//     [query] => user=fred
// )

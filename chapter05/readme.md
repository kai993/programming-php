# 配列

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->

- [データ格納](#%E3%83%87%E3%83%BC%E3%82%BF%E6%A0%BC%E7%B4%8D)
- [配列の末尾に値を追加](#%E9%85%8D%E5%88%97%E3%81%AE%E6%9C%AB%E5%B0%BE%E3%81%AB%E5%80%A4%E3%82%92%E8%BF%BD%E5%8A%A0)
- [範囲指定による配列の生成](#%E7%AF%84%E5%9B%B2%E6%8C%87%E5%AE%9A%E3%81%AB%E3%82%88%E3%82%8B%E9%85%8D%E5%88%97%E3%81%AE%E7%94%9F%E6%88%90)
- [配列のサイズ](#%E9%85%8D%E5%88%97%E3%81%AE%E3%82%B5%E3%82%A4%E3%82%BA)
- [配列の展開](#%E9%85%8D%E5%88%97%E3%81%AE%E5%B1%95%E9%96%8B)
- [配列のスライス](#%E9%85%8D%E5%88%97%E3%81%AE%E3%82%B9%E3%83%A9%E3%82%A4%E3%82%B9)
- [配列の分割](#%E9%85%8D%E5%88%97%E3%81%AE%E5%88%86%E5%89%B2)
- [キーと値の取得](#%E3%82%AD%E3%83%BC%E3%81%A8%E5%80%A4%E3%81%AE%E5%8F%96%E5%BE%97)
- [要素の存在チェック](#%E8%A6%81%E7%B4%A0%E3%81%AE%E5%AD%98%E5%9C%A8%E3%83%81%E3%82%A7%E3%83%83%E3%82%AF)
- [要素の追加・削除](#%E8%A6%81%E7%B4%A0%E3%81%AE%E8%BF%BD%E5%8A%A0%E3%83%BB%E5%89%8A%E9%99%A4)
- [要素のループ](#%E8%A6%81%E7%B4%A0%E3%81%AE%E3%83%AB%E3%83%BC%E3%83%97)
- [イテレータ関数](#%E3%82%A4%E3%83%86%E3%83%AC%E3%83%BC%E3%82%BF%E9%96%A2%E6%95%B0)
- [配列の全ての要素にユーザー定義の関数を適用する](#%E9%85%8D%E5%88%97%E3%81%AE%E5%85%A8%E3%81%A6%E3%81%AE%E8%A6%81%E7%B4%A0%E3%81%AB%E3%83%A6%E3%83%BC%E3%82%B6%E3%83%BC%E5%AE%9A%E7%BE%A9%E3%81%AE%E9%96%A2%E6%95%B0%E3%82%92%E9%81%A9%E7%94%A8%E3%81%99%E3%82%8B)
- [コールバック関数を繰り返し配列に適用し、配列をひとつの値にまとめる](#%E3%82%B3%E3%83%BC%E3%83%AB%E3%83%90%E3%83%83%E3%82%AF%E9%96%A2%E6%95%B0%E3%82%92%E7%B9%B0%E3%82%8A%E8%BF%94%E3%81%97%E9%85%8D%E5%88%97%E3%81%AB%E9%81%A9%E7%94%A8%E3%81%97%E9%85%8D%E5%88%97%E3%82%92%E3%81%B2%E3%81%A8%E3%81%A4%E3%81%AE%E5%80%A4%E3%81%AB%E3%81%BE%E3%81%A8%E3%82%81%E3%82%8B)
- [値の検索](#%E5%80%A4%E3%81%AE%E6%A4%9C%E7%B4%A2)
- [ソート](#%E3%82%BD%E3%83%BC%E3%83%88)
- [配列の和の計算](#%E9%85%8D%E5%88%97%E3%81%AE%E5%92%8C%E3%81%AE%E8%A8%88%E7%AE%97)
- [配列のマージ](#%E9%85%8D%E5%88%97%E3%81%AE%E3%83%9E%E3%83%BC%E3%82%B8)
- [2つの配列の差の計算](#2%E3%81%A4%E3%81%AE%E9%85%8D%E5%88%97%E3%81%AE%E5%B7%AE%E3%81%AE%E8%A8%88%E7%AE%97)
- [フィルタリング](#%E3%83%95%E3%82%A3%E3%83%AB%E3%82%BF%E3%83%AA%E3%83%B3%E3%82%B0)
- [和集合](#%E5%92%8C%E9%9B%86%E5%90%88)
- [Iteratorインターフェイス](#iterator%E3%82%A4%E3%83%B3%E3%82%BF%E3%83%BC%E3%83%95%E3%82%A7%E3%82%A4%E3%82%B9)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## データ格納

配列

```php
$addresses[0] = 'hoge@mecorp.jp';
$addresses[1] = 'foo@mecorp.jp';
$addresses[2] = 'bar@mecorp.jp';
var_dump($addresses);
// array(3) {
//   [0]=>
//   string(14) "hoge@mecorp.jp"
//   [1]=>
//   string(13) "foo@mecorp.jp"
//   [2]=>
//   string(13) "bar@mecorp.jp"
// }
```

連想配列

```php
$book['title'] = 'PHP入門';
$book['price'] = '1280';
$book['company'] = 'php engineering';
array(3) {
  ["title"]=>
  string(9) "PHP入門"
  ["price"]=>
  string(4) "1280"
  ["company"]=>
  string(15) "php engineering"
}
```

array構文を使用した方が良い

```php
$addresses2 = array('hoge@mecorp.jp', 'foo@mecorp.jp', 'bar@mecorp.jp');
$book2 = array(
    'title'   => 'PHP入門',
    'price'   => 1280,
    'company' => 'php engineering',
);
var_dump($addresses2);
// array(3) {
//   [0]=>
//   string(14) "hoge@mecorp.jp"
//   [1]=>
//   string(13) "foo@mecorp.jp"
//   [2]=>
//   string(13) "bar@mecorp.jp"
// }
var_dump($book2);
// array(3) {
//   ["title"]=>
//   string(9) "PHP入門"
//   ["price"]=>
//   int(1280)
//   ["company"]=>
//   string(15) "php engineering"
// }
```

## 配列の末尾に値を追加

```php
$addresses2[] = 'fizz@mecorp.jp';
var_dump($addresses2);
// array(3) {
//   ["title"]=>
//   string(9) "PHP入門"
//   ["price"]=>
//   int(1280)
//   ["company"]=>
//   string(15) "php engineering"
// }
```

## 範囲指定による配列の生成

```php
$numbers = range(3, 8);
var_dump($numbers);
// array(6) {
//   [0]=>
//   int(3)
//   [1]=>
//   int(4)
//   [2]=>
//   int(5)
//   [3]=>
//   int(6)
//   [4]=>
//   int(7)
//   [5]=>
//   int(8)
// }

$odd = range(1, 10, 2);
var_dump($odd);
// array(5) {
//   [0]=>
//   int(1)
//   [1]=>
//   int(3)
//   [2]=>
//   int(5)
//   [3]=>
//   int(7)
//   [4]=>
//   int(9)
// }

$alpha = range('a', 'd');
var_dump($alpha);
// array(4) {
//   [0]=>
//   string(1) "a"
//   [1]=>
//   string(1) "b"
//   [2]=>
//   string(1) "c"
//   [3]=>
//   string(1) "d"
// }
```

## 配列のサイズ

```php
printf("%d\n", count($addresses2)); // 4
printf("%d\n", count($book2));      // 3
```

## 配列の展開

```php
$book = array('PHP入門', 1280, 'php engineering');
list($title, $price, $company) = $book;
printf("Title: %s, Price: %d, Company: %s\n", $title, $price, $company); // Title: PHP入門, Price: 1280, Company: php engineering
```

## 配列のスライス

```php
$subset = array_slice($addresses2, 0, 2);
var_dump($subset);
// array(2) {
//   [0]=>
//   string(14) "hoge@mecorp.jp"
//   [1]=>
//   string(13) "foo@mecorp.jp"
// }
```

## 配列の分割

```php
$chunk = array_chunk($addresses2, 2);
var_dump($chunk);
// array(2) {
//   [0]=>
//   array(2) {
//     [0]=>
//     string(14) "hoge@mecorp.jp"
//     [1]=>
//     string(13) "foo@mecorp.jp"
//   }
//   [1]=>
//   array(2) {
//     [0]=>
//     string(13) "bar@mecorp.jp"
//     [1]=>
//     string(14) "fizz@mecorp.jp"
//   }
// }
```

## キーと値の取得

- キー

```php
$keys = array_keys($book2);
var_dump($keys);
// array(3) {
//   [0]=>
//   string(5) "title"
//   [1]=>
//   string(5) "price"
//   [2]=>
//   string(7) "company"
// }
```

- 値

```php
$values = array_values($book2);
var_dump($values);
// array(3) {
//   [0]=>
//   string(9) "PHP入門"
//   [1]=>
//   int(1280)
//   [2]=>
//   string(15) "php engineering"
// }
```

## 要素の存在チェック

```php
if (array_key_exists('title', $book)) {
    print("title is exist\n"); // title is exist
}
```

`isset()`はnullの場合挙動が異なる

- isset : false
- array_key_exists : true (要素は存在するから)

```php
$a = array(0, null, '');
for ($i=0; $i < count($a) + 1; $i++) {
    printf("%d: %s %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
}
// 0: T T
// 1: F T
// 2: T T
// 3: F F
```

## 要素の追加・削除

```php
$languages = array('PHP', 'Java', 'Rust', 'Node.js');
$removed = array_splice($languages, 2);
var_dump($languages);
// array(2) {
//   [0]=>
//   string(3) "PHP"
//   [1]=>
//   string(4) "Java"
// }
var_dump($removed);
// array(2) {
//   [0]=>
//   string(4) "Rust"
//   [1]=>
//   string(7) "Node.js"
// }
```

連想配列

```php
$capitals = array(
    'アメリカ' => 'ワシントン',
    '日本'    => '東京',
    'オランダ' => 'アムステルダム',
    'イギリス' => 'ロンドン',
);
$removed = array_splice($capitals, 3);
var_dump($capitals);
// array(3) {
//   ["アメリカ"]=>
//   string(15) "ワシントン"
//   ["日本"]=>
//   string(6) "東京"
//   ["オランダ"]=>
//   string(21) "アムステルダム"
// }
var_dump($removed);
// array(1) {
//   ["イギリス"]=>
//   string(12) "ロンドン"
// }
```

## 要素のループ

```php
$languages = array('PHP', 'Java', 'Rust', 'Node.js');
foreach ($languages as $language) {
    echo strtolower($language) . "\n";
}
// php
// java
// rust
// node.js

// インデックスを使う場合
$languages = array('PHP', 'Java', 'Rust', 'Node.js');
foreach ($languages as $i => $language) {
    printf("%s. %s\n", str_pad($i, 2, 0, STR_PAD_LEFT), strtolower($language));
}
// 00. php
// 01. java
// 02. rust
// 03. node.js
```

```php
foreach ($capitals as $country => $capital) {
    printf("%s(%s)\n", $country, $capital);
}
$capitals = array(
    'アメリカ' => 'ワシントン',
    '日本'    => '東京',
    'オランダ' => 'アムステルダム',
    'イギリス' => 'ロンドン',
);
// アメリカ(ワシントン)
// 日本(東京)
// オランダ(アムステルダム)
// イギリス(ロンドン)
```

## イテレータ関数
- PHPの配列は現在どの要素を処理中なのかという情報を内部で保持してる
- 現在の要素を指すポインタのことをイテレータという
- `foreach`と違って配列のコピーはしない
- 大きな配列などでメモリを節約したい場合に便利
- 関数

| 関数        | 説明                                                                             |
|-------------|----------------------------------------------------------------------------------|
| `current()` | 現在イテレータが指している要素を返す                                             |
| `reset()`   | イテレータの位置を配列の先頭要素に移動し、その要素を返す                         |
| `next()`    | イテレータの位置を配列の次の要素に移動し、その要素を返す                         |
| `prev()`    | イテレータの位置を配列の前の要素に移動し、その要素を返す                         |
| `end()`     | イテレータの位置を配列の最後の要素に移動し、その要素を返す                       |
| `each()`    | 現在の要素のキーと値を配列として返し、イテレータの位置を配列の次の要素に移動する(php8から削除された) |
| `key()`     | 現在の要素のキーを返す                                                           |

```php
reset($languages);
while ($c = current($languages)) {
    $k = key($languages);
    $v = $c;
    printf("%sは%sです\n", $k, $v);
    next($languages);
}
// 0はPHPです
// 1はJavaです
// 2はRustです
// 3はNode.jsです
```

## 配列の全ての要素にユーザー定義の関数を適用する

```php
$printRow = function($value, $key)
{
    print("  <tr><td>{$key}</td><td>{$value}</td></tr>\n");
};
$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
echo "<table border=1>\n";
array_walk($person, $printRow);
echo "</table>\n";
// <table border=1>
//   <tr><td>name</td><td>Fred</td></tr>
//   <tr><td>age</td><td>35</td></tr>
//   <tr><td>wife</td><td>Wilma</td></tr>
// </table>

// 複数のオプションを渡す場合
$extraData = array('border' => 2, 'color' => "red");
$baseArray = array("Ford", "Chrysler", "Volkswagen", "Honda", "Toyota");
function walkFunction($item, $index, $data)
{
    echo "{$item} <- item, then border: {$data['border']}";
    echo " color->{$data['color']}\n";
}
array_walk($baseArray, "walkFunction", $extraData);
// Ford <- item, then border: 2 color->red
// Chrysler <- item, then border: 2 color->red
// Volkswagen <- item, then border: 2 color->red
// Honda <- item, then border: 2 color->red
// Toyota <- item, then border: 2 color->red
```

## コールバック関数を繰り返し配列に適用し、配列をひとつの値にまとめる

```php
$addItUp = function($runningTotal, $currentValue)
{
    echo $runningTotal . " " . $currentValue . "\n";
    $runningTotal += $currentValue * $currentValue;
    return $runningTotal;
};
$numbers = array(2, 3, 5, 7);
$total = array_reduce($numbers, $addItUp);
echo "Total : {$total}\n";
//  2
// 4 3
// 13 5
// 38 7
// Total : 87
```

## 値の検索

- 第3引数にtrueを設定すると型が一致するかどうかも調べられる

```php
$addresses = array('hoge@mecorp.jp', 'foo@mecorp.jp', 'bar@mecorp.jp', 'spam@spam.com');
$gotSpam = in_array('spam@spam.com', $addresses);
$gotMilk = in_array('milk@milk.com', $addresses, true);
var_dump($gotSpam); // bool(true)
var_dump($gotMilk); // bool(false)
```

## ソート

アルファベット昇順

```php
$names = array('Cath', 'Angela', 'Brad', 'Mira');
sort($names);
var_dump($names);
// array(4) {
//   [0]=>
//   string(6) "Angela"
//   [1]=>
//   string(4) "Brad"
//   [2]=>
//   string(4) "Cath"
//   [3]=>
//   string(4) "Mira"
// }
```

アルファベット降順

```php
rsort($names);
var_dump($names);
// array(4) {
//   [0]=>
//   string(4) "Mira"
//   [1]=>
//   string(4) "Cath"
//   [2]=>
//   string(4) "Brad"
//   [3]=>
//   string(6) "Angela"
// }
```

配列の値によるソート

```php
$logins = array(
    'njy' => 415,
    'kt'  => 492,
    'rl'  => 652,
    'jht' => 441,
    'jj'  => 441,
    'wt'  => 402,
    'hut' => 309,
);
arsort($logins);
var_dump($logins);
// array(7) {
//   ["rl"]=>
//   int(652)
//   ["kt"]=>
//   int(492)
//   ["jht"]=>
//   int(441)
//   ["jj"]=>
//   int(441)
//   ["njy"]=>
//   int(415)
//   ["wt"]=>
//   int(402)
//   ["hut"]=>
//   int(309)
// }
```

## 配列の和の計算

```php
$scores = array(93, 84, 82);
echo array_sum($scores) . "\n"; // 259
```

## 配列のマージ

```php
$first = array('php', 'ruby', 'python');
$second = array('go', 'java', 'rust');
$merged = array_merge($first, $second);
var_dump($merged);
// array(6) {
//   [0]=>
//   string(3) "php"
//   [1]=>
//   string(4) "ruby"
//   [2]=>
//   string(6) "python"
//   [3]=>
//   string(2) "go"
//   [4]=>
//   string(4) "java"
//   [5]=>
//   string(4) "rust"
// }

// マップ
$mfirst = array('name' => 'Mike', 'age' => 38, 'from' => 'USA');
$msecond = array('hobby' => 'football', 'age' => 37);
$mmerged = array_merge($mfirst, $msecond);
var_dump($mmerged);
// array(4) {
//   ["name"]=>
//   string(4) "Mike"
//   ["age"]=>
//   int(37)
//   ["from"]=>
//   string(3) "USA"
//   ["hobby"]=>
//   string(8) "football"
// }
```

## 2つの配列の差の計算

```php
// a1の値のうち、a2あるいはa3に存在しないものを探す
$a1 = array('PHP', 'Laravel', 'Composer');
$a2 = array('Smarty', 'Composer');
$a3 = array('CodeIgniter', 'CakePHP', 'composer');
$diff = array_diff($a1, $a2, $a3);
var_dump($diff);
// array(2) {
//   [0]=>
//   string(3) "PHP"
//   [1]=>
//   string(7) "Laravel"
// }
```

## フィルタリング

```php
$isOdd = function ($elem)
{
    return $elem % 2;
};
$numbers = array(9, 23, 24, 27);
$odds = array_filter($numbers, $isOdd);
var_dump($odds);
// array(3) {
//   [0]=>
//   int(9)
//   [1]=>
//   int(23)
//   [3]=>
//   int(27)
// }
```

## 和集合
- 両方の集合の要素をから重複したものを取り除く

```php
function arrayUnion($a, $b)
{
    $union = array_merge($a, $b);
    $union = array_unique($union);
    return $union;
}
$a1 = array('php', 'go', 'javascript');
$a2 = array('scala', 'go', 'ruby');
$union = arrayUnion($a1, $a2);
var_dump($union);
// array(5) {
//   [0]=>
//   string(3) "php"
//   [1]=>
//   string(2) "go"
//   [2]=>
//   string(10) "javascript"
//   [3]=>
//   string(5) "scala"
//   [5]=>
//   string(4) "ruby"
// }
```

## Iteratorインターフェイス
https://www.php.net/manual/ja/class.iterator.php


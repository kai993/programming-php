# プログラミングPHP

* HTMLコンテンツを作ることを主眼として設計されている
* 主な使用方法は3つ
  * サーバーサイド
  * コマンドライン
  * GUIアプリケーション
* PHPなC言語やPerlの影響を受けている



## 歴史

* 1994年 : Rasmus Lerdorf氏がPHPを考案
* 1995年 : PHP1.0誕生
* 1996年 : PHP2.0誕生
* 1998年 : PHP3.0誕生
* 2020年 : PHP8.0



## 環境

```bash
$ sw_vers
ProductName:	Mac OS X
ProductVersion:	10.15.5
BuildVersion:	19F101

$ php -v
PHP 7.3.11 (cli) (built: Apr 17 2020 19:14:14) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.11, Copyright (c) 1998-2018 Zend Technologies

$ brew search php@7
==> Formulae
php@7.2                                                       php@7.3                                                       php@7.4

$ brew install php@7.4

$ grep php ~/.zshrc
export PATH=/usr/local/opt/php@7.4/bin:$PATH
export PATH=/usr/local/opt/php@7.4/sbin:$PATH

$ php -v
PHP 7.4.8 (cli) (built: Jul  9 2020 23:43:51) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.8, Copyright (c), by Zend Technologies
```



## 字句構造

クラス・関数・組み込みキーワードは大文字や小文字は区別しない

```php
echo("hello php!\n");
Echo("hello php!\n");
ECHO("hello php!\n");
```

```php
$ php ./chapter02/lexical.php
hello php!
hello php!
hello php!
```



変数名は区別される

```php
$name = "tom";
echo("Hello {$name}!\n");
echo("Hello {$Name}!\n");
echo("Hello {$NAME}!\n");
```

```bash
Hello tom!
PHP Notice:  Undefined variable: Name in chapter02/lexical.php on line 8

Notice: Undefined variable: Name in chapter02/lexical.php on line 8
Hello !
PHP Notice:  Undefined variable: NAME in chapter02/lexical.php on line 9

Notice: Undefined variable: NAME in chapter02/lexical.php on line 9
Hello !
```



コメント

```php
// hoge
# hoge
/* hoge */
```



キーワード

https://www.php.net/manual/ja/reserved.keywords.php



## データ型

8種類のデータ型がありそのうち4つはスカラー型（単一の値をとる型）

* 整数
* 浮動小数点数
* 文字列
* 論理値
* 配列
* オブジェクト
* リソース型
* NULL



### 整数

10進数

```php
2020
-15
27
```



16進数

先頭が`0x`その後に`0~9`の数字または`A~F`の英字が続く。英字は大文字小文字問わないが通常は大文字で書く。

```php
0xFF    // 255
0x10    // 16
-0xDAD1 // -56017
```



2進数

先頭が`0b`その後に数字(0,1)が続くもの。

```php
0b01100000 // 96
0b00000010 // 2
-0b10      // -2
```



整数かどうかを調べる

```php
if (is_int($x)) {
  // 整数型
}
```



### 浮動小数点数

精度の高い数値・広範囲の数値を扱いたい場合はBG拡張モジュールまたはGMP拡張モジュールを使用する。

```php
3.14
0.017
-7.1
```



浮動小数点数かどうかを調べる

```php
if (is_float($x)) {
  // 浮動小数点数
}
```



### 文字列

等しいかどうか

```php
if ($a == $b) {
  // 等しい
}
```



文字列かどうか

```php
if (is_string($str)) {
  // 文字列
}
```



### 論理値

次の値は`false`とみなされる

* `false`
* `0`
* `0.0`
* `""`
* `"0"`
* 要素数がゼロの配列
* `NULL`



### 配列

`array()`構文を使う

```php
# 配列
$num = array(0, 1, 2);
$num[0];

# マップ
$person = array(
  0 => "Tom",
  1 => "Mike",
  2 => "Keisuke",
);


echo $num[1]    . "\n"; // 1
echo $person[1] . "\n"; // Mike
```



foreach

```php
# 配列
foreach ($num as $n) {
  echo "${n} ";
}
// 0 1 2

# map
foreach ($person as $n => $name) {
  printf("{$n} --> {$name}\n");
}
// 0 --> Tom
// 1 --> Mike
// 2 --> Keisuke
```



並び替え

```php
sort($num);
var_dump($num);

asort($person);
var_dump($person);
```



```php
array(3) {
  [0]=>
  int(0)
  [1]=>
  int(1)
  [2]=>
  int(2)
}

array(3) {
  [2]=>
  string(7) "Keisuke"
  [1]=>
  string(4) "Mike"
  [0]=>
  string(3) "Tom"
}
```





### オブジェクト

PHPはオブジェクト指向プログラミングもサポートしている

```php
class Person
{
  public $name = '';

  function name($newname = NULL)
  {
    if (!is_null($newname)) {
      $this->name = $newname;
    }

    return $this->name;
  }
}

$p = new Person;
$p->name("Mike");
echo "Hello {$p->name}!\n";
```

```bash
$ php chapter02/class.php
Hello Mike!
```



### リソース

PHPの外部とやり取りする、例えばデータベース関連の拡張モジュールは接続を表す識別子を返すようになっている。

この識別子のことをリソース(or ハンドラ)と言う。



アクティブなリソースはそれぞれ一意なリソースを持っていて、これは数値のインデックスである。

PHP内部のルックアップテーブルでこの識別子を使ってアクティブなリソースを管理している。

作成したリソースへの参照が無くなった時点で、このリソースを作成したモジュールがメモリの解放などの後始末を行う。

```php
$con = database_connect();
database_query($con);

// $conを再定義したことにより、データベースへの接続は自動的に閉じられる
$con = "hoge";
```



リソースかどうか

```php
if (is_resource($x)) {
  // リソース
}
```





### コールバック

関数から使う関数やメソッドのこと

```php
$callback = function() {}

call_user_func($callback);
```



### NULL

その変数に何も値が代入されていないことを表す。

`null`かどうか

```php
if (is_null($x)) {
  // null
}
```



## 変数

識別子の前にドル記号(`$`)を付ける。

```php
$name
$age
$includedID  
```



参照

`$hoge`に値があれば失われ、`$hoge`を`$foo`に保存されている値のエイリアスとなる。

```php
$hoge =& $foo
```

```php
$bigLongVariableName = "PHP";
$short =& $bigLongVariableName;
$bigLongVariableName .= " rocks!";
print "\$short is {$short}\n";            // $short is PHP rocks!
print "Long is {$bigLongVariableName}\n"; // Long is PHP rocks!

$short = "Programming $short";
print "\$short is {$short}\n";            // $short is Programming PHP rocks!
print "Long is {$bigLongVariableName}\n"; // Long is Programming PHP rocks!The 
```



## 式・演算子

演算子とは、いくつかの値を受け取って何らかの操作(`+`, `-`など)を行うもの。



### インクリメント・デクリメント

* 後置インクリメント・デクリメントは戻り値はそのまま（インクリメント・デクリメントする前の値を返す）
* 前値インクリメント・デクリメントは戻り値に`+-1`する

```php
// インクリメント
$n1 = 0;
echo($n1++ . "\n"); // 0
echo(++$n1 . "\n"); // 2

// デクリメント
$n2 = 10;
echo($n2-- . "\n"); // 10
echo(--$n2 . "\n"); // 8
```



### 比較演算子

* `==` : 等しい
* `===` : 同一である
* `!=` or `<>` : 等しくない
* `!==` : 同一でない
* `>` : より大きい
* `>=` : 以上
* `<` : より小さい
* `<=` : 以下



### ビット演算子

オペランドを2進形式で表したものを処理する。初めにオペランドを2進数表現に変換する。

* `~` : ビット否定演算子。1を0に、0を1に変換する。オペランドが文字列の場合は各文字ビットを反転させたものになる。
* `&` : ビットAND(論理積)演算子。それぞれの対応するビットを比較して両方とも1だった場合は1になり、そうでない場合は0になる。
* `|` : ビットOR(論理和)演算子。それぞれの対応するビットを比較し、両方とも0だった場合は0になりそうでない場合は1になる。
* `^` : ビットXOR(排他的論理和)演算子。それぞれの対応するビットを比較し、2つのビットの片方が0、もう片方が1の時1になる。両方のビットが等しい場合は0になる。
* `<<` : 左シフト演算子。右オペランドで指定したビット数だけ左にシフトする。
* `>>` : 右シフト演算子。右オペランドで指定したビット数だけ右にシフトする。



### 論理演算子

オペランドを論理値として評価して、結果を論理値で返す。

* `&&` , `and` : 両方のオペランドが`true`の場合のみ`true`になる。それ以外の場合は`false`
* `||`, `or` : 論理和(OR)演算子。どちらかのオペランドが`true`の場合に`true`になる。それ以外は`false`となる。
* `xor` : 排他的論理和。一方のオペランドのみが`true`の場合に`true`になる。それ以外は`false`になる。
* `!` : 論理否定演算子。オペランドが`false`である場合に`true`を、オペランドが`true`である場合は`false`を返す。



## 制御構文

## 関数

関数には2種類ある。

* 組み込み関数
* ユーザー定義関数



### 関数の定義

```php
function [&] function_name([parameter[, ...]])
{
  // 処理
}
```



関数名は大文字小文字は区別されない。



### 変数のスコープ

* 関数内で定義された変数は関数のパラメータも含めて外部からはアクセスできない。
* 関数の外部で定義した変数を関数の内部で使うことはできない。

```php
function foo()
{
  $a += 2;
}

foo();
echo $a; // Undefiend variable: a
```



関数の内部からグローバルスコープにある変数にアクセスする場合は`global`キーワードを使用する

```php
$a = 3;
function foo2()
{
  global $a;
  $a += 2;
}

echo $a . "\n"; // 3
foo2();
echo $a . "\n"; // 5
```



`global`を使うのは`$GLOBALS`変数内の値への参照を作成するのと同じ

```php
// 同義
global $var;
$var = & $GLOBALS['var'];
```



スタティック変数は関数の全ての呼び出しもとで共有される。

関数が最初に呼び出された時に1度だけ初期化が行われる。

```php
function counter()
{
  static $count = 0;
  return $count++;
}

for ($i = 0; $i < 10; $i++) {
  printf("%d\n", counter());
}
```



### 関数のパラメータ

パラメータを渡す方法は2種類ある。

* 値渡し
* 参照渡し



参照渡しはスコープの規則を無視して、関数内から直接変数の値を操作できるようになるが変数のみしか渡すことはできない。

```php
function doubler(&$value)
{
  $value = $value << 1;
}

$a = 3;
doubler($a);

echo $a; // 6

# 値を直接渡すことができない
doubler(10); // PHP Fatal error:  Only variables can be passed by reference
```



パラメータのデフォルト値

```php
function hello($name="anonymous")
{
  printf("Hello, %s!\n", $name);
}
hello();       // Hello, anonymous!
hello("mike"); // Hello, mike!
```



タイプヒンティング

関数を定義する時に関数のパラメータが特定のインスタンスであることを指定できる。

```php
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
```



### 返り値

値は1つしか返すことができない。



値への参照を返す場合

```php+HTML
$names = array("Fred", "Barney", "Wilma", "Betty");

function &findOne($n)
{
  global $names;

  return $names[$n];
}

$person =&  findOne(1);
$person = "Barnetta";
print_r($names);
```



### 可変関数

関数名を変数で指定すると適切な関数を呼び出すことが可能。

```php
function first() { echo "first!\n"; }
function seconds() { echo "seconds!\n"; }
function third() { echo "third!\n"; }
$which = "first";
$which();
```



`echo()`、`isset()`などは変数を使用して呼び出すことはできな。

```php
$e = "echo";
$e("hello!"); // Call to undefined function echo() 
```



### 無名関数

ラムダ関数とも言う。

`usort()`での例

```php
$array = array("really long string here, boy", "this", "middling length", "larger");
usort($array, function($a, $b) {
  return strlen($a) - strlen($b);
});
print_r($array);
```



関数の束縛するスコープの定義を定義するには`use`を使って定義する。

```php
$array = array("really long string here, boy", "this", "middling length", "larger");
$sortOption = 'random';
usort($array, function($a, $b) use ($sortOption){
  if ($sortOption == 'random') {
    return rand(0, 2) - 1;
  } else {
    return strlen($a) - strlen($b);
  }
});
print_r($array);
```



## 文字列

### クォート

文字列データを扱うには3つの方法がある。

* シングルクォート(`'`) : 変数展開されない
* ダブルクォート(`"`) : 変数展開される
* ヒアドキュメント​ : 変数展開される

```php
$who = 'Kilroy';
$where = 'here';
echo "$who was $where\n"; // Kilroy was here

$n = 12;
echo "You are the {$n}th person\n"; // You are the 12th person

$bar = 'hoge';
$foo = '$bar';
printf("%s\n", $foo); // $bar
```



エスケープシーケンス

| エスケープシーケンス | 変換される文字          |
| -------------------- | ----------------------- |
| `\"`                 | ダブルクォート          |
| `\n`                 | 改行                    |
| `\r`                 | キャリッジリターン      |
| `\t`                 | タブ                    |
| `\\`                 | バックスラッシュ        |
| `\$`                 | ドル記号                |
| `\{`                 | 左波括弧                |
| `\}`                 | 右波括弧                |
| `\[`                 | 左角括弧                |
| `\]`                 | 右角括弧                |
| `\0`から`\777`まで   | 8進数で表したASCII文字  |
| `\0`から`\xFF`まで   | 16進数で表したASCII文字 |



ヒアドキュメント

```php
$usage = <<< EndOfEof
$ ./hoge [-n] path

  ex: ./hoge -n /hoge/foo/bar.txt
      ./hoge

EndOfEof;
echo $usage;
```





### 表示

次の方法がある

* `echo`
* `print()`
* `printf()`
* `print_r()`
* `var_dump()`



#### echo

`echo`は関数ではなく言語構造である。括弧を省略することが可能

```php
// どちらも同じ
echo "Hello PHP!";
echo("Hello PHP!");
```



複数の値を表示するにはカンマを使う

```php
echo "Hello ", "PHP!\n";
```



#### print

引数で指定された1つの値を表示する。

```php
print("Hello PHP!\n");
```



#### printf

テンプレートを指定された値で置き換え文字列を表示する。



型指定子は全部で15種類ある。以下よく使いそうなもの

```
%% : %を表示
%b : 整数値を2進数で表示
%c : 整数値を指定した文字コードの文字で表示
%d : 整数値を10進数で表示
%f : 浮動小数点数を現在のロケールの書式で表示
%s : 文字列を文字列で表示する
```



例

```php
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
```



#### print_r

見やすい形式で出力する。

```php
// 配列
$a = array("one", "two", "three");
print_r($a);
// (
//     [0] => one
//     [1] => two
//     [2] => three
// )

// マップ
$framework = array("Go" => "Echo", "PHP" => "Laravel", "Ruby" => "Ruby on Rails");
print_r($framework);
// Array
// (
//     [Go] => Echo
//     [PHP] => Laravel
//     [Ruby] => Ruby on Rails
// )

// クラス
class Person
{
    var $name = "Taro";
    var $age = 38;
}
$p = new Person;
print_r($p);
// Person Object
// (
//     [name] => Taro
//     [age] => 38
// )
```



#### var_dump

```php
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
```



### 文字へのアクセス





### お掃除



### エンコードとエスケープ



### 比較



### 文字列の操作・検索



### 正規表現





## 配列

## オブジェクト

## ウェブ

## データベース

## XML

## セキュリティ

## アプリケーション

## webサービス 

## デバッグ

## import

## CLI

サーバー起動

```
$ ls
hoge.php

# http://localhost:8080/hoge.php
$ php -S localhost:8080
```



## 参考

[プログラミングPHP 第3版](https://www.oreilly.co.jp/books/9784873116686/)


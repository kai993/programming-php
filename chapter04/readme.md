# 文字列

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->

- [URL 特殊文字のエンティティ変換](#url-%E7%89%B9%E6%AE%8A%E6%96%87%E5%AD%97%E3%81%AE%E3%82%A8%E3%83%B3%E3%83%86%E3%82%A3%E3%83%86%E3%82%A3%E5%A4%89%E6%8F%9B)
- [特殊文字をHTMLエンティティに変換する](#%E7%89%B9%E6%AE%8A%E6%96%87%E5%AD%97%E3%82%92html%E3%82%A8%E3%83%B3%E3%83%86%E3%82%A3%E3%83%86%E3%82%A3%E3%81%AB%E5%A4%89%E6%8F%9B%E3%81%99%E3%82%8B)
- [HTMLタグの削除](#html%E3%82%BF%E3%82%B0%E3%81%AE%E5%89%8A%E9%99%A4)
- [HTML metaタグ抽出](#html-meta%E3%82%BF%E3%82%B0%E6%8A%BD%E5%87%BA)
- [URL RFC3986の規則に基づきURLエンコードを行う](#url-rfc3986%E3%81%AE%E8%A6%8F%E5%89%87%E3%81%AB%E5%9F%BA%E3%81%A5%E3%81%8Durl%E3%82%A8%E3%83%B3%E3%82%B3%E3%83%BC%E3%83%89%E3%82%92%E8%A1%8C%E3%81%86)
- [URL クエリ文字列のエンコード](#url-%E3%82%AF%E3%82%A8%E3%83%AA%E6%96%87%E5%AD%97%E5%88%97%E3%81%AE%E3%82%A8%E3%83%B3%E3%82%B3%E3%83%BC%E3%83%89)
- [文字列をスラッシュでクォート](#%E6%96%87%E5%AD%97%E5%88%97%E3%82%92%E3%82%B9%E3%83%A9%E3%83%83%E3%82%B7%E3%83%A5%E3%81%A7%E3%82%AF%E3%82%A9%E3%83%BC%E3%83%88)
- [比較](#%E6%AF%94%E8%BC%83)
- [文字列の一部分を返す](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%AE%E4%B8%80%E9%83%A8%E5%88%86%E3%82%92%E8%BF%94%E3%81%99)
- [特定の文字の出現回数](#%E7%89%B9%E5%AE%9A%E3%81%AE%E6%96%87%E5%AD%97%E3%81%AE%E5%87%BA%E7%8F%BE%E5%9B%9E%E6%95%B0)
- [文字列のリピート](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%AE%E3%83%AA%E3%83%94%E3%83%BC%E3%83%88)
- [文字列に文字列を埋める](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%AB%E6%96%87%E5%AD%97%E5%88%97%E3%82%92%E5%9F%8B%E3%82%81%E3%82%8B)
- [文字列から配列への変換](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%8B%E3%82%89%E9%85%8D%E5%88%97%E3%81%B8%E3%81%AE%E5%A4%89%E6%8F%9B)
- [配列から文字列への変換](#%E9%85%8D%E5%88%97%E3%81%8B%E3%82%89%E6%96%87%E5%AD%97%E5%88%97%E3%81%B8%E3%81%AE%E5%A4%89%E6%8F%9B)
- [文字列のトークン化](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%AE%E3%83%88%E3%83%BC%E3%82%AF%E3%83%B3%E5%8C%96)
- [文字列の位置を返す](#%E6%96%87%E5%AD%97%E5%88%97%E3%81%AE%E4%BD%8D%E7%BD%AE%E3%82%92%E8%BF%94%E3%81%99)
- [それ以降の文字列を返す](#%E3%81%9D%E3%82%8C%E4%BB%A5%E9%99%8D%E3%81%AE%E6%96%87%E5%AD%97%E5%88%97%E3%82%92%E8%BF%94%E3%81%99)
- [URLの分解](#url%E3%81%AE%E5%88%86%E8%A7%A3)
- [正規表現](#%E6%AD%A3%E8%A6%8F%E8%A1%A8%E7%8F%BE)
  - [preg_match](#preg_match)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## URL 特殊文字のエンティティ変換
- https://www.php.net/manual/ja/function.htmlentities.php
- HTMLで特殊文字はエンティティで表される
    - `&amp;`
    - `&gt;`など
- `$flag`パラメータはデフォルト`ENT_COMPAT`(ダブルクオートは変換するがシングルクオートは変換ししない)|`ENT_HTML401`になっている

```php
$s = htmlentities('<html>');
echo $s . "\n"; // &lt;html&gt;

$input = <<< END
This is a "pen"! <p>
END;
$s = htmlentities($input);
echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;

$s = htmlentities($input, ENT_QUOTES);
echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;

$s = htmlentities($input, ENT_NOQUOTES);
echo $s . "\n"; // This is a "pen"! &lt;p&gt;
```

## 特殊文字をHTMLエンティティに変換する
- https://www.php.net/manual/ja/function.htmlspecialchars.php
- HTMLを作成するために必要最小限の文字のみを変換する
- 対象となる文字
  - `&` : &amp;
  - `"` : &quot;
  - `'` : &#039; or &apos;
  - `<` : &lt;
  - `>` : &gt;
- フォームから入力したデータを表示する場合は必ずhtmlspecialchars()を通さないといけない

```php
$input = <<< END
This is a "pen"! <p>
END;
$s = htmlspecialchars($input);
echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;

$s = htmlspecialchars($input, ENT_QUOTES);
echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;

$s = htmlspecialchars($input, ENT_NOQUOTES);
echo $s . "\n"; // This is a "pen"! &lt;p&gt;
```

## HTMLタグの削除

- https://www.php.net/manual/ja/function.strip-tags.php

```php
$input = '<p>Hello &quot;PHP&quot;</p>';
$output = strip_tags($input);
echo "{$output}\n"; // Hello &quot;PHP&quot;

# タグを残す場合
$input2 = '<p>Hello <b>PHP</b></p>';
$output2 = strip_tags($input2, '<b>');
echo "{$output2}\n"; // Hello <b>PHP</b>
```

## HTML metaタグ抽出
- https://www.php.net/manual/ja/function.get-meta-tags.php

```php
$metaTags = get_meta_tags('https://github.com/');
var_dump($metaTags['description']); // string(279) "GitHub is where over 65 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, review code like a pro, track bugs and features, power your CI/CD and DevOps workflows, and secure code before you commit it."
echo count($metaTags); // 31
```

## URL RFC3986の規則に基づきURLエンコードを行う
- https://www.php.net/manual/ja/function.rawurlencode.php

```php
// encode
$input = 'https://github.com/';
$output = rawurlencode($input);
echo "{$output}\n"; // https%3A%2F%2Fgithub.com%2F

// decode
$input2 = 'https%3A%2F%2Fgithub.com%2F';
$output2 = rawurldecode($input2);
echo "{$output2}\n"; // https://github.com/
```

- リンクを動的に作成する場合はrawurlencode()を使う必要がある

```php
// encode
$input = 'プログラミングPHP';
$output = rawurlencode($input);
echo "{$output}\n"; // %E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0PHP

// decode
$input2 = '%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0PHP';
$output2 = rawurldecode($input2);
echo "{$output2}\n"; // プログラミングPHP
```

## URL クエリ文字列のエンコード

- https://www.php.net/manual/ja/function.urlencode.php
- raw~は空白文字を`%20`にするが、プラス記号(`+`)にする
- クエリ文字列やクッキーで使う方式

```php
$baseUrl = 'https://www.google.com/q=';
$query = 'PHP sessions -cookies';
$url = $baseUrl . urlencode($query);
echo "{$url}\n"; // https://www.google.com/q=PHP+sessions+-cookies
```

## 文字列をスラッシュでクォート
- https://www.php.net/manual/ja/function.addslashes.php

```php
$string = <<< EOF
Secure and customizable "compute service" that lets you create and run virtual machines on Google’s infrastructure(\).
EOF;
$string = addslashes($string);
echo "{$string}\n"; // Secure and customizable \"compute service\" that lets you create and run virtual machines on Google’s infrastructure(\\).
```

## 比較

```php
// 自動的にstring型に変換して比較
$v1 = 10;
$v2 = "10";
if ($v1 == $v2) {
    echo "true\n"; // true
}

// 型が異なる場合はfalse
if ($v1 === $v2) {
    echo "true\n";
} else{
    echo "false\n"; // false
}

// 明示的に文字列として比較
$n1 = strcmp("3", 3);
$n2 = strcmp("PHP", "php");
echo "n1 : {$n1}\n"; // 0
echo "n2 : {$n2}\n"; // -32
```

## 文字列の一部分を返す

```php
$s = "Hello PHP!";

$s1 = substr($s, strpos($s, 'P'), 3);
$s2 = substr($s, strpos($s, 'P'));

echo "{$s1}\n"; // PHP
echo "{$s2}\n"; // PHP!
```

## 特定の文字の出現回数

```php
$s = <<< EOF
php go scala ruby php php ruby go
ruby php javascript go java
EOF;
echo substr_count($s, 'php') . "\n";        // 4
echo substr_count($s, 'javascript') . "\n"; // 1
```

## 文字列のリピート

```php
$s = str_repeat("-", 30);

echo "{$s}\n"; // ------------------------------
echo "php\n";  // php
echo "{$s}\n"; // ------------------------------
```

## 文字列に文字列を埋める

```php
$input = 'PHP';

$s1 = str_pad($input, 30);
$s2 = str_pad($input, 30, "-");
$s3 = str_pad($input, 30, ":");
$s4 = str_pad($input, 30, "*");

echo "'{$s1}'\n"; // 'PHP                           '
echo "'{$s2}'\n"; // 'PHP---------------------------'
echo "'{$s3}'\n"; // 'PHP:::::::::::::::::::::::::::'
echo "'{$s4}'\n"; // 'PHP***************************'
```

$pad_typeを指定すると左右真ん中指定できる

```php
echo "[" . str_pad($input, 30, ' ', STR_PAD_LEFT)  . "]\n"; // [                           PHP]
echo "[" . str_pad($input, 30, ' ', STR_PAD_RIGHT) . "]\n"; // [PHP                           ]
echo "[" . str_pad($input, 30, ' ', STR_PAD_BOTH)  . "]\n"; // [             PHP              ]
```

## 文字列から配列への変換

```php
$s = 'Mike,25,Engineer';
$array1 = explode(',', $s);
// 要素数を指定
$array2 = explode(',', $s, 2);

var_dump($array1);
// array(3) {
//   [0]=>
//   string(4) "Mike"
//   [1]=>
//   string(2) "25"
//   [2]=>
//   string(8) "Engineer"
// }
var_dump($array2);
// array(2) {
//   [0]=>
//   string(4) "Mike"
//   [1]=>
//   string(11) "25,Engineer"
// }
```

## 配列から文字列への変換

- `join()`は`implode()`のエイリアス

```php
$fields = array('Mike', 25, 'Engineer');

$str1 = implode(',', $fields);
$str2 = implode(' ', $fields);
$str3 = implode('|', $fields);

echo "{$str1}\n"; // Mike,25,Engineer
echo "{$str2}\n"; // Mike 25 Engineer
echo "{$str3}\n"; // Mike|25|Engineer
```

## 文字列のトークン化

```php
$s = 'Mike,25,Engineer';
$token = strtok($s, ',');
while ($token !== false) {
    print("- {$token}\n");
    $token = strtok(',');
}
// - Mike
// - 25
// - Engineer
```

## 文字列の位置を返す
- 最初に現れる位置を返す

```php
$s = 'Mike,25,Engineer';
$position = strpos($s, ',');
printf("%d\n", $position); // 4
```

## それ以降の文字列を返す

- 特定の文字列が最初に現れる場所を探し、それ以降の文字列を返す

```php
$s = 'Mike,25,Engineer';

printf("%s\n", strstr($s, ',')); // ,25,Engineer
printf("%s\n", strstr($s, 'E')); // Engineer
```

## URLの分解

```php
$url = 'https://user1:pass1@example.com/item/purchased?start_date=1577847600&end_date=1580526000'; # 2020/1/1 12:00 ~ 2020/2/1 12:00
$bits = parse_url($url);
var_dump($bits);
// array(6) {
//   ["scheme"]=>
//   string(5) "https"
//   ["host"]=>
//   string(11) "example.com"
//   ["user"]=>
//   string(5) "user1"
//   ["pass"]=>
//   string(5) "pass1"
//   ["path"]=>
//   string(15) "/item/purchased"
//   ["query"]=>
//   string(41) "start_date=1577847600&end_date=1580526000"
// }
```

## 正規表現
- 大きく分けて3つのことができる
  - マッチした部分の取り出し
  - マッチした部分を別の文字に置換
  - 文字列をいくつかの部分に分割

### preg_match

- マッチする場合は1を返す

```php
$zipCode = '105-0011';

echo preg_match('/-/', $zipCode) . "\n";    // 1
echo preg_match('/^105/', $zipCode) . "\n"; // 1
echo preg_match('/11$/', $zipCode) . "\n";  // 1
echo preg_match('/20/', $zipCode) . "\n";   // 0
echo preg_match('/^99/', $zipCode) . "\n";  // 0
```

- 任意の一文字にマッチさせる

```php
echo preg_match('/1.5/', $zipCode) . "\n";  // 1
echo preg_match('/00../', $zipCode) . "\n"; // 1
echo preg_match('/0.2/', $zipCode) . "\n";  // 0
```

- 文字列のパターンを指定する(文字クラス)

```php
echo preg_match('/1[01234]5/', $zipCode) . "\n";  // 1
echo preg_match('/1[2-9]/', $zipCode) . "\n";     // 0

// 文字列の範囲を指定することも可能
echo preg_match('/1[0-4]5/', $zipCode) . "\n";    // 1
```

- 選択肢を指定

```php
echo preg_match('/cat|dog/', 'I love cat!') . "\n"; // 1
echo preg_match('/cat|dog/', 'I love dog!') . "\n"; // 1
echo preg_match('/cat|dog/', 'I love caw!') . "\n"; // 0
```

- 繰り返しのパターンを指定するには量指定子を使用する
    - `?` : 0回 or 1回
    - `+` : 0回以上
    - `*` : 1回以上
    - `{n` : 正確にn回
    - `{n,m}` : 最低n回、最高m回
    - `{n,}` : n回以上

```php
echo preg_match('/p+p/', 'pp') . "\n";                        // 1
echo preg_match('/p+p/', 'php') . "\n";                       // 0

echo preg_match('/p*p/', 'pp') . "\n";                        // 1
echo preg_match('/p*p/', 'php') . "\n";                       // 1

echo preg_match('/p?p/', 'pp') . "\n";                        // 1
echo preg_match('/p?p/', 'php') . "\n";                       // 1

echo preg_match('/^[0-9]{3}-[0-9]{4}$/', $zipCode)    . "\n"; // 1
echo preg_match('/^[0-9]{3}-[0-9]{4}$/', "00111")     . "\n"; // 0
echo preg_match('/^[0-9]{3}-[0-9]{4}$/', "105-00111") . "\n"; // 0
```

- マッチした部分を取得

```php
preg_match("(<.*>)", "This is <b>PHP</b>", $match);
var_dump($match);
// array(1) {
//  [0]=>
//  string(10) "<b>PHP</b>"
//}
```


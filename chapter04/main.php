<?php
/**
 * 4. 文字列
 */
//error_reporting(0);

// 文字列定数のクォート処理
function quote()
{
    $who = 'Kilroy';
    $where = "here";
    echo "$who was $where\n";

    $n = 12;
    echo "You are the {$n}th person\n"; // You are the 12th person

    $bar = 'この内容は表示されない';
    $foo = '$bar';
    print("$foo\n"); // $bar

    // エスケープ文字列
    echo "My name is \"taro\"!\n"; // My name is "taro"!
    echo 'It\'s a hoge' . "\n";    // It's a hoge

    // ヒアドキュメント
    $usage = <<< EndOfQuote
cal: illegal option -- -
Usage: cal [general options] [-hjy] [[month] year]
       cal [general options] [-hj] [-m month] [year]
       ncal [general options] [-hJjpwy] [-s country_code] [[month] year]
       ncal [general options] [-hJeo] [year]
General options: [-NC3] [-A months] [-B months]
For debug the highlighting: [-H yyyy-mm-dd] [-d yyyy-mm]

EndOfQuote;
    echo $usage;
    // cal: illegal option -- -
    // Usage: cal [general options] [-hjy] [[month] year]
    //        cal [general options] [-hj] [-m month] [year]
    //        ncal [general options] [-hJjpwy] [-s country_code] [[month] year]
    //        ncal [general options] [-hJeo] [year]
    // General options: [-NC3] [-A months] [-B months]
    // For debug the highlighting: [-H yyyy-mm-dd] [-d yyyy-mm]
}

// 文字列の表示
class YoutubeMovie
{
    // タイトル
    private $title;
    private $category;
    // 再生時間
    private $time;
    
    function __construct($title, $category, $time)
    {
        $this->title = $title;
        $this->category = $category;
        $this->time = $time;
    }
}

function printString()
{
    echo "hoge" . "\n"; // hoge
    echo("hoge\n");     // hoge

    print("foo\n"); // foo

    printf("%s(%d) %fcm %fkg\n", "Taro", 25, 170.0, 58.7); // Taro(25) 170.000000cm 58.700000kg
    printf("%s(%d) %.1ffcm %.1fkg\n", "Taro", 25, 170.0, 58.7); //Taro(25) 170.0fcm 58.7kg

    // 浮動小数点
    $pi = 3.14159264;
    printf("円周率 : %d\n", $pi);   // 円周率 : 3
    printf("円周率 : %.2f\n", $pi); // 円周率 : 3.14
    printf("円周率 : %f\n", $pi);   // 円周率 : 3.141593

    // 整数
    printf("サイボーグ%03d\n", 9); // サイボーグ009

    // 見やすい形式で出力
    $a = array(
        'name'   => 'Taro',
        'age'    => 25,
        'height' => 170.0,
        'weight' => 58.7,
    );
    print($a . "\n"); // Array
    print_r($a);
    // Array
    // (
    //     [name] => Taro
    //     [age] => 25
    //     [height] => 170
    //     [weight] => 58.7
    // )

    // print_rよりvar_dumpの方が詳細が表示される
    var_dump($a);
    // array(4) {
    //   ["name"]=>
    //   string(4) "Taro"
    //   ["age"]=>
    //   int(25)
    //   ["height"]=>
    //   float(170)
    //   ["weight"]=>
    //   float(58.7)
    // }

    $movie = new YoutubeMovie("初めてのPHP", "プログラミング", "13:40");
    print_r($movie);
    // YoutubeMovie Object
    // (
    //     [title:YoutubeMovie:private] => 初めてのPHP
    //     [category:YoutubeMovie:private] => プログラミング
    //     [time:YoutubeMovie:private] => 13:40
    // )
    var_dump($movie);
    // object(YoutubeMovie)#1 (3) {
    //   ["title":"YoutubeMovie":private]=>
    //   string(15) "初めてのPHP"
    //   ["category":"YoutubeMovie":private]=>
    //   string(21) "プログラミング"
    //   ["time":"YoutubeMovie":private]=>
    //   string(5) "13:40"
    // }
}

// 個別の文字へのアクセス
function accessString()
{
    $str = 'hello, world!';
    $l = strlen($str);
    printf("%s(%d)\n", $str, $l); // hello, world!(13)

    for ($i=0; $i < strlen($str); $i++) {
        printf("%d目の文字 : %s\n", $i, $str);
    }
    // 0目の文字 : hello, world!
    // 1目の文字 : hello, world!
    // 2目の文字 : hello, world!
    // 3目の文字 : hello, world!
    // 4目の文字 : hello, world!
    // 5目の文字 : hello, world!
    // 6目の文字 : hello, world!
    // 7目の文字 : hello, world!
    // 8目の文字 : hello, world!
    // 9目の文字 : hello, world!
    // 10目の文字 : hello, world!
    // 11目の文字 : hello, world!
    // 12目の文字 : hello, world!
}

// 文字列のお掃除
function clearningString()
{
    // 空白除去 
    $title = "  プログラミング  PHP \n";
    $str1 = ltrim($title);
    $str2 = rtrim($title);
    $str3 = trim($title);
    echo $str1 . "\n"; // プログラミング  PHP 
                       // 
    echo $str2 . "\n"; //   プログラミング  PHP
    echo $str3 . "\n"; // プログラミング  PHP

    $record = "   Fred\tFlintstone\t35\tWilma\t   \n";
    $record = trim($record, " \r\n\0\x0B");
    echo $record; // Fred    Flintstone      35      Wilma   

    // 大文字小文字の変換
    $str1 = "FRED flintstone\n";
    $str2 = "barney rubble\n";
    print(strtolower($str1)); // fred flintstone
    print(strtoupper($str2)); // BARNEY RUBBLE
    print(ucfirst($str1));    // FRED flintstone
    print(ucwords($str2));    // Barney Rubble
}

// エンコードとエスケープ
function encode_escape()
{
    // $s = htmlentities('<html>');
    // echo $s . "\n";

    // $input = <<< END
// This is a "pen"! <p>
// END;
    // $s = htmlentities($input);
    // echo $s . "\n";

    // $s = htmlentities($input, ENT_QUOTES);
    // echo $s . "\n";

    // $s = htmlentities($input, ENT_NOQUOTES);
    // echo $s . "\n";

    // $s = htmlspecialchars($input);
    // echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;
    // $s = htmlspecialchars($input, ENT_QUOTES);
    // echo $s . "\n"; // This is a &quot;pen&quot;! &lt;p&gt;
    // $s = htmlspecialchars($input, ENT_NOQUOTES);
    // echo $s . "\n"; // This is a "pen"! &lt;p&gt;

    // $input = '<p>Hello &quot;PHP&quot;</p>';
    // $output = strip_tags($input);
    // echo "{$output}\n"; // Hello &quot;PHP&quot;

    // $input2 = '<p>Hello <b>PHP</b></p>';
    // $output2 = strip_tags($input2, '<b>');
    // echo "{$output2}\n"; // Hello <b>PHP</b>

    // $metaTags = get_meta_tags('https://github.com/');
    // var_dump($metaTags['description']); // string(279) "GitHub is where over 65 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, review code like a pro, track bugs and features, power your CI/CD and DevOps workflows, and secure code before you commit it."
    // echo count($metaTags);

    // encode
    // $input = 'https://github.com/';
    // $output = rawurlencode($input);
    // echo "{$output}\n"; // https%3A%2F%2Fgithub.com%2F

    // // decode
    // $input2 = 'https%3A%2F%2Fgithub.com%2F';
    // $output2 = rawurldecode($input2);
    // echo "{$output2}\n"; // https://github.com/

    // $input = 'プログラミングPHP';
    // $output = rawurlencode($input);
    // echo "{$output}\n"; // %E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0PHP

    // $input2 = '%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0PHP';
    // $output2 = rawurldecode($input2);
    // echo "{$output2}\n"; // プログラミングPHP

    // $baseUrl = 'https://www.google.com/q=';
    // $query = 'PHP sessions -cookies';
    // $url = $baseUrl . urlencode($query);
    // echo "{$url}\n";

    $string = <<< EOF
Secure and customizable "compute service" that lets you create and run virtual machines on Google’s infrastructure(\).
EOF;
    $string = addslashes($string);
    echo "{$string}\n"; // Secure and customizable \"compute service\" that lets you create and run virtual machines on Google’s infrastructure(\\).
}

function compare_string()
{
    // $v1 = 10;
    // $v2 = "10";
    // if ($v1 == $v2) {
    //     echo "true\n"; // true
    // }

    // if ($v1 === $v2) {
    //     echo "true\n";
    // } else{
    //     echo "false\n"; // false
    // }

    // $n1 = strcmp("3", 3);
    // $n2 = strcmp("PHP", "php");
    // echo "n1 : {$n1}\n"; // 0
    // echo "n2 : {$n2}\n"; // -32
}

function processing()
{
    // $s = "Hello PHP!";
    // $s1 = substr($s, strpos($s, 'P'), 3);
    // echo "{$s1}\n"; // PHP
    // $s2 = substr($s, strpos($s, 'P'));
    // echo "{$s2}\n"; // PHP!

    // $s = <<< EOF
// php go scala ruby php php ruby go
// ruby php javascript go java
// EOF;
    // echo substr_count($s, 'php') . "\n";        // 4
    // echo substr_count($s, 'javascript') . "\n"; // 1

    // $s = str_repeat("-", 30);
    // echo "{$s}\n";
    // echo "php\n";
    // echo "{$s}\n";

    // $input = 'PHP';
    // $s1 = str_pad($input, 30);
    // $s2 = str_pad($input, 30, "-");
    // $s3 = str_pad($input, 30, ":");
    // $s4 = str_pad($input, 30, "*");
    // echo "'{$s1}'\n"; // 'PHP                           '
    // echo "'{$s2}'\n"; // 'PHP---------------------------'
    // echo "'{$s3}'\n"; // 'PHP:::::::::::::::::::::::::::'
    // echo "'{$s4}'\n"; // 'PHP***************************'

    // echo "[" . str_pad($input, 30, ' ', STR_PAD_LEFT)  . "]\n"; // [                           PHP]
    // echo "[" . str_pad($input, 30, ' ', STR_PAD_RIGHT) . "]\n"; // [PHP                           ]
    // echo "[" . str_pad($input, 30, ' ', STR_PAD_BOTH)  . "]\n"; // [             PHP              ]

    // $s = 'Mike,25,Engineer';
    // $array1 = explode(',', $s);
    // $array2 = explode(',', $s, 2);

    // var_dump($array1);
    // // array(3) {
    // //   [0]=>
    // //   string(4) "Mike"
    // //   [1]=>
    // //   string(2) "25"
    // //   [2]=>
    // //   string(8) "Engineer"
    // // }
    // var_dump($array2);
    // // array(2) {
    // //   [0]=>
    // //   string(4) "Mike"
    // //   [1]=>
    // //   string(11) "25,Engineer"
    // // }

    // $fields = array('Mike', 25, 'Engineer');

    // $str1 = implode(',', $fields);
    // $str2 = implode(' ', $fields);
    // $str3 = implode('|', $fields);

    // echo "{$str1}\n"; // Mike,25,Engineer
    // echo "{$str2}\n"; // Mike 25 Engineer
    // echo "{$str3}\n"; // Mike|25|Engineer

    // $s = 'Mike,25,Engineer';
    // $token = strtok($s, ',');
    // while ($token !== false) {
    //     print("- {$token}\n");
    //     $token = strtok(',');
    // }
    // // - Mike
    // // - 25
    // // - Engineer

    // $s = 'Mike,25,Engineer';
    // $position = strpos($s, ',');
    // printf("%d\n", $position); // 4

    // $s = 'Mike,25,Engineer';
    // printf("%s\n", strstr($s, ',')); // ,25,Engineer
    // printf("%s\n", strstr($s, 'E')); // Engineer

    // $url = 'https://user1:pass1@example.com/item/purchased?start_date=1577847600&end_date=1580526000'; # 2020/1/1 12:00 ~ 2020/2/1 12:00
    // $bits = parse_url($url);
    // var_dump($bits);
    // // array(6) {
    // //   ["scheme"]=>
    // //   string(5) "https"
    // //   ["host"]=>
    // //   string(11) "example.com"
    // //   ["user"]=>
    // //   string(5) "user1"
    // //   ["pass"]=>
    // //   string(5) "pass1"
    // //   ["path"]=>
    // //   string(15) "/item/purchased"
    // //   ["query"]=>
    // //   string(41) "start_date=1577847600&end_date=1580526000"
    // // }
}

function regular_expression()
{
    $zipCode = '105-0011';
    // echo preg_match('/-/', $zipCode) . "\n";    // 1
    // echo preg_match('/^105/', $zipCode) . "\n"; // 1
    // echo preg_match('/11$/', $zipCode) . "\n";  // 1
    // echo preg_match('/20/', $zipCode) . "\n";   // 0
    // echo preg_match('/^99/', $zipCode) . "\n";  // 0

    // echo preg_match('/1.5/', $zipCode) . "\n";  // 1
    // echo preg_match('/00../', $zipCode) . "\n"; // 1
    // echo preg_match('/0.2/', $zipCode) . "\n";  // 0

    // echo preg_match('/1[01234]5/', $zipCode) . "\n";  // 1
    // echo preg_match('/1[0-4]5/', $zipCode) . "\n";    // 1
    // echo preg_match('/1[2-9]/', $zipCode) . "\n";     // 0

    // echo preg_match('/cat|dog/', 'I love cat!') . "\n"; // 1
    // echo preg_match('/cat|dog/', 'I love dog!') . "\n"; // 1
    // echo preg_match('/cat|dog/', 'I love caw!') . "\n"; // 0

    // echo preg_match('/p+p/', 'pp') . "\n";                        // 1
    // echo preg_match('/p+p/', 'php') . "\n";                       // 0
    // echo preg_match('/p*p/', 'pp') . "\n";                        // 1
    // echo preg_match('/p*p/', 'php') . "\n";                       // 1
    // echo preg_match('/p?p/', 'pp') . "\n";                        // 1
    // echo preg_match('/p?p/', 'php') . "\n";                       // 1
    // echo preg_match('/^[0-9]{3}-[0-9]{4}$/', $zipCode)    . "\n"; // 1
    // echo preg_match('/^[0-9]{3}-[0-9]{4}$/', "00111")     . "\n"; // 0
    // echo preg_match('/^[0-9]{3}-[0-9]{4}$/', "105-00111") . "\n"; // 0

    //preg_match("(<.*>)", "This is <b>PHP</b>", $match);
    //var_dump($match);
    //// array(1) {
    ////  [0]=>
    ////  string(10) "<b>PHP</b>"
    ////}

    // 後置オプション
    $message = <<< END
To: you@youcorp
From: me@mecorp
Subject: Pay up

Pay me or else1
END;
    // i : 大文字小文字問わない
    // m : ^は\nの直後の文字、$は\nの直前の文字にマッチさせる
    preg_match("/^subject: (.*)/im", $message, $match);
    var_dump($match);
    // array(2) {
    //   [0]=>
    //   string(15) "Subject: Pay up"
    //   [1]=>
    //   string(6) "Pay up"
    // }

}

function main()
{
    // 変数の展開
    //quote(); // Kilroy was here

    //printString();

    //accessString();

    //clearningString();

    // encode_escape();

    // compare_string();

    // processing();

    regular_expression();
}

main();

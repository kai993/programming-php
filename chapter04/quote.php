<?php
/**
 * 文字列定数のクォート処理
 */
$who = 'Kilroy';
$where = 'here';
echo "$who was $where\n"; // Kilroy was here

$n = 12;
echo "You are the {$n}th person\n"; // You are the 12th person

$bar = 'hoge';
$foo = '$bar';
printf("%s\n", $foo); // $bar

$usage = <<< EndOfEof
$ ./hoge [-n] path

  ex: ./hoge -n /hoge/foo/bar.txt
      ./hoge

EndOfEof;
echo $usage;
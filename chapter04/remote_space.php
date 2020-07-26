<?php
$title = "  プログラミング PHP \n";
$str1 = ltrim($title);
$str2 = rtrim($title);
$str3 = trim($title);

printf("%s\n", $str1); // プログラミング PHP\n
printf("%s\n", $str2); //   プログラミング PHP
printf("%s\n", $str3); // プログラミング PHP

$record = " Fred\tFlintstone\t35\tWilma\t   \n";
$record = trim($record, "   \r\n\0\x0B");
printf("%s\n", $record);

<?php
echo("hello php!\n");
Echo("hello php!\n");
ECHO("hello php!\n");

$name = "tom";
echo("Hello {$name}!\n");
echo("Hello {$Name}!\n");
echo("Hello {$NAME}!\n");

$num = array(0, 1, 2);
$person = array(
  0 => "Tom",
  1 => "Mike",
  2 => "Keisuke",
);

echo $num[1] . "\n";    // 1
echo $person[1] . "\n"; // Mike

foreach ($num as $n) {
  echo "${n} ";
}
echo "\n";

foreach ($person as $n => $name) {
  printf("{$n} --> {$name}\n");
}

sort($num);
var_dump($num);

asort($person);
var_dump($person);
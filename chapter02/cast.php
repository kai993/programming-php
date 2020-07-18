<?php
$a = "5";
$b = (int) $a;
echo gettype($a) . "\n"; // string
echo gettype($b) . "\n"; // integer

class Person
{
  var $name = "Fred";
  var $age = 35;
}

$o = new Person;
$a = (array) $o;
print_r($a);
// Array
// (
//     [name] => Fred
//     [age] => 35
// )
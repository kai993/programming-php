<?php
function returnTwo()
{
  return array("Fred", 35);
}
print_r(returnTwo());

$names = array("Fred", "Barney", "Wilma", "Betty");

function &findOne($n)
{
  global $names;

  return $names[$n];
}

$person =&  findOne(1);
$person = "Barnetta";
print_r($names);

<?php
$v = 1;
switch ($v) {
  case 1:
    echo "one\n";
  case 2:
    echo "two\n";
  case 3:
    echo "three\n";
  default:
    echo "four\n";
}

$ranking = 3;
switch ($ranking) {
  case 1:
  case 2:
  case 3:
    echo "TOP3\n";
    break;
  default:
    echo "out of ranking\n";
    break;
}


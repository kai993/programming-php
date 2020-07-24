<?php
/**
 * 無名関数
 */
$array = array("really long string here, boy", "this", "middling length", "larger");
usort($array, function($a, $b) {
  return strlen($a) - strlen($b);
});
print_r($array);
// Array
// (
//     [0] => this
//     [1] => larger
//     [2] => middling length
//     [3] => really long string here, boy
// )

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

$array = array("really long string here, boy", "this", "middling length", "larger");
$sortOption = 'random';

function sortNorrandom($array) {
  $sortOption = false;
  usort($array, function($a, $b) use ($sortOption){
    if ($sortOption == 'random') {
      return rand(0, 2) - 1;
    } else {
      return strlen($a) - strlen($b);
    }
  });

  print_r($array);
}
print_r(sortNorrandom($array));

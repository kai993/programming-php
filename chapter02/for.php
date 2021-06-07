<?php

// for ($counter = 0; $counter < 10; $counter++) {
//   echo "counter value is {$counter}\n";
// }

// for ($i = 1, $j = 1; $i < 10; $i++, $j*=2) {
//   echo "i = {$i}, j = {$j}\n";
// }

// $arr = array("PHP", "Scala", "Ruby", "Java");
// foreach ($arr as $value) {
//   echo $value . "\n";
// }

$githubDetail = array(
  'Name' => 'GitHub',
  'URL'  => 'https://github.com/',
  'IP'   => '13.114.40.48',
);

foreach ($githubDetail as $k => $v) {
  echo "{$k} --> {$v}\n";
}

<?php
// $i = 2;
// while ($i < 1000) {
//   $i *= $i;
//   echo $i . "\n";
// }

// $i = 1;
// while ($i <= 10) {
//   echo $i . "\n";
//   if ($i === 3) {
//     break;
//   }
//   $i += 1;
// }

// $i = 0;
// $j = 0;
// while ($i < 10) {
//   while ($j < 10) {
//     echo "j: $j\n";
//     if ($j == 3) {
//       break 2;
//     }
//     $j++;
//   }
//   echo "i: $i\n";
//   $i++;
// }

// $i = 0;
// while ($i < 10) {
//   if ($i == 3 || $i == 7) {
//     $i++;
//     continue;
//   }
//   echo $i . "\n";
//   $i++;
// }

$count = 0;
do {
  echo $count;
  $count++;
} while ($count < 1); // 条件は1より小さい場合に文が実行される


<?php
$string1 = "FRED flinstone";
$string2 = "barney rubble";
print(strtolower($string1) . "\n"); // fred flinstone
print(strtoupper($string2) . "\n"); // BARNEY RUBBLE

print(ucfirst($string2) . "\n"); // Barney rubble
print(ucwords($string2) . "\n"); // Barney Rubble

// string1を単語の先頭は大文字、それ以外の文字は小文字にする
print ucwords(strtolower($string1)) . "\n"; // Fred Flinstone

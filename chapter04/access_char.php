<?php
$string = 'Hello World';
$length = strlen($string);
for ($i = 0; $i < $length; $i++) {
    printf("%d番目の文字は%sです\n", $i, $string[$i]);
}
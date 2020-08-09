<?php
$string = <<< EOF
"It's never going to work," she cried.
as she hit the backslash (\) key.
EOF;
$string = addslashes($string);
echo $string . "\n";
// \"It\'s never going to work,\" she cried.
// as she hit the backslash (\\) key.

echo stripslashes($string) . "\n";
// "It's never going to work," she cried.
// as she hit the backslash (\) key.

echo addcslashes("hello\tworld\n", "\x00..\x1fz..\xff") . "\n"; // hello\tworld\n

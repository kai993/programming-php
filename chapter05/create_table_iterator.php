<?php
$ages = array(
    'Person' => 'Age',
    'Fred'   => 35,
    'Barney' => 30,
    'Tigger' => 8,
    'Pooh'   => 40,
);

reset($ages);
$k = key($ages);
$v = current($ages);
next($ages);

// header
echo <<< EOF
<table>
    <tr><th>$k</th></tr>
    <tr><th>$v</th></tr>

EOF;

// body
while ($v = current($ages)) {
    $k = key($ages);
    echo <<< EOF
    <tr><td>$k</td></tr>
    <tr><td>$v</td></tr>

EOF;
    next($ages);
}

echo "</table>\n";

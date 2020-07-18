<?php
$bigLongVariableName = "PHP";
$short =& $bigLongVariableName;
$bigLongVariableName .= " rocks!";
print "\$short is {$short}\n";            // $short is PHP rocks!
print "Long is {$bigLongVariableName}\n"; // Long is PHP rocks!

$short = "Programming $short";
print "\$short is {$short}\n";            // $short is Programming PHP rocks!
print "Long is {$bigLongVariableName}\n"; // Long is Programming PHP rocks!

<?php
/**
 * 可変関数
 */
function first() { echo "first!\n"; }
function seconds() { echo "seconds!\n"; }
function third() { echo "third!\n"; }
$which = "first";
$which();

$e = "echo";
$e("hello!"); // Call to undefined function echo() 
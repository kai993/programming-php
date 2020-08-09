<?php
/**
 * URLのエスケープ
 */
$name = "プログラミング PHP";
// encode
$output = rawurlencode($name);
echo "http://localhost/{$output}\n"; // http://localhost/%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%20PHP

// decode
$encoded = "%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%20PHP";
echo rawurldecode($encoded) . "\n"; // プログラミング PHP

$baseURL = 'http://www.google.com/q=';
$query = 'PHP sessinos -cookies';
$url = $baseURL . urlencode($query);
echo $url . "\n"; // http://www.google.com/q=PHP+sessinos+-cookies
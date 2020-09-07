<?php
$now = time();
// 現在から3日間
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now  + 60 * 60 * 3);
header("Expires: {$then}");

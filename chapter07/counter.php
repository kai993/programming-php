<?php
ini_set('display_errors', "On");

session_start();
$_SESSION['hits'] = $_SESSION['hits'] + 1;

echo "このページは{$_SESSION['hits']}回表示されました";
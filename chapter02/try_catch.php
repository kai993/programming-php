<?php
try {
  $handle = new PDO('mysql:host=localhost; dbname=hoge', 'username1', 'password1');
  // 何かdbの操作をする

  // リソースの解放
  $handle = null;
} catch (PDOException $err) {
  print "Error: " . $err->getMessage() . "\n";
  die();
}

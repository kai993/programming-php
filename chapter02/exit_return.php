<?php
// $filepath = '/hoge/foo/bar.txt';
// $fp = @fopen($filepath, 'r')
//         or die("ファイルを開けませんでした\n");

// echo "ファイルを開きました\n";
// // リソースを解放する
// fclose($fp);

class P
{
  private $fname;
  private $lname;

  public function __construct($firstName, $lastName)
  {
    $this->fname = $firstName;
    $this->lname = $lastName;
  }

  public function getFullName()
  {
    return "{$this->fname} {$this->lname}";
  }
}

// $p = new P('Osaka', 'Naomi');
// echo "{$p->getFullName()}\n";

function isEven($i) {
  if ($i % 2 == 1) {
    return;
  }

  return true;
}

$i = 10;
if (isEven($i)) {
  echo "偶数!";
} else {
  echo "奇数!";
}

// nullが返る
$v = isEven(9);
printf("t : %s, v : %s\n", gettype($v), $v);


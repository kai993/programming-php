<?php
/**
 * 正規表現
 */
/* 正規表現の基本 */
// ^ : 先頭を表す
echo preg_match("/^cow/", "Dave was a cowhand") . "\n"; // 0
echo preg_match("/^cow/", "cowabunga!") . "\n";         // 1

// $ : 最後を表す
echo preg_match("/cow$/", "Dave was a cowhand") . "\n"; // 0
echo preg_match("/cow$/", "Don't have a cow")   . "\n"; // 1

// . : 任意の1文字にマッチする
echo preg_match("/c.t/", "cat") . "\n"; // 1
echo preg_match("/c.t/", "cut") . "\n"; // 1
echo preg_match("/c.t/", "c t") . "\n"; // 1
echo preg_match("/c.t/", "bat") . "\n"; // 0
echo preg_match("/c.t/", "ct")  . "\n"; // 0

// \ : 特殊文字にマッチさせる場合はエスケープする
echo preg_match("/\\$5\\.00/", "Your bill is $5.00 exactly") . "\n"; // 1
echo preg_match("/$5.00/", "Your bill is $5.00 exactly")  . "\n";    // 0

/* 文字クラス */
// [] : で囲むと独自の文字クラスを作成することができる
echo preg_match("/c[aeiou]t/", "I cut my hand")   . "\n"; // 1
echo preg_match("/c[aeiou]t/", "This crusty cat") . "\n"; // 1
echo preg_match("/c[aeiou]t/", "What cart?") . "\n";      // 0
echo preg_match("/c[aeiou]t/", "14ct gold") . "\n";       // 0

// ^ : 先頭にキャレットを指定すると否定になる
echo preg_match("/c[^aeiou]t/", "I cut my hand") . "\n"; // 0
echo preg_match("/c[^aeiou]t/", "Reboot chthon") . "\n"; // 1
echo preg_match("/c[^aeiou]t/", "14ct gold")     . "\n"; // 0

// - : 文字列の範囲を指定する
echo preg_match("/[0-9]%/", "we are 25% complete") . "\n";        // 1
echo preg_match("/[0123456789]%/", "we are 25% complete") . "\n"; // 1
echo preg_match("/[a-z]t/", "11th") . "\n";                       // 0
echo preg_match("/[a-z]t/", "cat") . "\n";                        // 1
echo preg_match("/[a-z]t/", "PIT") . "\n";                        // 0
echo preg_match("/[a-zA-Z]!/", "11!") . "\n";                     // 0
echo preg_match("/[a-zA-Z]!/", "stop!") . "\n";                   // 1

/* 選択肢 */
// | : 正規表現内で選択肢を指定できる
echo preg_match("/cat|dog/", "the cat rubbed my legs") . "\n";    // 1
echo preg_match("/cat|dog/", "the dog rubbed my legs") . "\n";    // 0
echo preg_match("/cat|dog/", "the rabbit rubbed my legs") . "\n"; // 0

echo preg_match("/^([a-z]|[0-9])/", "The quick brown fox") . "\n"; // 0
echo preg_match("/^([a-z]|[0-9])/", "jumped over") . "\n";         // 1
echo preg_match("/^([a-z]|[0-9])/", "10 lazy dogs") . "\n";        // 1

/* 繰り返し */
// ?     : 0回 or 1回
// *     : 0回以上
// +     : 1回以上
// {n}   : n回
// {n,m} : n回以上m以下
// {n,}  : n回以上
echo "-------\n";
echo preg_match("/ca+t/", "caaaaaaaaaaat") . "\n";         // 1
echo preg_match("/ca+t/", "ct") . "\n";                    // 0
echo preg_match("/ca?t/", "caaaaaaaaaat") . "\n";          // 0
echo preg_match("/ca?t/", "cat") . "\n";                   // 1
echo preg_match("/[0-9]{3}-[0-9]{4}/", "160-0002") . "\n"; // 1
echo preg_match("/[0-9]{3}-[0-9]{4}/", "95472") . "\n";    // 0

/* サブパターン */
//echo preg_match("", "") . "\n"; //

/* デリミタ */

/* マッチングの挙動 */

/* 文字クラス */

/* アンカー */

/* 量指定子の貪欲さ */

/* キャプチャしないグループ */

/* 後方参照 */

/* 後置オプション */

/* インラインオプション */

/* 先読みと戻り読み */

/* 無視 */

/* 条件式 */

/* 関数 */

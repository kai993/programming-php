<?php
/**
 * 4.6 文字列の比較
 */
/* 完全一致 */
$o1 = 3;
$o2 = "3";
if ($o1 == $o2) {
    echo ("== が true を返しました<br>");
} else {
    echo("=== が trueを返しました<br>");
}

$him = "Fred";
$her = "Wilma";
if ($him < $her) {
    print "アルファベット順で, {$him}は{$her}より前になります。\n"; // アルファベット順で, FredはWilmaより前になります。
}

$n = strcmp("PHP最高！", 5);
echo($n . "\n"); // 27

$n = strcasecmp("Fred", "frED");
echo($n . "\n"); // 0

/* 類似性 */
//
$known = "Fred";
$query = "Phred";
// soundex() : Soundex値で発音が似ているか比較
if (soundex($known) == soundex($query)) {
    print "soundex: {$known} と {$query} は似ています\n";
} else {
    print "soundex: {$known} と {$query} は似ていません\n"; // soundex: Fred と Phred は似ていません
}

// metaphone() : Metaphone値で発音が似ているかを比較（こっちの方が正確に判断できる）
if (metaphone($known) == metaphone($query)) {
    print "metaphone: {$known} と {$query} は似ています\n"; // metaphone: Fred と Phred は似ています
} else {
    print "metaphone: {$known} と {$query} は似ていません\n";
}

// similar_text() : 2つの文字列が共通に持つ文字の数を返す
$string1 = "Rasmus Lerdorf";
$string2 = "Razmuz Lehrdorf";
$common = similar_text($string1, $string2, $percent);
printf("2つの文字列は、%d文字(%.2f%%)が一致しています。\n", $common, $percent); // 2つの文字列は、12文字(82.76%)が一致しています。

// levenshtein() : 2つの文字列を一致させるためには何文字追加・置換・削除する必要があるかに基づいて類似性を計算する。
// cat と cot の距離は1になる
$similarity = levenshtein("cat", "cot");
echo $similarity . "\n"; //=> 1

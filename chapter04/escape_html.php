<?php
$string = htmlentities("Einstürzende Neubauten");
echo $string . "\n"; // Einst&uuml;rzende Neubauten

$input = <<< END
"Stop pulling my hair!　Jane's eyes flashed.<p>
END;

$double = htmlentities($input);
printf("double : %s\n", $double);

$both = htmlentities($input, ENT_QUOTES);
printf("both : %s\n", $both);

$neither = htmlentities($input, ENT_NOQUOTES);
printf("neither : %s\n", $neither);

$str = htmlentities("Einst?rzende Neubauten");
$table = get_html_translation_table(HTML_ENTITIES);
$revTrans = array_flip($table);
echo strtr($str, $revTrans) . "\n";

$table[' '] = '&nbsp;';
$encoded = strtr($str, $table);
echo $encoded . "\n";

// HTMLタグの削除
$input = '<p>Howdy, &quot;Cowboy&quot;</p>';
$output = strip_tags($input);
printf("output : %s\n", $output); // output : Howdy, &quot;Cowboy&quot;

$input = '<b>ボールド</b>タグはそのまま<i>残ります</i>';
$output = strip_tags($input, '<b>');
printf("output : %s\n", $output); // output : <b>ボールド</b>タグはそのまま残ります

/* metaタグの抽出 */
$metaTags = get_meta_tags('http://www.spotify.com/');
echo "spotifyは{$metaTags['description']}\n";

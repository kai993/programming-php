<?php

function _array()
{
    $addresses[0] = 'hoge@mecorp.jp';
    $addresses[1] = 'foo@mecorp.jp';
    $addresses[2] = 'bar@mecorp.jp';
    var_dump($addresses);

    $book['title'] = 'PHP入門';
    $book['price'] = 1280;
    $book['company'] = 'php engineering';
    var_dump($book);

    $addresses2 = array('hoge@mecorp.jp', 'foo@mecorp.jp', 'bar@mecorp.jp');
    $book2 = array(
        'title'   => 'PHP入門',
        'price'   => 1280,
        'company' => 'php engineering',
    );
    var_dump($addresses2);
    var_dump($book2);

    $addresses2[] = 'fizz@mecorp.jp';
    var_dump($addresses2);

    // 範囲指定による配列の代入
    $numbers = range(3, 8);
    var_dump($numbers);

    $odd = range(1, 10, 2);
    var_dump($odd);

    $alpha = range('a', 'd');
    var_dump($alpha);

    // 配列の大きさ
    printf("%d\n", count($addresses2));
    printf("%d\n", count($book2));

    // 展開
    $book = array('PHP入門', 1280, 'php engineering');
    list($title, $price, $company) = $book;
    printf("Title: %s, Price: %d, Company: %s\n", $title, $price, $company);

    // スライス
    $subset = array_slice($addresses2, 0, 2);
    var_dump($subset);

    // 分割
    $chunk = array_chunk($addresses2, 2);
    var_dump($chunk);

    // キーと値の取得
    $keys = array_keys($book2);
    $values = array_values($book2);
    var_dump($keys);
    var_dump($values);
    
    // 存在確認
    $book = array(
        'title'   => 'PHP入門',
        'price'   => 1280,
        'company' => 'php engineering',
    );

    if (array_key_exists('title', $book)) {
        print("title is exist\n"); // title is exist
    }

    $a = array(0, null, '');
    for ($i=0; $i < count($a) + 1; $i++) {
        printf("%d: %s %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
    }
    // 0: T T
    // 1: F T
    // 2: T T

    // 要素の削除と追加
    $languages = array('PHP', 'Java', 'Rust', 'Node.js');
    $removed = array_splice($languages, 2);
    var_dump($languages);
    var_dump($removed);

    $capitals = array(
        'アメリカ' => 'ワシントン',
        '日本'    => '東京',
        'オランダ' => 'アムステルダム',
        'イギリス' => 'ロンドン',
    );
    $removed = array_splice($capitals, 3);
    var_dump($capitals);
    var_dump($removed);

    // ループ
    $languages = array('PHP', 'Java', 'Rust', 'Node.js');
    foreach ($languages as $language) {
        echo strtolower($language) . "\n";
    }

    $languages = array('PHP', 'Java', 'Rust', 'Node.js');
    foreach ($languages as $i => $language) {
        printf("%s. %s\n", str_pad($i, 2, 0, STR_PAD_LEFT), strtolower($language));
    }

    $capitals = array(
        'アメリカ' => 'ワシントン',
        '日本'    => '東京',
        'オランダ' => 'アムステルダム',
        'イギリス' => 'ロンドン',
    );
    foreach ($capitals as $country => $capital) {
        printf("%s(%s)\n", $country, $capital);
    }

    // イテレータ
    reset($languages);
    while ($c = current($languages)) {
        $k = key($languages);
        $v = $c;
        printf("%sは%sです\n", $k, $v);
        next($languages);
    }

    // array_walk()
    $printRow = function($value, $key)
    {
        print("  <tr><td>{$key}</td><td>{$value}</td></tr>\n");
    };
    $person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
    echo "<table border=1>\n";
    array_walk($person, $printRow);
    echo "</table>\n";

    // 複数のオプションを渡す場合は3番目の引数に配列を渡す
    $extraData = array('border' => 2, 'color' => "red");
    $baseArray = array("Ford", "Chrysler", "Volkswagen", "Honda", "Toyota");
    function walkFunction($item, $index, $data)
    {
        echo "{$item} <- item, then border: {$data['border']}";
        echo " color->{$data['color']}\n";
    }
    array_walk($baseArray, "walkFunction", $extraData);

    // array_reduce
    $addItUp = function($runningTotal, $currentValue)
    {
        echo $runningTotal . " " . $currentValue . "\n";
        $runningTotal += $currentValue * $currentValue;
        return $runningTotal;
    };
    $numbers = array(2, 3, 5, 7);
    $total = array_reduce($numbers, $addItUp);
    echo "Total : {$total}\n";

    // in_array()
    $addresses = array('hoge@mecorp.jp', 'foo@mecorp.jp', 'bar@mecorp.jp', 'spam@spam.com');
    $gotSpam = in_array('spam@spam.com', $addresses);
    $gotMilk = in_array('milk@milk.com', $addresses, true);
    var_dump($gotSpam); // bool(true)
    var_dump($gotMilk); // bool(false)
}

function tf($v)
{
    return $v ? 'T' : 'F';
}

function _sort()
{
    // sort()
    $names = array('Cath', 'Angela', 'Brad', 'Mira');
    sort($names);
    var_dump($names);
    rsort($names);
    var_dump($names);

    $logins = array(
        'njy' => 415,
        'kt'  => 492,
        'rl'  => 652,
        'jht' => 441,
        'jj'  => 441,
        'wt'  => 402,
        'hut' => 309,
    );
    arsort($logins);
    var_dump($logins);
}

function processing_whole()
{
    // 配列の和の計算
    $scores = array(93, 84, 82);
    echo array_sum($scores) . "\n"; // 259

    // 配列のマージ
    $first = array('php', 'ruby', 'python');
    $second = array('go', 'java', 'rust');
    $merged = array_merge($first, $second);
    var_dump($merged);

    $mfirst = array('name' => 'Mike', 'age' => 38, 'from' => 'USA');
    $msecond = array('hobby' => 'football', 'age' => 37);
    $mmerged = array_merge($mfirst, $msecond);
    var_dump($mmerged);

    $a1 = array('PHP', 'Laravel', 'Composer');
    $a2 = array('Smarty', 'Composer');
    $a3 = array('CodeIgniter', 'CakePHP', 'composer');
    $diff = array_diff($a1, $a2, $a3);
    var_dump($diff);

    // フィルタリング
    $isOdd = function ($elem)
    {
        return $elem % 2;
    };
    $numbers = array(9, 23, 24, 27);
    $odds = array_filter($numbers, $isOdd);
    var_dump($odds);
}

function usage_array()
{
    function arrayUnion($a, $b)
    {
        $union = array_merge($a, $b);
        $union = array_unique($union);
        return $union;
    }
    $a1 = array('php', 'go', 'javascript');
    $a2 = array('scala', 'go', 'ruby');
    $union = arrayUnion($a1, $a2);
    var_dump($union);
}

function main()
{
    // _array();
    //_sort();
    // processing_whole();
    usage_array();
}

main();
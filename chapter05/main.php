<?php

function store_array()
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
}

function tf($v)
{
    return $v ? 'T' : 'F';
}

function main()
{
    store_array();
}

main();
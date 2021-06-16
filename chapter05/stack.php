<?php
/**
 * 状態デバッガ
 */
$callTrace = array();

function enterFunction($name)
{
    global $callTrace;
    $callTrace[] = $name;
    echo "{$name}に入ります（スタックの状態は、" . join(' -> ', $callTrace) .  "です）\n";
}

function exitFunction()
{
    echo "終了します\n";
    global $callTrace;
    array_pop($callTrace);
}

function first()
{
    enterFunction("first");
    exitFunction();
}

function second()
{
    enterFunction("second");
    first();
    exitFunction();
}

function third()
{
    enterFunction("third");
    second();
    first();
    exitFunction();
}

first();
third();
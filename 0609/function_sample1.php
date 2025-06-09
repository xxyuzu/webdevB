<?php

function test()
{
    //ローカル変数{}内の変数
    $a = 10;
    return $a;
}
$b = test(2); //関数の戻り値を変数に代入
echo $a;

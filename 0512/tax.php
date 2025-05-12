<?php
//関数の定義
//定義しただけでは実行されない
//価格をパラメータに入力したらパラメータに表示する関数
function tax($price)
{
    echo $price * 1.1;
}

//関数名に()をつけて、中にパラメータの値をいれる
tax(100);


//関数の定義（戻り値、返り値がある関数
function tax2($price)
{
    return $price * 1.1;
}
//関数の実行
tax2(100);
$sample_place = tax2(100);
echo '消費税込み価格' . $sample_place . '円';

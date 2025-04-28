<?php

// []とarray()はどちらも配列の意味
// ０、１、２などのキーは添え字、インデックスとも呼ぶ
$name = [
    0 => "佐藤",
    1 => "鈴木",
    2 => "高橋",
];
var_dump($name);
echo $name[2] . "<br>";

// countはjsでいうlenghtと一緒、要素数をとる
for ($i = 0; $i < count($name); $i++) {
    echo $name[$i] . "<br>";
}

$name2 = array(
    0 => "田中",
    1 => "伊藤",
    2 => "渡辺",
);

var_dump($name2);

$name3 = ['木下', '遠山', '向井'];

var_dump($name3);

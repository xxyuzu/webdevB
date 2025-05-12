<?php
$players = [
    [
        'rank' => 1,
        'name' => '山本',
        'team' => 'ドジャース',
        'era' => 1.80
    ],
    [
        'rank' => 2,
        'name' => 'ルサルド',
        'team' => 'フィリーズ',
        'era' => 2.11
    ],
    [
        'rank' => 3,
        'name' => 'ペラルタ',
        'team' => 'ブリュワーズ',
        'era' => 2.18
    ],
    [
        'rank' => 4,
        'name' => 'キング',
        'team' => 'パドレス',
        'era' => 2.22
    ],
    [
        'rank' => 5,
        'name' => 'キャニング',
        'team' => 'メッツ',
        'era' => 2.357
    ]
];

//foreatch分を使って選手の名前を表示させたい
foreach ($players as $player) {
    echo $player['name'] . "<br>";
}
//ひとつひとつ取り出して行うためのループ分
?>

<?php
//防御率が2.2以下の選手を表示させたい
//$plarersの要素の数だけループする

foreach ($players as $player) {
    if ($player['era'] <= 2.2) {
        echo $player['name'] . "<br>";
    }
}

//foreach文は配列の要素を1つずつ取り出して処理を行うためのループ構文です。

?>

<?php
//サンリオのキャラクターで二次元配列を表示

$characters = [
    [
        'name' => 'ハローキティ',
        'age' => 5,
        'time' => 'サンリオ',
    ],
    [
        'name' => 'マイメロディ',
        'age' => 2,
        'time' => 'サンリオ',
    ],
    [
        'name' => 'シナモロール',
        'age' => 3,
        'time' => 'サンリオ',
    ],
    [
        'name' => 'ポムポムプリン',
        'age' => 4,
        'time' => 'サンリオ',
    ]
];
//名前
foreach ($characters as $character) {
    echo $character['name'] . "<br>";
}
//年齢
foreach ($characters as $character) {
    echo $character['age'] . "<br>";
}

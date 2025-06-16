<?php

$users = [
    ['name' => 'Ken', 'age' => 20, 'score' => 85],
    ['name' => 'Yui', 'age' => 22, 'score' => 78],
    ['name' => 'Taro', 'age' => 19, 'score' => 55]
];

foreach ($users as $user) {
    $name = $user['name'];
    $age = $user['age'];
    $score = $user['score'];

    // 判定のロジック
    if ($score >= 80) {
        $judgment = '優';
    } elseif ($score >= 60) {
        $judgment = '良';
    } else {
        $judgment = '可';
    }

    // 結果を表示
    echo "名前: $name, 年齢: {$age}歳, スコア: {$score}, 判定: {$judgment}" . "<br>";
}

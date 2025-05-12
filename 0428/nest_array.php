<?php
$people[] = ['name' => '佐藤', 'blood' => 'A'];
$people[] = ['name' => '田中', 'blood' => 'B'];
$people[] = ['name' => '加藤', 'blood' => 'C'];

var_dump($people);

echo $people[0]['blood'] . "<br>"; // A
echo $people[2]['name']; // 加藤

foreach ($people as $key => $value) {
    foreach ($value as $key2 => $value2) {
        echo 'キーは' . $key . '、値は' . $value2 . '<br>';
    }
}

foreach ($people as $people_key => $parson) {
    echo '順番は' . $people_key . '<br>';
    foreach ($parson as $parson_key => $value) {
        echo 'キーは' . $parson_key . '、値は' . $value . '<br>';
    }
}

#二次元配列をつくってください
$people[] = ['name' => '佐藤', 'blood' => 'A'];
$people[] = ['name' => '田中', 'blood' => 'B'];
$people[] = ['name' => '加藤', 'blood' => 'C'];
$people[] = ['name' => '鈴木', 'blood' => 'AB'];

// 最後の値を全部取る
foreach ($people as $peason) {
    foreach ($peason as $value) {

        echo $peason['blood'] . "<br>";
    }
}

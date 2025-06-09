<?php
# connect1.php
require_once './functions.php';
try {
    $user = 'phpuser';
    $password = 'php0602_db'; // 任意のパスワード
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];

    $dbh = new PDO('mysql:host=localhost;dbname=sample_db', $user, $password, $opt);
    //変数にsql文を代入
    $sql = 'SELECT title,author FROM books';
    //sql文を実行→結果を変数に代入配列で取得
    $statement = $dbh->query($sql);
    // var_dump($dbh);

    while ($row = $statement->fetch()) {
        //データを一行ずつ取得
        echo "書籍名 : " . str2html($row[0]) . "<br>";
        echo "著者名 : " . str2html($row[1]) . "<br>";
    }
} catch (PDOException $e) {
    //例外をcatchしてエラーメッセージを表示
    echo '接続失敗: ' . $e->getMessage() . "<br>";
    exit;
}

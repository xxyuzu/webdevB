<?php
require_once './inc/functions.php';
include __DIR__ . '/inc/error_check.php';

if (empty($_POST['id'])) {
    echo 'IDを指定してください。';
    exit;
}

if (!preg_match('/\A\d{0,11}\z/u', $_POST['id'])) {
    echo 'IDが正しくありません。';
    exit;
}

try {
    $dbh = db_open();
    $sql = 'UPDATE books SET title = :title, isbn = :isbn, price= :price, publish = :publish, author = :author WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $price = (int) $_POST['price'];
    $id = (int) $_POST['id'];
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    echo 'データが更新されました。';
    echo '<a href="index.php">リストへ戻る</a>';
} catch (PDOException $e) {
    echo 'エラー！: ' . str2html($e->getMessage()) . "<br>";
    exit;
}

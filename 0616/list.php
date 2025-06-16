<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>書籍一覧</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>書籍データベース</h1>
  </header>

  <?php

  require_once './functions.php';


  try {
    $dbh = db_open();
    $sql = 'SELECT * FROM books';
    //SQL分を実行→結果を変数に代入配列で取得
    $statement = $dbh->query($sql);

  ?>

    <table border="1">
      <tr>
        <th>更新</th>
        <th>書籍名</th>
        <th>ISBN</th>
        <th>価格</th>
        <th>出版日</th>
        <th>著者名</th>
      </tr>
      <?php
      while ($row = $statement->fetch()): ?>
        <tr>
          <td> <a href="edit.php?id=<?php echo (int) $row['id']; ?>">更新</a></td>
          <td><?php echo str2html($row['title']); ?></td>
          <td><?php echo str2html($row['isbn']); ?></td>
          <td><?php echo str2html($row['price']); ?></td>
          <td><?php echo str2html($row['publish']); ?></td>
          <td><?php echo str2html($row['author']); ?></td>
        </tr>

      <?php endwhile; ?>

    </table>
  <?php
    // var_dump($dbh);
  } catch (PDOException $e) {
    //例外をcatchしてエラーメッセージを表示
    echo '接続失敗: ' . str2html($e->getMessage()) . "<br>";
    exit;
  };

  ?>
</body>

</html>
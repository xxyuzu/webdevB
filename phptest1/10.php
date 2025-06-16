<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comment.html</title>
</head>

<body>
    <form action="10.php" method="post">
        <label for="name" style="display: block;">名前:
            <input type="text" name="name">
        </label>
        <label for="comment" style="display: block;">コメント:
            <textarea name="comment"></textarea>
        </label>
        <button type="submit">送信</button>
    </form>

    <?php

    $name = $_POST['name'] ?? '';
    $comment = $_POST['comment'] ?? '';

    if ($name && $comment) {
        echo $name . "さんのコメント：" . $comment;
    } else {
        echo "名前とコメントを入力してください。";
    }

    ?>

</body>

</html>
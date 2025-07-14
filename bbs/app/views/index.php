<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="chat-window">

        <div class="window-body">
            <form action="" method="post" enctype="multipart/form-data">
                <p>名前：<input type="text" name="name" /></p>
                <p>コメント：<textarea name="comment" rows="4" cols="40"></textarea></p>
                <p>画像：<input type="file" name="image" accept="image/*" /></p>
                <p><input type="submit" value="投稿" /></p>
            </form>
        </div>
    </div>

    <?php foreach ($posts as $post): ?>
        <div class="chat-window">
            <div class="window-header">
                <?= str2html($post['name']) ?> さん
                <?php
                $date = new DateTime($post['created_at']);
                $formatted = $date->format('Y/m/d H:i');
                ?>
                <span><?= $formatted ?></span>
            </div>
            <div class="window-body">
                <p><?= nl2br(str2html($post['comment'])) ?></p>
                <?php if (!empty($post['image'])): ?>
                    <img src="<?= base_url() . htmlspecialchars($post['image']) ?>" style="max-width: 100%;">
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
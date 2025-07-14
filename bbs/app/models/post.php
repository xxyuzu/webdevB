<?php

// 投稿一覧を取得
function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 投稿を保存（画像パスも保存可能）
function insert_post($pdo, string $name, string $comment, ?string $imagePath = null): void
{
    $stmt = $pdo->prepare("INSERT INTO posts (name, comment, image) VALUES (:name, :comment, :image)");
    $stmt->execute([
        ':name' => $name,
        ':comment' => $comment,
        ':image' => $imagePath
    ]);
}

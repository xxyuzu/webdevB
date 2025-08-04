<?php

// 投稿一覧を取得
function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// 投稿を保存（画像パスも保存可能）
function insert_post($pdo, string $name, string $comment, ?string $imagePath = null, ?string $drawingData = null): void
{
    try {
        $stmt = $pdo->prepare("
            INSERT INTO posts (name, comment, image, drawing_data)
            VALUES (:name, :comment, :image, :drawing_data)
        ");
        $stmt->execute([
            ':name' => $name,
            ':comment' => $comment,
            ':image' => $imagePath,
            ':drawing_data' => $drawingData,
        ]);
    } catch (PDOException $e) {
        // エラーの内容をログに出力
        error_log("DB insert error: " . $e->getMessage());
        throw $e; // or handle gracefully
    }
}

// var_dump($_POST['drawingData']);
// exit;

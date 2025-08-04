<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/post.php';
require_once __DIR__ . '/../../functions.php';

// DB接続
$pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// バリデーション関数
function validate_post(string $name, string $comment): array
{
    $errors = [];
    if ($name === '') {
        $errors[] = '名前を入力してください。';
    }
    if ($comment === '') {
        $errors[] = 'コメントを入力してください。';
    }
    return $errors;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    // アップロード処理
    // $uploadDir = __DIR__ . '/../../public/uploads/';
    $imagePath = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $newName = uniqid() . '.' . $ext;
            $uploadDir = __DIR__ . '/../../public/uploads/';
            $targetPath = $uploadDir . $newName;
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0775, true); // 念のためフォルダがなければ作成
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imagePath = 'uploads/' . $newName;
            }
        }
    }

    // バリデーション
    $errors = validate_post($name, $comment);

    if (empty($errors)) {
        // DB保存（画像対応版）
        $stmt = $pdo->prepare("INSERT INTO posts (name, comment, image) VALUES (?, ?, ?)");
        $stmt->execute([$name, $comment, $imagePath]);

        // リダイレクト
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// 投稿一覧を取得してビューへ
$posts = get_all_posts($pdo);
require __DIR__ . '/../views/layout.php';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
        $newName = uniqid() . '.' . $ext;
        $uploadDir = __DIR__ . '/../../public/uploads/';
        $target = $uploadDir . $newName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $imagePath = 'uploads/' . $newName;
            var_dump('アップロード成功: ' . $imagePath);
            exit;
        } else {
            var_dump('アップロード失敗');
            exit;
        }
    } else {
        var_dump('拡張子エラー');
        exit;
    }
} else {
    // var_dump('ファイル未選択またはエラー');
    exit;
}



require_once 'dbconnect.php'; // DB接続ファイル（ある場合）

$name = $_POST['name'] ?? '';
$comment = $_POST['comment'] ?? '';
$imagePath = $uploadedImagePath ?? null;
$drawingData = $_POST['drawingData'] ?? null;

insert_post($pdo, $name, $comment, $imagePath, $drawingData);



// 入力チェック・バリデーション（省略可）

// DBへ保存
$stmt = $pdo->prepare("INSERT INTO posts (name, comment, drawing_data, created_at) VALUES (?, ?, ?, NOW())");
$stmt->execute([$name, $comment, $drawingData]);

// 完了後、リダイレクト（または表示）
header("Location: bbs.php"); // 投稿完了後の遷移先に合わせて変更
exit;

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>

    <div class="split left-box">
        <div class="chat-window">

            <div class="window-body">
                <form id="myForm" action="" method="post" enctype="multipart/form-data">
                    <p>名前：<input type="text" name="name" /></p>
                    <p>コメント：<textarea name="comment" rows="4" cols="40"></textarea></p>
                    <p>画像：<input type="file" name="image" accept="image/*" /></p>
                    <canvas id="draw" width="300" height="200" style="border:1px solid #000;"></canvas>



                    <input type="hidden" name="drawingData" id="drawingData">

                    <script>
                        const canvas = document.getElementById('draw');
                        const ctx = canvas.getContext('2d');
                        let drawing = false;

                        canvas.addEventListener('mousedown', () => drawing = true);
                        canvas.addEventListener('mouseup', () => drawing = false);
                        canvas.addEventListener('mouseout', () => drawing = false);
                        canvas.addEventListener('mousemove', draw);

                        function draw(e) {
                            if (!drawing) return;
                            const rect = canvas.getBoundingClientRect();
                            ctx.lineWidth = 2;
                            ctx.lineCap = 'round';
                            ctx.strokeStyle = '#000';
                            ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
                            ctx.stroke();
                            ctx.beginPath();
                            ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
                        }

                        document.getElementById('myForm').addEventListener('submit', function(e) {
                            const dataURL = canvas.toDataURL('image/png');
                            document.getElementById('drawingData').value = dataURL;


                            // submitを遅らせて値を確実に入れる
                            setTimeout(() => {
                                e.target.submit(); // 自分自身を送信
                            }, 0);

                            // e.preventDefault(); // 最初の送信を止める
                            console.log(document.querySelector('input[name="drawingData"]').value);
                        });
                    </script>

                    <?php if (!empty($errors)): ?>
                        <ul style="color:red; margin-top:1em;">
                            <?php foreach ($errors as $error): ?>
                                <li><?= str2html($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <p><input type="submit" value="投稿" /></p>
                </form>
            </div>
        </div>
    </div>
    <div class="split right-box">
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

                    <?php if (!empty($post['drawing_data'])): ?>
                        <img src="<?= htmlspecialchars($post['drawing_data']) ?>" alt="手描き画像" style="max-width: 100%;">
                    <?php endif; ?>
                    <button class="like-btn">❤︎</button>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.querySelectorAll('.like-btn').forEach(btn => {
                            btn.addEventListener('click', () => {
                                btn.classList.toggle('liked');
                            });
                        });
                    });
                </script>
            </div>
        <?php endforeach; ?>
    </div>
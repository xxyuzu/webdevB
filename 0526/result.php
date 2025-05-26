<?php
// profile.php
// POSTで送信された値を受け取る
echo "<h1>受け取ったデータ</h1>";
echo $_POST["name"] . "さん、こんにちは！<br>";
echo "あなたの年齢は " . $_POST["age"] . "歳ですね。<br>";

var_dump($_POST);

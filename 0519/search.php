<!-- //このデータを使って、曲名とアーティスト名を表示するPHPを作成しましょう。 -->

<?php
require_once 'search.php';
$fp = fopen('songs.csv', 'r');
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました。';
    exit;
}

$text = $_POST['keyword'];
echo $text;

while ($row = fgetcsv($fp)) {
    if ($text == $row[0]) {
        echo '<ul>';
        echo '<li>' . "曲名："  . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "アーティスト名："  . htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "ジャンル："  . htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "リリース年"  . htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '</ul>';
        echo '<li>' . ""  . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '</ul>';
    } elseif ($text == $row[1]) {
        echo '<ul>';
        echo '<li>' . "曲名："  . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "アーティスト名："  . htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "ジャンル："  . htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '<li>' . "リリース年"  . htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '</ul>';
        echo '<li>' . ""  . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
        echo '</ul>';
    }
}



function str2html(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

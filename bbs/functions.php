<?php
function str2html(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function base_url(): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script = dirname($_SERVER['SCRIPT_NAME']);
    return rtrim($scheme . '://' . $host . $script, '/') . '/';
} {
    // スキーム（http or https）
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

    // ホスト（localhost:8888 など）
    $host = $_SERVER['HTTP_HOST'];

    // ドキュメントルートからの相対パス（例： /webdevB/bbs/public ）
    $scriptName = dirname($_SERVER['SCRIPT_NAME']);

    return rtrim($scheme . '://' . $host . $scriptName, '/') . '/';
}

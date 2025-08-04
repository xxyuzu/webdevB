<?php
$config = [
    'dsn' => 'mysql:host=localhost;port=8889;dbname=bbs_db;charset=utf8mb4',
    'user' => 'root',
    'pass' => 'root'
];

// エラー表示をオンにする
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

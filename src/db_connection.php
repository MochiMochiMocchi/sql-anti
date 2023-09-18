<?php
$host  = 'db';
$db    = 'mydatabase';
$user  = 'myuser';
$pass  = 'mypassword';
$dsn = "mysql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "MySQLとの接続に成功しました。\n";
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
}

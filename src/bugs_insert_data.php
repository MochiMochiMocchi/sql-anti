<?php
// $host  = 'db';
// $db    = 'mydatabase';
// $user  = 'myuser';
// $pass  = 'mypassword';
include 'db_connection.php';
$count = 100000;
$batch_size = 1000; // 一度に挿入する行数
$dsn = "mysql:host=$host;dbname=$db";
try {
    // $pdo = new PDO($dsn, $user, $pass);
    // echo "MySQLとの接続に成功しました。\n";

    // Accountsテーブルにデータを挿入
    $pdo->exec("INSERT INTO Accounts (account_name, first_name, last_name, email, password_hash) VALUES
    ('john', 'John', 'Doe', 'john@example.com', 'hashed_password_here'),
    ('jane', 'Jane', 'Doe', 'jane@example.com', 'hashed_password_here');");

    // BugStatusテーブルにデータを挿入
    $pdo->exec("INSERT INTO BugStatus (status) VALUES ('NEW'), ('IN_PROGRESS'), ('CLOSED');");

    // トランザクション開始
    $pdo->beginTransaction();

    for ($batch = 0; $batch < ceil($count / $batch_size); $batch++) {
        $insert_values = [];

        for ($i = 0; $i < $batch_size; $i++) {
            $timestamp = time() - (mt_rand(0, 30 * 24 * 60 * 60));
            $date_reported = date('Y-m-d', $timestamp);
            $reported_by = mt_rand(1, 2); // Assuming account_id 1 or 2 are valid
            $status = "'NEW'"; // Assuming 'NEW' is a valid status

            $insert_values[] = "('$date_reported', $reported_by, $status)";
        }

        $sql = "INSERT INTO Bugs (date_reported, reported_by, status) VALUES " . implode(',', $insert_values);
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    // トランザクション確定
    $pdo->commit();
    echo "データを挿入しました。\n";
} catch (PDOException $e) {
    // トランザクションをロールバック
    $pdo->rollBack();
    echo '接続失敗: ' . $e->getMessage();
}

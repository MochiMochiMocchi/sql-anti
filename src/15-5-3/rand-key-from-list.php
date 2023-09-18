<?php
$root = dirname(__DIR__);
include $root . '/db_connection.php';
$bug_id_list =
    $pdo->query("SELECT bug_id FROM Bugs")->fetchAll(PDO::FETCH_ASSOC);
$rand = rand(0, count($bug_id_list) - 1);
$rand_bug_id = intval($bug_id_list[$rand]['bug_id']);
$stmt = $pdo->prepare("SELECT * FROM Bugs WHERE bug_id = ?");
$stmt->bindValue(1, $rand_bug_id, PDO::PARAM_INT);
$stmt->execute();
$rand_bug = $stmt->fetch();
if ($rand_bug) {
    echo "Randomly selected bug details:\n";
    print_r($rand_bug);
} else {
    echo "Could not retrieve bug details.\n";
}

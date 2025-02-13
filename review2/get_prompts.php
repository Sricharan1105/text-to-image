<?php
// Include the database connection
include 'database.php';

$sql = "SELECT * FROM user_prompts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);

$prompts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($prompts);
?>

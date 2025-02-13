<?php
// Include the database connection
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prompt = $_POST['prompt'];
    $generated_image_url = $_POST['generated_image_url'];

    $sql = "INSERT INTO user_prompts (prompt, generated_image_url, created_at) VALUES (?, ?, NOW())";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$prompt, $generated_image_url])) {
        echo json_encode(["success" => true, "message" => "Prompt saved successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error saving prompt"]);
    }
}
?>

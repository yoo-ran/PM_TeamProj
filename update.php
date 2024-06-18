<?php
require('db.php');

header('Content-Type: application/json'); // Set the content type to JSON


$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["success" => false, "message" => "Invalid JSON"]);
    exit;
}



// Check if reward and id keys exist
if (isset($data['reward']) && isset($data['id'])) {
    $reward = $data['reward'];
    $id = $data['id'];

    $sql = "UPDATE users SET reward = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Prepare failed: " . $connection->error]);
        exit;
    }

    // Bind parameters and execute
    $stmt->bind_param("ii", $reward, $id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Record updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Execute failed: " . $stmt->error]);
    }

    // Close statement and connectionectionection
    $stmt->close();
    $connection->close();

} else {
    echo json_encode(["success" => false, "message" => "Missing reward or id in the request"]);


}
?>

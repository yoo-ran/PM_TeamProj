<?php
require('db.php');
header('Content-Type: application/json');

try {
    // Decode the JSON input
    $cart = json_decode(file_get_contents('php://input'), true);
    
    // Validate the JSON input
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON input');
    }

    // Check if the cart is empty
    if (empty($cart)) {
        echo json_encode([]);
        exit;
    }

    // Extract item IDs from the cart
    $item_ids = array_column($cart, 'id');
    $item_ids_placeholder = implode(',', array_fill(0, count($item_ids), '?'));

    // Prepare the SQL statement
    $stmt = $connection->prepare("SELECT id, name, img, price, is_merch FROM menu WHERE id IN ($item_ids_placeholder)");
    $stmt->bind_param(str_repeat('i', count($item_ids)), ...$item_ids);
    $stmt->execute();
    $result = $stmt->get_result();

    $items = [];
    while ($row = $result->fetch_assoc()) {
        foreach ($cart as $cart_item) {
            if ($cart_item['id'] == $row['id']) {
                $row['quantity'] = $cart_item['quantity'];
                $row['size'] = $cart_item['size'];
                if ($cart_item['size'] === 'S') {
                    $row['price'] -= 1.5;
                } else if ($cart_item['size'] === 'L') {
                    $row['price'] += 1.5;
                }
                $items[] = $row;
            }
        }
    }

    // Return the items as JSON
    echo json_encode($items);
} catch (Exception $e) {
    // Return an error message as JSON
    echo json_encode(['error' => $e->getMessage()]);
}
?>

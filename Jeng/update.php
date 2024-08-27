<?php
include 'db.php';

header('Content-Type: application/json'); // Set content type to JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get JSON data from the request
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Check if JSON decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON']);
        exit;
    }

    // Extract values from JSON
    $name = $input['name'] ?? '';
    $breed = $input['breed'] ?? '';
    $appearance = $input['appearance'] ?? '';
    $personality = $input['personality'] ?? '';

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO cat_tbl (name, breed, appearance, personality) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $breed, $appearance, $personality);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(['success' => true, 'message' => 'Record inserted successfully']);
    } else {
        // Return error response
        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>

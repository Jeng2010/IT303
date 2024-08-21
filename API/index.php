<?php

header('Content-Type: application/json');


echo json_encode(["Response request method" => $_SERVER["REQUEST_METHOD"]]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    
    if (json_last_error() === JSON_ERROR_NONE) {
        
        echo json_encode(["Response data" => $data]);
    } else {
        
        echo json_encode(["error" => "Failed to decode JSON", "message" => json_last_error_msg()]);
    }
}

?>

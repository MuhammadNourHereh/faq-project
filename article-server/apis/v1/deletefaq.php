<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("Faq");

// Get the FAQ ID from request
$id = $_POST["id"] ?? null;

// Validate the ID
if (!$id || !is_numeric($id)) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid or missing ID"]);
    exit();
}

// Attempt to delete the FAQ
$success = Quest::deleteFaq((int)$id);

if (!$success) {
    http_response_code(404);
    echo json_encode(["message" => "FAQ not found or deletion failed"]);
    exit();
}

http_response_code(200);
echo json_encode(["message" => "FAQ deleted successfully"]);
exit();

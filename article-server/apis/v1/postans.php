<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("Faq");

// Get parameters
$id = $_POST["id"] ?? null;
$ans = $_POST["ans"] ?? null;

// Check for missing parameters
if (empty($id) || empty($ans)) {
    http_response_code(401);
    echo json_encode([
        "message" => "ID and answer are required"
    ]);
    exit();
}

// Update the answer in the database
$response = Faq::postAnswer((int) $id, $ans);

if (!$response) {
    http_response_code(400);
    echo json_encode([
        "message" => "Failed to update the answer"
    ]);
    exit();
}

http_response_code(200);
echo json_encode($response);
exit();
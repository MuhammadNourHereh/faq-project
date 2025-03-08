<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("FaqSkeleton");
require_once getPath("Faq");

// Get parameters
$quest = $_POST["quest"];
$ans = $_POST["ans"];

// Check for missing parameters
if (empty($quest) || empty($ans)) {
    http_response_code(401);
    echo json_encode([
        "message" => "All parameters are required"
    ]);
    exit();
}

// Create a FaqSkeleton object
$faqSkeleton = new FaqSkeleton(0, $quest, $ans); // ID is 0 since it will be auto-generated

$response = Faq::addFaq($faqSkeleton);

if (!$response) {
    http_response_code(400);
    echo json_encode([
        "message" => "Failed to create FAQ"
    ]);
    exit();
}

http_response_code(200);
echo json_encode($response);
exit();

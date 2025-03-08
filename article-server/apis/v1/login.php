<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("UserSkeleton");
require_once getPath("User");

// get parms
$email = $_POST["email"];
$password = $_POST["password"];

// check for parms
if (empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode([
        "message" => "all parms are required"
    ]);
    exit();
}

$respose = User::getUser($email, $password);

if (!$respose) {
    http_response_code(400);
    echo json_encode([
        "message" => "user not found"
    ]);
    exit();
}

http_response_code(200);
echo json_encode($respose);
exit();
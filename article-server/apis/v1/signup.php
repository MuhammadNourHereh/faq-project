<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("UserSkeleton");
require_once getPath("User");

// get parms
$email = $_POST["email"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

// check for parms
if (empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
    http_response_code(401);
    echo json_encode([
        "message" => "all parms are required"
    ]);
    exit();
}

// create a userSkelton
$userSkeleton = new UserSkeleton($email, $password, $firstname, $lastname);

$respose = User::addUser($userSkeleton);

if (!$respose) {
    http_response_code(400);
    echo json_encode([
        "message" => "failed to create user"
    ]);
    exit();
}

http_response_code(200);
echo json_encode($respose);
exit();
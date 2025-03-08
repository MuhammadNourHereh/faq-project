<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("userSkelton");

// get parms
$email = $_POST["email"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

// check for parms
if (empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
    http_response_code(400);
    echo json_encode([
        "message" => "all parms are required"
    ]);
    exit();
}

// create a userSkelton
$userSkeleton = new UserSkeleton($email, $password, $firstname, $lastname);

// TODO add user
<?php

function getPath($file)
{
    // considering /faq-server as the base dirctory
    $base = __DIR__ . "/..";
    $paths = [
        "conn" => $base . "/connection/conn.php",
        "cors-headers" => $base . "/utils/cors-headers.php",
        "signup" => $base . "/connection/user/v1/apis/signup.php",
        "login" => $base . "/connection/user/v1/apis/login.php",
        "userSkeleton" => $base . "/models/UserSkelteton.php"
    ];

    if (!isset($paths[$file])) {
        die("Error: Path '$file' not found.");
    }

    return $paths[$file];
}

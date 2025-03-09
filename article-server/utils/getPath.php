<?php

function getPath($file)
{
    // considering /faq-server as the base dirctory
    $base = __DIR__ . "/..";
    $paths = [
        "conn" => $base . "/connection/conn.php",
        "cors-headers" => $base . "/utils/cors-headers.php",
        "UserSkeleton" => $base . "/models/UserSkelteton.php",
        "User" => $base . "/models/User.php",
        "FaqSkeleton" => $base . "/models/FaqSkeleton.php",
        "Faq" => $base . "/models/Faq.php",
    ];

    if (!isset($paths[$file])) {
        die("Error: Path '$file' not found.");
    }

    return $paths[$file];
}

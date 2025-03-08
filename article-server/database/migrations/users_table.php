<?php
require_once "../../utils/paths.php";
require_once path("conn");

// creates the table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    email varchar(255) PRIMARY KEY,
    first_name VARCHAR(225) NOT NULL,
    last_name VARCHAR(225) NOT NULL,
    password_hash VARCHAR(225) NOT NULL
)");
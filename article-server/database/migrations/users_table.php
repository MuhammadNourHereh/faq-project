<?php
require_once getPath("conn");

// creates the table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    email varchar(255) PRIMARY KEY,
    first_name VARCHAR(225) NOT NULL,
    last_name VARCHAR(225) NOT NULL,
    password_hash VARCHAR(225) NOT NULL
)");

echo "users table was created successfully\n";
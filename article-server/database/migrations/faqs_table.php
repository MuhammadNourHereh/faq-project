<?php
require_once getPath("conn");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quest VARCHAR(225) NOT NULL,
    ans VARCHAR(225) NOT NULL
)");
echo "faqs table was created successfully\n";
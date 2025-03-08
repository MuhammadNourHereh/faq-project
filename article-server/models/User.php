<?php
require_once getPath("conn");


class User
{
    /**
     * Add a new user to the database
     * 
     * @param UserSkeleton $user User object containing email, password, first_name, last_name
     * @return UserSkeleton|false Returns updated user object on success, false on failure
     */
    public function addUser(UserSkeleton $user): UserSkeleton|false
    {
        global $conn;

        // Hash password for security
        $hashed_password = password_hash($user->password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $query = "INSERT INTO users (email, password, first_name, last_name) 
              VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ssss", $user->email, $hashed_password, $user->first_name, $user->last_name);

        if (!$stmt->execute()) {
            $stmt->close();
            return false;
        }

        $stmt->close();

        return $user;
    }

    /**
     * Get user from database by email
     *
     * @param string $email User's email to search for
     * @return UserSkeleton|null Returns user object or null if not found
     */
    public function getUser(string $email): ?UserSkeleton
    {
        global $conn;

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $stmt->close();

            // Create and return a new UserSkeleton object
            return new UserSkeleton(
                $row['email'],
                $row['password'],
                $row['first_name'],
                $row['last_name']
            );
        }

        $stmt->close();
        return null;
    }
}
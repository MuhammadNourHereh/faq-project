<?php
require_once getPath("conn");
require_once getPath("UserSkeleton");

class User
{
    /**
     * Add a new user to the database
     * 
     * @param UserSkeleton $user User object containing email, password, first_name, last_name
     * @return UserSkeleton|false Returns updated user object on success, false on failure
     */
    public static function addUser(UserSkeleton $user): UserSkeleton|false
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
     * Get user from database by email and verify password
     *
     * @param string $email User's email to search for
     * @param string $password Password to verify
     * @return UserSkeleton|null Returns user object if found and password matches, null otherwise
     */
    public static function getUser(string $email, string $password): ?UserSkeleton
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

            // Verify the password
            if (password_verify($password, $row['password'])) {
                return new UserSkeleton(
                    $row['email'],
                    $row['password'],
                    $row['first_name'],
                    $row['last_name']
                );
            }
        }

        return null;
    }
}
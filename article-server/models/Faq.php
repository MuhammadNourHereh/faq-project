<?php
require_once getPath("conn");
require_once getPath("FaqSkeleton");

class Faq
{
    public static function getFaqById(int $id)
    {
        global $conn;

        $query = "SELECT * FROM faqs WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($row = $result->fetch_assoc()) {
            return new FaqSkeleton($row['id'], $row['quest'], $row['ans']);
        }

        return null;
    }

    /**
     * Add a new FAQ to the database
     * 
     * @param FaqSkeleton $faq FAQ object containing question and answer
     * @return FaqSkeleton|false Returns the saved FaqSkeleton object with ID on success, false on failure
     */
    public static function addFaq(FaqSkeleton $faq)
    {
        global $conn;

        $query = "INSERT INTO faqs (quest, ans) VALUES (?, ?)";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ss", $faq->quest, $faq->ans);

        if (!$stmt->execute()) {
            $stmt->close();
            return false;
        }

        // Assign the generated ID to the object
        $faq->id = $stmt->insert_id;
        $stmt->close();

        return $faq;
    }

    /**
     * Get all FAQs from the database
     * 
     * @return array Returns an array of FaqSkeleton objects
     */
    public static function getAllFaqs()
    {
        global $conn;

        $query = "SELECT * FROM faqs";
        $result = $conn->query($query);

        if (!$result) {
            return [];
        }

        $faqs = [];
        while ($row = $result->fetch_assoc()) {
            $faqs[] = new FaqSkeleton($row['id'], $row['quest'], $row['ans']);
        }

        return $faqs;
    }

    /**
     * Delete an FAQ by ID
     * 
     * @param int $id The ID of the FAQ to delete
     * @return bool Returns true on success, false on failure
     */
    public static function deleteFaq(int $id)
    {
        global $conn;

        $query = "DELETE FROM faqs WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }
    /**
     * Update the answer of an existing FAQ
     * 
     * @param int $id The ID of the FAQ to update
     * @param string $answer The new answer to be set
     * @return bool Returns true on success, false on failure
     */
    public static function postAnswer(int $id, string $answer): bool|FaqSkeleton|null
    {
        global $conn;

        $query = "UPDATE faqs SET ans = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("si", $answer, $id);
        $success = $stmt->execute();
        $stmt->close();

        if ($success)
            return self::getFaqById($id);

        return $success;
    }
}


<?php
require_once getPath("conn");
require_once getPath("FaqSkeleton");

class Quest
{
    /**
     * Add a new FAQ to the database
     * 
     * @param FaqSkeleton $faq FAQ object containing question and answer
     * @return FaqSkeleton|false Returns the saved FaqSkeleton object with ID on success, false on failure
     */
    public static function addFaq(FaqSkeleton $faq): FaqSkeleton|false
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
    public static function getAllFaqs(): array
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
    public static function deleteFaq(int $id): bool
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
}


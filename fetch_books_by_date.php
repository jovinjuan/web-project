<?php
require "config.php";

header('Content-Type: application/json');

$date = isset($_POST['date']) ? $_POST['date'] : '';

if (empty($date)) {
    echo json_encode([]);
    exit;
}

try {
    $query = "
        SELECT b.book_id, b.title, b.author, b.genre, b.cover_image, b.description,
               r.reading_progress, r.current_pages, b.pages
        FROM reading_activity r
        JOIN book b ON r.book_id = b.book_id
        JOIN (
            SELECT MAX(activity_id) AS latest_activity_id
            FROM reading_activity
            WHERE DATE(reading_date) = :date
            GROUP BY book_id
        ) latest ON latest.latest_activity_id = r.activity_id
        ORDER BY r.reading_date DESC
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute(['date' => $date]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert cover_image to base64
    foreach ($results as &$row) {
        if (!empty($row['cover_image'])) {
            $row['cover_image'] = base64_encode($row['cover_image']);
        }
    }

    echo json_encode($results);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>

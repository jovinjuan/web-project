<?php
require "config.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Tidak ada user_id";
    var_dump($_SESSION['user_id']);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: home.php");
    exit;
}

// Get and sanitize form data
$userId = (int) $_SESSION['user_id'];
$bookId = (int) filter_var($_POST['book_id'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
$progress = filter_var($_POST['progress'] ?? '', FILTER_SANITIZE_STRING);
$currentPages = (int) filter_var($_POST['current_page'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
$timer = (int) filter_var($_POST['timer'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
$readingDate = date('Y-m-d H:i:s');

// Validate inputs
if ($bookId <= 0 || $currentPages < 0 || $timer < 0 || empty($progress)) {
    $_SESSION['error'] = "Invalid input data. Please try again.";
    header("Location: home.php");
    exit;
}

// Insert into database
try {
    // Prepare the query
    $query = $conn->prepare("INSERT INTO reading_activity (user_id, book_id, current_pages, reading_duration, reading_date, reading_progress) VALUES (:user_id, :book_id, :current_pages, :reading_duration, :reading_date, :reading_progress)");

    // Bind parameters
    $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $query->bindParam(':book_id', $bookId, PDO::PARAM_INT);
    $query->bindParam(':current_pages', $currentPages, PDO::PARAM_INT);
    $query->bindParam(':reading_duration', $timer, PDO::PARAM_STR);
    $query->bindParam(':reading_date', $readingDate, PDO::PARAM_STR);
    $query->bindParam(':reading_progress', $progress, PDO::PARAM_STR);

    // Execute the query
    $result = $query->execute();

    if ($result) {
        $_SESSION['success'] = "Bookmark saved successfully!";
    } else {
        $_SESSION['error'] = "Failed to save bookmark. Please try again.";
    }

    $query->closeCursor();
} catch (Exception $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
}

$conn = null;
header("Location: home.php");
exit;
?>

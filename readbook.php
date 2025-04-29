<?php
require "config.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
$current_pages = isset($_POST['current_page']) ? $_POST['current_page'] : null;
$reading_duration = isset($_POST['timer']) ? $_POST['timer'] : null;
$reading_progress = isset($_POST['progress']) ? $_POST['progress'] : null;
$reading_date = date('Y-m-d');

if ($user_id && $book_id && $current_pages && $reading_duration && $reading_progress) {
    // Konversi reading_duration ke detik
    $duration_parts = explode(" ", $reading_duration);
    $minutes = isset($duration_parts[0]) ? intval($duration_parts[0]) : 0;
    $seconds = isset($duration_parts[2]) ? intval($duration_parts[2]) : 0;
    $reading_duration_seconds = ($minutes * 60) + $seconds;

    // Update status buku menjadi currently_reading
    $update_status_sql = "UPDATE book SET status = 'currently_reading' WHERE book_id = :book_id";
    $update_status_query = $conn->prepare($update_status_sql);
    $update_status_query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    $update_status_query->execute();

    // Simpan atau perbarui data aktivitas membaca
    $sql = "INSERT INTO reading_activity (user_id, book_id, current_pages, reading_duration, reading_date, reading_progress) 
            VALUES (:user_id, :book_id, :current_pages, :reading_duration, :reading_date, :reading_progress) 
            ON DUPLICATE KEY UPDATE 
            current_pages = :current_pages, 
            reading_duration = :reading_duration, 
            reading_date = :reading_date, 
            reading_progress = :reading_progress";

    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    $query->bindParam(':current_pages', $current_pages, PDO::PARAM_INT);
    $query->bindParam(':reading_duration', $reading_duration_seconds, PDO::PARAM_INT);
    $query->bindParam(':reading_date', $reading_date, PDO::PARAM_STR);
    $query->bindParam(':reading_progress', $reading_progress, PDO::PARAM_STR);

    $result = $query->execute();

    if ($result) {
        header("Location: home.php?message=success");
        exit;
    } else {
        echo "Error Saving Data";
    }
} else {
    echo "Missing required data";
}
?>
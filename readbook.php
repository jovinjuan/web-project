<?php
require "config.php";

// Pastikan user sudah login
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
$current_page = isset($_POST['current_page']) ? $_POST['current_page'] : null;
$reading_duration = isset($_POST['timer']) ? $_POST['timer'] : null;
$reading_progress = isset($_POST['progress']) ? $_POST['progress'] : null;
$reading_date = date('Y-m-d');

// Validasi input
if (!$user_id || !$book_id || !$current_page || !$reading_duration || !$reading_progress) {
    die("Missing required data.");
}

try {
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

    // Cek apakah entri sudah ada di reading_activity untuk user_id dan book_id ini
    $check_sql = "SELECT COUNT(*) FROM reading_activity WHERE user_id = :user_id AND book_id = :book_id";
    $check_query = $conn->prepare($check_sql);
    $check_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $check_query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    $check_query->execute();
    $entry_exists = $check_query->fetchColumn() > 0;

    // Cek apakah progress buku ud completed 
    $progress_value = floatval(str_replace('%', '', $reading_progress)); // Ubah "100%" menjadi 100
    $new_status = ($progress_value >= 100) ? 'completed' : 'currently_reading';

    $update_sql = "UPDATE book SET status = :new_status WHERE book_id = :book_id";
    $query = $conn->prepare($update_sql);
    $query->bindParam(':new_status', $new_status, PDO::PARAM_STR);
    $query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    $query->execute();

    if ($entry_exists) {
        // Jika entri sudah ada, lakukan UPDATE
        $update_sql = "UPDATE reading_activity 
                       SET current_pages = :current_page, 
                           reading_duration = :reading_duration, 
                           reading_date = :reading_date, 
                           reading_progress = :reading_progress 
                       WHERE user_id = :user_id AND book_id = :book_id";
        $update_query = $conn->prepare($update_sql);
        $update_query->bindParam(':current_page', $current_page, PDO::PARAM_INT);
        $update_query->bindParam(':reading_duration', $reading_duration_seconds, PDO::PARAM_INT);
        $update_query->bindParam(':reading_date', $reading_date, PDO::PARAM_STR);
        $update_query->bindParam(':reading_progress', $reading_progress, PDO::PARAM_STR);
        $update_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $update_query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $result = $update_query->execute();
    } else {
        // Jika entri belum ada, lakukan INSERT
        $insert_sql = "INSERT INTO reading_activity (user_id, book_id, current_pages, reading_duration, reading_date, reading_progress) 
                       VALUES (:user_id, :book_id, :current_page, :reading_duration, :reading_date, :reading_progress)";
        $insert_query = $conn->prepare($insert_sql);
        $insert_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $insert_query->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $insert_query->bindParam(':current_page', $current_page, PDO::PARAM_INT);
        $insert_query->bindParam(':reading_duration', $reading_duration_seconds, PDO::PARAM_INT);
        $insert_query->bindParam(':reading_date', $reading_date, PDO::PARAM_STR);
        $insert_query->bindParam(':reading_progress', $reading_progress, PDO::PARAM_STR);
        $result = $insert_query->execute();
    }

    if ($result) {
        // Redirect ke myprogress.php
        header("Location: home.php?message=success");
        exit;
    } else {
        throw new Exception("Failed to save reading activity.");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
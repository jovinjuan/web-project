<?php
require "config.php";
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil dan validasi data dari form
    $target_type = isset($_POST['target_type']) ? $_POST['target_type'] : '';
    $book_target = isset($_POST['book_target']) ? (int)$_POST['book_target'] : 0;
    $streak_time = isset($_POST['streak_time']) ? (int)$_POST['streak_time'] : 0;

    // Validasi target_type
    if ($target_type !== 'monthly' && $target_type !== 'streak') {
        echo "Jenis target tidak valid.";
        exit;
    }

    // Validasi input
    if ($target_type === 'monthly' && $book_target <= 0) {
        echo "Jumlah buku harus lebih dari 0.";
        exit;
    }
    if ($target_type === 'streak' && $streak_time <= 0) {
        echo "Waktu membaca harus lebih dari 0 menit.";
        exit;
    }

    // Tentukan periode target (hanya untuk target bulanan)
    $target_start_date = ($target_type === 'monthly') ? date('Y-m-01') : null; // Awal bulan
    $target_end_date = ($target_type === 'monthly') ? date('Y-m-t') : null;    // Akhir bulan


    try {
        // Cek apakah user sudah memiliki entri di reading_targets
        $sql = "SELECT user_id FROM reading_targets WHERE user_id = :user_id AND target_type = :target_type";
        $query = $conn->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->bindParam(':target_type', $target_type, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // Jika sudah ada, update kolom yang sesuai
            if ($target_type === 'monthly') {
                $sql = "UPDATE reading_targets SET book_target = :book_target, target_start_date = :target_start_date, target_end_date = :target_end_date  WHERE user_id = :user_id AND target_type = :target_type";
                $query = $conn->prepare($sql);
                $query->bindParam(':book_target', $book_target, PDO::PARAM_INT);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $query->bindParam(':target_type', $target_type, PDO::PARAM_STR);
                $query->bindParam(':target_start_date', $target_start_date, PDO::PARAM_STR);
                $query->bindParam(':target_end_date', $target_end_date, PDO::PARAM_STR);
            } else {
                $sql = "UPDATE reading_targets SET streak_time = :streak_time WHERE user_id = :user_id AND target_type = :target_type";
                $query = $conn->prepare($sql);
                $query->bindParam(':streak_time', $streak_time, PDO::PARAM_INT);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $query->bindParam(':target_type', $target_type, PDO::PARAM_STR);
            }
        } 
        else {
            $monthly_target = $target_type === 'monthly' ? $book_target : 0;
            $streak_target = $target_type === 'streak' ? $streak_time : 0;
            // Jika belum ada, insert data baru
            $sql = "INSERT INTO reading_targets (user_id, target_type, book_target, streak_time,target_start_date,target_end_date) VALUES (:user_id, :target_type, :book_target, :streak_time, :target_start_date, :target_end_date)";
            $query = $conn->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindParam(':book_target', $monthly_target, PDO::PARAM_INT);
            $query->bindParam(':streak_time', $streak_target, PDO::PARAM_INT);
            $query->bindParam(':target_type', $target_type, PDO::PARAM_STR);
            $query->bindParam(':target_start_date', $target_start_date, PDO::PARAM_STR);
            $query->bindParam(':target_end_date', $target_end_date, PDO::PARAM_STR);
        }

        // Eksekusi query
        $result = $query->execute();

        if ($result) {
            header("Location: myprogress.php?message=success");
            exit;
        } else {
            echo "Gagal menyimpan target.";
            exit;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    // Jika bukan POST, redirect
    header("Location: myprogress.php");
    exit;
}
?>
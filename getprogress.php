<?php
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    echo "<p style='color: red;'>User not logged in.</p>";
    exit;
}

try {
    // --- Monthly Book Explorer ---
    // Ambil target bulanan pengguna
    $current_date = date('Y-m-d');
    $target_type_monthly = 'monthly';
    $sql = "SELECT book_target, target_start_date, target_end_date 
            FROM reading_targets 
            WHERE user_id = :user_id 
            AND target_type = :target_type 
            AND :current_date BETWEEN target_start_date AND target_end_date";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':target_type', $target_type_monthly, PDO::PARAM_STR);
    $query->bindParam(':current_date', $current_date, PDO::PARAM_STR);
    $query->execute();
    $target = $query->fetch(PDO::FETCH_ASSOC);

    $monthly_progress = 0;
    $monthly_completed_books = 0;
    $monthly_target_value = 0;

    if ($target) {
        $monthly_target_value = $target['book_target'];
        $start_date = $target['target_start_date'];
        $end_date = $target['target_end_date'];

        // Hitung jumlah buku yang selesai dalam periode ini
        $sql = "SELECT COUNT(DISTINCT book_id) as completed_books 
                FROM reading_activity 
                WHERE user_id = :user_id 
                AND reading_progress = '100' 
                AND reading_date BETWEEN :start_date AND :end_date";
        $query = $conn->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $monthly_completed_books = $result['completed_books'];
        $monthly_progress = ($monthly_target_value > 0) ? ($monthly_completed_books / $monthly_target_value) * 100 : 0;
        $monthly_progress = min($monthly_progress, 100); // Maksimal 100%
    }

    // --- 7-Day Reading Streak ---
    $target_type_streak = 'streak';
    $sql = "SELECT streak_time FROM reading_targets 
            WHERE user_id = :user_id AND target_type = :target_type";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':target_type', $target_type_streak, PDO::PARAM_STR);
    $query->execute();
    $target = $query->fetch(PDO::FETCH_ASSOC);

    $streak_progress = 0;
    $streak_days = 0;
    $streak_target_time = 0;

    if ($target) {
        $streak_target_time = $target['streak_time'] * 60; // Konversi menit ke detik
        $end_date = new DateTime(); // Hari ini
        $start_date = (clone $end_date)->modify('-6 days'); // 7 hari terakhir

        // Cek setiap hari dalam 7 hari terakhir
        $days_met = 0;
        for ($i = 0; $i < 7; $i++) {
            $current_date = (clone $start_date)->modify("+$i days")->format('Y-m-d');
            $sql = "SELECT SUM(reading_duration) as total_duration 
                    FROM reading_activity 
                    WHERE user_id = :user_id 
                    AND reading_date = :current_date";
            $query = $conn->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindParam(':current_date', $current_date, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            $total_duration = $result['total_duration'] ?? 0;
            if ($total_duration >= $streak_target_time) {
                $days_met++;
            }
        }

        $streak_days = $days_met;
        $streak_progress = ($streak_days / 7) * 100; // Persentase dari 7 hari
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>
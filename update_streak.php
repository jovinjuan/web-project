<?php
session_start();
include 'config.php'; // koneksi database

// Cek apakah user sudah login
if (cekLogin()) {
    $username = $_SESSION['username'];

    // Ambil streak yang dikirim dari JavaScript
    if (isset($_POST['streak'])) {
        $new_streak = intval($_POST['streak']); // pastikan angka

        // Update streak di database
        $update = $conn->prepare("UPDATE user SET streak = ? WHERE username = ?");
        $update->execute([$new_streak, $username]);

        echo json_encode(['status' => 'success', 'message' => "Streak berhasil diupdate jadi " . $new_streak]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Streak tidak dikirim']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User belum login']);
}
?>

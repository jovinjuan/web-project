<?php
require 'config.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($conn)) {
    $query = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();

    // Check if user exists
    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        

        // Compare the hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: home.php");
            exit;
        } else {
            header("Location: login.php?error=wrong_password");
            exit;
        }
    } else {
        header("Location: login.php?error=user_not_found");
        exit;
    }
} else {
    echo "Database connection failed.";
    exit;
}

?>
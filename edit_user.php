<?php
require 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cur_username = $_SESSION['username']; 
    $username = $_POST['username'];        
    $email = $_POST['email'];              

    // Check if the new username is already taken by another user
    $check = $conn->prepare("SELECT * FROM user WHERE username = :username AND username != :cur_username");
    $check->execute([
        ':username' => $username,
        ':cur_username' => $cur_username 
    ]);

    // If the new username is already taken
    if ($check->rowCount() > 0) {
        header("Location: settings.php?error=Username already taken");
        exit;
    }

    // Update the user's data in the database
    $query = $conn->prepare("UPDATE user SET username = :username, email = :email WHERE username = :cur_username");
    $query->bindParam(':username', $username); 
    $query->bindParam(':email', $email);      
    $query->bindParam(':cur_username', $cur_username); 

    if ($query->execute()) {
        $_SESSION['username'] = $username; 
        header("Location: settings.php?success=Profile updated");
        exit;
    } else {
        header("Location: settings.php?error=Failed to update profile");
        exit;
    }
}
?>

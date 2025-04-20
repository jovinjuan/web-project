<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $check = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $check->bindParam(':username', $username);
    $check->execute();

    if ($check->rowCount() > 0) {

        header("Location: signup.php?error=username_taken");
        exit;
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $query = $conn->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':email', $email);

        if ($query->execute()) {
            header("Location: home.php");
            exit;
        } else {
            header("Location: signup.php?error=registration_failed");
            exit;
        }
    }
}
?>


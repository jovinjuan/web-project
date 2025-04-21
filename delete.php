<?php
require 'config.php';

var_dump($_SESSION['username']);

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = $conn->prepare("DELETE FROM user WHERE username = :username");
    $query->bindParam(':username', $username);

    if ($query->execute()) {
        header("Location: index.php");
        exit();  
    } else {
        echo "Account can't be deleted.";
    }
} else {
    echo "Account not found.";
}
?>

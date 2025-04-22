<?php
require "config.php";

if(cekLogin()){
    // Check if username exists in session
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Get email based on username
        $query = $conn->prepare("SELECT email FROM user WHERE username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $email = $result['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="home.php" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Back</a>
        <h2 class="mt-3 mb-4">Settings</h2>

        <!-- Profile Section -->
        <div class="card mb-4">
            <div class="card-body d-flex align-items-center">
                <div>
                    <h5 class="card-title"><?php echo $username; ?></h5>
                    <p class="card-text text-muted"><?php echo $email; ?></p>
                </div>
            </div>
        </div>

        <!-- General Settings Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="mb-3 text-primary">General Settings</h4>

                <!-- Account Section -->
                <h5>Account</h5>
                <form action="edit_user.php" method="POST">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <label name="username" for="nameInput">Username</label>
                            <input type="text" id="nameInput" class="form-control w-50" name="username" value="<?php echo $username; ?>" />
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <label name="email" for="emailInput">Email</label>
                            <input type="email" id="emailInput" class="form-control w-50" name="email" value="<?php echo $email; ?>" />
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="py-2">Delete Account</span>
                            <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete_user">Delete</a>
                            <div class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="delete_user_label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-4" id="delete_user_label">Delete Account?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting your account will remove all your personal information. This action is permanent and cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="delete.php" class="btn btn-danger"> Delete </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="py-2">Logout</span>
                            <a href="logout.php" class="text-danger">Logout</a>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <br />
            </div>
        </div>
    </div>
</body>
</html>

<?php 
} else {
    header('location:index.php');
}
?>

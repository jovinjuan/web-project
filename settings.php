<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    
    <link rel="stylesheet" href="css/style.css" />

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
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
            <h5 class="card-title">John Doe</h5>
            <p class="card-text text-muted">johndoe@gmail.com</p>
          </div>
        </div>
      </div>

      <!-- General Settings Section -->
      <div class="card mb-4">
        <div class="card-body">
          <h4 class="mb-3 text-primary">General Settings</h4>

          <!-- Account Section -->
          <h5>Account</h5>
          <form>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="nameInput">Username</label>
                <input type="text" id="nameInput" class="form-control w-50" placeholder="John Doe" />
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="emailInput">Email</label>
                <input type="email" id="emailInput" class="form-control w-50" placeholder="johndoe@gmail.com" />
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="py-2">Delete Account</span>
                <a href="login.php" class="text-danger">Delete</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="py-2">Logout</span>
                <a href="login.php" class="text-danger">Logout</a>
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

<?php
require "config.php";

$error = isset($_GET['error']) ? $_GET['error'] : '';

$errorMessages = [
'username_taken' =>'This username is already taken. Please choose another one.',
'registration_failed' => 'An error occurred during registration. Please try
again.', 
]; 
if ($error && isset($errorMessages[$error])) { 
  $errorMessage = $errorMessages[$error]; 
} 
else { 
  $errorMessage = ''; 
} ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-up</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
      }
      .Signup-box {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
        position: relative;
      }
      .Signup-box h2 {
        margin-bottom: 20px;
      }
      .Signup-box input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .Signup-box button {
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      .Signup-box button:hover {
        background: #0056b3;
      }
       .bg-iframe {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        border: none;
        z-index: -2; 
        pointer-events: none; 
        
      }

      .backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.4); 
        z-index: -1;
      }
      .close-btn {
        position: absolute;
        top: 5px;
        right: 25px;
        font-size: 45px;
        background: transparent;
        border: none;
        cursor: pointer;
      }
      .close-btn:hover {
        color: #333;
      }
      .error-message {
        background-color: #ffdddd;
        color: #d8000c;
        padding-top: 10px;
        border: 1px solid #d8000c;
        border-radius: 4px;
        margin-bottom: 20px;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <iframe class="bg-iframe" src="Index.php" ></iframe>
    <div class="backdrop"></div>
    <div class="Signup-box">
      <h2>Sign-Up</h2>
      <p class="close-btn" onclick="closeSignupModal()">×</p>
           <?php 
    if ($errorMessage): 
    ?>
    <div class="error-message">
      <p>
        <?php echo $errorMessage; ?>
      </p>
    </div>
    <?php 
  endif; 
  ?>
      <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email Address" required />
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        <button type="submit">Sign Up</button>
        <div class="login-link">
          <p>or <br />Already have account <a href="login.php">Login</a></p>
        </div>
      </form>
    </div>

    <script>
      function redirectToHome(event) {
        event.preventDefault();
        window.location.href = "Home.php";
      }
      function closeSignupModal() {
        window.location.href = "index.php";  
      }
    </script>
  </body>
</html>

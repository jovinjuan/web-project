<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .hero-section, .card-section, .content-section, .grid-section, .footer {
            padding: 60px 0;
        }
        .hero-section h2{
            font-family: "Poppins", sans-serif;
        }
        .hero-section .btn:hover{
            background :rgb(67, 37, 235);
            transition : 0.3s ease-in-out;
        }
        .navbar, .footer {
            background-color: #6c757d;
        }
        .card, .grid-item, .footer-item {
            background-color: #e9ecef;
            border-radius: 8px;
        }
        .footer-item {
            padding: 10px;
        }
        .nav-link:hover{
            border-bottom : 1px solid blue;
            transition: 0.3s ease-in-out;
            cursor : pointer;
        }
        html{
            padding: 0;
            margin : 0;
            box-sizing : border-box;
        }
    </style>
</head>
<body>
   <!-- Nav Bar -->
   <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container-fluid px-3">
        <img src="treadyicon.png" alt="web icon" class = " ms-3 me-3" style = "width : 50px;  height : 63px;">
        <a class="navbar-brand fw-medium text-primary me-5"href="#">Tready</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Area Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav nav-pills mx-auto px-5">
            <li class="nav-item mx-2 ps-5 ms-5">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">My Progress</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Achievement</a>
            </li>
            <li class="nav-item mx-2 ">
              <a class="nav-link" href="#">History</a>
            </li>
          </ul>
          <a href="login.php" class = "btn btn-primary ms-auto fw-medium">Login</a>
        </div>
      </div>
    </nav>
    <!-- Akhir Nav Bar -->

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container-fluid mt-5 py-2">
            <div class="row align-items-center">
                <div class="mb-4">
                    <img src="Image/Hero-img.jpg" alt="Gambar Hero-section" style = "width : 1000px; , height : 1000px;">
                </div>
                <h2 class = "fw-bold display-5 mb-3">Track Your Reading Journey</h2>
                <p class="text-muted mb-5">Make reading a fun and rewarding experience with Tready. Track progress,earn rewards and build a lifelong habit ! </p>
                
            </div>
            <a href="login.php"><button class="btn btn-primary fw-bold">Start Reading</button></a>
        </div>
    </section>

    <!-- Card Section -->
    <section class="card-section bg-light">
        <div class="container">
            <h3 class="text-center mb-4">Card Section</h3>
            <div class="d-flex justify-content-center">
                <div class="card mx-2" style="width: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Card 1</h5>
                        <p class="card-text">Description</p>
                    </div>
                </div>
                <div class="card mx-2" style="width: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Card 2</h5>
                        <p class="card-text">Description</p>
                    </div>
                </div>
                <div class="card mx-2" style="width: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Card 3</h5>
                        <p class="card-text">Description</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container d-flex">
            <div class="w-50">
                <h4>Content Title</h4>
                <p>Some text content and description go here.</p>
            </div>
            <div class="w-50" style="height: 200px; background-color: #e9ecef;"></div>
        </div>
    </section>

    <!-- Grid Section -->
    <section class="grid-section bg-light">
        <div class="container text-center">
            <h3>Grid Section</h3>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="grid-item p-3">Grid 1</div>
                </div>
                <div class="col-md-3">
                    <div class="grid-item p-3">Grid 2</div>
                </div>
                <div class="col-md-3">
                    <div class="grid-item p-3">Grid 3</div>
                </div>
                <div class="col-md-3">
                    <div class="grid-item p-3">Grid 4</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container d-flex justify-content-between">
            <div class="footer-item">Footer Item 1</div>
            <div class="footer-item">Footer Item 2</div>
            <div class="footer-item">Footer Item 3</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

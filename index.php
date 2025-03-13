<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
        }
        .hero-section, .card-section, .content-section, .grid-section, .footer {
            padding: 60px 0;
        }
        .font{
            font-family: "Poppins", sans-serif;
        }
        .hero-section .btn:hover{
            background :rgb(67, 37, 235);
            transition : 0.3s ease-in-out;
        }
        .card-section{
            background : #d6e6ff;
        }
        .feature-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            text-align: left;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease-in-out;
        }
        .icon{
            font-size: 30px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(45deg,rgb(43, 49, 205),rgb(46, 21, 184));
            color: white;
            margin-bottom: 10px;
        }
        .reading-section {
            padding: 50px 0;
        }
        .check-icon {
            color: #28a745;
            margin-right: 10px;
        }
        .img:hover{
            transform: scale(1.05);
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
                <h2 class = "fw-bold display-5 mb-3 font">Track Your Reading Journey</h2>
                <p class="text-muted mb-5 font">Make reading a fun and rewarding experience with Tready. Track progress,earn rewards and build a lifelong habit ! </p>
                
            </div>
            <a href="login.php"><button class="btn btn-primary fw-bold">Start Reading</button></a>
        </div>
    </section>
    <!-- Akhir Hero Section -->

    <!-- Feature Section -->
    <section class="card-section">
    <div class="container text-center py-2">
        <div class="header fw-bold fs-2 mb-5" style = "font-family : Poppins , sans-serif">Every Thing You Need to Build Your Reading Habit</div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="rgb(255,255,255)" stroke="rgb(67, 37, 235)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                    </div>
                    <div class="card-title mt-3 .font mb-2 fw-semibold">Seamless Reading Tracking</div>
                    <div class="text-placeholder .font">Keep track of your reading progress in real-time. Log pages, time spent, and completion status effortlessly</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                    </div>
                    <div class="card-title mt-3 .font mb-2 fw-semibold">Gamified Reading</div>
                    <div class="text-placeholder mx-auto .font">Earn badges, climb leaderboards, and unlock achievements as you reach reading goals.</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-line"><path d="M3 3v16a2 2 0 0 0 2 2h16"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                    </div>
                    <div class="card-title mt-3 .font mb-2 fw-semibold">Track Progress</div>
                    <div class="text-placeholder mx-auto .font">View detailed statistics and visualize your reading journey with intuitive progress tracking</div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Akhir Feature Section -->

    <!-- Content Section -->
    <section class="content-section mb-4">
    <div class="container px-3 ">
    <div class="row align-items-center d-flex">
        <div class="col-md-5">
            <h2 class="fw-bold mb-4 fs-2" style = "font-family : Poppins , sans-serif">Turn Your Reading Into Measurable Progress</h2>
            <p class="text-secondary mb-4 fs-5  ">
            With Tready, every page counts. Track your reading stats in real-time with visually appealing charts, monitor your progress, and read seamlessly all in one place
            </p>
            <ul class="list-unstyled">
                <li class = "mb-3"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Visual Reading Insights - Track your progress in various charts.</strong></li>
                <li class = "mb-3"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Seamless Reading - Enjoy a smooth reading experience without distractions.</strong></li>
                <li class = "mb-3"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Stay on Track with Your Books - Pick up where you left off effortlessly.</strong></li>
            </ul>
        </div>
        <div class="col-md-7">
            <div class="reading-stats">
                <img src="Image/Statistics.jpg" alt="Reading Stats" class = "img-fluid img" style= "width: 110%;object-fit: cover;">
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

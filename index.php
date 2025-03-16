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
        .gamified-card svg{
            width : 40px;
            height : 40px;
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
                <li class = "mb-4"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Visual Reading Insights - Track your progress in various charts.</strong></li>
                <li class = "mb-4"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Seamless Reading - Enjoy a smooth reading experience without distractions.</strong></li>
                <li class = "mb-4"><i class="check-icon bi bi-check-circle-fill me-2 "></i><strong>Stay on Track with Your Books - Pick up where you left off effortlessly.</strong></li>
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

    <!-- Gamified Card Section -->
    <section class="gamified-card">
        <div class="container mt-5">
            <div class="px-5 mt-5 d-flex flex-column justify-content-center align-items-center mb-5">
            <h2 style = "font-family : Poppins, sans-serif;" class = "fw-bold fs-1 mb-5">Make Reading Fun and Engaging</h2>
            <p style = "font-family : Poppins, sans-serif;" class = "text-secondary fs-5 mb-3">Transform your reading journey into an exciting adventure with gamification.</p>
            </div>
        </div>
    
    <div class="container mt-4">
        <div class="row g-4 ">
    <!-- Leaderboard -->
            <div class="col-md-6 ">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-success fs-3 mb-3"> Leaderboard</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" class = "me-1" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#0e9a70" d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32l0 192c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-192c0-17.7-14.3-32-32-32l-128 0zM32 320c-17.7 0-32 14.3-32 32L0 480c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32L32 320zm416 96l0 64c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-128 0c-17.7 0-32 14.3-32 32z"/></svg>
                    </div>   
                    <p class = "text-secondary mb-3">Compete with other users</p>    
                    <div class="leaderboard">
                        <div class="d-flex align-items-center bg-success bg-opacity-10 p-3 rounded-3 mb-2">
                            <span class="fw-bold text-success me-3">1</span>
                            <img src="Image/Simon_Sinek.jpg" class="rounded-circle me-3" style="object-fit : cover ; width : 70px; height : 70px " alt="User 1">
                            <div class="flex-grow-1">
                            <span class="fw-bold">Simon Sinek</span>
                            <p class="text-muted small mb-0">2,450 points</p>
                            </div>
                            <span class="text-warning">👑</span>
                        </div>
                        <div class="d-flex align-items-center bg-success bg-opacity-10 p-3 rounded-3 mb-2">
                            <span class="fw-bold text-success me-3">2</span>
                            <img src="Image/Angela_Duckworth.jpg" class="rounded-circle me-3" style="object-fit : cover ; width : 70px; height : 70px " alt="User 1">
                            <div class="flex-grow-1">
                            <span class="fw-bold">Angela Duckworth</span>
                            <p class="text-muted small mb-0">2,250 points</p>
                            </div>
                            <span class="text-warning">🥈</span>
                        </div>
                        <div class="d-flex align-items-center bg-success bg-opacity-10 p-3 rounded-3 mb-2">
                            <span class="fw-bold text-success me-3">3</span>
                            <img src="Image/Paulo_Coelho.jpg" class="rounded-circle me-3" style="object-fit : cover ; width : 70px; height : 70px " alt="User 1">
                            <div class="flex-grow-1">
                            <span class="fw-bold">Paulo Coelho</span>
                            <p class="text-muted small mb-0">2,000 points</p>
                            </div>
                            <span class="text-warning">🥉</span>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Akhir Leaderboard--> 
    <!-- Badges--> 
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-warning fs-3 mb-3 ">Badges</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" class = "me-1" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#FFD43B" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
                    </div>
                    <p class = "text-secondary mb-3">Collect badges and achievements!</p>
                    <div class="badges">
                        <div class="d-flex justify-content-between text-center">
                            <div class="d-flex align-items-center flex-column">
                            <div class="badge-icon bg-primary-subtle rounded-circle p-3">
                            <span class="fs-3 text-primary">📖</span>
                            </div>
                            <p class="small mt-2">Bookworm</p>
                            </div>
                           
                            <div class="badge-icon bg-light rounded-circle p-3">
                            <span class="fs-3 text-info">⏳</span>
                            </div>
                            <p class="small mt-2">Speed Reader</p>
                            <div class="badge-icon bg-light rounded-circle p-3">
                            <span class="fs-3 text-success">📈</span>
                            </div>
                            <p class="small mt-2">Goal Crusher</p>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    <!-- Akhir Badges--> 
        </div>
        <div class="row g-4 mt-5">
            <div class="col-md-6">
                <div class="card feature-card">
                    <h5 class="text-danger fs-3 mb-4"><svg xmlns="http://www.w3.org/2000/svg" class = "me-1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#d7410f" d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg> Streaks</h5>
                    <p>Don’t break the chain! Each small win counts.</p>
                    <span></span><span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card feature-card">
                    <h5 class= "fs-3 mb-4" style = "color: #722ff9;"><svg xmlns="http://www.w3.org/2000/svg"  class = "me-1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#722ff9" d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32L0 64 0 368 0 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30l0-247.7c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48l0-16z"/></svg> Milestones</h5>
                    <p>Measure your success daily, weekly, monthly.</p>
                    <div class="d-flex justify-content-center">
                        <span class="mx-1 text-primary">&#9711;</span>
                        <span class="mx-1">&#9711;</span>
                        <span class="mx-1">&#9711;</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <button class="btn btn-custom">Get Started Free</button>
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

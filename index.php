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
        .badge-icon{
            transform : scale(1.2);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .leaderboard .card:hover{
            box-shadow: 0px 10px 22px rgba(35, 186, 35, 0.4);
            cursor : pointer;
        }
        .badges .card:hover{
            box-shadow: 0px 8px 20px rgba(255, 165, 0, 0.4); 
            cursor : pointer;
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
            <div class="leaderboard col-md-6 ">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-success fs-3 mb-3 fw-semibold"> Leaderboard</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 110%;"  class = "me-1" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#0e9a70" d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32l0 192c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-192c0-17.7-14.3-32-32-32l-128 0zM32 320c-17.7 0-32 14.3-32 32L0 480c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32L32 320zm416 96l0 64c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-128 0c-17.7 0-32 14.3-32 32z"/></svg>
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
                            <span class="text-warning display-5">👑</span>
                        </div>
                        <div class="d-flex align-items-center bg-success bg-opacity-10 p-3 rounded-3 mb-2">
                            <span class="fw-bold text-success me-3">2</span>
                            <img src="Image/Angela_Duckworth.jpg" class="rounded-circle me-3" style="object-fit : cover ; width : 70px; height : 70px " alt="User 1">
                            <div class="flex-grow-1">
                            <span class="fw-bold">Angela Duckworth</span>
                            <p class="text-muted small mb-0">2,250 points</p>
                            </div>
                            <span class="text-warning display-5">🥈</span>
                        </div>
                        <div class="d-flex align-items-center bg-success bg-opacity-10 p-3 rounded-3 mb-2">
                            <span class="fw-bold text-success me-3">3</span>
                            <img src="Image/Paulo_Coelho.jpg" class="rounded-circle me-3" style="object-fit : cover ; width : 70px; height : 70px " alt="User 1">
                            <div class="flex-grow-1">
                            <span class="fw-bold">Paulo Coelho</span>
                            <p class="text-muted small mb-0">2,000 points</p>
                            </div>
                            <span class="text-warning display-5">🥉</span>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Akhir Leaderboard--> 
    <!-- Badges--> 
            <div class=" badges col-md-6">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-warning fs-3 mb-3 fw-semibold ">Badges</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 110%;" class = "me-1" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#FFD43B" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
                    </div>
                    <p class = "text-secondary mb-4 pb-3">Collect badges and achievements</p>
                    <div class="row g-4 align-items-center">
                        <div class="badges">
                            <div class="d-flex justify-content-between text-center">
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon bg-primary-subtle rounded-circle p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 100%;"viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#14466c" d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                </div>
                                <p class="small mt-4 fw-medium">Bookworm</p>
                                </div>
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon bg-danger bg-opacity-10 rounded-circle p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 120%" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#c54b16" d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg>
                                </div>
                                <p class="small mt-4 fw-medium">Streak Master</p>
                                </div>
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon  rounded-circle p-3" style = "background : rgba(67, 37, 235,0.1);">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 120% ;" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#6949ca" d="M448 256A192 192 0 1 0 64 256a192 192 0 1 0 384 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 80a80 80 0 1 0 0-160 80 80 0 1 0 0 160zm0-224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zM224 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                                </div>
                                <p class="small mt-4 fw-medium">Goal Crusher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 align-items-center mt-2">
                    <div class="badges">
                            <div class="d-flex justify-content-between text-center">
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon bg-warning bg-opacity-10 rounded-circle p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 120%;" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#d99b17" d="M400 0L176 0c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8L24 64C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9L192 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l192 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-26.1 0C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24L446.4 64c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112l84.4 0c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6l84.4 0c-5.1 66.3-31.1 111.2-63 142.3z"/></svg>
                                </div>
                                <p class="small mt-4 pb-2 fw-medium">Marathon Reader</p>
                                </div>
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon  rounded-circle p-3" style = "background : rgba(26, 223, 46,0.1)">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale : 120%;" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#215912" d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                </div>
                                <p class="small mt-4 pb-2 fw-medium">Fresh Graduate</p>
                                </div>
                                <div class=" col-md-3 d-flex align-items-center flex-column">
                                <div class="badge-icon rounded-circle p-3" style = "background :rgba(24, 231, 211, 0.1)">
                                <svg xmlns="http://www.w3.org/2000/svg" style = "scale: 110% ;" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#63E6BE" d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0l32 0c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64l32 0c123.7 0 224 100.3 224 224l0 32 0 160c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-160C100.3 320 0 219.7 0 96z"/></svg>
                                </div>
                                <p class="small mt-4 pb-2 fw-medium">Story Sprout</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Badges--> 
    <!-- Streak -->
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-danger fs-3 mb-3 fw-semibold"> Streaks</h5>
                        <svg xmlns="http://www.w3.org/2000/svg" class = "me-1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#d7410f" d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg>
                    </div>
                    <p class = "text-secondary mb-3">Keep your daily reading habits consistent</p> 
                </div>
            </div>
    <!-- Akhir Streak-->
    <!-- Milestone-->
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class= "fs-3 mb-3 fw-semibold" style = "color : #7330f9">Milestones</h5>
                    <svg xmlns="http://www.w3.org/2000/svg"  class = "me-1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#722ff9" d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32L0 64 0 368 0 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30l0-247.7c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48l0-16z"/></svg>
                    </div>
                    <p class = "text-secondary mb-3">Track progress and see how far you've come</p> 
                </div>
                </div>
            </div>
        </div>
    <!-- Akhir Milestone-->
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

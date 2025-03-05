<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Page</title>
    <!-- BOOTSTRAP ICON -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('streak-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, 
            {
            initialView: 'dayGridMonth',
            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
            { title: '' },
            { title: '' }
          ]
        });
            calendar.render();
      });
</script>
    <style>
        .streak-info, .top-view-book, .history-item { background-color: #2E2E2E; padding: 1rem; border-radius: 8px; }
        .calendar-container { background-color: #333; padding: 1rem; border-radius: 8px; }
        .quote { font-style: italic; color: #AAA; }
        .cta-btn { margin-top: 0.5rem; }
        .streak-number {
        font-size: 7rem;
        -webkit-text-stroke: 2px #ff9800;
        color: white;
        line-height: 1;
        }
        .streak-text {
        font-size: 1.5rem;
        color: #ff9800;
        font-weight: bold;
        margin-top: -5px;
        }
        .streak-card {
            max-width: 1200px;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-left : 50px;
        }
        .day-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
            color: #fff;
            margin: 0 auto;
        }
        .day-circle.active {
            background-color: #ff9800;
        }
        .day-circle.inactive {
            background-color: #ddd;
            color: #6c757d;
        }
        .day-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        .book {
        width: 150px;
        height: 225px;
        background: #ddd;
        border-radius: 5px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card{
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .calendar-day {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin: 2px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .calendar-day.active {
            background-color: #ffbb33;
            color: white;
        }
        .streak-badge {
            font-size: 1.5rem;
            color: #ff5722;
        }
        #streak-calendar{
          width: 1000px;
          min-height : 500px;
          border: 2px solid grey;
          padding : 20px;
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        #streak-calendar:hover{
          cursor: pointer;
          color: blue;
          border : 2px solid rgba(75, 192, 192,0.5);
          box-shadow: 0 1000px 1000px rgba(30, 204, 204, 0.1);
        }
    </style>

</head>
<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container-fluid px-5">
      <img src="treadyicon.png" alt="web icon" class = "mx-2" style = "width : 50px;  height : 50px;">
        <a class="navbar-brand" href="#">Tready</a>
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
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="myprogress.php">My Progress</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="achievement.php">Achievement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="history.php">History</a>
            </li>
          </ul>
        </div>
        <!-- search bar -->
        <nav class="navbar bg-body-tertiary">
          <div class="container-fluid">
            <form class="d-flex ms-auto" role="search">
              <input
                class="form-control me-2 w-80"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-primary" type="submit">
                Search
              </button>
            </form>
          </div>
        </nav>
        <!-- profile button, kemudian ketika diklik maka akan beralih ke page settings-->
        <a href="settings.php" class="btn btn-light">
          <i class="bi bi-person-circle fs-5"></i>
        </a>
      </div>
    </nav>
    <!-- Akhir Nav Bar -->
    <!-- Streak -->
    <div class="container-fluid mt-5 pt-5">
      <div class="px-5 mt-3">
        <h2>My Streak</h2>
      </div>
        <div class="row g-4 mt-2"> 
          <!-- Circle Chart -->
          <div class="col-5">
            <div class="card px-3 pt-2 streak-card">
              <div class="card-body mb-4">
                <img src="fire_icon.png" alt="Streak" style = "scale: 125%;">
                <div class="d-flex align-items-center justify-content-center align-items-center mb-3">
                <h2 class = "streak-number mx-2 ">5</h2>
                <h4 class = "streak-text">streaks in a week!</h4>
                </div>
                <!-- Bagian Lingkaran Hari-->
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <div class="day-circle active">M</div>
                        <div class="day-label">Mon</div>
                    </div>
                    <div>
                        <div class="day-circle active">T</div>
                        <div class="day-label">Tue</div>
                    </div>
                    <div>
                        <div class="day-circle active">W</div>
                        <div class="day-label">Wed</div>
                    </div>
                    <div>
                        <div class="day-circle active">Th</div>
                        <div class="day-label">Thu</div>
                    </div>
                    <div>
                        <div class="day-circle active">F</div>
                        <div class="day-label">Fri</div>
                    </div>
                    <div>
                        <div class="day-circle inactive">S</div>
                        <div class="day-label">Sat</div>
                    </div>
                </div>
                <!-- Akhir Lingkaran Hari -->
                <!-- Quote -->
                <p class="streak-message mt-5">
                    But your streak will reset if you don’t practice tomorrow. Watch out!
                </p>
                <!-- Akhir Quote -->
              </div>
            </div>
          </div>
          <!-- Akhir Streak -->
          <!-- Top-View Book -->
          <div class="col-7">
            <div class="card px-3 pt-2 me-4">
              <div class="card-body mb-1">
              <h4 class="card-title">Top-Viewed Book !</h4>
              <div class="row mb-3 my-4">
                <!-- Book-->
                <div class="col-md-2">
                  <div class="book mb-4"></div>
                  <div class="book"></div>
                </div>
                <!-- Akhir Book -->
                <div class="col-md-10">
                  <!-- Informasi Book 1 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Atomic Habits</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">James Clear</h5>
                  <h5 class = "fw-normal text-secondary">Self</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">Waktu baca</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <hr>
                  <!--Akhir Informasi Book 1 -->
                  <!-- Informasi Book 2 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Judul Buku</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Penulis buku</h5>
                  <h5 class = "fw-normal text-secondary">Genre buku</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">Waktu baca</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <!-- Akhir Informasi Book 2 -->
                  </div>
                </div>
              </div>
            </div>
          </div>
              <!-- Streak Calendar  -->
            <div class="container-fluid pt-5"> 
              <div class="row gt-4">
                <div class="col-12">
                  <div id="streak-calendar" class="mx-auto text-center"></div>
                </div>
              </div>
            </div>
            <!-- Akhir Streak Calendar -->
            <!-- History -->
            <div class="container-fluid pt-5 my-5">
            <div class="px-5 mt-3">
              <h2 class = "mb-5">History</h2>
              <h1 class = "text-center">2 Maret 2025</h1>
              <hr>
            </div>
            <div class="col-7">
            <div class="px-3 pt-2 me-4 ms-4">
              <div class="card-body">
              <div class="row mb-3 my-4">
                <!-- Book-->
                <div class="col-md-2">
                  <div class="book mb-4"></div>
                  <div class="book"></div>
                </div>
                <!-- Akhir Book -->
                <div class="col-md-10">
                 <!-- Informasi Book 1 -->
                 <h2 class="mt-2 fs-1 mb-2 mx-5">Judul Buku</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Penulis buku</h5>
                  <h5 class = "fw-normal text-secondary">Genre buku</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">Waktu baca</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <hr>
                  <!--Akhir Informasi Book 1 -->
                  <!-- Informasi Book 2 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Judul Buku</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Penulis buku</h5>
                  <h5 class = "fw-normal text-secondary">Genre buku</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">Waktu baca</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <!-- Akhir Informasi Book 2 -->
                  </div>
                </div>
              </div>
            </div>
          </div>

            
            </div>
            <!-- Akhir History -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

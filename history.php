<?php
require "config.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>History Page</title>
    <!-- BOOTSTRAP ICON -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("streak-calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: "dayGridMonth",
          headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
          },
          events: [{ title: "" }, { title: "" }],
        });
        calendar.render();
      });
    </script>
    <style>
            .streak-info,
            .top-view-book,
            .history-item {
              background-color: #2e2e2e;
              padding: 1rem;
              border-radius: 8px;
            }
            .calendar-container {
              background-color: #333;
              padding: 1rem;
              border-radius: 8px;
            }
            .quote {
              font-style: italic;
              color: #aaa;
            }
            .cta-btn {
              margin-top: 0.5rem;
            }
            .streak-number {
              font-size: 4rem;
              -webkit-text-stroke: 2px #ff9800;
              color: white;
              line-height: 1;
            }
            @media (min-width: 768px) {
              .streak-number {
                font-size: 7rem;
              }
            }
            .streak-text {
              font-size: 1rem;
              color: rgb(228, 60, 18);
              font-weight: bold;
              margin-top: 0;
            }
            @media (min-width: 768px) {
              .streak-text {
                font-size: 1.5rem;
                margin-top: -5px;
              }
            }
            .streak-card {
              max-width: 100%;
              border: 1px solid #ddd;
              border-radius: 12px;
              padding: 20px;
              background-color: white;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
              text-align: center;
              margin: 0 auto;
            }
            @media (min-width: 768px) {
              .streak-card {
                margin-left: 50px;
              }
            }
            .day-circle {
              width: 40px;
              height: 40px;
              border-radius: 50%;
              display: flex;
              align-items: center;
              justify-content: center;
              font-weight: bold;
              font-size: 0.8rem;
              color: #fff;
              margin: 0 auto;
            }
            @media (min-width: 768px) {
              .day-circle {
                width: 70px;
                height: 70px;
                font-size: 1rem;
              }
            }
            .day-circle.active {
              background-color: #ff9800;
            }
            .day-circle.inactive {
              background-color: #ddd;
              color: #6c757d;
            }
            .day-label {
              font-size: 0.7rem;
              color: #6c757d;
              margin-top: 5px;
            }
            @media (min-width: 768px) {
              .day-label {
                font-size: 0.8rem;
              }
            }
            .book {
              width: 100%;
              max-width: 150px;
              height: auto;
              aspect-ratio: 2/3;
              border-radius: 5px;
              position: relative;
              display: flex;
              align-items: center;
              justify-content: center;
              margin: 0 auto;
            }
            .card {
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
            #streak-calendar {
              width: 100%;
              min-height: 500px;
              border: 2px solid grey;
              padding: 20px;
              box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }
            #streak-calendar:hover {
              cursor: pointer;
              color: blue;
              border: 2px solid rgba(75, 192, 192, 0.5);
              box-shadow: 0 1000px 1000px rgba(30, 204, 204, 0.1);
            }
            .fire-icon {
              max-width: 100px;
              scale: 100%;
            }
            @media (min-width: 768px) {
              .fire-icon {
                max-width: 155px;
                scale: 110%;
              }
            }

            .streak-circle {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
 
}

.streak-circle > div {
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Responsive layout: stack 4 on top, 3 on bottom */
@media (max-width: 576px) {
  .streak-circle > div {
    width: 22%; /* 4 per row for 1st line, 3 per row for 2nd line */
  }

  .streak-circle > div:nth-child(n+5) {
    margin-top: 10px;
  }
}


    
    </style>
  </head>
  <body>
    <!-- Nav Bar -->
    <?php include 'Navbar.php'; ?>
    <!-- Akhir Nav Bar -->

    <!-- Streak -->
    <div class="container-fluid mt-5 pt-5">
      <div class="row g-4 mt-2">
        <!-- Circle Chart -->
        <div class="col-12 col-md-5">
          <div class="card px-3 pt-2 streak-card">
            <div class="px-3 px-md-5 mt-3">
              <h2>My Streak</h2>
            </div>
            <div class="card-body mb-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="me-2 me-md-4 mb-3 mb-md-5 fire-icon"
                viewBox="0 0 448 512"
              >
                <path
                  fill="#d7410f"
                  d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"
                />
              </svg>
              <div
                class="d-flex flex-column flex-md-row align-items-center justify-content-center"
              >
                <h2 class="streak-number mx-2" id="streak-number">0</h2>
                <h4 class="streak-text">streaks in a week!</h4>
              </div>
              <!-- Bagian Lingkaran Hari-->
              <div class="d-flex justify-content-center streak-circle">
                <div>
                  <div id="monday" class="day-circle inactive">M</div>
                  <div class="day-label">Mon</div>
                </div>
                <div>
                  <div id="tuesday" class="day-circle inactive">T</div>
                  <div class="day-label">Tue</div>
                </div>
                <div>
                  <div id="wednesday" class="day-circle inactive">W</div>
                  <div class="day-label">Wed</div>
                </div>
                <div>
                  <div id="thursday" class="day-circle inactive">Th</div>
                  <div class="day-label">Thu</div>
                </div>
                <div>
                  <div id="friday" class="day-circle inactive">F</div>
                  <div class="day-label">Fri</div>
                </div>
                <div>
                  <div id="saturday" class="day-circle inactive">S</div>
                  <div class="day-label">Sat</div>
                </div>
                <div>
                  <div id="sunday" class="day-circle inactive">S</div>
                  <div class="day-label">Sun</div>
                </div>
              </div>
              <!-- Akhir Lingkaran Hari -->
              <!-- Quote -->
              <!-- <p class="streak-message mt-3 mt-md-1">
                But your streak will reset if you don't login tomorrow. Watch
                out!
              </p> -->
              <!-- Akhir Quote -->
            </div>
          </div>
        </div>
        <!-- Akhir Streak -->

        <!-- Query Data Buku -->
        <?php
            $query = "
                SELECT b.book_id, b.title, b.author, b.genre, b.cover_image, SUM(r.reading_duration) AS total_duration
                FROM reading_activity r
                JOIN book b ON r.book_id = b.book_id
                GROUP BY r.book_id
                ORDER BY total_duration DESC
                LIMIT 4
            ";
         $stmt = $conn->prepare($query); $stmt->execute(); $result =
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
       
        ?>
       <!-- Top-Viewed Book Section -->
        <div class="col-12 col-md-7 mt-3 mt-md-4">
          <div class="card px-3 pt-2 me-md-4">
            <div class="card-body mb-1">
              <h4 class="card-title">Top-Viewed Book!</h4>
              <div id="book-list" class="row mb-3 my-4">
                <?php foreach ($result as $row): ?>
                  <?php
                    // Hitung total waktu membaca dalam jam, menit, dan detik
                    $totalSeconds = $row['total_duration'];
                    $hours = floor($totalSeconds / 3600);
                    $minutes = floor(($totalSeconds % 3600) / 60);
                    $seconds = $totalSeconds % 60;
                  ?>
                  <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column position-relative">
                        <?php
                          // Untuk gambar cover
                          if (!empty($row['cover_image'])) {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['cover_image']).'" class="card-img-top" style="height: 280px;"
                             alt="Book Cover">';
                          } else {
                            echo '<img src="default_cover.jpg" class="card-img-top" alt="Default Cover" />';
                          }
                        ?>
                        <div class="card-body d-flex flex-column">
                          <h4 class="card-title mb-2">
                            <?php echo htmlspecialchars($row['title']); ?>
                          </h4>
                          <p class="card-text mb-2">
                            <?php echo htmlspecialchars($row['author']); ?>
                          </p>

                          <!-- Spacer to push time info to the bottom -->
                          <div class="flex-grow-1"></div>

                          <!-- Time info at the bottom-right -->
                          <div class="text-end small text-secondary mt-3">
                            <?php echo "{$hours} hr {$minutes} min {$seconds} sec"; ?>
                          </div>
                        </div>
                      </div>

                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>


        <!-- History -->
          <?php
          $today = date('Y-m-d');

          // Query untuk mendapatkan history baca hari ini

          $queryToday = "
               SELECT b.book_id, b.title, b.author, b.genre, b.cover_image, b.description,
                      r.reading_progress, r.current_pages, b.pages
                FROM reading_activity r
                JOIN book b ON r.book_id = b.book_id
                JOIN (
                    SELECT MAX(activity_id) AS latest_activity_id
                    FROM reading_activity
                    WHERE DATE(reading_date) = :today
                    GROUP BY book_id
                ) latest ON latest.latest_activity_id = r.activity_id
                ORDER BY r.reading_date DESC
                ";

          $stmtToday = $conn->prepare($queryToday);
          $stmtToday->execute(['today' => $today]);
          $todayResults = $stmtToday->fetchAll(PDO::FETCH_ASSOC);
          ?>

        <!-- Reading History -->
        <div class="container-fluid">
          <div class="card px-2  mt-4 mx-md-5">
            <div class="card-body">
              <h4 class="card-title">Today's Reading History</h4>

              <div class="mt-4">
              <div class="row row-cols-1 row-cols-md-3 g-4">
                      <?php if (!empty($todayResults)): ?>
                        <?php foreach ($todayResults as $row): ?>
                          <div class="col history-card">
                            <div class="card h-100">
                              <div class="row g-0 h-100">
                                <div class="col-4 p-2 d-flex align-items-center">
                                  <?php
                                  if (!empty($row['cover_image'])) {
                                      echo '<img src="data:image/jpeg;base64,'.base64_encode($row['cover_image']).'" class="img-fluid rounded-start" alt="Book Cover" style="height:204px;"
                                      >';
                                  } else {
                                      echo '<img src="default_cover.jpg" class="img-fluid rounded-start" alt="Default Cover">';
                                  }
                                  ?>
                                </div>
                                <div class="col-8 d-flex flex-column">
                                  <div class="card-body flex-grow-1 d-flex flex-column">
                                    <h5 class="card-title fs-5 mb-2">
                                      <?php echo htmlspecialchars($row['title']); ?>
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="fw-normal text-secondary mb-0">
                                          <?php echo htmlspecialchars($row['description']); ?>
                                        </h6>
                          
                                      </div>
                                    
                                    <progress value="<?php echo htmlspecialchars($row['reading_progress']); ?>" max="100" class="w-100 mb-2">
                                      <?php echo htmlspecialchars($row['reading_progress']); ?>%
                                    </progress>
                                    <div class=" mt-auto align-self-end">
                                    <?php echo htmlspecialchars($row['current_pages']); ?>/<?php echo htmlspecialchars($row['pages']); ?> pages
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <div class="col">
                          <p class="text-center mt-4">No reading history today.</p>
                        </div>
                      <?php endif; ?>
                    </div>

                  </div>
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
          <div class="px-3 px-md-5 mt-3">
            <h2 class="mb-5">History</h2>
            <h1 class="text-center">2 March 2025</h1>
            <hr />
          </div>

          <div class="col-12 col-md-7 mx-auto">
            <div class="px-3 pt-2 me-md-4 ms-md-4">
              <div class="card-body">
                <div class="row mb-3 my-4">
                  <!-- Book 1 -->
                  <div class="col-12 col-md-2 text-center mb-4 mb-md-0">
                    <img
                      src="Image/BookCover6.jpg"
                      alt="Cover Buku Harapan Baru"
                      class="book mb-3"
                    />
                    <img
                      src="Image/BookCover3.jpg"
                      alt="Cover Buku Bahagia itu Sederhana"
                      class="book"
                    />
                  </div>
                  <!-- End Book 1 -->

                  <!-- Book Details -->
                  <div class="col-12 col-md-10">
                    <!-- Book 1 Information -->
                    <h2 class="mt-2 fs-4 fs-md-1 mb-2 mx-2 mx-md-5">
                      Harapan Baru
                    </h2>
                    <div class="d-flex flex-wrap mb-3 mb-md-5 mx-2 mx-md-5">
                      <h5 class="fw-normal text-secondary me-3 me-md-5">
                        Itsuki Takahashi
                      </h5>
                      <h5 class="fw-normal text-secondary">Drama</h5>
                    </div>
                    <div
                      class="d-flex flex-column flex-md-row justify-content-between align-items-center mx-2 mx-md-5"
                    >
                      <h5 class="fw-normal text-secondary mt-2 mt-md-5">
                        229 / 859 pages
                      </h5>
                      <button
                        type="button"
                        class="btn btn-primary border rounded mt-2 mt-md-5 fw-bold"
                      >
                        Resume Reading
                      </button>
                    </div>
                    <hr />
                    <!-- End Book 1 Information -->

                    <!-- Book 2 Information -->
                    <h2 class="mt-2 fs-4 fs-md-1 mb-2 mx-2 mx-md-5">
                      Bahagia itu Sederhana
                    </h2>
                    <div class="d-flex flex-wrap mb-3 mb-md-5 mx-2 mx-md-5">
                      <h5 class="fw-normal text-secondary me-3 me-md-5">
                        Francois Mercer
                      </h5>
                      <h5 class="fw-normal text-secondary">Drama</h5>
                    </div>
                    <div
                      class="d-flex flex-column flex-md-row justify-content-between align-items-center mx-2 mx-md-5"
                    >
                      <h5 class="fw-normal text-secondary mt-2 mt-md-5">
                        373 / 809 pages
                      </h5>
                      <button
                        type="button"
                        class="btn btn-primary border rounded mt-2 mt-md-5 fw-bold"
                      >
                        Resume Reading
                      </button>
                    </div>
                    <!-- End Book 2 Information -->
                  </div>
                  <!-- End Book Details -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir History -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const todayStr = today.toISOString().split('T')[0]; // format YYYY-MM-DD
            const todayDay = today.getDay(); // 0 = Sunday, ..., 6 = Saturday

            let lastDate = localStorage.getItem('lastActiveDate');
            let streak = localStorage.getItem('streak') ? parseInt(localStorage.getItem('streak')) : 0;
            let activeDays = JSON.parse(localStorage.getItem('activeDays')) || [false, false, false, false, false, false, false];

            // Tandai hari ini sebagai aktif
            activeDays[todayDay] = true;
            localStorage.setItem('activeDays', JSON.stringify(activeDays));

            // Update tampilan lingkaran hari
            const days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            activeDays.forEach((active, index) => {
                const dayElement = document.getElementById(days[index]);
                if (dayElement) {
                    if (active) {
                        dayElement.classList.add('active');
                        dayElement.classList.remove('inactive');
                    } else {
                        dayElement.classList.add('inactive');
                        dayElement.classList.remove('active');
                    }
                }
            });

            // Proses streak
            if (lastDate) {
                const lastActive = new Date(lastDate);
                const diffTime = today.setHours(0,0,0,0) - lastActive.setHours(0,0,0,0); // Pastikan hanya tanggal
                const diffDays = diffTime / (1000 * 60 * 60 * 24);

                if (diffDays === 1) {
                    streak += 1;
                } else if (diffDays > 1) {
                    streak = 1;
                }
                // Kalau diffDays === 0, tetap hari yang sama, biarkan streak tetap
            } else {
                // pertama kali aktif
                streak = 1;
            }

            // ✅ Simpan tanggal terakhir aktif dan streak, meskipun hari yang sama
            localStorage.setItem('lastActiveDate', todayStr);
            localStorage.setItem('streak', streak);

            // Update tampilan streak
            const streakEl = document.getElementById('streak-number');
            if (streakEl) {
                streakEl.innerText = streak;
            }

            // Kirim streak ke server
            fetch('update_streak.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'streak=' + encodeURIComponent(streak)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    </script>
  </body>
</html>

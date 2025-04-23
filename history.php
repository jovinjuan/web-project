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
        document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('streak-calendar');

    const isMobile = window.innerWidth < 768;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: isMobile ? 'prev' : 'prev,next',
            center: 'title',
            right: isMobile ? 'next' : 'today'
        },
        windowResize: function () {
            // Re-render the calendar if needed on window resize
            const isMobileNow = window.innerWidth < 768;

            calendar.setOption('headerToolbar', {
                left: isMobileNow ? 'prev' : 'prev,next',
                center: 'title',
                right: isMobileNow ? 'next' : 'today'
            });

            calendar.setOption('aspectRatio', isMobileNow ? 1.1 : 1.5);
        },
        height: 'auto',
        contentHeight: 'auto',
        aspectRatio: isMobile ? 1.1 : 1.5,
        dayMaxEventRows: 2,
        events: [
            { title: '' },
            { title: '' }
        ]
    });

    calendar.render();
});


</script>
    <style>
        body{margin : 0; padding : 0; box-sizing : border-box; overflow-x : none;}
        .top-view-book, .history-item { background-color: #2E2E2E; padding: 1rem; border-radius: 8px; }
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
        color:rgb(228, 60, 18);
        font-weight: bold;
        margin-top: -5px;
        }
        .streak-card {
            width: 95%;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-left : 50px;
        }
        .day-circle {
            width: 70px;
            height: 70px;
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
          width: 100%;
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
        @media(max-width : 767px) {
          .streak-heading{
            margin-top : 4em;
          }
          .day-circle{
            width : 40px;
            height : 40px;
            margin : 5px;
            display : flex;
          }
          .top-book{
            margin-left : 50px;
          }
          svg{
            margin-left : 20px;
          }
          .streak-info{
            display : flex;
            flex-direction : column;
          }
          .top-book{
            text-align : center;
          }

          .fc .fc-toolbar-title {
            font-size: 1rem;
          }
          .fc .fc-col-header-cell {
              font-size: 0.7rem;
              padding: 2px;
          }
          .fc .fc-daygrid-day-frame {
              min-height: 30px !important;
          }
          .fc .fc-daygrid-day-number {
              font-size: 0.7rem;
          }
          .fc .fc-button {
              padding: 0.3em 0.4em;
              font-size: 0.7rem;
          }
        }

    </style>

</head>
<body>
   <!-- Nav Bar -->
   <?php include 'Navbar.php';
    ?>
    <!-- Akhir Nav Bar -->
    <!-- Streak -->
    <div class="container-fluid mt-5 pt-5 streak">
      <div class="px-5 mt-5">
        <h2 class = "streak-heading">My Streak</h2>
      </div>
        <div class="row g-4 mt-2"> 
          <!-- Circle Chart -->
          <div class="col-md-5 col-12">
            <div class="card px-3 pt-2 streak-card">
              <div class="card-body mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class = "me-4 mb-5 fire-icon" style = "max-width : 155px; scale : 110%;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#d7410f" d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg>
                <div class="d-flex align-items-center justify-content-center align-items-center mb-3 streak-info">
                <h2 class = "streak-number mx-2 ">5</h2>
                <h4 class = "streak-text">streaks in a week!</h4>
                </div>
                <!-- Bagian Lingkaran Hari-->
                <div class="d-flex justify-content-between mb-2 flex-wrap">
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
          <div class="col-md-7 col-12">
            <div class="card px-3 pt-2 me-4 top-book">
              <div class="card-body mb-1">
              <h4 class="card-title">Top-Viewed Book !</h4>
              <div class="row mb-3 my-4">
                <!-- Book-->
                <div class="col-md-2">
                  <div class="mb-4"><img src="Image/BookCover5.jpg" alt="Cover Buku Perahu Kertas" class = "book"></div>
                  <div class= "mt-5"><img src="Image/BookCover4.jpg" alt="Cover Buku Langit Biru" class = "book"></div>
                </div>
                <!-- Akhir Book -->
                <div class="col-md-10">
                  <!-- Informasi Book 1 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Perahu Kertas</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Cahaya Dewi</h5>
                  <h5 class = "fw-normal text-secondary">Drama</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">4h 30min</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <hr class = "mb-5">
                  <!--Akhir Informasi Book 1 -->
                  <!-- Informasi Book 2 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Langit Biru</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Samira Hadid</h5>
                  <h5 class = "fw-normal text-secondary">Romance/Drama</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">3h 15min</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Add to Favourite Lists</button>
                  </div>
                  <!-- Akhir Informasi Book 2 -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md mx-5 me-1 pe-4 ">
            <div class="card px-3 py-2 mb-5">
              <div class="card-body mb-3">
                <h4 class="card-title">Recent History</h4>
                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                <p class="card-text"></p>
                <!-- In Progress Group Card -->
                <div class="mt-4">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!--Make sure row are responsive-->
                    <!-- Card 1 -->
                    <div class="col-md-4">
                      <div class="card mx-2">
                        <div class="row g-0 py-3">
                          <div class="col-md-4 p-3">
                            <img
                              src="Image/BookCover1.jpg"
                              class="img-fluid rounded-start h-100"
                              alt="..."
                            />
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title fs-2 mb-3">Tangan di Atas Lebih Baik dari Tangan di Bawah</h5>
                              <div class="d-flex mb-3 ">
                                <h5 class = "fw-normal text-secondary me-5 text-start">Dani Martinez</h5>
                                <h5 class = "fw-normal text-secondary">Drama</h5>
                              </div>
                              <progress id="progress" value="32" max="100" class = "fs-2">
                                32%
                              </progress>
                              <!-- Continue Button -->
                              <div class="btn btn-primary position-absolute bottom-0 end-0 m-3">></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card mx-2">
                          <div class="row g-0 py-3">
                            <div class="col-md-4 p-3">
                              <img
                                src="Image/BookCover1.jpg"
                                class="img-fluid rounded-start h-100"
                                alt="..."
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title fs-2 mb-3">Tangan di Atas Lebih Baik dari Tangan di Bawah</h5>
                                <div class="d-flex mb-3 ">
                                  <h5 class = "fw-normal text-secondary me-5 text-start">Dani Martinez</h5>
                                  <h5 class = "fw-normal text-secondary">Drama</h5>
                                </div>
                                <progress id="progress" value="32" max="100" class = "fs-2">
                                  32%
                                </progress>
                                <!-- Continue Button -->
                                <div class="btn btn-primary position-absolute bottom-0 end-0 m-3">></div>
                              </div>
                          </div>
                      </div>
                    </div>
                    </div>
                     <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card mx-2">
                          <div class="row g-0 py-3">
                            <div class="col-md-4 p-3">
                              <img
                                src="Image/BookCover1.jpg"
                                class="img-fluid rounded-start h-100"
                                alt="..."
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title fs-2 mb-3">Tangan di Atas Lebih Baik dari Tangan di Bawah</h5>
                                <div class="d-flex mb-3 ">
                                  <h5 class = "fw-normal text-secondary me-5 text-start">Dani Martinez</h5>
                                  <h5 class = "fw-normal text-secondary">Drama</h5>
                                </div>
                                <progress id="progress" value="32" max="100" class = "fs-2">
                                  32%
                                </progress>
                                <!-- Continue Button -->
                                <div class="btn btn-primary position-absolute bottom-0 end-0 m-3">></div>
                              </div>
                          </div>
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
            <div class="pe-5 mt-3">
              <h2 class = "mb-5">History</h2>
              <h1 class = "text-center">2 March 2025</h1>
              <hr>
            </div>
            <div class="col-7">
            <div class="px-3 pt-2 me-4 ms-4">
              <div class="card-body">
              <div class="row mb-3 my-4">
                <!-- Book-->
                <div class="col-md-2">
                  <div class="mb-4"><img src="Image/BookCover6.jpg" alt="Cover Buku Harapan Baru" class = "book"></div>
                  <div><img src="Image/BookCover3.jpg" alt="Cover Buku Bahagia itu Sederhana" class = "book"></div>
                </div>
                <!-- Akhir Book -->
                <div class="col-md-10">
                 <!-- Informasi Book 1 -->
                 <h2 class="mt-2 fs-1 mb-2 mx-5">Harapan Baru</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Itsuki Takahashi</h5>
                  <h5 class = "fw-normal text-secondary">Drama</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">229 / 859 pages</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Resume Reading</button>
                  </div>
                  <hr>
                  <!--Akhir Informasi Book 1 -->
                  <!-- Informasi Book 2 -->
                  <h2 class="mt-2 fs-1 mb-2 mx-5">Bahagia itu Sederhana</h2>
                  <div class="d-flex mb-5 mx-5">
                  <h5 class = "fw-normal text-secondary me-5">Francois Mercer</h5>
                  <h5 class = "fw-normal text-secondary">Drama</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mx-5">
                    <h5 class = "fw-normal text-secondary mt-5">373 / 809 pages</h5>
                    <button type="button" class="btn btn-primary border rounded mt-5 fw-bold">Resume Reading</button>
                  </div>
                  <!-- Akhir Informasi Book 2 -->
                  </div>
                </div>
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
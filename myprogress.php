<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem</title>

    <link rel="stylesheet" href="css/style.css" />

    <!-- BOOTSTRAP CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <!-- BOOTSTRAP ICON -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      canvas {
        width: 100% !important;
        height: 300px !important;
        max-width: 100%;
      }
      /* Membatasi deskripsi agar tidak melebihi beberapa baris */
      .card-text {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        display: box;
        line-clamp: 4;
        box-orient: vertical;
      }
      .active-btn {
        background-color: rgb(1, 1, 192);
        color: white;
        border: 2px solid rgb(1, 1, 192);
      }
      .card-title {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        display: box;
        line-clamp: 1; /* Standard property (not fully supported yet) */
        box-orient: vertical;
      }
      /* In Progress Card Sama Tinggi Tanpa Perubahan Konten */
      .fixed-height-card {
        height: 235px;
      }
      .full-height-img {
        height: 100%;
      }
      .statisticsToggle {
        position: absolute;
        top: 15px;
        right: 15px;
      }
      .progress-ring {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 8px solid #dee2e6;
        border-top: 8px solid rgb(76, 21, 203);
        transform: rotate(45deg);
      }
      .fixed-height-chart {
        height: 415px;
      }
    </style>
  </head>
  <body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container-fluid px-5">
        <i class="bi bi-box-fill"></i>
        <a class="navbar-brand" href="#">[Nama Sistem]</a>
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
              <a class="nav-link active" href="myprogress.php">My Progress</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="achievement.php">Achievement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">History</a>
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

    <!--Awal Statistik  -->
    <div class="container-fluid mt-5 pt-5">
      <div class="px-5 mt-3">
        <h2>My Progress</h2>
        <h5>Track Your Reading Progress</h5>
        <div class="row g-4 mt-2">
          <!-- Circle Chart -->
          <div class="col-6">
            <div class="card px-3 pt-2 fixed-height-chart">
              <div class="card-body">
                <h4 class="card-title">Target</h4>
                <!-- Ring Chart 1 -->
                <div class="row align-items-center mb-3">
                  <div class="col-4">
                    <svg width="160" height="160" viewBox="0 0 100 100">
                      <!-- Background Circle -->
                      <circle
                        cx="50"
                        cy="50"
                        r="40"
                        stroke="#ddd"
                        stroke-width="10"
                        fill="none"
                      />
                      <!-- Progress Circle -->
                      <circle
                        cx="50"
                        cy="50"
                        r="40"
                        stroke="rgb(76, 21, 203)"
                        stroke-width="10"
                        fill="none"
                        stroke-dasharray="251.2"
                        stroke-dashoffset="167.5"
                        stroke-linecap="round"
                      />
                      <!-- Percentage Text -->
                      <text
                        x="50"
                        y="55"
                        font-size="18"
                        text-anchor="middle"
                        fill="black"
                        font-weight="bold"
                      >
                        33%
                      </text>
                    </svg>
                  </div>
                  <div class="col-md-8">
                    <h4 class="fw-bold">Monthly Book Explorer</h4>
                    <p class="card-text">
                      Finish 2 books within 30 days to stay on track with your
                      reading goals.
                    </p>

                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <button
                        type="button"
                        class="btn btn-primary border rounded ms-auto"
                      >
                        Continue
                      </button>
                      <h6 class="fw-bold display"></h6>
                    </div>
                  </div>
                </div>

                <!-- Ring Chart 2 -->
                <div class="row align-items-center mt-2 mb-2">
                  <div class="col-4">
                    <svg width="160" height="160" viewBox="0 0 100 100">
                      <!-- Background Circle -->
                      <circle
                        cx="50"
                        cy="50"
                        r="40"
                        stroke="#ddd"
                        stroke-width="10"
                        fill="none"
                      />
                      <!-- Progress Circle -->
                      <circle
                        cx="50"
                        cy="50"
                        r="40"
                        stroke="rgb(76, 21, 203)"
                        stroke-width="10"
                        fill="none"
                        stroke-dasharray="251.2"
                        stroke-dashoffset="167.5"
                        stroke-linecap="round"
                      />
                      <!-- Percentage Text -->
                      <text
                        x="50"
                        y="55"
                        font-size="18"
                        text-anchor="middle"
                        fill="black"
                        font-weight="bold"
                      >
                        33%
                      </text>
                    </svg>
                  </div>
                  <div class="col-md-8">
                    <h4 class="fw-bold">7-Day Reading Streak</h4>
                    <p class="card-text">
                      Read at least 20 minutes per day for 7 consecutive days to
                      build a consistent reading habit.
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <button
                        type="button"
                        class="btn btn-primary border rounded ms-auto"
                      >
                        Continue
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Line Chart -->
          <div class="col-6">
            <div class="card px-3 pt-2 fixed-height-chart">
              <div class="card-body">
                <h4 class="card-title">Statistics</h4>
                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                <p class="card-text"></p>
                <div class="btn-group mt-1 statisticsToggle">
                  <button class="btn btn-primary active-btn" id="monthlyBtn">
                    Monthly
                  </button>
                  <button class="btn btn-primary" id="dailyBtn">Daily</button>
                </div>
                <canvas id="myChart"></canvas>
                <script>
                  const ctx = document
                    .getElementById("myChart")
                    .getContext("2d");

                  // Default Monthly Data
                  let monthlyData = {
                    labels: [
                      "Jan",
                      "Feb",
                      "Mar",
                      "Apr",
                      "May",
                      "Jun",
                      "Jul",
                      "Aug",
                      "Sep",
                      "Oct",
                      "Nov",
                      "Dec",
                    ],
                    datasets: [
                      {
                        label: "Monthly Statistics",
                        data: [10, 22, 2, 5, 17, 0, 1, 6, 12, 1, 0, 0],
                        borderColor: "rgb(75, 192, 192)",
                        backgroundColor: "rgb(75, 192, 192)",
                        tension: 0.1,
                      },
                    ],
                  };

                  let dailyData = {
                    labels: [
                      "Monday",
                      "Tuesday",
                      "Wednesday",
                      "Thursday",
                      "Friday",
                      "Saturday",
                      "Sunday",
                    ],
                    datasets: [
                      {
                        label: "Daily Statistics",
                        data: [5, 12, 7, 9, 3, 5, 2],
                        borderColor: "purple",
                        backgroundColor: "purple",
                        tension: 0.1,
                      },
                    ],
                  };

                  let chart = new Chart(ctx, {
                    type: "line",
                    data: monthlyData,
                    options: { responsive: true },
                  });

                  document
                    .getElementById("dailyBtn")
                    .addEventListener("click", function () {
                      chart.data = dailyData;
                      chart.update();
                      toggleActive(this);
                    });

                  document
                    .getElementById("monthlyBtn")
                    .addEventListener("click", function () {
                      chart.data = monthlyData;
                      chart.update();
                      toggleActive(this);
                    });

                  function toggleActive(button) {
                    document
                      .getElementById("dailyBtn")
                      .classList.remove("active-btn");
                    document
                      .getElementById("monthlyBtn")
                      .classList.remove("active-btn");
                    button.classList.add("active-btn");
                  }
                </script>
              </div>
            </div>
          </div>
          <!-- In Progress -->
          <div class="col">
            <div class="card px-3 py-2 mb-5">
              <div class="card-body">
                <h4 class="card-title">In Progress</h4>
                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                <p class="card-text"></p>
                <!-- In Progress Group Card -->
                <div class="mt-4">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!--Make sure row are responsive-->
                    <!-- Card 1 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0 py-3">
                        <div class="col-md-4" style="height: 204px">
                          <img
                            src="/pic/bookcover1.webp"
                            class="img-fluid rounded-start full-height-img"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Silent Echo</h5>
                            <p class="card-text p-0">
                              After a global catastrophe leaves most of the
                              world mute, one woman discovers she can still
                              speak. Hunted for the secrets she holds, she
                              embarks on a journey to uncover the truth behind
                              humanity’s silence.
                            </p>
                            <progress id="progress" value="32" max="100">
                              32%
                            </progress>
                            <!-- Continue Button -->
                            <div
                              class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                            >
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 2 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0 py-3">
                        <div class="col-md-4" style="height: 204px">
                          <img
                            src="/pic/bookcover1.webp"
                            class="img-fluid rounded-start full-height-img"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Threads of Destiny</h5>
                            <p class="card-text p-0">
                              Two souls, bound by fate across lifetimes, must
                              find each other again before the world collapses.
                              Will they uncover their connection in time, or
                              will history repeat itself?
                            </p>
                            <progress id="progress" value="32" max="100">
                              32%
                            </progress>

                            <!-- Continue Button -->
                            <div
                              class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                            >
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 3 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0 py-3">
                        <div class="col-md-4" style="height: 204px">
                          <img
                            src="/pic/bookcover1.webp"
                            class="img-fluid rounded-start full-height-img"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">The Alchemist’s Curse</h5>
                            <p class="card-text p-0">
                              An ambitious young scholar discovers an ancient
                              formula that promises eternal life. But as he
                              unlocks its secrets, he realizes that some
                              knowledge comes with a price too high to pay.
                            </p>
                            <progress id="progress" value="32" max="100">
                              32%
                            </progress>
                            <!-- Continue Button -->
                            <div
                              class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                            >
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 4 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0 py-3">
                        <div class="col-md-4" style="height: 204px">
                          <img
                            src="/pic/bookcover1.webp"
                            class="img-fluid rounded-start full-height-img"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">The Fractured Path</h5>
                            <p class="card-text p-0">
                              A detective with a troubled past stumbles upon a
                              case that leads him down a road where reality and
                              illusion blur. As he uncovers the truth, he must
                              confront the demons he's been running from.
                            </p>
                            <progress id="progress" value="32" max="100">
                              32%
                            </progress>
                            <!-- Continue Button -->
                            <div
                              class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                            >
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 5 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0 py-3">
                        <div class="col-md-4" style="height: 204px">
                          <img
                            src="/pic/bookcover1.webp"
                            class="img-fluid rounded-start full-height-img"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Echoes of Eternity</h5>
                            <p class="card-text p-0">
                              In a world where memories can be stored and
                              replayed like movies, a woman discovers a
                              forgotten past that could change the fate of
                              humanity. But some secrets are meant to stay
                              buried
                            </p>
                            <progress id="progress" value="32" max="100">
                              32%
                            </progress>
                            <!-- Continue Button -->
                            <div
                              class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                            >
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

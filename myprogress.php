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
        height: 400px !important;
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
      .responsive-svg {
        width: 200px;
        height: 200px;
      }

      @media (max-width: 768px) {
        .responsive-svg {
          width: 170px;
          height: 170px;
        }
      }

      #myChart {
        width: 100% !important;
      }

      /* Responsive fix for mobile (under 576px) */
      @media (max-width: 575.98px) {
        .card-title {
          font-size: 0.9rem;
        }
        .card-text {
          font-size: 0.7rem;
        }
        .responsive-svg {
          width: 150px;
          height: 150px;
        }
        .target-title {
          font-size: 0.9rem;
        }

        canvas {
          width: 100% !important;
          height: 200px !important;
          max-width: 100%;
        }
        .btn {
          font-size: 0.75rem;
          padding: 0.25rem 0.5rem;
        }
        .card-text {
          overflow: hidden;
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          display: box;
          line-clamp: 3;
          box-orient: vertical;
        }
      }
      .object-fit-cover {
        object-fit: cover;
      }
    </style>
  </head>
  <body>
    <!-- Nav Bar -->
    <!-- <?php include 'Navbar.php';
    ?> -->
    <!-- Akhir Nav Bar -->

    <!--Awal Statistik  -->
    <h2>My Progress</h2>
    <h5>Track Your Reading Progress</h5>

    <div class="row g-4 px-5 pt-4">
      <!-- Circle Charts (Goals Section) -->
      <div class="col mt-2 col-md-5 col-12">
        <div class="card px-1 pt-2 h-100">
          <div class="card-body">
            <h4 class="card-title">Target</h4>

            <!-- Goal 1 -->
            <div class="row align-items-center mb-4 text-md-start">
              <div class="col">
                <!-- SVG Chart -->
                <svg
                  width="200"
                  height="200"
                  viewBox="0 0 100 100"
                  class="img-fluid responsive-svg"
                >
                  <circle
                    cx="50"
                    cy="50"
                    r="40"
                    stroke="#ddd"
                    stroke-width="10"
                    fill="none"
                  />
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
              <div class="col mt-3 mt-md-0">
                <h5 class="fw-bold target-title">Monthly Book Explorer</h5>
                <p class="card-text">
                  Finish 2 books within 30 days to stay on track with your
                  reading goals.
                </p>
                <div class="justify-content-center">
                  <button class="btn btn-primary">Continue</button>
                </div>
              </div>
            </div>

            <!-- Goal 2 -->
            <div class="row align-items-center mb-4 text-md-start">
              <div class="col">
                <!-- SVG Chart -->
                <svg
                  width="200"
                  height="200"
                  viewBox="0 0 100 100"
                  class="img-fluid responsive-svg"
                >
                  <circle
                    cx="50"
                    cy="50"
                    r="40"
                    stroke="#ddd"
                    stroke-width="10"
                    fill="none"
                  />
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
              <div class="col">
                <h5 class="fw-bold target-title">7-Day Reading Streak</h5>
                <p class="card-text">
                  Read at least 20 minutes per day for 7 consecutive days to
                  build a consistent habit.
                </p>
                <div class="justify-content-center">
                  <button class="btn btn-primary">Continue</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Line Chart (Statistics Section) -->
      <div class="col mt-2 col-md-7 col-12">
        <div class="card px-3 pt-2 h-100">
          <div class="card-body">
            <h4 class="card-title">Statistics</h4>
            <div class="btn-group mt-1 statisticsToggle">
              <button class="btn btn-primary active-btn" id="monthlyBtn">
                Monthly
              </button>
              <button class="btn btn-primary" id="dailyBtn">Daily</button>
            </div>

            <canvas class="mt-3 mb-1" id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- In Progress -->
    <div class="col">
      <div class="card px-3 pb-2 mx-5 mb-5 mt-2">
        <div class="card-body">
          <h4 class="card-title">In Progress</h4>
          <h6 class="card-subtitle text-body-secondary"></h6>
          <p class="card-text"></p>
          <!-- In Progress Group Card -->
          <div class="mt-2">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <!--Make sure row are responsive-->
              <!-- Card 1 -->
              <div class="col">
                <div class="card h-100 progress-card">
                  <div class="row g-0 h-100">
                    <div class="col-4 col-md-5">
                      <img
                        src="Image/BookCover1.jpg"
                        class="img-fluid rounded-start h-100 object-fit-cover"
                        alt="..."
                      />
                    </div>
                    <div class="col-8 col-md-7 pt-2 px-2">
                      <div class="card-body d-flex flex-column h-100">
                        <h5 class="card-title">
                          Tangan di Atas Lebih Baik dari Tangan di Bawah
                        </h5>
                        <p class="card-text">
                          Melalui berbagai kisah inspiratif dan prinsip moral,
                          buku ini mendorong pembaca untuk mengembangkan mindset
                          positif, berkontribusi kepada masyarakat, serta meraih
                          kesuksesan dengan membantu sesama.
                        </p>
                        <progress
                          id="progress"
                          value="32"
                          max="100"
                          class="w-100 mb-3"
                        >
                          32%
                        </progress>
                        <div class="btn btn-primary mt-auto align-self-end">
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card 2 -->

              <div class="col">
                <div class="card h-100 progress-card">
                  <div class="row g-0 h-100">
                    <div class="col-4 col-md-5">
                      <img
                        src="Image/BookCover2.jpg"
                        class="img-fluid rounded-start h-100 object-fit-cover"
                        alt="..."
                      />
                    </div>
                    <div class="col-8 col-md-7 pt-2 px-2">
                      <div class="card-body d-flex flex-column h-100">
                        <h5 class="card-title">Senja Tanpa Suara</h5>
                        <p class="card-text">
                          Dalam keheningan senja, ada kisah yang tak pernah
                          terucap—tentang rindu yang tertahan, luka yang
                          tersembunyi, dan perjalanan hati yang mencari makna.
                        </p>
                        <progress
                          id="progress"
                          value="32"
                          max="100"
                          class="w-100 mb-1"
                        >
                          32%
                        </progress>
                        <div class="btn btn-primary mt-auto align-self-end">
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
  </body>
  <script>
    const ctx = document.getElementById("myChart").getContext("2d");

    const monthlyData = {
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

    const dailyData = {
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

    const chart = new Chart(ctx, {
      type: "line",
      data: monthlyData,
      options: {
        responsive: true,
        maintainAspectRatio: false,
      },
    });
    document.getElementById("dailyBtn").addEventListener("click", () => {
      chart.data = dailyData;
      chart.update();
      toggleActive(document.getElementById("dailyBtn"));
    });

    document.getElementById("monthlyBtn").addEventListener("click", () => {
      chart.data = monthlyData;
      chart.update();
      toggleActive(document.getElementById("monthlyBtn"));
    });

    function toggleActive(button) {
      document.getElementById("dailyBtn").classList.remove("active-btn");
      document.getElementById("monthlyBtn").classList.remove("active-btn");
      button.classList.add("active-btn");
    }
  </script>
</html>

<?php
require "config.php";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Ambil data buku dengan status 'currently_reading' dan progress membaca jika ada
if (isset($user_id)) {
    $sql = "SELECT DISTINCT
        book.book_id,
        book.title,
        book.description,
        book.cover_image,
        book.file_path,
        COALESCE(ra.reading_progress, '0%') AS reading_progress
    FROM
        book
    LEFT JOIN
        reading_activity ra ON book.book_id = ra.book_id AND ra.user_id = :user_id
    WHERE
        book.status = 'currently_reading'";
    
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $result = $query->execute();
    
    if ($result) {
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $data = [];
        echo "Error fetching data";
    }
} else {
    $data = [];
    echo "User ID tidak ditemukan dalam session.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem</title>

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

    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    canvas {
        width: 100% !important;
        height: 300px !important;
        max-width: 100%;
    }
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
        line-clamp: 1;
        box-orient: vertical;
    }
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
    /* PDF viewer in reading modal */
    .pdf-viewer {
    max-width: 100%;
    width: 100%;
    overflow: hidden;
    margin: 0 auto;
    display : flex;
    justify-content: center;
    align-items: center;
    }
    #pdf-canvas {
    width: 30% !important;
    height: auto !important;
    }
    .pdf-viewer:hover {
        border-color: #93c5fd;
    }
    /* Styling untuk header modal */
    .modal-header-info {
        background-color: #f8f9fa;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        color: #333;
    }
    .modal-header-info span {
        margin-right: 20px;
    }
    /* Responsive adjustments */
    @media (max-width: 400px) {
        .pdf-viewer {
            height: 400px;
            overflow-x: hidden;
        }
        .modal-header-info {
            font-size: 0.9rem;
        }
        #pdf-canvas {
            max-width: 100%;
            height: auto;
        }
    }
</style>
</head>
<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
        <div class="container-fluid px-5">
            <img src="treadyicon.png" alt="web icon" class="mx-2" style="width: 50px; height: 63px;">
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
            <a href="settings.php" class="btn btn-light">
                <i class="bi bi-person-circle fs-5"></i>
            </a>
        </div>
    </nav>
    <!-- Akhir Nav Bar -->

    <!-- Awal Statistik -->
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
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <svg width="160" height="160" viewBox="0 0 100 100">
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
                                <div class="col-md-8">
                                    <h4 class="fw-bold">Monthly Book Explorer</h4>
                                    <p class="card-text">
                                        Finish 2 books within 30 days to stay on track with your reading goals.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-primary border rounded ms-auto">
                                            Continue
                                        </button>
                                        <h6 class="fw-bold display"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2 mb-2">
                                <div class="col-4">
                                    <svg width="160" height="160" viewBox="0 0 100 100">
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
                                <div class="col-md-8">
                                    <h4 class="fw-bold">7-Day Reading Streak</h4>
                                    <p class="card-text">
                                        Read at least 20 minutes per day for 7 consecutive days to build a consistent reading habit.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-primary border rounded ms-auto">
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
                                <button class="btn btn-primary active-btn" id="monthlyBtn">Monthly</button>
                                <button class="btn btn-primary" id="dailyBtn">Daily</button>
                            </div>
                            <canvas id="myChart"></canvas>
                            <script>
                                const ctx = document.getElementById("myChart").getContext("2d");

                                let monthlyData = {
                                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                    datasets: [{
                                        label: "Monthly Statistics",
                                        data: [10, 22, 2, 5, 17, 0, 1, 6, 12, 1, 0, 0],
                                        borderColor: "rgb(75, 192, 192)",
                                        backgroundColor: "rgb(75, 192, 192)",
                                        tension: 0.1,
                                    }],
                                };

                                let dailyData = {
                                    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                                    datasets: [{
                                        label: "Daily Statistics",
                                        data: [5, 12, 7, 9, 3, 5, 2],
                                        borderColor: "purple",
                                        backgroundColor: "purple",
                                        tension: 0.1,
                                    }],
                                };

                                let chart = new Chart(ctx, {
                                    type: "line",
                                    data: monthlyData,
                                    options: { responsive: true },
                                });

                                document.getElementById("dailyBtn").addEventListener("click", function () {
                                    chart.data = dailyData;
                                    chart.update();
                                    toggleActive(this);
                                });

                                document.getElementById("monthlyBtn").addEventListener("click", function () {
                                    chart.data = monthlyData;
                                    chart.update();
                                    toggleActive(this);
                                });

                                function toggleActive(button) {
                                    document.getElementById("dailyBtn").classList.remove("active-btn");
                                    document.getElementById("monthlyBtn").classList.remove("active-btn");
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
                            <div class="mt-4">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    <?php if (!empty($data)) : ?>
                                        <?php foreach ($data as $book) : ?>
                                            <div class="card mx-2 fixed-height-card" style="max-width: 432px">
                                                <div class="row g-0 py-3">
                                                    <div class="col-md-4" style="height: 204px">
                                                        <?php if ($book['cover_image']) : ?>
                                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($book['cover_image']); ?>" class="img-fluid rounded-start full-height-img" alt="<?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?>">
                                                        <?php else : ?>
                                                            <img src="path/to/default-image.jpg" class="img-fluid rounded-start full-height-img" alt="Default Cover">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?></h5>
                                                            <p class="card-text p-0">
                                                                <?php echo htmlspecialchars(substr($book['description'], 0, 150), ENT_QUOTES); ?>
                                                            </p>
                                                            <progress id="progress" value="<?php echo str_replace('%', '', $book['reading_progress']); ?>" max="100">
                                                                <?php echo htmlspecialchars($book['reading_progress'], ENT_QUOTES); ?>
                                                            </progress>
                                                            <!-- Tombol Continue -->
                                                            <button
                                                                type="button"
                                                                class="btn btn-primary position-absolute bottom-0 end-0 m-3"
                                                                data-book-id="<?php echo htmlspecialchars($book['book_id'], ENT_QUOTES); ?>"
                                                                data-title="<?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?>"
                                                                data-description="<?php echo htmlspecialchars($book['description'], ENT_QUOTES); ?>"
                                                                data-cover="<?php echo base64_encode($book['cover_image']); ?>"
                                                                data-filepath="<?php echo htmlspecialchars($book['file_path'], ENT_QUOTES); ?>"
                                                                onclick="showBookDetailFromElement(this)"
                                                            >
                                                            >
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p>Tidak ada buku yang sedang dibaca</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Modal -->
    <div class="modal fade" id="bookDetailModal" tabindex="-1" aria-labelledby="bookDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-size">
          <div class="modal-content p-4 shadow-lg rounded-4">
            <div class="modal-body text-center">
              <img id="detail-cover" class="img-fluid rounded-3 shadow-sm mb-4" style="max-width: 180px;" />
              <h3 id="detail-title" class="fw-semibold mb-3"></h3>
              <p id="detail-description" class="text-muted mb-3" style="font-size: 1rem;"></p>
              <p class="mb-4" style="font-size: 0.95rem;"><strong>Genre:</strong> <span id="detail-genre"></span></p>
              <button id="view-pdf-btn" class="btn btn-primary rounded-pill px-4" onclick="openReadingModal()">Read</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Section: Reading Modal -->
    <div class="modal fade reading-modal" id="readingModal" tabindex="-1" aria-labelledby="readingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body p-3 m-3">
                    <form action="readbook.php" method="POST">
                        <input type="hidden" name="book_id" id="book-id-input" value="">
                        <input type="hidden" name="progress" id="progress-input" value="">
                        <input type="hidden" name="current_page" id="current-page-input" value="">
                        <input type="hidden" name="timer" id="timer-input" value="">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                            <h3 id="reading-title" class="fw-bold text-primary mb-0"></h3>
                            <div class="modal-header-info d-flex gap-3">
                                <span><i class="fas fa-chart-line"></i> Progress: <span id="progress">0%</span></span>
                                <span><i class="fas fa-book-open"></i> Halaman: <span id="current-page">1</span> dari <span id="total-pages">1</span></span>
                                <span><i class="fas fa-clock"></i> Membaca: <span id="timer">0 menit</span></span>
                            </div>
                        </div>
                        <!-- PDF Viewer -->
                        <div class="pdf-viewer">
                            <canvas id="pdf-canvas"></canvas>
                        </div>
                        <!-- Navigasi Halaman -->
                        <div class="d-flex justify-content-center gap-2 my-3 flex-wrap mb-5">
                            <button type="button" class="btn btn-outline-primary btn-sm mx-5" id="prev-page"><i class="fas fa-arrow-left"></i> Previous</button>
                            <button type="submit" class="btn btn-success rounded-3 fw-bold" id="bookmark-button"><i class="fa-solid fa-bookmark mx-1"></i> Save Bookmark</button>
                            <button type="button" class="btn btn-danger rounded-3 fw-bold" id="close-button"><i class="fas fa-times mx-1"></i> Tutup</button>
                            <button type="button" class="btn btn-outline-primary btn-sm mx-5" id="next-page">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script src="home.js"></script>
</body>
</html>
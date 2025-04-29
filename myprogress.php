<?php
require "config.php";
include "getprogress.php";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Ambil data buku dengan status 'currently_reading' dan progress membaca jika ada
if (isset($user_id)) {
    $sql = "SELECT DISTINCT
        book.book_id,
        book.title,
        book.description,
        book.cover_image,
        book.file_path,
        COALESCE(ra.reading_progress, '0%') AS reading_progress,
        ra.activity_id -- Add activity_id to the query
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
    $book_target = 'Belum diatur';
    $streak_time = 'Belum diatur';
    
    $current_date = date('Y-m-d');
    
    $sql = "SELECT book_target 
            FROM reading_targets 
            WHERE user_id = :user_id 
            AND target_type = 'monthly' 
            AND :current_date BETWEEN target_start_date AND target_end_date";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':current_date', $current_date, PDO::PARAM_STR);
    $query->execute();
    $targetdata = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($targetdata && $targetdata['book_target'] > 0) {
        $book_target = $targetdata['book_target'];
    }
    
    $sql = "SELECT streak_time 
            FROM reading_targets 
            WHERE user_id = :user_id 
            AND target_type = 'streak'";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->execute();
    $targetdata = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($targetdata && $targetdata['streak_time'] > 0) {
        $streak_time = $targetdata['streak_time'];
    }
}
else {
    $data = [];
    echo "User ID tidak ditemukan dalam session.";

}
// Fetch data for the daily line chart
$daily_counts = array_fill(0, 7, 0); // Initialize array with 7 zeros
$daily_labels = ['Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday']; // Labels for April 23 to April 29, 2025

try {
    // Define the date range: last 7 days including today (April 29, 2025)
    $end_date = '2025-04-29'; // Today
    $start_date = date('Y-m-d', strtotime($end_date . ' -6 days')); // April 23, 2025

    // Query to count distinct completed books per day
    $sql = "SELECT DATE(reading_date) as reading_day, COUNT(DISTINCT book_id) as book_count
            FROM reading_activity
            WHERE user_id = :user_id
            AND reading_progress = 100
            AND reading_date BETWEEN :start_date AND :end_date
            GROUP BY DATE(reading_date)";
    
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
    $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    // Map the results to the daily_counts array
    foreach ($results as $row) {
        $day = $row['reading_day']; // e.g., '2025-04-25'
        $count = (int)$row['book_count'];

        // Calculate the index (0 to 6) based on the difference from start_date
        $day_index = (strtotime($day) - strtotime($start_date)) / (60 * 60 * 24);
        $day_index = (int)$day_index; // Convert to integer (0 to 6)

        if ($day_index >= 0 && $day_index < 7) {
            $daily_counts[$day_index] = $count;
        }
    }
} catch (PDOException $e) {
    echo "Error fetching daily chart data: " . $e->getMessage();
}
// Fetch data for the monthly line chart
$monthly_counts = array_fill(0, 12, 0);
$monthly_labels = ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'];

try {
    $end_date = '2025-04-30';
    $start_date = '2024-05-01';

    // Debug: Print the user_id
    echo "<pre>User ID: $user_id\n</pre>";

    $sql = "SELECT YEAR(reading_date) as reading_year, MONTH(reading_date) as reading_month, 
                   COUNT(DISTINCT book_id) as book_count
            FROM reading_activity
            WHERE user_id = :user_id
            AND reading_progress = 100
            AND reading_date BETWEEN :start_date AND :end_date
            GROUP BY YEAR(reading_date), MONTH(reading_date)";
    
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
    $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);


    foreach ($results as $row) {
        $year = (int)$row['reading_year'];
        $month = (int)$row['reading_month'];

        if ($year == 2024) {
            $month_index = $month - 5;
        } else {
            $month_index = $month + 7;
        }

        if ($month_index >= 0 && $month_index < 12) {
            $monthly_counts[$month_index] = (int)$row['book_count'];
        }
    }
} catch (PDOException $e) {
    echo "Error fetching monthly chart data: " . $e->getMessage();
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
        display: flex;
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
    /* Styling untuk modal set target */
    .custom-modal-size {
        max-width: 600px;
    }
    .modal-content {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        background: #ffffff;
    }
    .modal-header {
        background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        border-radius: 20px 20px 0 0 !important;
        font-weight: 600;
        font-size: 1.75rem;
        padding: 1.5rem;
    }
    .modal-body {
        padding: 2rem;
    }
    .form-label {
        font-weight: 500;
        color: #333;
        font-size: 1.25rem;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        transition: border-color 0.2s;
        font-size: 1.25rem;
        padding: 0.75rem;
        height: 50px;
    }
    .form-control:focus {
        border-color: #2575fc;
        box-shadow: 0 0 5px rgba(37, 117, 252, 0.3);
    }
    .btn-primary {
        background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 500;
        font-size: 1rem;
        transition: transform 0.1s;
    }
    .btn-primary:hover {
        transform: scale(1.05);
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
                                <div class="col-3">
                                <?php
                                // Calculate stroke-dashoffset for monthly progress
                                $monthly_progress = isset($monthly_progress) ? round($monthly_progress, 1) : 0;
                                $dasharray = 251.2; // Circumference of the circle (2 * π * 40)
                                $dashoffset = $dasharray * (1 - $monthly_progress / 100);
                                ?>
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
                                            stroke-dashoffset="<?php echo $dashoffset ; ?>"
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
                                        <?php echo $monthly_progress; ?>%
                                        </text>
                                    </svg>
                                </div>
                                <div class="col-md-9">
                                    <h4 class="fw-bold fs-2">Monthly Book Explorer</h4>
                                    <p class="card-text fs-5">
                                    <?php if ($book_target === 'Belum diatur'): ?>
                                            Target belum diatur. Silakan set target untuk memulai.
                                        <?php else: ?>
                                            Finish <?php echo htmlspecialchars($book_target, ENT_QUOTES); ?> books within 30 days to stay on track with your reading goals.
                                        <?php endif; ?>
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-primary border rounded ms-auto" data-bs-toggle="modal" data-bs-target="#setBookTargetModal">
                                            Set Target
                                        </button>
                                        <h6 class="fw-bold display"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2 mb-2">
                                <div class="col-3">
                                <?php
                                $streak_progress = isset($streak_progress) ? round($streak_progress, 1) : 0;
                                $dashoffset = $dasharray * (1 - $streak_progress / 100);
                                ?>
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
                                            stroke-dashoffset="<?php echo $dashoffset; ?>"
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
                                        <?php echo $streak_progress; ?>%
                                        </text>
                                    </svg>
                                </div>
                                <div class="col-md-9">
                                    <h4 class="fw-bold fs-2">7-Day Reading Streak</h4>
                                    <p class="card-text fs-5">
                                    <?php if ($streak_time === 'Belum diatur'): ?>
                                            Target belum diatur. Silakan set target untuk memulai.
                                        <?php else: ?>
                                            Read at least <?php echo htmlspecialchars($streak_time, ENT_QUOTES); ?> minutes per day for 7 consecutive days to build a consistent reading habit.
                                        <?php endif; ?>
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-primary border rounded ms-auto" data-bs-toggle="modal" data-bs-target="#setStreakTargetModal">
                                            Set Target
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
        labels: <?php echo json_encode($monthly_labels); ?>,
        datasets: [{
            label: "Monthly Statistics",
            data: <?php echo json_encode($monthly_counts); ?>,
            borderColor: "rgb(75, 192, 192)",
            backgroundColor: "rgb(75, 192, 192)",
            tension: 0.1,
        }],
    };

    let dailyData = {
        labels: <?php echo json_encode($daily_labels); ?>,
        datasets: [{
            label: "Daily Statistics",
            data: <?php echo json_encode($daily_counts); ?>,
            borderColor: "purple",
            backgroundColor: "purple",
            tension: 0.1,
        }],
    };

    let chart = new Chart(ctx, {
        type: "line",
        data: monthlyData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true, // Start the y-axis at 0
                    max: 10, // Set a higher maximum for monthly data (adjust as needed)
                    ticks: {
                        stepSize: 1, // Use whole numbers (1, 2, 3, etc.)
                        callback: function(value) {
                            return Number.isInteger(value) ? value : ''; // Show only whole numbers
                        }
                    },
                    title: {
                        display: true,
                        text: 'Number of Books Completed'
                    }
                }
            }
        }
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
                                                            <progress id="progress" class = "fs-4" value="<?php echo str_replace('%', '', $book['reading_progress']); ?>" max="100">
                                                                <?php echo htmlspecialchars($book['reading_progress'], ENT_QUOTES); ?>
                                                            </progress>
                                                            <p><?php echo htmlspecialchars($book['reading_progress']) ;?>%</p>
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
    <!-- Modal untuk Monthly Book Explorer -->
<div class="modal fade" id="setBookTargetModal" tabindex="-1" aria-labelledby="setBookTargetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-size">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="setBookTargetModalLabel">Set Monthly Book Target</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="settarget.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="target_type" value="monthly">
                    <div class="mb-5">
                        <label for="bookTarget" class="form-label">Number of Books to Complete This Month</label>
                        <input type="number" class="form-control" id="bookTarget" name="book_target" min="1" placeholder="Enter number of books" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Target</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk 7-Day Reading Streak -->
<div class="modal fade" id="setStreakTargetModal" tabindex="-1" aria-labelledby="setStreakTargetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-size">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="setStreakTargetModalLabel">Set Daily Reading Streak Target</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="settarget.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="target_type" value="streak">
                    <div class="mb-5">
                        <label for="streakTime" class="form-label">Daily Reading Time for Streak (in minutes)</label>
                        <input type="number" class="form-control" id="streakTime" name="streak_time" min="1" placeholder="Enter minutes per day" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Target</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script src="home.js"></script>
</body>
</html>
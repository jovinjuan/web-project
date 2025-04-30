<?php
require "config.php";

if(cekLogin()){
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    // Mengambil data ranking berdasarkan streak
    $query = "SELECT username, streak FROM user ORDER BY streak DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem</title>
    <style>
        /* Styling Sidebar */
        .sidebar {
            min-height: 100vh;
            background: #f8f9fa;
            padding: 20px;
        }

        /* Ranking List */
        .ranking-container {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .ranking-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .ranking-item:last-child {
            border-bottom: none;
        }

        .ranking-item .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 10px;
        }

        /* Highlighted User */
        .highlight {
            background: #555;
            color: white;
            border-radius: 10px;
        }

        /* Badges Section */
        .badges-container {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .badge-box {
            width: 80px;
            height: 100px;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }

        .sidebar-profile {
            text-align: center;
            padding: 10px;
        }

        .sidebar-profile img {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background-color: #555; /* Gray circle */
            display: block;
            margin: 0 auto;
            object-fit: cover;
        }

        .achievement-content {
            padding-top: 100px; /* Ditambah jarak dari navbar */
        }

        /* Responsive untuk mobile */
        @media (max-width: 768px) {
            .achievement-content {
                padding-top: 120px !important; /* biar gak ketiban navbar */
            }
        }
        .highlight {
            background-color:#007bff;
            padding: 10px;
            border-radius: 6px;
            }
        .rank-col {
            width: 60px;
        }

        .username-col {
            flex-grow: 1;
        }

        .streak-col {
            width: 140px;
            text-align: right;
        }

        .ranking-item {
            padding: 8px 0;
            border-radius: 8px;
        }

    </style>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>
    <!-- Nav Bar -->
    <?php include 'Navbar.php'; ?>
    <!-- Akhir Nav Bar -->

    <div class="container-fluid">
        <div class="row achievement-content">
            
            <!-- Statistics -->
            <?php
                $query = "
                    SELECT 
                        COUNT(DISTINCT r.book_id) AS total_books_read,
                        SUM(r.current_pages) AS total_pages_read,
                        ROUND(SUM(r.reading_duration) / 60, 2) AS total_duration_read
                    FROM reading_activity r
                    JOIN book b ON r.book_id = b.book_id
                    WHERE r.user_id = :user_id;
                ";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll since you only get one row
                ?>

                <div class="container text-center my-4">
                <h3 class="fw-bold">
                Reading Journey
            </h3>
                <div class="row me-4">
                    <div class="col-md-4">
                    <img src="Image/book.png" alt="Book" class="img-fluid" style="max-height: 295px;">
                    <p class="mt-2 fs-3 fw-bold">
                        <span style="font-size:40pt;">
                        <?= htmlspecialchars($result['total_books_read'] ?? 0
                        ) ?>
                        </span>
                        books explored!
                    </p>
                    <p>
                    You're creating a library of stories!
                    </p>
                    </div>
                    <div class="col-md-4">
                    <img src="Image/Reading.png" alt="Pages" class="img-fluid" style="max-height: 300px;">
                    <p class="mt-2 fs-3 fw-bold">
                    <span style="font-size:40pt;">
                        <?= htmlspecialchars($result['total_pages_read'] ?? 0
                        ) ?> 
                        </span>
                        pages read! 
                    </p>
                    <p>
                    You're turning pages like a pro.
                    </p>
                    </div>
                    <div class="col-md-4">
                    <img src="Image/Duration.png" alt="Duration" class="img-fluid" style="max-height: 295px;">
                    <p class="mt-2 fs-3 fw-bold">
                    <span style="font-size:40pt;">
                        <?= htmlspecialchars($result['total_duration_read'] ?? 0
                        ) ?> 
                        </span>
                        minutes of reading! 
                    </p>
                    <p>
                    Your dedication is inspiring.
                    </p>
                    </div>
                </div>
                </div>


                <div class="container my-4">
    <div class="row">
    
        <!-- Ranking Section -->
        <div class="col-md-7 p-4">
            <div class="ranking-container">
                <!-- Header Row -->
                <div class="d-flex fw-bold text-secondary mb-2 px-3">
                    <div class="rank-col">Rank</div>
                    <div class="username-col">Username</div>
                    <div class="streak-col text-end">Streaks</div>
                </div>

                <!-- Ranking Data -->
                <?php 
                $rank = 1;
                foreach ($ranking as $user) {
                    $highlightClass = ($user['username'] === $username) ? 'highlight' : '';
                    echo '
                    <div class="d-flex px-3 ranking-item ' . $highlightClass . '">
                        <div class="rank-col">' . $rank++ . '</div>
                        <div class="username-col">' . htmlspecialchars($user['username']) . '</div>
                        <div class="streak-col text-end">' . $user['streak'] . '</div>
                    </div>';
                }
                ?>
            </div>
        </div>

        <!-- Badges Section -->
        <?php
        $query = "
        SELECT COUNT(DISTINCT r.book_id) AS total_books_read
        FROM reading_activity r
        JOIN book b ON r.book_id = b.book_id
        WHERE r.user_id = :user_id AND r.current_pages = b.pages
        ";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $totalBooks = $result['total_books_read'];

        $badgeImage = '';
        $badgeTitle = '';
        $badgeSubtitle = '';

        if ($totalBooks >= 80) {
            $badgeImage = 'Image/Medal1.jpg';
            $badgeTitle = 'Book Master';
            $badgeSubtitle = '80+ books read!';
        } elseif ($totalBooks >= 40) {
            $badgeImage = 'Image/Medal2.jpg';
            $badgeTitle = 'Book Champ';
            $badgeSubtitle = '40+ books read!';
        } elseif ($totalBooks >= 3) {
            $badgeImage = 'Image/Medal3.jpg';
            $badgeTitle = 'Book Explorer';
            $badgeSubtitle = '20+ books read!';
        } else {
            $badgeImage = 'Image/Medal3.jpg';
            $badgeTitle = 'Start Reading!';
            $badgeSubtitle = 'Finish books to earn badges!';
        }
        ?>

        <!-- Book Total Badge & Duration Badge in one row -->
        <div class="col-md-5 p-4">
            <div class="row g-3">
                <!-- Book Total Badge -->
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($badgeTitle) ?></h5>
                            <img src="<?= htmlspecialchars($badgeImage) ?>" alt="Book Badge" style="height:200px;">
                            <p class="card-subtitle text-muted"><?= htmlspecialchars($badgeSubtitle) ?></p>
                        </div>
                    </div>
                </div>

                <?php
                // Recalculate for duration badge
                $query = "SELECT SUM(reading_duration) AS total_duration_read FROM reading_activity WHERE user_id = :user_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $duration_minutes = round($result['total_duration_read'] / 60, 2);

                $durationBadgeImage = '';
                $durationBadgeTitle = '';
                $durationBadgeSubtitle = '';

                if ($duration_minutes >= 80) {
                    $durationBadgeImage = 'Image/Medal1.jpg';
                    $durationBadgeTitle = 'Reading Master';
                    $durationBadgeSubtitle = '80+ mins of reading!';
                } elseif ($duration_minutes >= 40) {
                    $durationBadgeImage = 'Image/Medal2.jpg';
                    $durationBadgeTitle = 'Reading Champ';
                    $durationBadgeSubtitle = '40+ mins of reading!';
                } elseif ($duration_minutes >= 20) {
                    $durationBadgeImage = 'Image/Medal3.jpg';
                    $durationBadgeTitle = 'Reading Starter';
                    $durationBadgeSubtitle = '20+ mins of reading!';
                } else {
                    $durationBadgeImage = 'Image/Medal3.jpg';
                    $durationBadgeTitle = 'Keep Going!';
                    $durationBadgeSubtitle = 'Read more to earn a badge!';
                }
                ?>

                <!-- Duration Badge -->
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($durationBadgeTitle) ?></h5>
                            <img src="<?= htmlspecialchars($durationBadgeImage) ?>" alt="Duration Badge" style="height:200px;">
                            <p class="card-subtitle text-muted"><?= htmlspecialchars($durationBadgeSubtitle) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
} else {
    header('location:index.php');
}
?>

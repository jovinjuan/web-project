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
            padding-top: 0px; /* default (desktop) */
        }

        /* Responsive untuk mobile */
        @media (max-width: 768px) {
            .achievement-content {
                padding-top: 120px !important; /* biar gak ketiban navbar */
            }
        }
    </style>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>
    <!-- Nav Bar -->
    <?php include 'Navbar.php';
    ?>
    <!-- Akhir Nav Bar -->
    <div class="container-fluid">
        <div class="row achievement-content">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar pt-5 mt-5">
          <div class="sidebar-profile">
            <img id="profile-img" src="" alt="" />
            <h4 class="pt-3"><?php echo htmlspecialchars($username); ?></h4>
            <?php
            $userRank = 0;
            foreach ($ranking as $i => $user) {
                if ($user['username'] === $username) {
                    $userRank = $i + 1; // karena index mulai dari 0
                    break;
                }
            }
            ?>
            <h5 class="fw-normal">Rank: <?php echo $userRank; ?></h5>
            
          </div>
        </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4 mt-5 pt-5">
                <!-- Ranking List -->
                <h5>Ranking</h5>
                <div class="ranking-container">
                    <?php 
                    $rank = 1;
                    foreach ($ranking as $user) {
                        $highlightClass = ($user['username'] === $username) ? 'highlight' : '';
                        echo '<div class="ranking-item ' . $highlightClass . '">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rank-number">' . $rank++ . '</div>
                                <div class="avatar"></div>
                                <div class="username">' . htmlspecialchars($user['username']) . '</div>
                            </div>
                            <div class="streak">' . $user['streak'] . '</div>
                        </div>';
                    }
                    ?>
                </div>

                

                <!-- Badges Section -->
                <div class="badges-container">
                    <h5>Badges</h5>
                    <div class="d-flex gap-3">
                        <div class="badge-box"></div>
                        <div class="badge-box"></div>
                        <div class="badge-box"></div>
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

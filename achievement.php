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
        padding-top: 20px;
      }
    </style>
    

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  </head>
  <body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container-fluid px-5">
        <img src="treadyicon.png" alt="web icon" class = "mx-2" style = "width : 50px;  height : 63px;">
        <a class="navbar-brand" href="#" >Tready</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Area Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myprogress.php">My Progress</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="achivement.php">Achievement</a>
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
              <input class="form-control me-2 w-80" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
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
    <div class="container-fluid">
        <div class="row achievement-content">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar pt-5 mt-5">
          <div class="sidebar-profile">
            <img id="profile-img" src="" alt="" />
            <h4 class="pt-3">User Name</h4>
            <h5 class="fw-normal">Rank: 90</h5>
          </div>
        </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4 mt-5 pt-5">
                <!-- Ranking List -->
                <h5>Ranking</h5>
                <div class="ranking-container">
                    <div class="ranking-item">
                        <span>1</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>
                    <div class="ranking-item">
                        <span>2</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>
                    <div class="ranking-item">
                        <span>3</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>
                    <div class="ranking-item">
                        <span>4</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>
                    <div class="ranking-item">
                        <span>5</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>

                    <!-- Highlighted User -->
                    <div class="ranking-item highlight mt-2">
                        <span>90</span>
                        <div class="d-flex align-items-center">
                            <div class="avatar"></div>
                            <span>Name</span>
                        </div>
                        <span>xxxx</span>
                    </div>
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
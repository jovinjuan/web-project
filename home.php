
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem</title>

    <link rel="stylesheet" href="css/style.css" />

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
      body {
        padding-top: 90px;
      }

      /* sidebar */
      .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background: #333;
        color: white;
        padding-top: 20px;
        z-index: 1000; /* sidebar akan selalu di depan */
      }

      /* saat sidebar terbuka */
      .sidebar.active {
        left: 0;
      }

      .sidebar h4 {
        padding-top: 90px;
        padding-left: 20px;
      }

      .sidebar h5 {
        padding-left: 20px;
      }

      .sidebar label {
        padding-left: 20px;
      }

      /* lapisan gelas pas buka side bar*/
      .backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
      }

      .backdrop.active {
        display: block;
      }

      /* tombol ☰ */
      .menu-btn {
        font-size: 30px;
        border-color: rgba(0, 0, 0, 0);
        background-color: white;
        box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        cursor: pointer;
        position: absolute;
        top: 100px;
        left: 0px;
      }

      /* kurangi padding section */
      .content {
        margin-left: 0;
        padding-right: 10px;
      }

      /* ketika sidebar aktif, maka content otomatis menyusut */
      .content.padding {
        margin-left: 250px;
      }

      .section {
        padding-left: 40px;
        margin: 20px;
        border-radius: 10px;
        position: relative;
        height: 230px;
      }

      .section h4 {
        margin-bottom: 15px;
      }

      .book-container {
        display: flex;
        gap: 10px;
      }

      .book {
        width: 150px;
        height: 200px;
        background: #ddd;
        border-radius: 5px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* tombol "+" di tengah kotak buku  */
      .add-book-btn {
        position: absolute;
        background: rgb(93, 92, 92);
        color: white;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
        font-size: 45px;
      }

      /* explore button */
      .explore-btn {
        margin-right: 60px;
        position: absolute;
        top: 0px;
        right: 10px;
        background: #0d6efd;
        color: white;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
        font-size: 15px;
      }

      .section-divider {
        border: none;
        height: 2px;
        background-color: grey;
        margin: 0;
      }
    </style>

    <script>
      function toggleSidebar() {
        let sidebar = document.getElementById("sidebar");
        let backdrop = document.getElementById("backdrop");
        let content = document.getElementById("content");
        let sections = document.querySelectorAll(".section"); // ambil semua elemen dengan class "section"

        sidebar.classList.toggle("active");
        backdrop.classList.toggle("active");
        content.classList.toggle("padding");

        sections.forEach((section) => {
          section.classList.toggle("padding");
        });
      }

      function closeSidebar() {
        let sidebar = document.getElementById("sidebar");
        let backdrop = document.getElementById("backdrop");
        let content = document.getElementById("content");
        let sections = document.querySelectorAll(".section");

        sidebar.classList.remove("active");
        backdrop.classList.remove("active");
        content.classList.remove("padding");

        sections.forEach((section) => {
          section.classList.remove("padding");
        });
      }
    </script>
  </head>
  <body class="bg-light">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container-fluid px-5">
      <img src="treadyicon.png" alt="web icon" class = "mx-2" style = "width : 50px; , height : 50px;">
        <a class="navbar-brand" href="#" >Tready</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Area Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myprogress.php">My Progress</a>
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

    <!-- Tombol ☰ -->
    <button class="menu-btn position-fixed" onclick="toggleSidebar()">&#9776;</button>

    <!-- Backdrop -->
    <div class="backdrop" id="backdrop" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <h4 class="fw-bold">Filter All Books</h4>
      <h5 class="pt-3">I'm in the mood for something...</h5>
      <label><input type="checkbox" /> inspiring</label>
      <br />
      <label><input type="checkbox" /> challenging</label>
      <br />
      <label><input type="checkbox" /> emotional</label>
      <br />
      <label><input type="checkbox" /> funny</label>
      <br />
      <label><input type="checkbox" /> mysterious</label>
      <br />
      <label><input type="checkbox" /> relaxing</label>
      <br />
      <label><input type="checkbox" /> informative</label>
      <br />

      <h5 class="pt-3">Type</h5>
      <label><input type="checkbox" /> Fiction</label>
      <label><input type="checkbox" /> Non-Fiction</label>

      <h5 class="pt-3">Genres</h5>
      <label><input type="checkbox" /> Action</label> <br />
      <label><input type="checkbox" /> Fantasy</label> <br />
      <label><input type="checkbox" /> Romance</label> <br />
      <label><input type="checkbox" /> Comedy</label> <br />
      <label><input type="checkbox" /> Horror</label> <br />
      <label><input type="checkbox" /> Thriller</label> <br />
    </div>

    <!-- Konten -->
    <div class="content" id="content">
      <!-- Section: Currently Reading -->
      <div class="section">
        <h4>Currently Reading</h4>
        <button class="explore-btn">Explore</button>
        <div class="book-container">
          <div class="book">
            <div class="add-book-btn"><a href="Uploadfile.php" style = "text-decoration : none; color : lightgrey;">+</a></div>
          </div>
        </div>
      </div>
      <br />
      <hr class="section-divider" />

      <!-- Section: To Read -->
      <div class="section">
        <h4>To Read</h4>
        <button class="explore-btn">Explore</button>
        <div class="book-container">
          <div class="book">
            <div class="add-book-btn"><a href="Uploadfile.php" style = "text-decoration : none; color : lightgrey;">+</a></div>
          </div>
        </div>
      </div>
      <br />
      <hr class="section-divider" />

      <!-- Section: Favourite Book -->
      <div class="section">
        <h4>Favourite Book Lists</h4>
        <button class="explore-btn">Explore</button>
        <div class="book-container">
          <div class="book">
            <div class="add-book-btn"><a href="Uploadfile.php" style = "text-decoration : none; color : lightgrey;">+</a></div>
          </div>
        </div>
      </div>
      <br />
    </div>
  </body>
</html>
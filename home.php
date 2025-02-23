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
        font-family: sans-serif;
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

      /* kalau misalnya ada bbrp buku, jarak per buku itu sbsr 10px */
      .book-container {
        display: flex;
        gap: 10px;
      }

      /* kotak buku */
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
        line-height: 50px;
        cursor: pointer;
        font-size: 45px;
      }

      /* explore button */
      .explore-btn {
        margin-right: 60px;
        position: absolute;
        top: 0px;
        right: 20px;
        background: #0d6efd;
        color: white;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
        font-size: 15px;
      }

      /* add button untuk berada di pojok kanan bawah */
      .add-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: grey;
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        cursor: pointer;
        font-size: 45px;
      }

      /* garis horizontal untuk area perbatasan per section */
      .section-divider {
        border: none;
        height: 2px;
        background-color: grey;
        margin: 0;
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
      <div class="container">
        <i class="bi bi-box-fill"></i>
        <a class="navbar-brand" href="#">[Nama Sistem]</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- area navigation -->
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
    <!-- akhir nav bar -->

    <!-- section: currently reading -->
    <div class="section">
      <h4>Currently Reading</h4>
      <button class="explore-btn">Explore</button>
      <div class="book-container">
        <div class="book">
          <div class="add-book-btn">+</div>
        </div>
      </div>
    </div>
    <br />
    <hr class="section-divider" />

    <!-- section: to read -->
    <div class="section">
      <h4>To Read</h4>
      <button class="explore-btn">Explore</button>
      <div class="book-container">
        <div class="book">
          <div class="add-book-btn">+</div>
        </div>
      </div>
    </div>
    <br />
    <hr class="section-divider" />

    <!-- section: savourite book lists -->
    <div class="section">
      <h4>Favourite Book Lists</h4>
      <button class="explore-btn">Explore</button>
      <div class="book-container">
        <div class="book">
          <div class="add-book-btn">+</div>
        </div>
      </div>
    </div>
    <br />

    <!-- add button yang ada di pojok bawah kanan -->
    <div class="add-btn">+</div>
  </body>
</html>

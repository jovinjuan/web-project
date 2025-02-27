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
    <style>
      /* Membatasi deskripsi agar tidak melebihi beberapa baris */
      .card-text {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        display: box;
        line-clamp: 4; /* Standard property (not fully supported yet) */
        box-orient: vertical;
      }
      .inProgressTitle {
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
          <div class="col-7">
            <div class="card px-3 pt-2">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                  Card subtitle
                </h6>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>
          <!-- Line Chart -->
          <div class="col-5">
            <div class="card px-3 pt-2">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                  Card subtitle
                </h6>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>
          <!-- In Progress -->
          <div class="col">
            <div class="card px-3 pt-2">
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
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img
                            src="..."
                            class="img-fluid rounded-start"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title inProgressTitle">
                              ducimus qui blanditiis praesentium
                            </h5>
                            <p class="card-text">
                              "At vero eos et accusamus et iusto odio
                              dignissimos ducimus qui blanditiis praesentium
                              voluptatum deleniti atque corrupti quos dolores et
                              quas molestias excepturi sint occaecati cupiditate
                              non provident, similique sunt in culpa qui officia
                              deserunt mollitia animi, id est laborum et dolorum
                              fuga.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 2 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img
                            src="..."
                            class="img-fluid rounded-start"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title inProgressTitle">
                              ducimus qui blanditiis praesentium
                            </h5>
                            <p class="card-text">
                              "At vero eos et accusamus et iusto odio
                              dignissimos ducimus qui blanditiis praesentium
                              voluptatum deleniti atque corrupti quos dolores et
                              quas molestias excepturi sint occaecati cupiditate
                              non provident, similique sunt in culpa qui officia
                              deserunt mollitia animi, id est laborum et dolorum
                              fuga.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 3 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img
                            src="..."
                            class="img-fluid rounded-start"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title inProgressTitle">
                              ducimus qui blanditiis praesentium
                            </h5>
                            <p class="card-text">
                              "At vero eos et accusamus et iusto odio
                              dignissimos ducimus qui blanditiis praesentium
                              voluptatum deleniti atque corrupti quos dolores et
                              quas molestias excepturi sint occaecati cupiditate
                              non provident, similique sunt in culpa qui officia
                              deserunt mollitia animi, id est laborum et dolorum
                              fuga.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card 4 -->
                    <div
                      class="card mx-2 fixed-height-card"
                      style="max-width: 432px"
                    >
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img
                            src="..."
                            class="img-fluid rounded-start"
                            alt="..."
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title inProgressTitle">
                              ducimus qui blanditiis praesentium
                            </h5>
                            <p class="card-text">
                              "At vero eos et accusamus et iusto odio
                              dignissimos ducimus qui blanditiis praesentium
                              voluptatum deleniti atque corrupti quos dolores et
                              quas molestias excepturi sint occaecati cupiditate
                              non provident, similique sunt in culpa qui officia
                              deserunt mollitia animi, id est laborum et dolorum
                              fuga.
                            </p>
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


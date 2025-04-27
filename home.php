<?php
require "config.php";
if(isset( $_SESSION['user_id']) && isset($_SESSION['book_id'])){
  $user_id = $_SESSION['user_id'];
  $book_id = $_SESSION['book_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
      /* Minimal custom CSS for specific adjustments */
      body {
        padding-top: 90px;
      }

      /* Sidebar */
      .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        overflow-y: auto;
        padding-top: 0;
        z-index: 1000;
        transition: left 0.3s ease;
      }

      .sidebar.active {
        left: 0;
      }

      /* Backdrop for sidebar */
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

      /* Menu button */
      .menu-btn {
        font-size: 30px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        position: absolute;
        top: 100px;
        left: 0;
      }

      /* Content padding when sidebar is active */
      .content.padding {
        margin-left: 250px;
      }

      /* Book container */
      .book {
        width: 150px;
        min-height: 200px;
        border-radius: 5px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* Add book button */
      .add-book-btn {
        position: absolute;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        text-align: center;
        line-height: 40px;
        font-size: 45px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      /* PDF viewer in reading modal */
      .pdf-viewer {
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        width: 100%;
        height: 500px;
        overflow-y: auto;
        background: #ffffff;
        transition: border-color 0.3s ease;
      }

      .pdf-viewer:hover {
        border-color: #93c5fd;
      }

      /* Responsive adjustments */
      @media (max-width: 400px) {
        .menu-btn {
          top: 70px;
          left: 10px;
          z-index: 1001;
        }

        .sidebar {
          width: 100%;
          left: -100%;
        }

        .sidebar.active {
          left: 0;
        }

        .content {
          margin-left: 0 !important;
        }

        .book {
          width: 120px;
          height: 160px;
        }

        .add-book-btn {
          width: 40px;
          height: 40px;
          line-height: 30px;
          font-size: 30px;
        }

        .pdf-viewer {
          height: 400px;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- Nav Bar -->
    <?php include 'Navbar.php'; ?>
    <!-- Akhir Nav Bar -->

    <!-- Tombol ☰ -->
    <button class="menu-btn position-fixed btn btn-light shadow-sm" onclick="toggleSidebar()">☰</button>

    <!-- Backdrop -->
    <div class="backdrop" id="backdrop" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white" id="sidebar">
      <div class="p-4 pt-5">
        <h4 class="fw-bold">Filter All Books</h4>
        <h5 class="pt-3">Genres</h5>
        <label><input type="checkbox" onchange="applyFilters()"> Action</label><br />
        <label><input type="checkbox" onchange="applyFilters()"> Fantasy</label><br />
        <label><input type="checkbox" onchange="applyFilters()"> Romance</label><br />
        <label><input type="checkbox" onchange="applyFilters()"> Comedy</label><br />
        <label><input type="checkbox" onchange="applyFilters()"> Horror</label><br />
        <label><input type="checkbox" onchange="applyFilters()"> Thriller</label>
      </div>
    </div>

    <?php
    // Ambil data buku yang sudah di-upload dari database
    $query = $conn->prepare("SELECT * FROM book");
    $query->execute();
    $files = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Konten -->
    <div class="content px-5 my-5" id="content">
      <!-- Section: Currently Reading -->
      <div class="section p-4 bg-white rounded-3 shadow-sm mb-4">
        <h4 class="fw-bold mb-3">Currently Reading</h4>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach($files as $file): ?>
            <div class="book bg-light me-2" 
                data-book-id="<?php echo htmlspecialchars($file['book_id'], ENT_QUOTES); ?>"
                data-title="<?php echo htmlspecialchars($file['title'], ENT_QUOTES); ?>"
                data-description="<?php echo htmlspecialchars($file['description'], ENT_QUOTES); ?>"
                data-genre="<?php echo htmlspecialchars($file['genre'], ENT_QUOTES); ?>"
                data-cover="<?php echo base64_encode($file['cover_image']); ?>"
                data-filepath="<?php echo htmlspecialchars($file['file_path'], ENT_QUOTES); ?>"
                onclick="showBookDetailFromElement(this)">
              <?php
              if ($file['cover_image']) {
                $coverImageData = base64_encode($file['cover_image']);
                echo '<img src="data:image/jpeg;base64,' . $coverImageData . '" alt="Book" class="w-100 h-100 object-fit-cover rounded-2">';
              }
              ?>
            </div>
          <?php endforeach; ?>
          <div class="book bg-light me-2">
            <div class="add-book-btn bg-secondary text-white">
              <a href="Uploadfile.php" class="text-decoration-none text-light">+</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Section: To Read -->
      <div class="section p-4 bg-white rounded-3 shadow-sm mb-4">
        <h4 class="fw-bold mb-3">To Read</h4>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach($files as $file): ?>
            <div class="book bg-light me-2" 
              data-book-id="<?php echo htmlspecialchars($file['book_id'], ENT_QUOTES); ?>"
              data-title="<?php echo htmlspecialchars($file['title'], ENT_QUOTES); ?>"
              data-description="<?php echo htmlspecialchars($file['description'], ENT_QUOTES); ?>"
              data-genre="<?php echo htmlspecialchars($file['genre'], ENT_QUOTES); ?>"
              data-cover="<?php echo base64_encode($file['cover_image']); ?>"
              data-filepath="<?php echo htmlspecialchars($file['file_path'], ENT_QUOTES); ?>"
              onclick="showBookDetailFromElement(this)">
              <?php
              if ($file['cover_image']) {
                $coverImageData = base64_encode($file['cover_image']);
                echo '<img src="data:image/jpeg;base64,' . $coverImageData . '" alt="Book" class="w-100 h-100 object-fit-cover rounded-2">';
              }
              ?>
            </div>
          <?php endforeach; ?>
          <div class="book bg-light me-2">
            <div class="add-book-btn bg-secondary text-white">
              <a href="Uploadfile.php" class="text-decoration-none text-light">+</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Section: Favourite Book -->
      <div class="section p-4 bg-white rounded-3 shadow-sm mb-4">
        <h4 class="fw-bold mb-3">Favourite Book</h4>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach($files as $file): ?>
            <div class="book bg-light me-2" 
              data-book-id="<?php echo htmlspecialchars($file['book_id'], ENT_QUOTES); ?>"
              data-title="<?php echo htmlspecialchars($file['title'], ENT_QUOTES); ?>"
              data-description="<?php echo htmlspecialchars($file['description'], ENT_QUOTES); ?>"
              data-genre="<?php echo htmlspecialchars($file['genre'], ENT_QUOTES); ?>"
              data-cover="<?php echo base64_encode($file['cover_image']); ?>"
              data-filepath="<?php echo htmlspecialchars($file['file_path'], ENT_QUOTES); ?>"
              onclick="showBookDetailFromElement(this)">
              <?php
              if ($file['cover_image']) {
                $coverImageData = base64_encode($file['cover_image']);
                echo '<img src="data:image/jpeg;base64,' . $coverImageData . '" alt="Book" class="w-100 h-100 object-fit-cover rounded-2">';
              }
              ?>
            </div>
          <?php endforeach; ?>
        
        <div class="book bg-light me-2">
          <div class="add-book-btn bg-secondary text-white">
            <a href="Uploadfile.php" class="text-decoration-none text-light">+</a>
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
            <form action = "readbook.php" method = "POST">
            <input type="hidden" name="book_id" id="book-id-input" value="">
            <input type="hidden" name="progress" id="progress-input" value="">
            <input type="hidden" name="current_page" id="current-page-input" value="">
            <input type="hidden" name="timer" id="timer-input" value="">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
              <h3 id="reading-title" class="fw-bold text-primary mb-0"></h3>
              <div class="d-flex gap-3 p-2 bg-light rounded-3 shadow-sm small">
                <span><i class="fas fa-chart-line"></i> Progress: <span id="progress">0%</span></span>
                <span><i class="fas fa-book-open"></i> Halaman: <span id="current-page">1</span> dari <span id="total-pages">1</span></span>
                <span><i class="fas fa-clock"></i> Membaca: <span id="timer">0 menit</span></span>
              </div>
            </div>
            <!-- PDF Viewer -->
            <div class="pdf-viewer d-flex justify-content-center align-items-center" style="height: calc(100vh - 200px);">
              <canvas id="pdf-canvas" style="max-width: 100%; height: 100%;"></canvas>
            </div>

            <!-- Navigasi Halaman -->
            <div class="d-flex justify-content-center gap-2 my-3 flex-wrap mb-5">
              <button type = "button" class="btn btn-outline-primary btn-sm mx-5" id="prev-page"><i class="fas fa-arrow-left"></i> Previous</button>
              <button type = "submit" class="btn btn-success rounded-3 fw-bold" id="bookmark-button"><i class="fa-solid fa-bookmark mx-1"></i> Save Bookmark</button>
              <button type = "button" class="btn btn-danger rounded-3 fw-bold" id="close-button"><i class="fas fa-times mx-1"></i> Tutup</button>
              <button type = "button" class="btn btn-outline-primary btn-sm mx-5" id="next-page">Next <i class="fas fa-arrow-right"></i></button>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-center gap-3 mt-3">
              
            </div>
            
            </form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
  <script src="home.js"></script>
  </body>
</html>
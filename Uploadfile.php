<?php
require 'config.php';
require_once('fpdf/fpdf.php'); // Require FPDF library
require_once('fpdi/src/autoload.php'); // Require  FPDI library

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre = isset($_POST['genre']) ? implode(", ", $_POST['genre']) : '';  // Combine genre values into a string

    // Cek apakah file diupload
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Tentukan folder penyimpanan
        $uploadFileDir = 'uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        // Validasi ekstensi dan ukuran file
        $allowedExtensions = ['pdf'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB

        if (!in_array($fileExtension, $allowedExtensions)) {
            header("Location: Uploadfile.php?error=invalid_file_extension");
            exit;
        }

        if ($fileSize > $maxFileSize) {
            header("Location: Uploadfile.php?error=file_too_large");
            exit;
        }

        // Biar nama file unik
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension; 
        $dest_path = $uploadFileDir . $newFileName; 

        // Pindahkan file ke folder upload
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
           //Hitung Jumlah Halaman Buku
           $pdf = new \setasign\Fpdi\Fpdi();
           $pdf->setSourceFile($dest_path); 
           $pageCount = $pdf->setSourceFile($dest_path); 

            //Masukkan ke database
            if (isset($_FILES['cover_images']) && $_FILES['cover_images']['error'] === 0) {
              $coverImageTmpPath = $_FILES['cover_images']['tmp_name'];
              $coverImageContent = file_get_contents($coverImageTmpPath); // Baca File Sebagai BLOB

              // Masukkan Data ke Database
              $query = $conn->prepare("INSERT INTO book (author, title, description, genre, pages, file_path, cover_image)
              VALUES (:author, :title, :description, :genre, :pages, :file_path, :cover_image)");
              $query->bindParam(':author', $author);
              $query->bindParam(':title', $title);
              $query->bindParam(':description', $description);
              $query->bindParam(':genre', $genre);
              $query->bindParam(':pages', $pageCount);
              $query->bindParam(':file_path', $dest_path);
              $query->bindParam(':cover_image', $coverImageContent, PDO::PARAM_LOB); // Masukkan Menjadi BLOB

              if ($query->execute()) {
                  header("Location: home.php?upload=success");
                  exit;
              } else {
                  header("Location: Uploadfile.php?error=database_error");
                  exit;
              }
          } else {
              header("Location: Uploadfile.php?error=no_cover_image_uploaded");
              exit;
          }
      } else {
          header("Location: Uploadfile.php?error=file_upload_failed");
          exit;
      }
  } else {
      header("Location: Uploadfile.php?error=no_file_uploaded");
      exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload File</title>
    <!-- BOOTSTRAP CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html,
      body {
        width: 100%;
        height: 100%;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
      }

      /* Background Iframe (Home) */
      .bg-iframe {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        border: none;
        z-index: -2;
      }

      /* Backdrop Transparan */
      .backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.4); /* Bisa atur transparansi */
        z-index: -1;
      }

      /* Kotak Upload */
      .upload-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 400px;
        position: relative;
        z-index: 10; /* Pastikan selalu di atas backdrop */
      }

      .upload-box:hover {
        background: rgba(0, 123, 255, 0.1);
      }

      .upload-box input {
        display: none;
      }

      .file-name {
        margin-top: 10px;
        font-size: 14px;
        color: #555;
      }

      .upload-btn {
        margin-top: 15px;
        padding: 10px 20px;
        border: none;
        background: #007bff;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        display: none;
      }

      .upload-btn:hover {
        background: #0056b3;
      }

      .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 18px;
        background: none;
        border: none;
        cursor: pointer;
        color: #aaa;
      }

      .close-btn:hover {
        color: #333;
      }

      .box {
        width: 100%;
        height : 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <!-- Background Home -->
    <iframe class="bg-iframe" src="Home.php"></iframe>

    <!-- Backdrop Semi-Transparan -->
    <div class="backdrop"></div>

    <!-- Kotak Upload -->

    <div
      class="upload-container d-flex flex-column justify-content-between"
      style="min-height: 400px"
    >
      <button class="close-btn" onclick="goBack()">✖</button>

      <div>
        <h2>Upload File</h2>
        <form
          id="uploadForm"
          action="Uploadfile.php"
          method="POST"
          enctype="multipart/form-data"
          class="mt-4"
        >
          <!-- author-->
          <div class="row align-items-center mb-3">
            <div class="col-3">
              <label class="form-label mb-0">Author</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="author"
                placeholder="Author"
                class="form-control"
                required
              />
            </div>
          </div>

          <!-- title -->
          <div class="row align-items-center mb-3">
            <div class="col-3">
              <label class="form-label mb-0">Title</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="title"
                placeholder="Title"
                class="form-control"
                required
              />
            </div>
          </div>

          <!-- description -->
          <div class="row align-items-center mb-3">
            <div class="col-3">
              <label class="form-label mb-0">Description</label>
            </div>
            <div class="col-9">
              <textarea
                name="description"
                placeholder="Description"
                class="form-control"
                rows="3"
              ></textarea>
            </div>
          </div>

          <!-- genre -->
          <div class="row align-items-center mb-3">
            <div class="col-3">
              <label class="form-label mb-0">Genre</label>
            </div>
            <div class="col-9">
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Action"
                      id="genreAction"
                    />
                    <label class="form-check-label" for="genreAction"
                      >Action</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Fantasy"
                      id="genreFantasy"
                    />
                    <label class="form-check-label" for="genreFantasy"
                      >Fantasy</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Romance"
                      id="genreRomance"
                    />
                    <label class="form-check-label" for="genreRomance"
                      >Romance</label
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Comedy"
                      id="genreComedy"
                    />
                    <label class="form-check-label" for="genreComedy"
                      >Comedy</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Horror"
                      id="genreHorror"
                    />
                    <label class="form-check-label" for="genreHorror"
                      >Horror</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="genre[]"
                      value="Thriller"
                      id="genreThriller"
                    />
                    <label class="form-check-label" for="genreThriller"
                      >Thriller</label
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- file -->
           Book File :
          <div class="row mb-3">
            <div class="col-12">
              <input type="file" name="file" class="form-control" required />
            </div>
          </div>
          <!-- cover -->
          Book Cover :
          <div class="row mb-3">
            <div class="col-12">
              <input type="file" name="cover_images" class="form-control" required />
            </div>
          </div>
        </form>
      </div>
      <div class="text-end">
        <button type="submit" form="uploadForm" class="btn btn-primary mt-3">
          Confirm
        </button>
      </div>
    </div>


    <script>
      function goBack() {
        window.history.back();
      }
    </script>
  </body>
</html>

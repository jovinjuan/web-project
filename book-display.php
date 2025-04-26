<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Card Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
</head>
<body>
    <div class="container-fluid mt-5 my-4">
        <div class="back-button d-flex fs-3 mb-5 ms-5">
            <a href="home.php" class="text-decoration-none"><i class="bi bi-arrow-left mx-2"></i> Back</a>
        </div>
        <div class="card mx-5 p-5 d-flex justify-content-center">
            <div class="row g-0 align-items-start">
                <!-- Bagian Gambar -->
                <div class="col-md-3 pe-2">
                    <div class="bg-secondary" style="width: 100%; height: 600px;"></div>
                </div>
                <!-- Bagian Informasi Buku -->
                <div class="col-md-9 ps-2">
                    <div class="card-body py-0">
                        <h2 class="card-title border border-3 rounded p-5 display-3 mb-3" name = "title">Judul Buku</h2>
                        <p class="card-text border border-3 rounded fs-4 p-3 fw-light" name = "author">Author :</p>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p class="card-text border border-3 rounded fs-4 p-3 fw-light" name = "pages">Jumlah Halaman :</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text border border-3 rounded fs-4 p-3 fw-light" name = "genre">Genre :</p>
                            </div>
                        </div>
                        <!-- Bagian Deskripsi -->
                        <div class="card-desc mt-3">
                            <p class="card-text fs-3"><strong>Description:</strong></p>
                            <textarea name="description" placeholder = "some description ..." class = "w-100 p-3"></textarea>
                        </div>
                        <!-- Tombol Start Reading -->
                            <button class="btn btn-primary mt-5 fw-semibold">Start Reading</button>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
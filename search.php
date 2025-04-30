<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection with error handling
try {
    require "config.php";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Test connection
    $conn->query("SELECT 1");
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Process search query
$results = [];
$searchTerm = '';
if (isset($_GET['search_query']) && !empty(trim($_GET['search_query']))) {
    $searchTerm = trim($_GET['search_query']);
    $searchQuery = '%' . $searchTerm . '%';
    
    try {
        // Search in title, author, and genre
        $stmt = $conn->prepare("SELECT * FROM book 
                              WHERE title LIKE :search 
                              OR author LIKE :search 
                              OR genre LIKE :search
                              ORDER BY title");
        $stmt->bindParam(':search', $searchQuery);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Search error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Search Results - Tready</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    
    <style>
        body { padding-top: 90px; }
        .book {
            width: 150px;
            min-height: 200px;
            border-radius: 5px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .book:hover { transform: scale(1.05); }
        .book img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
        .search-results { min-height: 60vh; }
        .no-results {
            height: 50vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .search-highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">
                    <?php if (!empty($searchTerm)): ?>
                        Search Results for: "<?= htmlspecialchars($searchTerm) ?>"
                        <small class="text-muted">(<?= count($results) ?> results)</small>
                    <?php else: ?>
                        Search Books
                    <?php endif; ?>
                </h2>
                
                <div class="search-results">
                    <?php if (!empty($results)): ?>
                        <div class="d-flex flex-wrap">
                            <?php foreach ($results as $book): ?>
                                <div class="book bg-light shadow-sm"
                                    onclick="showBookDetail(
                                        '<?= htmlspecialchars($book['title'], ENT_QUOTES) ?>',
                                        '<?= htmlspecialchars($book['description'], ENT_QUOTES) ?>',
                                        '<?= htmlspecialchars($book['genre'], ENT_QUOTES) ?>',
                                        '<?= base64_encode($book['cover_image']) ?>',
                                        '<?= htmlspecialchars($book['file_path'], ENT_QUOTES) ?>'
                                    )">
                                    <?php if (!empty($book['cover_image'])): ?>
                                        <img src="data:image/jpeg;base64,<?= base64_encode($book['cover_image']) ?>"
                                             alt="<?= htmlspecialchars($book['title']) ?>">
                                    <?php else: ?>
                                        <div class="text-center p-3">
                                            <i class="fas fa-book fa-3x text-secondary"></i>
                                            <p class="mt-2"><?= htmlspecialchars($book['title']) ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif (!empty($searchTerm)): ?>
                        <div class="no-results text-center">
                            <i class="fas fa-search fa-4x text-muted mb-3"></i>
                            <h3 class="text-muted">No books found</h3>
                            <p class="text-muted">Try different search terms</p>
                        </div>
                    <?php else: ?>
                        <div class="no-results text-center">
                            <i class="fas fa-search fa-4x text-muted mb-3"></i>
                            <h3 class="text-muted">Search for books</h3>
                            <p class="text-muted">Enter a title, author or genre in the search bar above</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Detail Modal -->
    <div class="modal fade" id="bookDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-body text-center">
                    <img id="modalCover" class="img-fluid rounded-3 mb-4" style="max-height: 200px;">
                    <h3 id="modalTitle" class="fw-bold mb-3"></h3>
                    <p id="modalDescription" class="text-muted mb-3"></p>
                    <p class="mb-4"><strong>Genre:</strong> <span id="modalGenre"></span></p>
                    <a id="modalReadBtn" class="btn btn-primary" href="#">Read Book</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showBookDetail(title, description, genre, coverImage, filePath) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('modalGenre').textContent = genre;
            
            const coverImg = document.getElementById('modalCover');
            if (coverImage) {
                coverImg.src = 'data:image/jpeg;base64,' + coverImage;
                coverImg.style.display = 'block';
            } else {
                coverImg.style.display = 'none';
            }
            
            document.getElementById('modalReadBtn').href = 'read.php?file=' + encodeURIComponent(filePath);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('bookDetailModal'));
            modal.show();
        }
        
        // Highlight search terms in results
        function highlightSearchTerms() {
            const searchTerm = "<?= isset($searchTerm) ? addslashes($searchTerm) : '' ?>";
            if (searchTerm) {
                const elements = document.querySelectorAll('#modalTitle, #modalDescription, #modalGenre');
                elements.forEach(el => {
                    const text = el.textContent;
                    const regex = new RegExp(searchTerm, 'gi');
                    el.innerHTML = text.replace(regex, match => 
                        `<span class="search-highlight">${match}</span>`);
                });
            }
        }
    </script>
</body>
</html>
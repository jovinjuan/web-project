<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Buku</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5dc;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .book-container {
        width: 60%;
        max-width: 800px;
        background: white;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        position: relative;
      }
      .judul {
        text-align: center;
      }
      .back-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #cec6c1;
        color: #0f0f0f;
        border: 2px #edf0f3;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
      }
      .back-button:hover {
        background: #007bff;
        color: white;
      }
      .zoom-controls,
      .navigation-controls {
        text-align: center;
        margin-top: 20px;
      }
      .nav-button {
        background: #cec6c1;
        color: #0f0f0f;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px;
        font-size: 15px;
      }
      .zoom-button:hover,
      .nav-button:hover {
        background: #0056b3;
      }

      .navigation-controls {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 800px;
      }
      .prev-button {
        margin-right: auto;
      }
      .next-button {
        margin-left: auto;
      }
    </style>
  </head>
  <body>
    <div class="book-container">
      <button class="back-button" onclick="goBack()">←</button>
      <br />
      <h2 class="judul">Judul Buku</h2>
      <p class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Phasellus dictum velit nec velit vehicula, non vestibulum odio suscipit. Integer vel tincidunt justo. Vestibulum cursus diam vel mi posuere, vel sollicitudin
        arcu vulputate. Cras dapibus, odio id consequat maximus, ligula tortor accumsan libero, nec congue neque eros ut nisi. Pellentesque ac orci et arcu sodales gravida. Fusce auctor orci at lorem feugiat bibendum. Ut ut dapibus libero.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <p class="content">
        Quisque eu metus vehicula, vestibulum odio sed, congue justo. Suspendisse potenti. Duis et convallis ligula. Donec lacinia lorem at magna faucibus, id consequat arcu tempus. Integer ac orci non eros commodo laoreet sed et ligula.
        Maecenas non justo eu felis vestibulum dictum. Aliquam erat volutpat. Nam auctor dolor nec velit fermentum, id sodales sapien consectetur. Curabitur in lacus ut nisl consectetur convallis.
      </p>
      <br />
      <div class="zoom-controls">
        <button class="zoom-button" onclick="zoomIn()">+</button>
        <button class="zoom-button" onclick="zoomOut()">-</button>
      </div>
      <div class="navigation-controls">
        <button class="nav-button" onclick="prevPage()"><</button>
        <button class="nav-button" onclick="nextPage()">></button>
      </div>
    </div>

    <script>
      function goBack() {
        window.history.back();
      }
      function zoomIn() {
        let book = document.getElementById("book");
        let scale = parseFloat(book.style.transform.replace("scale(", "").replace(")", "")) || 1;
        if (scale < 1.5) {
          book.style.transform = `scale(${scale + 0.1})`;
        }
      }
      function zoomOut() {
        let book = document.getElementById("book");
        let scale = parseFloat(book.style.transform.replace("scale(", "").replace(")", "")) || 1;
        if (scale > 0.8) {
          book.style.transform = `scale(${scale - 0.1})`;
        }
        function nextPage() {
          if (currentPage < totalPages) {
            currentPage++;
            document.getElementById("content").innerText = bookContent[currentPage - 1];
            document.getElementById("page-number").innerText = currentPage;
          }
        }
        function prevPage() {
          if (currentPage > 1) {
            currentPage--;
            document.getElementById("content").innerText = bookContent[currentPage - 1];
            document.getElementById("page-number").innerText = currentPage;
          }
        }
      }
    </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload File</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html, body {
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
        width: 350px;
        position: relative;
        z-index: 10; /* Pastikan selalu di atas backdrop */
      }

      .upload-box {
        border: 1px dashed #007bff;
        padding: 10px;
        cursor: pointer;
        border-radius: 5px;
        color: #007bff;
        display: inline-block;
        width: 35%;
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

      .Box{
        width: 100%;
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
    <div class="upload-container">
      <button class="close-btn" onclick="goBack()">✖</button>
      <div class="content text-center py-2">
          <h3 class = "fs-2 fw-bold mb-4">Upload File</h3>
          <label class="upload-box">
            Choose File
            <input type="file" id="fileInput" onchange="updateFileStatus()">
          </label>
          <p class="file-name" id="fileName">No file chosen</p>
          <div class="col-12">
        <a href = "book-display.php"><button class="btn btn-primary" type="submit" id="confirmButton" disabled>Confirm</button></a>
          </div>
      </div>
    </div>

    <script>
      const fileInput = document.getElementById("fileInput");
      const fileName = document.getElementById("fileName");

      fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
          fileName.textContent = "File dipilih: " + fileInput.files[0].name;
        } else {
          fileName.textContent = "Belum ada file yang dipilih";
        }
      });

      function goBack() {
        window.history.back();
      }
      function updateFileStatus() {
            const fileInput = document.getElementById('fileInput');
            const fileStatus = document.getElementById('fileName');
            const confirmButton = document.getElementById('confirmButton');

            if (fileInput.files.length > 0) {
                fileStatus.textContent = fileInput.files[0].name;
                confirmButton.disabled = false;
            } else {
                fileStatus.textContent = 'No file chosen';
                confirmButton.disabled = true;
            }
      }
    </script>
  </body>
</html>
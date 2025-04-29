document.getElementById("close-button").addEventListener("click", function () {
    // Redirect ke home.php
    window.location.href = "home.php";
  });
  function applyFilters() {
    // Get all checked genres
    const checkboxes = document.querySelectorAll(
      '.sidebar input[type="checkbox"]'
    );
    const selectedGenres = Array.from(checkboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.parentElement.textContent.trim());
  
    // Get all book containers
    const bookContainers = document.querySelectorAll(".book-container");
  
    // If no genres selected, show all books
    if (selectedGenres.length === 0) {
      document.querySelectorAll(".book").forEach((book) => {
        book.style.display = "block";
      });
      return;
    }
  
    // Filter books based on selected genres
    document.querySelectorAll(".book").forEach((book) => {
      // Skip the add-book button
      if (book.querySelector(".add-book-btn")) {
        book.style.display = "block"; // Always show add button
        return;
      }
  
      const genre = book.getAttribute("data-genre");
      if (selectedGenres.includes(genre)) {
        book.style.display = "block";
      } else {
        book.style.display = "none";
      }
    });
  }
  
  function toggleSidebar() {
    let sidebar = document.getElementById("sidebar");
    let backdrop = document.getElementById("backdrop");
    let content = document.getElementById("content");
    let sections = document.querySelectorAll(".section");
  
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
  
  function showBookDetailFromElement(element) {
    const book_id = element.getAttribute("data-book-id");
    const title = element.getAttribute("data-title");
    const description = element.getAttribute("data-description");
    const genre = element.getAttribute("data-genre");
    const coverImage = element.getAttribute("data-cover");
    const filePath = element.getAttribute("data-filepath");

    const modal = document.getElementById('bookDetailModal');
    modal.setAttribute('data-book-id', book_id);

    document.getElementById("detail-title").textContent = title;
    document.getElementById("detail-description").textContent = description;
    document.getElementById("detail-genre").textContent = genre;
    document.getElementById("detail-cover").src =
      "data:image/jpeg;base64," + coverImage;
    document
      .getElementById("view-pdf-btn")
      .setAttribute("data-filepath", filePath);
    document.getElementById("reading-title").textContent = title;
  
    const myModal = new bootstrap.Modal(
      document.getElementById("bookDetailModal")
    );
    myModal.show();
  }
  
  function openReadingModal() {
    // Ambil book_id dari modal
    const modal = document.getElementById('bookDetailModal');
    const bookId = modal.getAttribute('data-book-id') || '';

    // Set book_id ke input tersembunyi
    document.getElementById('book-id-input').value = bookId;

    // Ambil filePath dari elemen buku
    const bookElement = document.querySelector(`.book[data-book-id="${bookId}"]`);
    const filePath = bookElement ? bookElement.getAttribute('data-filepath') : '';

    // Ambil dan set judul
    const title = document.getElementById('detail-title').textContent;
    document.getElementById('reading-title').textContent = title;

    // Buka modal
    const readingModal = new bootstrap.Modal(document.getElementById('readingModal'));
    readingModal.show();

    // Set PDF.js worker
    pdfjsLib.GlobalWorkerOptions.workerSrc =
      "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js";

    let pdfDoc = null;
    let currentPage = 1;
    let totalPages = 0;
    let startTime = Date.now();
    let timerInterval;

    async function loadPDF() {
      try {
        console.log("Loading PDF from:", filePath);
        pdfDoc = await pdfjsLib.getDocument(filePath).promise;
        totalPages = pdfDoc.numPages;
        document.getElementById("total-pages").textContent = totalPages;
        renderPage(currentPage);
        updateProgress();
        startTimer();
      } catch (error) {
        console.error("Error loading PDF:", error);
        alert("Failed to load PDF: " + error.message);
      }
    }

    async function renderPage(pageNum) {
      try {
        const page = await pdfDoc.getPage(pageNum);
        const viewport = page.getViewport({ scale: 1.0 });
        const canvas = document.getElementById("pdf-canvas");
        const context = canvas.getContext("2d");
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
          canvasContext: context,
          viewport: viewport,
        };
        await page.render(renderContext).promise;
        document.getElementById("current-page").textContent = pageNum;
      } catch (error) {
        console.error("Error rendering page:", error);
        alert("Failed to render page: " + error.message);
      }
    }

    document.getElementById("next-page").addEventListener("click", () => {
      if (currentPage < totalPages) {
        currentPage++;
        renderPage(currentPage);
        updateProgress();
      }
    });

    document.getElementById("prev-page").addEventListener("click", () => {
      if (currentPage > 1) {
        currentPage--;
        renderPage(currentPage);
        updateProgress();
      }
    });

    function updateProgress() {
      const progress = (currentPage / totalPages) * 100;
      document.getElementById("progress").textContent = progress.toFixed(1) + "%";
    }

    function startTimer() {
      timerInterval = setInterval(() => {
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        const minutes = Math.floor(elapsed / 60);
        const seconds = elapsed % 60;
        document.getElementById(
          "timer"
        ).textContent = `${minutes} menit ${seconds} detik`;
      }, 1000);
    }

    document.getElementById("bookmark-button").addEventListener("click", function() {
      let progress = document.getElementById("progress").textContent.replace("%", "");
      let current_page = document.getElementById("current-page").textContent;
      let timerText = document.getElementById("timer").textContent;

      document.getElementById("progress-input").value = progress;
      document.getElementById("current-page-input").value = current_page;
      document.getElementById("timer-input").value = timerText;
    });

    loadPDF();

    document
      .getElementById("readingModal")
      .addEventListener("hidden.bs.modal", () => {
        clearInterval(timerInterval);
      });
}
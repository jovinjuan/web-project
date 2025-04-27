
document.getElementById('close-button').addEventListener('click', function() {
    // Redirect ke home.php
    window.location.href = 'home.php';
});

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
  const title = element.getAttribute('data-title');
  const description = element.getAttribute('data-description');
  const genre = element.getAttribute('data-genre');
  const coverImage = element.getAttribute('data-cover');
  const filePath = element.getAttribute('data-filepath');

  document.getElementById('detail-title').textContent = title;
  document.getElementById('detail-description').textContent = description;
  document.getElementById('detail-genre').textContent = genre;
  document.getElementById('detail-cover').src = 'data:image/jpeg;base64,' + coverImage;
  document.getElementById('view-pdf-btn').setAttribute('data-filepath', filePath);
  document.getElementById('reading-title').textContent = title;

  const myModal = new bootstrap.Modal(document.getElementById('bookDetailModal'));
  myModal.show();
}

function openReadingModal() {
  const filePath = document.getElementById('view-pdf-btn').getAttribute('data-filepath');
  const readingModal = new bootstrap.Modal(document.getElementById('readingModal'));
  readingModal.show();

  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

  let pdfDoc = null;
  let currentPage = 1;
  let totalPages = 0;
  let startTime = Date.now();
  let timerInterval;

  async function loadPDF() {
    try {
      console.log('Loading PDF from:', filePath);
      pdfDoc = await pdfjsLib.getDocument(filePath).promise;
      totalPages = pdfDoc.numPages;
      document.getElementById('total-pages').textContent = totalPages;
      renderPage(currentPage);
      updateProgress();
      startTimer();
    } catch (error) {
      console.error('Error loading PDF:', error);
      alert('Failed to load PDF: ' + error.message);
    }
  }

  async function renderPage(pageNum) {
    try {
      const page = await pdfDoc.getPage(pageNum);
      const viewport = page.getViewport({ scale: 1.0 });
      const canvas = document.getElementById('pdf-canvas');
      const context = canvas.getContext('2d');
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      const renderContext = {
        canvasContext: context,
        viewport: viewport
      };
      await page.render(renderContext).promise;
      document.getElementById('current-page').textContent = pageNum;
    } catch (error) {
      console.error('Error rendering page:', error);
      alert('Failed to render page: ' + error.message);
    }
  }

  document.getElementById('next-page').addEventListener('click', () => {
    if (currentPage < totalPages) {
      currentPage++;
      renderPage(currentPage);
      updateProgress();
    }
  });

  document.getElementById('prev-page').addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      renderPage(currentPage);
      updateProgress();
    }
  });

  

  function updateProgress() {
    const progress = (currentPage / totalPages) * 100;
    document.getElementById('progress').textContent = progress.toFixed(1) + '%';
  }

  function startTimer() {
    timerInterval = setInterval(() => {
      const elapsed = Math.floor((Date.now() - startTime) / 1000);
      const minutes = Math.floor(elapsed / 60);
      const seconds = elapsed % 60;
      document.getElementById('timer').textContent = `${minutes} menit ${seconds} detik`;
    }, 1000);
  }
  loadPDF();
    document.getElementById('readingModal').addEventListener('hidden.bs.modal', () => {
    clearInterval(timerInterval);
    });
}


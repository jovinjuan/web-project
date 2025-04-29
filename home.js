let pdfDoc = null;
let currentPage = 1;
let totalPages = 0;
let startTime = null;
let timerInterval = null;
let currentBook = null;

document.addEventListener('DOMContentLoaded', () => {
    console.log('home.js loaded successfully');

    const nextPageBtn = document.getElementById('next-page');
    const prevPageBtn = document.getElementById('prev-page');
    const bookmarkBtn = document.getElementById('bookmark-button');
    const closeBtn = document.getElementById('close-button');
    const readingModal = document.getElementById('readingModal');

    if (nextPageBtn) {
        nextPageBtn.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderPage(currentPage);
                updateProgress();
            }
        });
    } else {
        console.error('Next page button not found');
    }

    if (prevPageBtn) {
        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
                updateProgress();
            }
        });
    } else {
        console.error('Previous page button not found');
    }

    if (bookmarkBtn) {
        bookmarkBtn.addEventListener('click', function () {
            let progress = document.getElementById('progress').textContent.replace('%', '');
            let current_page = document.getElementById('current-page').textContent;
            let timerText = document.getElementById('timer').textContent;

            document.getElementById('progress-input').value = progress;
            document.getElementById('current-page-input').value = current_page;
            document.getElementById('timer-input').value = timerText;
            console.log('Bookmark saved:', { progress, current_page, timerText });
        });
    } else {
        console.error('Bookmark button not found');
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            const readingModalInstance = bootstrap.Modal.getInstance(readingModal);
            readingModalInstance.hide();
            console.log('Reading modal closed');
            if (window.location.pathname.includes('myprogress.php')) {
                window.location.href = 'myprogress.php';
            } else {
                window.location.href = 'home.php';
            }
        });
    } else {
        console.error('Close button not found');
    }

    if (readingModal) {
        readingModal.addEventListener('hidden.bs.modal', () => {
            clearInterval(timerInterval);
            timerInterval = null;
            pdfDoc = null;
            currentPage = 1;
            totalPages = 0;
            startTime = null;
            currentBook = null;
            console.log('Reading modal state reset');
        });
    } else {
        console.error('Reading modal not found');
    }
});

async function renderPage(pageNum) {
    try {
        const page = await pdfDoc.getPage(pageNum);
        const canvas = document.getElementById('pdf-canvas');
        const context = canvas.getContext('2d');
        const container = document.querySelector('.pdf-viewer');

        // Ambil lebar container
        const containerWidth = container.offsetWidth;
        const defaultScale = 1.0;
        const viewport = page.getViewport({ scale: defaultScale });
        // Hitung skala agar lebar halaman sesuai dengan container
        const scale = containerWidth / viewport.width;


        // Gunakan skala baru untuk viewport
        const scaledViewport = page.getViewport({ scale: scale });

        // Bersihkan canvas sebelum render
        context.clearRect(0, 0, canvas.width, canvas.height);
        canvas.height = scaledViewport.height;
        canvas.width = scaledViewport.width;

        const renderContext = {
            canvasContext: context,
            viewport: scaledViewport,
        };
        await page.render(renderContext).promise;
        document.getElementById('current-page').textContent = pageNum;
        updateProgress();

        // Perbarui status tombol
        document.getElementById('next-page').disabled = pageNum >= totalPages;
        document.getElementById('prev-page').disabled = pageNum <= 1;
    } catch (error) {
        console.error('Error rendering page:', error);
        alert('Failed to render page: ' + error.message);
    }
}

function updateProgress() {
    const progress = totalPages > 0 ? ((currentPage / totalPages) * 100).toFixed(1) : 0;
    document.getElementById('progress').textContent = progress + '%';
    document.getElementById('progress-input').value = progress + '%';
    document.getElementById('current-page-input').value = currentPage;
}

function startTimer() {
    startTime = Date.now();
    timerInterval = setInterval(() => {
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        const minutes = Math.floor(elapsed / 60);
        const seconds = elapsed % 60;
        const timerText = `${minutes} menit ${seconds} detik`;
        document.getElementById('timer').textContent = timerText;
        document.getElementById('timer-input').value = timerText;
    }, 1000);
}

function applyFilters() {
    const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
    const selectedGenres = Array.from(checkboxes)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.parentElement.textContent.trim());

    const bookContainers = document.querySelectorAll('.book-container');

    if (selectedGenres.length === 0) {
        document.querySelectorAll('.book').forEach((book) => {
            book.style.display = 'block';
        });
        return;
    }

    document.querySelectorAll('.book').forEach((book) => {
        if (book.querySelector('.add-book-btn')) {
            book.style.display = 'block';
            return;
        }

        const genre = book.getAttribute('data-genre');
        if (selectedGenres.includes(genre)) {
            book.style.display = 'block';
        } else {
            book.style.display = 'none';
        }
    });
}

function toggleSidebar() {
    let sidebar = document.getElementById('sidebar');
    let backdrop = document.getElementById('backdrop');
    let content = document.getElementById('content');
    let sections = document.querySelectorAll('.section');

    sidebar.classList.toggle('active');
    backdrop.classList.toggle('active');
    content.classList.toggle('padding');

    sections.forEach((section) => {
        section.classList.toggle('padding');
    });
}

function closeSidebar() {
    let sidebar = document.getElementById('sidebar');
    let backdrop = document.getElementById('backdrop');
    let content = document.getElementById('content');
    let sections = document.querySelectorAll('.section');

    sidebar.classList.remove('active');
    backdrop.classList.remove('active');
    content.classList.remove('padding');

    sections.forEach((section) => {
        section.classList.remove('padding');
    });
}

function showBookDetailFromElement(element) {
    console.log('showBookDetailFromElement called');
    const bookId = element.getAttribute('data-book-id');
    const title = element.getAttribute('data-title');
    const description = element.getAttribute('data-description');
    const coverImage = element.getAttribute('data-cover');
    const filePath = element.getAttribute('data-filepath');

    console.log('Book details:', { bookId, title, description, coverImage, filePath });

    if (!bookId || !title || !description || !coverImage || !filePath) {
        console.error('Missing book details');
        alert('Error: Missing book details');
        return;
    }

    currentBook = { bookId, title, description, filePath };

    const modal = document.getElementById('bookDetailModal');
    if (!modal) {
        console.error('Book detail modal not found');
        return;
    }

    modal.setAttribute('data-book-id', bookId);

    const detailTitle = document.getElementById('detail-title');
    const detailDescription = document.getElementById('detail-description');
    const detailCover = document.getElementById('detail-cover');
    const readingTitle = document.getElementById('reading-title');

    if (!detailTitle || !detailDescription || !detailCover || !readingTitle) {
        console.error('Modal elements not found');
        return;
    }

    detailTitle.textContent = title;
    detailDescription.textContent = description;
    detailCover.src = 'data:image/jpeg;base64,' + coverImage;
    readingTitle.textContent = title;

    try {
        const myModal = new bootstrap.Modal(modal);
        myModal.show();
        console.log('Book detail modal opened');
    } catch (error) {
        console.error('Error opening book detail modal:', error);
    }
}

function openReadingModal() {
    console.log('openReadingModal called');
    if (!currentBook) {
        console.error('No book selected');
        alert('Error: No book selected');
        return;
    }

    console.log('Current Book Details:', currentBook);

    const detailModal = document.getElementById('bookDetailModal');
    if (detailModal) {
        const detailModalInstance = bootstrap.Modal.getInstance(detailModal);
        if (detailModalInstance) {
            detailModalInstance.hide();
            console.log('Book detail modal closed');
        }
    }

    const bookIdInput = document.getElementById('book-id-input');
    const readingTitle = document.getElementById('reading-title');

    if (!bookIdInput || !readingTitle) {
        console.error('Reading modal elements not found');
        return;
    }

    bookIdInput.value = currentBook.bookId;
    readingTitle.textContent = currentBook.title;

    const readingModal = document.getElementById('readingModal');
    if (!readingModal) {
        console.error('Reading modal not found');
        return;
    }

    try {
        const modalInstance = new bootstrap.Modal(readingModal);
        modalInstance.show();
        console.log('Reading modal opened');
    } catch (error) {
        console.error('Error opening reading modal:', error);
        return;
    }

    pdfjsLib.GlobalWorkerOptions.workerSrc =
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

    async function loadPDF() {
        try {
            if (!currentBook.filePath) {
                throw new Error('File path is empty');
            }
            console.log('Attempting to load PDF from:', currentBook.filePath);

            const response = await fetch(currentBook.filePath, { method: 'HEAD' });
            if (!response.ok) {
                throw new Error(`File not found or inaccessible: ${currentBook.filePath} (Status: ${response.status})`);
            }

            pdfDoc = await pdfjsLib.getDocument(currentBook.filePath).promise;
            totalPages = pdfDoc.numPages;
            document.getElementById('total-pages').textContent = totalPages;
            currentPage = 1;
            renderPage(currentPage);
            updateProgress();
            startTimer();

            document.getElementById('next-page').disabled = totalPages <= 1;
            document.getElementById('prev-page').disabled = true;
        } catch (error) {
            console.error('Error loading PDF:', error);
            alert('Failed to load PDF: ' + error.message);
            const modalInstance = bootstrap.Modal.getInstance(readingModal);
            modalInstance.hide();
        }
    }

    loadPDF();
}
<?php
require "config.php";

if(cekLogin()){
?> 
<!-- Nav Bar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg bg-light shadow p-3 fixed-top">
  <div class="container-fluid px-4">
    <img
      src="treadyicon.png"
      alt="web icon"
      class="mx-2 mt-3"
      style="width: 50px; height: 50px"
    />
    <a class="navbar-brand ps-2" href="#">Tready</a>
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
      <ul class="nav nav-pills flex-column flex-lg-row text-center">
        <li class="nav-item">
          <a
            class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''); ?>"
            aria-current="page"
            href="home.php"
            >Home</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'myprogress.php' ? 'active' : ''); ?>"
            aria-current="page"
            href="myprogress.php"
            >My Progress</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'achievement.php' ? 'active' : ''); ?>"
            aria-current="page"
            href="achievement.php"
            >Achievement</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'history.php' ? 'active' : ''); ?>"
            aria-current="page"
            href="history.php"
            >History</a
          >
        </li>
      </ul>
      <!-- Search Bar -->
      <form class="d-flex ms-auto" role="search">
        <input
          class="form-control me-2 w-80"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
      <!-- Settings -->
      <a href="settings.php" class="btn btn-light">
        <i class="bi bi-person-circle fs-5 justify-content-center"></i>
      </a>
    </div>
  </div>
</nav>
<!-- Akhir Nav Bar -->
<?php 
} else {
    header('location:index.php');
}
?>

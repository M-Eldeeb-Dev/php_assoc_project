<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark navbar-glass fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Discover Egypt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'destinations.php' ? 'active' : '' ?>" href="destinations.php">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'gallery.php' ? 'active' : '' ?>" href="gallery.php">Gallery</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="height: 80px;"></div>

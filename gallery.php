<?php
require_once "inc/header.php";
require_once "data.php";
?>

<!-- Hero Banner -->
<div class="hero-banner">
    <div class="container">
        <h1 class="hero-title">
            <i class="fas fa-images"></i> Photo Gallery
        </h1>
        <p class="hero-subtitle">
            Immerse yourself in the breathtaking beauty of Egypt through our curated collection of stunning photographs. 
            Each image tells a story of ancient wonders and timeless beauty.
        </p>
    </div>
</div>

<div class="container">
    <!-- Main Carousel -->
    <div id="galleryCarousel" class="carousel slide main-carousel" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <?php foreach ($gallery_images as $index => $image): ?>
                <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="<?= $index ?>" 
                        <?= $index === 0 ? 'class="active" aria-current="true"' : '' ?> 
                        aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        
        <div class="carousel-inner">
            <?php foreach ($gallery_images as $index => $image): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= $image['img'] ?>" alt="<?= $image['title'] ?>">
                    <div class="carousel-overlay">
                        <h3 class="carousel-title"><?= $image['title'] ?></h3>
                        <p class="carousel-description"><?= $image['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Gallery Stats -->
    <div class="gallery-stats">
        <div class="stat-item">
            <span class="stat-number"><?= count($gallery_images) ?></span>
            <span class="stat-label">Photos</span>
        </div>
        <div class="stat-item">
            <span class="stat-number"><?= count($cards) ?></span>
            <span class="stat-label">Destinations</span>
        </div>
        <div class="stat-item">
            <span class="stat-number"><?= count(getAllCategories()) ?></span>
            <span class="stat-label">Categories</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">5000+</span>
            <span class="stat-label">Happy Visitors</span>
        </div>
    </div>

    <!-- Thumbnail Gallery -->
    <div class="thumbnail-gallery">
        <h2 class="gallery-section-title">
            <i class="fas fa-th"></i> Browse All Photos
        </h2>
        
        <div class="thumbnail-grid">
            <?php foreach ($gallery_images as $image): ?>
                <div class="thumbnail-card" onclick="openLightbox('<?= $image['img'] ?>', '<?= $image['title'] ?>')">
                    <img src="<?= $image['img'] ?>" alt="<?= $image['title'] ?>" class="thumbnail-img">
                    <div class="thumbnail-content">
                        <h4 class="thumbnail-title"><?= $image['title'] ?></h4>
                        <p class="thumbnail-description"><?= $image['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mb-5">
        <h3 class="mb-3">Ready to Experience Egypt?</h3>
        <p class="mb-4 text-white">These photos are just the beginning. Book your adventure today and create your own memories.</p>
        <a href="destinations.php" class="btn btn-primary btn-lg rounded-pill px-5">
            <i class="fas fa-compass"></i> Explore Destinations
        </a>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightboxOverlay" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="lightbox-content">
        <button class="lightbox-close" onclick="closeLightbox()">
            <i class="fas fa-times"></i>
        </button>
        <img id="lightboxImg" src="" alt="" class="lightbox-img">
    </div>
</div>

<footer class="bg-dark text-white text-center py-5 mt-5">
    <div class="container">
        <p class="mb-0 text-white">&copy; <?= date('Y') ?> Discover Egypt. All rights reserved.</p>
        <p class="mt-2  text-white">Experience the wonders of ancient Egypt with us</p>
    </div>
</footer>

<script>
function openLightbox(imgSrc, imgTitle) {
    const overlay = document.getElementById('lightboxOverlay');
    const img = document.getElementById('lightboxImg');
    
    img.src = imgSrc;
    img.alt = imgTitle;
    overlay.style.display = 'flex';
    
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const overlay = document.getElementById('lightboxOverlay');
    overlay.style.display = 'none';
    
    document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});

document.querySelector('.lightbox-content').addEventListener('click', function(e) {
    e.stopPropagation();
});
</script>

<?php
require_once "inc/footer.php";
?>

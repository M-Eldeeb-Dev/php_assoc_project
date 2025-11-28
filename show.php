<?php
require_once "inc/header.php";
require_once "data.php";

$cardId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$currentCard = getCardById($cardId);

if (!$currentCard) {
    $currentCard = $cards[0];
}
?>

<div class="container my-5">
    <div class="back-btn">
        <a href="index.php" class="btn-outline-custom">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="<?= $currentCard['img'] ?>" alt="<?= $currentCard['title'] ?>" class="hero-image">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 class="hero-title"><?= $currentCard['title'] ?></h1>
                <p class="hero-subtitle"><?= $currentCard['text'] ?></p>
            </div>
        </div>
    </div>

    <!-- Quick Info Grid -->
    <div class="info-grid">
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info-label">Location</div>
            <div class="info-value"><?= $currentCard['location'] ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="info-label">Duration</div>
            <div class="info-value"><?= $currentCard['duration'] ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="info-label">Price</div>
            <div class="info-value"><?= $currentCard['price'] ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="info-label">Best Time</div>
            <div class="info-value"><?= $currentCard['best_time'] ?></div>
        </div>
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-hiking"></i>
            </div>
            <div class="info-label">Difficulty</div>
            <div class="info-value"><?= $currentCard['difficulty'] ?></div>
        </div>
    </div>

    <div class="row">
        <!-- Description Section -->
        <div class="col-lg-8">
            <div class="detail-card">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i> About This Experience
                </h2>
                <p class="description-text"><?= $currentCard['description'] ?></p>
            </div>
        </div>

        <!-- Highlights Section -->
        <div class="col-lg-4">
            <div class="detail-card">
                <h3 class="section-title">
                    <i class="fas fa-star"></i> Highlights
                </h3>
                <ul class="highlights-list">
                    <?php foreach ($currentCard['highlights'] as $highlight): ?>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <?= $highlight ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mt-4">
        <a href="#" class="btn-primary-custom me-3">
            <i class="fas fa-calendar-check"></i> Book Now
        </a>
        <a href="#" class="btn-outline-custom">
            <i class="fas fa-share-alt"></i> Share Experience
        </a>
    </div>

    <!-- Other Destinations -->
    <div class="mt-5">
        <h3 class="section-title text-center mb-4">Other Amazing Destinations</h3>
        <div class="row">
            <?php foreach ($cards as $card): ?>
                <?php if ($card['id'] != $currentCard['id']): ?>
                    <div class="col-md-6 mb-3">
                        <div class="detail-card">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="<?= $card['img'] ?>" alt="<?= $card['title'] ?>" 
                                         class="img-fluid rounded" style="height: 120px; object-fit: cover; width: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-warning"><?= $card['title'] ?></h5>
                                    <p class="text-muted small"><?= $card['text'] ?></p>
                                    <a href="show.php?id=<?= $card['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-5 mt-5">
    <div class="container">
        <p class="mb-0 text-white">&copy; <?= date('Y') ?> Discover Egypt. All rights reserved.</p>
        <p class="mt-2 text-white">Experience the wonders of ancient Egypt with us</p>
    </div>
</footer>

<?php
require_once "inc/footer.php";
?>

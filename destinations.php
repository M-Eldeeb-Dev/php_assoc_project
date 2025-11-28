<?php
require_once "inc/header.php";
require_once "data.php";

$filterCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
$filteredCards = $filterCategory === 'all' ? $cards : getCardsByCategory($filterCategory);
$categories = getAllCategories();
?>

<!-- Hero Banner -->
<div class="hero-banner">
    <div class="container">
        <h1 class="hero-title">
            <i class="fas fa-map-marked-alt"></i> All Destinations
        </h1>
        <p class="hero-subtitle">
            Explore all the amazing destinations Egypt has to offer. From ancient wonders to modern adventures, 
            find your perfect Egyptian experience.
        </p>
    </div>
</div>

<div class="container">
    <!-- Filter Section -->
    <div class="filter-section">
        <h3 class="mb-3">
            <i class="fas fa-filter"></i> Filter by Category
        </h3>
        <div class="filter-buttons">
            <a href="destinations.php?category=all" 
               class="filter-btn <?= $filterCategory === 'all' ? 'active' : '' ?>">
                All Destinations
            </a>
            <?php foreach ($categories as $category): ?>
                <a href="destinations.php?category=<?= urlencode($category) ?>" 
                   class="filter-btn <?= $filterCategory === $category ? 'active' : '' ?>">
                    <?= $category ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Results Count -->
    <div class="results-count">
        <i class="fas fa-search"></i> 
        Showing <?= count($filteredCards) ?> destination<?= count($filteredCards) !== 1 ? 's' : '' ?>
        <?php if ($filterCategory !== 'all'): ?>
            in "<?= $filterCategory ?>"
        <?php endif; ?>
    </div>

    <!-- Destinations Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        <?php foreach ($filteredCards as $card): ?>
            <div class="col">
                <div class="card custom-card">
                    <img src="<?= $card['img'] ?>" class="card-img-top" alt="<?= $card['title'] ?>">
                    <div class="card-body">
                        <span class="card-category"><?= $card['category'] ?></span>
                        <h5 class="card-title"><?= $card['title'] ?></h5>
                        <p class="card-text"><?= $card['text'] ?></p>
                        
                        <div class="card-meta">
                            <span class="card-duration">
                                <i class="fas fa-clock"></i> <?= $card['duration'] ?>
                            </span>
                            <span class="card-price"><?= $card['price'] ?></span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> <?= $card['location'] ?>
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-hiking"></i> <?= $card['difficulty'] ?>
                            </small>
                        </div>
                        
                        <a href="show.php?id=<?= $card['id'] ?>" class="btn-primary-custom full-width">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($filteredCards)): ?>
        <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h3 class="text-muted">No destinations found</h3>
            <p class="text-muted">Try selecting a different category or view all destinations.</p>
            <a href="destinations.php" class="btn-primary-custom" style="width: auto; display: inline-block;">
                View All Destinations
            </a>
        </div>
    <?php endif; ?>
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

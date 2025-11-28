<?php
require_once "inc/header.php";
require_once "data.php";

$homeCards = array_slice($cards, 0, 3);
?>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= $homeCards[0]['img'] ?>" class="d-block w-100" alt="<?= $homeCards[0]['title'] ?>">
        </div>
        <div class="carousel-item">
            <img src="<?= $homeCards[1]['img'] ?>" class="d-block w-100" alt="<?= $homeCards[1]['title'] ?>">
        </div>
        <div class="carousel-item">
            <img src="<?= $homeCards[2]['img'] ?>" class="d-block w-100" alt="<?= $homeCards[2]['title'] ?>">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<main class="container my-5 main-content">
    <h2 class="text-center mb-5 fw-bold">Discover Egypt's Wonders</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($homeCards as $card): ?>
            <div class="col">
                <div class="card shadow custom-card">
                    <img src="<?= $card['img'] ?>" class="index-card-img" alt="<?= $card['title'] ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $card['title'] ?></h5>
                        <p class="card-text"><?= $card['text'] ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="show.php?id=<?= $card['id'] ?>" class="btn btn-outline-primary btn-sm rounded-pill">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer class="bg-dark text-white text-center py-5 mt-5">
    <p class="mb-0 text-white">&copy; <?= date('Y') ?> Discover Egypt. All rights reserved.</p>
</footer>

<?php
require_once "inc/footer.php";
?>
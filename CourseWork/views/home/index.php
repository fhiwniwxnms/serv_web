<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<div class="home-hero">
    <h1>Чайный блог 🍵</h1>
    <p>Всё о чае - сорта, традиции, советы по завариванию</p>
    <a href="<?= BASE_URL ?>/articles" class="btn">Читать статьи</a>
</div>

<h2 class="home-section-title">Последние статьи</h2>
<?php foreach ($articles as $article): ?>
    <div class="article-card">
        <h2>
            <a href="<?= BASE_URL ?>/articles/<?= $article['id'] ?>">
                <?= $article['title'] ?>
            </a>
        </h2>
        <p class="meta"><?= $article['created_at'] ?></p>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>
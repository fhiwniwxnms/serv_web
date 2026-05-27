<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<h1>Статьи о чае</h1>

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
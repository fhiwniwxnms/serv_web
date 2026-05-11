<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
    <div class="article-card">
        <h2>
            <a href="/web_labs_tsuprun/lab8/articles/<?= $article->getId() ?>">
                <?= $article->getName() ?>
            </a>
        </h2>
        <p><?= $article->getText() ?></p>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>
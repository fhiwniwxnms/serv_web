<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<div class="article-full">
    <h1><?= $article['title'] ?></h1>
    <p class="article-author">Опубликовано: <span><?= $article['created_at'] ?></span></p>
    <div class="article-body">
        <?= nl2br($article['text']) ?>
    </div>
</div>

<div class="comment-form">
    <h3>Оставить комментарий</h3>
    <form action="<?= BASE_URL ?>/articles/<?= $article['id'] ?>/comments" method="post">
        <textarea name="text" placeholder="Написать комментарий…"></textarea>
        <button type="submit">Отправить</button>
    </form>
</div>

<div class="comments-section">
    <h2 class="comments-title">Комментарии (<?= count($comments) ?>)</h2>
    <?php foreach ($comments as $comment): ?>
        <div class="comment" id="comment<?= $comment['id'] ?>">
            <p class="comment-author"><?= $comment['nickname'] ?></p>
            <p><?= $comment['text'] ?></p>
            <p class="comment-date"><?= $comment['created_at'] ?></p>
            <a href="<?= BASE_URL ?>/comments/<?= $comment['id'] ?>/edit">Редактировать</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>
<?php include __DIR__ . '/../header.php'; ?>

<div class="article-full">
    <h1><?= $article->getName() ?></h1>
    <p class="article-author">Автор: <span><?= $article->getAuthor()->getNickname() ?></span></p>
    <p><?= $article->getText() ?></p>
</div>

<form class="comment-form" action="/web_labs_tsuprun/lab11/articles/<?= $article->getId() ?>/comments" method="post">
    <textarea name="text" placeholder="Написать комментарий…"></textarea>
    <button type="submit">Отправить</button>
</form>

<div class="comments-section">
<?php foreach ($comments as $comment): ?>
    <div class="comment-item" id="comment<?= $comment->getId() ?>">
        <p class="article-author">Автор: <span><?= $comment->getAuthor()->getNickname() ?></span></p>
        <p><?= $comment->getText() ?></p>
        <a href="/web_labs_tsuprun/lab11/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
    </div>
<?php endforeach; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
<?php include __DIR__ . '/../header.php'; ?>

<div class="article-full">
    <h1><?= $article->getName() ?></h1>
    <p class="article-author">Автор: <span><?= $article->getAuthor()->getNickname() ?></span></p>
    <p><?= $article->getText() ?></p>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
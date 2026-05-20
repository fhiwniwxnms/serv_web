<?php include __DIR__ . '/../header.php'; ?>

<form class="article-edit" action="/web_labs_tsuprun/lab11/articles/<?= $article->getId() ?>/edit" method="post">
    <input type="text" name="name" value="<?= $article->getName() ?>">
    <textarea name="text"><?= $article->getText() ?></textarea>
    <button type="submit">Сохранить</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>
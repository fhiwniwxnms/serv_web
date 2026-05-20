<?php include __DIR__ . '/../header.php'; ?>

<form class="comment-edit" action="/web_labs_tsuprun/lab11/comments/<?= $comment->getId() ?>/edit" method="post">
    <textarea name="text"><?= $comment->getText() ?></textarea>
    <button type="submit">Сохранить</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>